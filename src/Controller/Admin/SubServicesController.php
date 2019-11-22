<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Services admin controller
 * Author : Saurabh Pandey
 */
class SubServicesController extends AppController {
    /*
     * Services   Listing
     * Description -  Services   Listing
     * @params - none
     */

    public function subServicesListing() {

        $title = "Admin -Services";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $this->loadModel('SubServices');

        $conditions = array('SubServices.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {

            $conditions['OR']['SubServices.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->SubServices->find('all')->contain(['Services']));
//        pr($Results);die;
        $this->set(compact('Results'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'subservices');
            $this->render('index');
        }
    }

    public function saveSubServices($id = NULL) {

        $title = "Admin - Edit Services ";
        $this->set(compact('title'));
        $this->loadModel('servicesUnitPrices');
        $this->loadModel('Services');
        $this->loadModel('SubServices');

        $services = [];
//        $data = ($id) ? $this->Services->get($id) : [];
        if (!empty($id) && isset($id)) {
            $data = $this->SubServices->find()->where(['SubServices.id' => $id])->contain(['servicesUnitPrices'])->hydrate(false)->first();
        } else {
            $data = [];
        }
//        pr($data);die;
        //SET Field for validation
        $this->set('id', $id);

        $servicesNameList = $this->Services->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
       
        $this->set(compact('servicesNameList'));

        if ($this->request->is('post')) {
//            pr($this->request->data);die;
            if (empty($id)) {

                $subservices = $this->SubServices->newEntity();
                $subservices = $this->SubServices->patchEntity($subservices, $this->request->data);
            } else if (!empty($id)) {
                $datas = ($id) ? $this->SubServices->get($id) : [];
                $subservices = $this->SubServices->patchEntity($datas, $this->request->data);
            }

            if ($subservices->errors()) {
                $this->Flash->error(__('Unable to add your cms page validation error.'));
            } else {
                if ($result = $this->SubServices->save($subservices)) {
                    if ($this->request->data['bedroom']['type'] != "0") {
                        if ($id) {
                            $this->request->data['servicesUnitPrices']['id'] = $this->request->data['bedroom']['id'];
                        }
                        $this->request->data['bedroom']['sub_services_id'] = $result->id;
                        $insert = $this->servicesUnitPrices->newEntity($this->request->data['bedroom']);
                        $this->servicesUnitPrices->save($insert);
                    }
                    if ($this->request->data['bathroom']['type'] != "0") {
                        $this->request->data['bathroom']['sub_services_id'] = $result->id;
                        if ($id) {
                            $this->request->data['servicesUnitPrices']['id'] = $this->request->data['bathroom']['id'];
                        }

                        $insert = $this->servicesUnitPrices->newEntity($this->request->data['bathroom']);
                        $this->servicesUnitPrices->save($insert);
                    }
                    if ($this->request->data['hour']['type'] != "0") {
                        $this->request->data['hour']['sub_services_id'] = $result->id;
                        if ($id) {
                            $this->request->data['servicesUnitPrices']['id'] = $this->request->data['hour']['id'];
                        }
                        $insert = $this->servicesUnitPrices->newEntity($this->request->data['hour']);
                        $this->servicesUnitPrices->save($insert);
                    }

                    if ($result) {
                        $this->Flash->success(__('Sub Services has been saved successfully.'));
                        return $this->redirect(['action' => 'subServicesListing']);
                    }
                }
                $this->Flash->error(__('Unable to save sub services.'));
            }
        } else {
//            pr($data);die;
            if (isset($data) && !empty($data)) {
                $this->request->data['name'] = $data['name'];


                foreach ($data['services_unit_prices'] as $key => $val) {
//                    pr($val); 
                    if ($val['type'] == 'bedroom') {
                        $this->request->data['bedroom']['id'] = $val['id'];
                        $this->request->data['bedroom']['type'] = $val['type'];
                        $this->request->data['bedroom']['unit'] = $val['unit'];
                        $this->request->data['bedroom']['price'] = $val['price'];
                        $this->request->data['bedroom']['xetra_unit'] = $val['xetra_unit'];
                        $this->request->data['bedroom']['xetra_price'] = $val['xetra_price'];
                        $this->request->data['bedroom']['defult_time'] = $val['defult_time'];
                        $this->request->data['bedroom']['xetra_time'] = $val['xetra_time'];
                    }
                    if ($val['type'] == 'bathroom') {
                        $this->request->data['bathroom']['id'] = $val['id'];
                        $this->request->data['bathroom']['type'] = $val['type'];
                        $this->request->data['bathroom']['unit'] = $val['unit'];
                        $this->request->data['bathroom']['price'] = $val['price'];
                        $this->request->data['bathroom']['xetra_unit'] = $val['xetra_unit'];
                        $this->request->data['bathroom']['xetra_price'] = $val['xetra_price'];
                        $this->request->data['bathroom']['defult_time'] = $val['defult_time'];
                        $this->request->data['bathroom']['xetra_time'] = $val['xetra_time'];
                    }
                    if ($val['type'] == 'hour') {
                        $this->request->data['hour']['id'] = $val['id'];
                        $this->request->data['hour']['type'] = $val['type'];
                        $this->request->data['hour']['unit'] = $val['unit'];
                        $this->request->data['hour']['price'] = $val['price'];
                        $this->request->data['hour']['xetra_unit'] = $val['xetra_unit'];
                        $this->request->data['hour']['xetra_price'] = $val['xetra_price'];
                    }
                   
                }

                $this->request->data['services_id'] = $data['services_id'];
                $this->request->data['description'] = $data['description'];
            } else {
                $this->request->data = $data;
            }
        }
    }

    public function deleteSubServiceUnit($id = NULL) {
        $this->viewBuilder()->layout('ajax');
        $this->autoRender = false;
        $this->loadMOdel('servicesUnitPrices');
        if ($this->request->is('ajax')) {
            $conditions = array();
            $conditions['servicesUnitPrices.sub_services_id'] = $id;
            $Data = $this->servicesUnitPrices->find()->where($conditions)->hydrate(false)->toArray();
            foreach ($Data as $key => $val) {
                $entity = $this->servicesUnitPrices->get($val['id']);
                $result = $this->servicesUnitPrices->delete($entity);
            }
        }echo "false";
        die;
    }

}
