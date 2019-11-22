<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Mailer\Email;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {

        parent::initialize();

        //social login ends

        $this->loadModel("WebsiteSettings");
        $WebsiteSettings = $this->WebsiteSettings->find()->first();
        $this->set('WebsiteSettings', $WebsiteSettings);
        $this->loadModel('Districts');
        $districtsList = $this->Districts->find('list', ['keyField' => 'district', 'valueField' => ['district']])->where(['Districts.status' => Active, 'Districts.delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('districtsList', $districtsList);

//        $this->loadModel("Services");
//        $footerServices = $this->Services->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
//        $this->set('footerServices', $footerServices);

        if ($WebsiteSettings->smtp_status == 1) {
            Email::configTransport('defaultEmail', [
                'host' => $WebsiteSettings->host,
                'port' => $WebsiteSettings->port,
                'timeout' => $WebsiteSettings->timeout,
                'username' => $WebsiteSettings->username,
                'password' => $WebsiteSettings->password,
                'className' => 'Smtp',
                'tls' => null
            ]);
        }
        @define('SITE_TITLE', $WebsiteSettings->title);
        @define('SITE_DESCRIPTION_ADMIN', $WebsiteSettings->title . ' -Admin Panel ');
        @define('EMAIL_FROM', [$WebsiteSettings->website_email_from => $WebsiteSettings->title]);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Common');

        if ((isset($this->request->params['prefix']) && ($this->request->params['prefix'] == 'admin'))) {
            $this->viewBuilder()->layout('admin_layout');
            $this->loadComponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'fields' => ['username' => 'email', 'password' => 'password'
                        ],
                        'userModel' => 'admins',
                        'scope' => ['delete_status' => NotDeleted, 'status' => Active]
                    ]
                ],
                'loginAction' => [
                    'controller' => 'Admins', 'action' => 'login', 'prefix' => 'admin'
                ],
                'logoutRedirect' => [
                    'controller' => 'Admins', 'action' => 'login', 'prefix' => 'admin'
                ],
                'loginRedirect' => [
                    'controller' => 'Admins', 'action' => 'dashboard', 'prefix' => 'admin'
                ],
                'storage' => [
                    'className' => 'Session',
                    'key' => 'Auth.Admin',
                ],
            ]);
            // Allow the display action so our pages controller // continues to work. 
            $this->set('authAdmin', $this->request->Session()->read('Auth.Admin'));
            $this->Auth->allow(['login', 'registration', 'isUnique', 'isUniqueUser', 'getList',
                'getCategoryList', 'linkEmail', 'getEditorList']);
        } else {

            //bookingPage
            $this->viewBuilder()->layout('default');
            $this->loadComponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'fields' => ['username' => 'email', 'password' => 'password'
                        ],
                        'userModel' => 'Users',
                        'scope' => ['delete_status' => NotDeleted, 'status' => Active]
                    ]
                ],
                'loginAction' => [
                    'controller' => 'Users', 'action' => 'login'
                ],
                'logoutRedirect' => [
                    'controller' => 'Homes', 'action' => 'index'
                ],
                'loginRedirect' => [
                    'controller' => 'Homes', 'action' => 'index'
                ],
                'storage' => [
                    'className' => 'Session',
                    'key' => 'Auth.User',
                ],
            ]);

            $this->set('authUser', $this->request->Session()->read('Auth.User'));
            $this->Auth->allow(['index', 'getEditorList', 'personalInfo', 'singUpPro', 'registration',
                'forgotPassword', 'activateAccount', 'isUniqueUser', 'vendorActivateAccount', 'faq', 'contact', 'about']);
        }
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {



        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        //Check prefix for auth implementation
    }

    /*
     * public function to check unique ness of filed
     * @params 
     *  $fileds='field name where to check unique'
     *  $model = 'Model name '
     *  $compair field = 'Other Field we need to compaire'
     * @responce 'status [true,false,error]'
     */

    public function isUnique($field = NULL, $model = NULL, $compField = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $conditions = array();
            $conditions[$model . '.' . $field] = $_REQUEST[$field];
            if (!empty($compField)) {
                $conditions[$model . '.' . $compField] = $_REQUEST[$compField];
            }
            if ($this->$model->hasField('delete_status')) {
                $conditions[$model . '.delete_status'] = NotDeleted;
            }
            if ($this->request->data['id'] != '') {
                $conditions[$model . '.id !='] = $this->request->data['id'];
            }


            $query = $this->$model->find('All')->where($conditions)->hydrate(false)->toArray();
            if (count($query) <= 0) {

                echo 'true';
            } else {
                echo 'false';
            }die;
        }echo 'error';
        die;
    }

    /*
     * public function to check unique ness of filed
     * @params 
     *  $fileds='field name where to check unique'
     *  $model = 'Model name '
     *  $compair field = 'Other Field we need to compaire'
     * @responce 'status [true,false,error]'
     */

    public function isUniqueUser($field = NULL, $model = NULL, $compField = NULL) {

//        echo "kkkkkk";die;
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        Configure::write('debug', 2);
        if ($this->request->is('ajax')) {
            $conditions = array();
            $conditions[$model . '.' . $field] = $_REQUEST[$field];
            if (!empty($compField)) {
                $conditions[$model . '.' . $compField] = $_REQUEST[$compField];
            }
            if ($this->$model->hasField('delete_status')) {
                $conditions[$model . '.delete_status'] = NotDeleted;
            }
            if ($this->request->data['id'] != '') {
                $conditions[$model . '.id !='] = $this->request->data['id'];
            }

            $query = $this->$model->find('All')->where($conditions)->hydrate(false)->toArray();
            if (count($query) <= 0) {

                echo 'true';
            } else {
                echo 'false';
            }die;
        }echo 'error';
        die;
    }

    /*
     * public function to set active status
     * @params 
     *  $model = 'Model name '
     *  $id  = primary key value for where condition
     * @responce 'status [true,false,error]'
     */

    function statusActive($model = NULL, $id = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        if ($this->request->is('ajax') && !$id) {
            foreach ($this->request->data['id'] as $status_id):
                if (!empty($status_id)) {
                    $status = Active;
                    $statusData[] = $this->$model->updateAll(['status' => $status], ['id' => $status_id]);
                }
            endforeach;
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        }
    }

    /*
     * public function to set in active status
     * @params 
     *  $model = 'Model name '
     *  $id  = primary key value for where condition
     * @responce 'status [true,false,error]'
     */

    function statusInactive($model = NULL, $id = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        if ($this->request->is('ajax') && !$id) {
            foreach ($this->request->data['id'] as $status_id):
                if (!empty($status_id)) {
                    $status = Inactive;

                    $statusData[] = $this->$model->updateAll(['status' => $status], ['id' => $status_id]);
                }
            endforeach;
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        }
    }

    /*
     * public function to set in Decomposition status
     * @params 
     *  $model = 'Model name '
     *  $id  = primary key value for where condition
     * @responce 'status [true,false,error]'
     */



    /*
     * public function to set delete status
     * @params 
     *  $model = 'Model name '
     *  $id  = primary key value for where condition
     * @responce 'status [true,false,error]'
     */

    function delete($model = NULL, $id = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        if ($this->request->is('ajax') && !$id) {
            foreach ($this->request->data['id'] as $status_id):
                if (!empty($status_id)) {
                    $status = 1;
                    $statusData[] = $this->$model->updateAll(['delete_status' => $status], ['id' => $status_id]);
                }
            endforeach;
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        } else if ($this->request->is('ajax') && $id) {
            $status = 1;
            $statusData[] = $this->$model->updateAll(['delete_status' => $status], ['id' => $id]);
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        }
    }

    /*
     * public function to change status (if active then make it inactive and vice virsa
     * @params 
     *  $model = 'Model name '
     *  $id  = primary key value for where condition
     * @responce 'status [true,false,error]'
     */

    public function changeStatus($model = NULL, $id = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        if ($this->request->is('ajax') && !$id) {
            foreach ($this->request->data['id'] as $status_id):
                if (!empty($status_id)) {
                    $result = $this->$model->find()->where([$model . '.id' => $id])->first();
                    $status = Active;
                    if ($result->status == Active) {
                        $status = Inactive;
                    }
                    $statusData[] = $this->$model->updateAll(['status' => $status], ['id' => $status_id]);
                }
            endforeach;
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        } else if ($this->request->is('ajax') && $id) {
            $result = $this->$model->find()->where([$model . '.id' => $id])->first();
            $status = Active;

            if ($result->status == Active) {
                $status = Inactive;
            }
            $statusData[] = $this->$model->updateAll(['status' => $status], ['id' => $id]);
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        }
    }

    //rating status function
    public function ratingStatus($model = NULL, $id = NULL) {

        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        if ($this->request->is('ajax') && $id) {
            $result = $this->$model->find()->where([$model . '.id' => $id])->first();
            $status = ratingStatusActive;

            if ($result->rating_status == ratingStatusActive) {
                $status = ratingStatusInactive;
            }
            $statusData[] = $this->$model->updateAll(['rating_status' => $status], ['id' => $id]);
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        }
    }

    //end
    public function changeBlockStatus($model = NULL, $id = NULL) {
//        pr($model);die;
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;
        if ($this->request->is('ajax') && !$id) {
            foreach ($this->request->data['id'] as $status_id):
                if (!empty($status_id)) {
                    $result = $this->$model->find()->where([$model . '.id' => $id])->first();

                    $status = Active;
                    if ($result->blok_status == Active) {
                        $status = Inactive;
                    }
                    $statusData[] = $this->$model->updateAll(['blok_status' => $status], ['id' => $status_id]);
                }
            endforeach;
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        } else if ($this->request->is('ajax') && $id) {
            $result = $this->$model->find()->where([$model . '.id' => $id])->first();
            $status = Active;

            if ($result->blok_status == Active) {
                $status = Inactive;
            }
            $statusData[] = $this->$model->updateAll(['blok_status' => $status], ['id' => $id]);
            if (!empty($statusData)) {
                echo "ChangeStatus";
            } else {
                return false;
            }
        }
    }

//ajax call to get all dependent list of select box
    function getList($Model = NULL, $comp_field = NULL, $id = NULL) {

        $this->viewBuilder()->layout('ajax');
        $this->loadModel($Model);
        $this->autoRender = false;

        $data = $this->$Model->find('list', array('conditions' => array($Model . "." . $comp_field => $id, $Model . '.status' => true, $Model . '.delete_status' => Inactive), 'order' => $Model . '.name asc', 'fields' => array($Model . '.id', $Model . '.name')));

        echo json_encode($data);
        die;
    }

    // ajax call to get all category which is perent 

    function getEditorList($Model = NULL, $comp_field = NULL, $id = NULL) {

        $this->viewBuilder()->layout('ajax');
        $this->loadModel($Model);
        $this->autoRender = false;
        $data = $this->$Model->find()->where(['id' => $id])->first();
        echo $data['description'];
//        echo $data;
        die;
    }

    // ajax call to get all category which is perent 

    function getCategoryList($Model = NULL, $comp_field = NULL, $id = NULL) {

        $this->viewBuilder()->layout('ajax');
        $this->loadModel($Model);
        $this->autoRender = false;
        $data = $this->$Model->find('list', array('conditions' => array($Model . "." . $comp_field => $id, $Model . '.parent_id' => Inactive, $Model . '.status' => Active), 'order' => $Model . '.name asc', 'fields' => array($Model . '.id', $Model . '.name')));
        echo json_encode($data);
        die;
    }

    function checkPassword($old_password_field = NULL, $Model = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($Model);


        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $password = new DefaultPasswordHasher();

            $query = $this->$Model->find()->where([$Model . '.id' => $this->request->Session()->read('Auth.Admin.id')])->first();
            if (!empty($query)) {
                if ($password->check($this->request->data['old_password'], $query->password)) {
                    echo 'true';
                    die;
                } else {
                    echo 'false';
                    die;
                }
                die;
            }
        }
    }

    /*
     * @ check Password For User
     * @ Get Parm(id,old_password)
     * @ Created By :-kshitish
     * @ Created Date :- 26 june 2017
     */

    function checkUserPassword($old_password_field = NULL, $Model = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($Model);
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $password = new DefaultPasswordHasher();

            $query = $this->$Model->find()->where([$Model . '.id' => $this->request->Session()->read('Auth.User.id')])->first();
            if (!empty($query)) {
                if ($password->check($this->request->data['old_password'], $query->password)) {
                    echo 'true';
                    die;
                } else {
                    echo 'false';
                    die;
                }
                die;
            }
        }
    }

    # function To Create Check User Reference #
    # Created By :- Kshitish #
    # Created Date :- 03 DEc 2016 #

    function checkUserReference($user_reference_field = NULL, $model = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->loadModel($model);
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $conditions = array();
            $conditions[$model . '.delete_status'] = NotDeleted;
            if ($this->request->data['user_reference_id'] != '') {
                $conditions[$model . '.reference_id'] = $this->request->data['user_reference_id'];
            }
            $query = $this->$model->find('All')->where($conditions)->hydrate(false)->toArray();
            if (count($query) > 0) {

                echo 'true';
            } else {
                echo 'false';
            }die;
        }echo 'error';
        die;
    }

    // End Function//
    # function To Create Rendom Key For Register User #
    # Created By :- Kshitish #
    # Created Date :- 03 DEc 2016 #

    function random_string($type = 'alnum', $len = 32) {

        switch ($type) {

            case 'alnum' :

            case 'numeric' :

            case 'nozero' :

                switch ($type) {

                    case 'alnum' : $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                        break;

                    case 'numeric' : $pool = '0123456789';

                        break;

                    case 'nozero' : $pool = '123456789';

                        break;
                }


                $str = '';

                for ($i = 0; $i < $len; $i++) {

                    $str .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
                }

                return $str;

                break;

            case 'unique' : return md5(uniqid(mt_rand()));

                break;
        }
    }

}
