<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  Plans controller
 * Author : Saurabh Pandey
 */
class PlansController extends AppController {
    /*
     * Admin Plans Listing
     * Description - Plans Features Listing
     * @params - none
     */

    public function planListing() {
        $title = "Admin -Plans Listing";
        $this->set(compact('title'));

        $conditions = array('Plans.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Plans.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Plans->find('All'));

        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'plans');
            $this->render('index');
        }
    }

    /*
     * Admin Plans add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function savePlan($id = NULL) {

        $title = ($id) ? "Admin - Edit Plans" : "Admin - Add New Plans";
        $this->set(compact('title'));
        $data = ($id) ? $this->Plans->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            if (empty($id)) {
                $partner = $this->Plans->newEntity();
                $partner = $this->Plans->patchEntity($partner, $this->request->data);
            } else
                $partner = $this->Plans->patchEntity($data, $this->request->data);

            if ($partner->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->Plans->save($partner)) {
                    $this->Flash->success(__('Plans has been saved successfully.'));
                    return $this->redirect(['action' => 'planListing']);
                }
                $this->Flash->error(__('Unable to save plan data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
