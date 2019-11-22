<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Services admin controller
 * Author : Saurabh Pandey
 */
class VehiclesController extends AppController {
    /*
     * Services   Listing
     * Description -  Services   Listing
     * @params - none
     */

    public function vehicleListing() {
        $title = "Admin -Vehicles";
        $this->set(compact('title'));
        $this->loadModel('Vehicles');
         
        $conditions = array('Vehicles.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Vehicles.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Vehicles->find('all'));
        //pr($Results);die;
        $this->set(compact('Results'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'vehicle');
            $this->render('index');
        }
    }

    public function saveVehicle($id = NULL) {
        $title = "Admin - Edit Vehicles ";
        $this->set(compact('title'));
        $this->loadModel('Vehicles');

        $data = ($id) ? $this->Vehicles->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
       


        if ($this->request->is('post')) {
//            pr($this->request->data);die;

            if (empty($id)) {
                $driver = $this->Vehicles->newEntity();
                $driver = $this->Vehicles->patchEntity($driver, $this->request->data);
            } else {
                $driver = $this->Vehicles->patchEntity($data, $this->request->data);
            }
//            pr($driver);die;
            if ($driver->errors()) {
                $this->Flash->error(__('Unable to add Vehicles validation error.'));
            } else {

                if ($this->Vehicles->save($driver)) {
                    $this->Flash->success(__('Vehicles has been saved successfully.'));
                    return $this->redirect(['action' => 'vehicleListing']);
                }
                $this->Flash->error(__('Unable to save vehicle data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
