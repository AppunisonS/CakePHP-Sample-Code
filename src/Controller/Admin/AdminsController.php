<?php

namespace App\Controller\admin;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 *  Admin controller
 * Author : Saurabh Pandey
 */
class AdminsController extends AppController {
    /*
     * Admin Login function
     * Description - Admin puth login with (admins) table 
     * @params - none
     */

    public function login() {
        $title = "Admin - Login page";
        $this->set(compact('title'));
        if ($this->request->is('post')) {

            $admin = $this->Auth->identify();
            if ($admin) {
                $this->Auth->setUser($admin);
                $this->Flash->success(__('We will get back to you soon.'));
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('There was a problem submitting your form.'));
            }
        }
    }

    /*
     * Admin Registration function
     * Description - Admin puth login with (admins) table 
     * @params - none
     */

    public function registration() {
        $title = "Admin - Registration page";
        $this->set(compact('title'));
        $admin = $this->Admins->newEntity();
        $password = new DefaultPasswordHasher();
        if ($this->request->is('post')) {
            if (!empty($_FILES['admin_img'])) {
                echo "hello1";
                die;
                if (!$_FILES['admin_img']['error']) {

                    $imageArray = $_FILES['admin_img'];
                    $adminImage = $this->Common->uploadFile(ADMIN_IMG_PATH, $imageArray);
                    if ($adminImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(ADMIN_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $adminImage;
                    }
                }
            }

            $this->request->data['password'] = $password->hash($this->request->data['confirm_password']);
            $admin = $this->Admins->patchEntity($admin, $this->request->data);
            if ($admin->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->Admins->save($admin)) {
                    $this->Flash->success(__('Admin has been created successfully.'));
                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Unable to add your admin user database error.'));
            }
        }
    }

    /*
     * Admin Dashboard with widgets
     * Description - Admin Dashboard with widgets
     * @params - none
     */

    public function dashboard() {
        $title = "Admin - Dashboard";
        $this->set(compact('title'));
        $this->loadModel('Categories');


        $this->loadModel('Admins');
        $adminList = $this->Admins->find()->where(['Admins.delete_status' => NotDeleted])->order(['Admins.id' => 'DESC'])->limit(5)->hydrate(false)->toArray();
        $this->set('adminList', $adminList);
        $adminCount = count($adminList);
        $this->set('adminCount', $adminCount);

        $this->loadModel('Services');
        $servicesList = $this->Services->find()->where(['Services.delete_status' => NotDeleted])->order(['Services.id' => 'DESC'])->limit(5)->hydrate(false)->toArray();
        $this->set('servicesList', $servicesList);
        $servicesCount = $this->Services->find()->where(['Services.delete_status' => NotDeleted])->order(['Services.id' => 'DESC'])->hydrate(false)->toArray();
        $servicesCount = count($servicesCount);
        $this->set('servicesCount', $servicesCount);

        $this->loadModel('SubServices');
        $subServicesList = $this->SubServices->find()->where(['SubServices.delete_status' => NotDeleted])->contain(['Services'])->order(['SubServices.id' => 'DESC'])->limit(5)->hydrate(false)->toArray();
        $this->set('subServicesList', $subServicesList);
        $subServicesCount = $this->SubServices->find()->where(['SubServices.delete_status' => NotDeleted])->order(['SubServices.id' => 'DESC'])->hydrate(false)->toArray();
        $subServicesCount = count($subServicesCount);
        $this->set('subServicesCount', $subServicesCount);
        
        
        $this->loadModel('Xetras');
        $xetraList = $this->Xetras->find()->where(['Xetras.delete_status' => NotDeleted])->contain(['Services','SubServices'])->order(['Xetras.id' => 'DESC'])->limit(5)->hydrate(false)->toArray();
        $this->set('xetraList', $xetraList);
        $xetrasCount = $this->Xetras->find()->where(['Xetras.delete_status' => NotDeleted])->order(['Xetras.id' => 'DESC'])->hydrate(false)->toArray();
        $xetrasCount = count($xetrasCount);
        $this->set('xetrasCount', $xetrasCount);
    }

    public function profile() {
        $title = "Admin - Profile";
        $this->set(compact('title'));
        $conditions = array('delete_status' => NotDeleted);
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
            'orderB' => ['id' => 'DSC']
        ];
    }

    /*
     * Admin Member Listing
     * Description - Admin Member Listing
     * @params - none
     */

    public function listing() {
        $title = "Admin - Listing";
        $this->set(compact('title'));

        $conditions = array('delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['first_name LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['last_name LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['email LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate('Admins');
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'admin');
            $this->render('index');
        }
    }

    /*
     * Admin Member add and edit
     * Description - Add new /Edit  admin members
     * @params - id (will pass only in case of edit form)
     */

    public function saveAdmin($id = NULL) {
        $title = ($id) ? "Admin - Edit New Users" : "Users - Add New Users";
        $this->set(compact('title'));
        $data = ($id) ? $this->Admins->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            $iWidth = $iHeight = 200;
            $iJpgQuality = 90;
            if (!empty($_FILES['admin_img'])) {
                if (!$_FILES['admin_img']['error']) {
                    $imageArray = $_FILES['admin_img'];
                    $extArr = explode('.', $imageArray['name']);
                    $ext = end($extArr);
                    $filename = md5(microtime());
                    $url = ADMIN_IMG_PATH . $filename;
                    if (move_uploaded_file($imageArray['tmp_name'], $url)) {
                        $adminImage = $filename;
                    } else {
                        $adminImage = '';
                    }
                    if (file_exists($url) && filesize($url) > 0) {
                        $aSize = getimagesize($url);

                        if (!$aSize) {
                            @unlink($url);
                            return;
                        }
                        switch ($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';
                                $vImg = @imagecreatefromjpeg($url);
                                break;
                            case IMAGETYPE_PNG:
                                $sExt = '.png';
                                $vImg = @imagecreatefrompng($url);
                                break;
                            default:
                                @unlink($url);
                        }

                        $vDstImg = @imagecreatetruecolor($iWidth, $iHeight);
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int) $_POST['x1'], (int) $_POST['y1'], $iWidth, $iHeight, (int) $_POST['w'], (int) $_POST['h']);
                        $sResultFileName = $url . $sExt;
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($url);
                    }
                    //End Addons
                    $adminImage = $adminImage . $sExt;
                    if ($adminImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(ADMIN_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $adminImage;
                    }
                }
            }

            if (empty($id)) {
                $admin = $this->Admins->newEntity();
                $password = new DefaultPasswordHasher();
                $this->request->data['password'] = $password->hash($this->request->data['confirm_password']);
                $admin = $this->Admins->patchEntity($admin, $this->request->data);
            } else {
                $admin = $this->Admins->patchEntity($data, $this->request->data);
            }
            if ($admin->errors()) {
                $this->Flash->error(__('Unable to add your Admins  validation error.'));
            } else {
                if ($this->Admins->save($admin)) {

                    $this->Flash->success(__('Admins has been saved successfully.'));
                    return $this->redirect(['action' => 'listing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

    /*
     * Admin logout
     * Description - Destroy auth sesstion and redirect to logout url
     * @params - none
     */

    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function websiteSetting($id = NULL) {

        $title = "Admin - Edit Website Setting";
        $this->set(compact('title'));

        $this->loadModel("WebsiteSettings");
        $WebsiteSettings = $this->WebsiteSettings->find()->first();

        if ($this->request->is('post')) {
            $data = $this->WebsiteSettings->get($this->request->data['id']);
            if (!empty($_FILES['logo_file'])) {

                if (!$_FILES['logo_file']['error']) {

                    $imageArray = $_FILES['logo_file'];
                    $logoImage = $this->Common->uploadFile(WEBSITE_LOGO_PATH, $imageArray);
                    if ($logoImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if ($this->request->data['logo']) {
                            @unlink(WEBSITE_LOGO_PATH . $this->request->data['logo']);
                        }
                        $this->request->data['logo'] = $logoImage;
                    }
                }
            }
            if (!empty($_FILES['footer_logo_file'])) {
                if (!$_FILES['footer_logo_file']['error']) {
                    $imageArray = $_FILES['footer_logo_file'];
                    $backendImage = $this->Common->uploadFile(WEBSITE_LOGO_PATH, $imageArray);
                    if ($backendImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if ($this->request->data['footer_logo']) {
                            @unlink(WEBSITE_LOGO_PATH . $this->request->data['footer_logo']);
                        }
                        $this->request->data['footer_logo'] = $backendImage;
                    }
                }
            }
           
            $websiteSetting = $this->WebsiteSettings->newEntity();
            $websiteSetting = $this->WebsiteSettings->patchEntity($data, $this->request->data);
//             pr($websiteSetting);die;
            if ($websiteSetting->errors()) {
                unlink(WEBSITE_LOGO_PATH . $this->request->data['logo']);
                unlink(WEBSITE_LOGO_PATH . $this->request->data['footer_logo']);
                $this->Flash->error(__('Unable to edit Website Setting validation error.'));
            } else {
                if ($this->WebsiteSettings->save($websiteSetting)) {
                    $this->Flash->success(__('Website Setting has been saved successfully.'));
                    return $this->redirect(['action' => 'websiteSetting']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
           // pr($WebsiteSettings);die;
            $this->request->data = $WebsiteSettings;
        }
    }

    /* Admin Change Password */

    public function changePassword() {

        $this->loadModel("Admins");
                            
        if ($this->request->is('post')) {
            $user = $this->Admins->get($this->Auth->user('id'));
            if (!empty($this->request->data)) {
                $password = new DefaultPasswordHasher();
                $user = $this->Admins->patchEntity($user, [
                    'old_password' => $this->request->data['old_password'],
                    'password' => $password->hash($this->request->data['new_password']),
                    'new_password' => $this->request->data['new_password'],
                    'confirm_password' => $this->request->data['confirm_password']
                        ], ['validate' => 'password']);
            }
            if ($this->Admins->save($user)) {
                $this->Flash->success('The password is successfully changed');
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('There was an error during changing password!');
                return $this->redirect(['action' => 'dashboard']);
            }
            $this->set('user', $user);
        }
    }

}
