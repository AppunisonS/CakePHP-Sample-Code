<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Services admin controller
 * Author : Saurabh Pandey
 */
class TrustAndSecuritiesController extends AppController {
    /*
     * Services   Listing
     * Description -  Services   Listing
     * @params - none
     */

    public function trustAndSecuritiesListing() {

        $title = "Admin -TrustAndSecurities";
        $this->set(compact('title'));

        $this->loadModel('TrustAndSecurities');
        $conditions = array('TrustAndSecurities.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {

            $conditions['OR']['TrustAndSecurities.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->TrustAndSecurities->find('All'));
        $this->set(compact('Results'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'trustandsecurities');
            $this->render('index');
        }
    }

    public function saveTrustAndSecurities($id = NULL) {

        $title = "Admin - Edit Services ";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $data = ($id) ? $this->TrustAndSecurities->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);


        if ($this->request->is('post')) {
//            pr($this->request->data);die;
            if (!empty($_FILES['image1'])) {
                if (!$_FILES['image1']['error']) {
                    $imageArray = $_FILES['image1'];
                    $serviceImage = $this->Common->uploadFile(TAS_IMG_PATH, $imageArray);
                    if ($serviceImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(TAS_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $serviceImage;
                    }
                }
            }
            if (empty($id)) {
                $services = $this->TrustAndSecurities->newEntity();

                $services = $this->TrustAndSecurities->patchEntity($services, $this->request->data);
            }
            if ($id) {
                $services = $this->TrustAndSecurities->patchEntity($data, $this->request->data);
            }
            
//            pr($services);die;
            if ($services->errors()) {

                $this->Flash->error(__('Unable to add your cms page validation error.'));
            } else {
                if ($this->TrustAndSecurities->save($services)) {
                    $this->Flash->success(__('Services has been saved successfully.'));
                    return $this->redirect(['action' => 'trustAndSecuritiesListing']);
                }
                $this->Flash->error(__('Unable to save services.'));
            }
        } else {
//            pr($data);
            $this->request->data = $data;
        }
    }

}
