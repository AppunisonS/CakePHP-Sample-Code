<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Services admin controller
 * Author : Saurabh Pandey
 */
class DriversController extends AppController {
    /*
     * Services   Listing
     * Description -  Services   Listing
     * @params - none
     */

    public function driverListing() {
        $title = "Admin -Services";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $this->loadModel('ServicesDriverPrices');

        $conditions = array('ServicesDriverPrices.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['ServicesDriverPrices.vehicle_type LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['ServicesDriverPrices.destination_to LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['ServicesDriverPrices.destination_from LIKE'] = '%' . $this->request->data['search'] . '%';
        }
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->ServicesDriverPrices->find('all'));
//           pr($Results);die;
        $this->set(compact('Results'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'driver');
            $this->render('index');
        }
    }

    public function saveDriver($id = NULL) {
        $title = "Admin - Edit Dj Event ";
        $this->set(compact('title'));
        $this->loadModel('ServicesDriverPrices');
        $this->loadModel('Vehicles');

        $data = ($id) ? $this->ServicesDriverPrices->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);


//        $vehiclesNameList = $this->Vehicles->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
//        $this->set(compact('vehiclesNameList'));
//

        if ($this->request->is('post')) {
//            pr($this->request->data);die;

            if (empty($id)) {
                $driver = $this->ServicesDriverPrices->newEntity();
                $driver = $this->ServicesDriverPrices->patchEntity($driver, $this->request->data);
            } else {
                $driver = $this->ServicesDriverPrices->patchEntity($data, $this->request->data);
            }
//            pr($driver);die;
            if ($driver->errors()) {
                $this->Flash->error(__('Unable to add Dj Events validation error.'));
            } else {

                if ($this->ServicesDriverPrices->save($driver)) {
                    $this->Flash->success(__('Driver has been saved successfully.'));
                    return $this->redirect(['action' => 'driverListing']);
                }
                $this->Flash->error(__('Unable to save driver data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
