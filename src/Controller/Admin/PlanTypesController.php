<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Email\Email;

/**
 *  PlanTypes controller
 * Author : Saurabh Pandey
 */
class PlanTypesController extends AppController {
    /*
     * Admin Plans Listing
     * Description - Plan Types Features Listing
     * @params - none
     */

    public function planTypeListing() {
        $title = "Admin -Plan Types Listing";
        $this->set(compact('title'));



        $conditions = array('PlanTypes.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['PlanTypes.per_3_month LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['PlanTypes.per_6_month LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['PlanTypes.per_12_month LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];

        $Results = $this->paginate($this->PlanTypes->find('All'));

        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'plantypes');
            $this->render('index');
        }
    }

    /*
     * Admin PlanTypes add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function savePlanType($id = NULL) {


        $title = ($id) ? "Admin - Edit Plan Types" : "Admin - Add New Plan Types";
        $this->set(compact('title'));
        $this->loadModel('Plans');


        $data = ($id) ? $this->PlanTypes->get($id) : [];

       // pr($data);die;
//        if (!empty($id)) {
//            $planIds = json_decode($data['plans']);
//            $planValues = $this->Plans->find('list')->where(['id IN' => $planIds, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
//            $this->set('planValues', $planValues);
//        }
//        $list = $this->Plans->find('list')->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
//        $this->set('list', $list);


        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
//            pr($this->request->data);die;
            if (empty($id)) {
                $partner = $this->PlanTypes->newEntity();
                $partner = $this->PlanTypes->patchEntity($partner, $this->request->data);
            } else {
                $partner = $this->PlanTypes->patchEntity($data, $this->request->data);
            }
            if ($partner->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->PlanTypes->save($partner)) {
                    $this->Flash->success(__('Plans has been saved successfully.'));
                    return $this->redirect(['action' => 'planTypeListing']);
                }
                $this->Flash->error(__('Unable to save plan data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
