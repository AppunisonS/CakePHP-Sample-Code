<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users controller
 * Author : Saurabh Pandey
 */
class UsersController extends AppController {
    /*
     * Admin Users Listing
     * Description - Admin Users Listing
     * @params - none
     */

    public function userListing() {
        $title = "Admin -Users Listing";
        $this->set(compact('title'));

        $conditions = array('Users.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Users.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Users->find('All')->order(['Users.id' => 'DESC']));
//pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'user');
            $this->render('index');
        }
    }

    /*
     * Admin Plan add and edit
     * Description - Add new /Edit  admin Category
     * @params - id (will pass only in case of edit form)
     */

    public function saveUser($id = NULL) {


        $title = ($id) ? "Admin - Edit User" : "Admin - Add New User";
        $this->set(compact('title'));
        $data = ($id) ? $this->Users->get($id) : [];

        $this->loadModel('Services');
//        $servicesList = $this->Services->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
//        $this->set('servicesList', $servicesList);
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {

            if (!empty($_FILES['user_image'])) {
                if (!$_FILES['user_image']['error']) {
                    $imageArray = $_FILES['user_image'];
                    $userImage = $this->Common->uploadFile(USER_IMG_PATH, $imageArray);
                    if ($userImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(USER_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $userImage;
                    }
                }
            }

            if (empty($id)) {
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $this->request->data);
            } else
                $user = $this->Users->patchEntity($data, $this->request->data);

            if ($user->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('User has been saved successfully.'));
                    return $this->redirect(['action' => 'userListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
