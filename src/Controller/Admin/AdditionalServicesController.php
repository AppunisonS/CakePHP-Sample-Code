<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  AdditionalServices controller
 * Author : Saurabh Pandey
 */
class AdditionalServicesController extends AppController {
    /*
     * Admin AdditionalServices Listing
     * Description - AdditionalServices Features Listing
     * @params - none
     */

    public function additionalServicesListing() {
        $title = "Admin -AdditionalServices Listing";
        $this->set(compact('title'));

        $conditions = array('AdditionalServices.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['AdditionalServices.additional_services_name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->AdditionalServices->find('All'));
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'additionalservices');
            $this->render('index');
        }
    }

    /*
     * Admin AdditionalServices add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function saveAdditionalServices($id = NULL) {


        $title = ($id) ? "Admin - Edit AdditionalServices" : "Admin - Add New AdditionalServices";
        $this->set(compact('title'));
        $data = ($id) ? $this->AdditionalServices->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            if (empty($id)) {
                $partner = $this->AdditionalServices->newEntity();
                $partner = $this->AdditionalServices->patchEntity($partner, $this->request->data);
            } else
                $partner = $this->AdditionalServices->patchEntity($data, $this->request->data);

            if ($partner->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->AdditionalServices->save($partner)) {
                    $this->Flash->success(__('AdditionalServices has been saved successfully.'));
                    return $this->redirect(['action' => 'additionalServicesListing']);
                }
                $this->Flash->error(__('Unable to save additional services data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
