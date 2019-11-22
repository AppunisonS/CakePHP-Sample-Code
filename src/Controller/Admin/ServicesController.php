<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * SubCategory controller
 * Author : Saurabh Pandey
 */
class ServicesController extends AppController {
    /*
     * Admin SubCategory Listing
     * Description - Admin SubCategory Listing
     * @params - none
     */

    public function servicesListing() {
        $title = "Admin -SubServices Listing";
        $this->set(compact('title'));

        $conditions = array('Services.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Services.name LIKE'] = '%' . $this->request->data['search'] . '%';
           // $conditions['OR']['Services.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Services->find('All'));

        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'services');
            $this->render('index');
        }
    }

    /*
     * Admin SubCategory add and edit
     * Description - Add new /Edit  admin SubCategory
     * @params - id (will pass only in case of edit form)
     */

    public function saveServices($id = NULL) {


        $title = ($id) ? "Admin - Edit Services" : "Admin - Add New Services";
        $this->set(compact('title'));
        $data = ($id) ? $this->Services->get($id) : [];

        $this->loadModel('Services');
//        $servicesList = $this->Services->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
//        $this->set('servicesList', $servicesList);
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            
             if (!empty($_FILES['image1'])) {
                if (!$_FILES['image1']['error']) {
                    $imageArray = $_FILES['image1'];
                    $serviceImage = $this->Common->uploadFile(SUBSERVICE_IMG_PATH, $imageArray);
                    if ($serviceImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(SUBSERVICE_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $serviceImage;
                    }
                }
            }
            if (!empty($_FILES['bg_image1'])) {
                if (!$_FILES['bg_image1']['error']) {
                    $imageArray = $_FILES['bg_image1'];
                    $serviceBgImage = $this->Common->uploadFile(SERVICE_IMG_PATH, $imageArray);
                    if ($serviceBgImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['bg_image'])) {
                            @unlink(SERVICE_IMG_PATH . $data['bg_image']);
                        }
                        $this->request->data['bg_image'] = $serviceBgImage;
                    }
                }
            }
           
            if (empty($id)) {
                $services = $this->Services->newEntity();
                $services = $this->Services->patchEntity($services, $this->request->data);
            } else {
                $services = $this->Services->patchEntity($data, $this->request->data);
            }

            if ($services->errors()) {
                $this->Flash->error(__('Unable to add validation error.'));
            } else {
                if ($this->Services->save($services)) {
                    $this->Flash->success(__('Services has been saved successfully.'));
                    return $this->redirect(['action' => 'servicesListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
