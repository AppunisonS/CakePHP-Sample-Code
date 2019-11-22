<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  Plans controller
 * Author : Saurabh Pandey
 */
class DistrictsController extends AppController {
    /*
     * Admin Plans Listing
     * Description - Plans Features Listing
     * @params - none
     */

    public function districtsListing() {
        $title = "Admin -Districts Listing";
        $this->set(compact('title'));

        $conditions = array('Districts.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Districts.districts LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Districts->find('All'));
//        pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'districts');
            $this->render('index');
        }
    }

    /*
     * Admin Plans add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function saveDistricts($id = NULL) {

        $title = ($id) ? "Admin - Edit District" : "Admin - Add New District";
        $this->set(compact('title'));
        $data = ($id) ? $this->Districts->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            if (empty($id)) {
                $this->request->data['district'] = strtolower($this->request->data['district']);
                $districts = $this->Districts->newEntity();
                $districts = $this->Districts->patchEntity($districts, $this->request->data);
            } else
                $districts = $this->Districts->patchEntity($data, $this->request->data);

            if ($districts->errors()) {
                $this->Flash->error(__('Unable to add your admin district validation error.'));
            } else {
                if ($this->Districts->save($districts)) {
                    $this->Flash->success(__('District has been saved successfully.'));
                    return $this->redirect(['action' => 'districtsListing']);
                }
                $this->Flash->error(__('Unable to save District data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
