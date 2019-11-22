<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Partners controller
 * Author : Saurabh Pandey
 */
class PartnersController extends AppController {
    /*
     * Admin Partners Listing
     * Description - Admin Partners Listing
     * @params - none
     */

    public function partnerListing() {
        $title = "Admin -Partners Listing";
        $this->set(compact('title'));

        $conditions = array('Partners.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Partners.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Partners->find('All')->contain(['Categories']));

        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'partner');
            $this->render('index');
        }
    }

    /*
     * Admin Plan add and edit
     * Description - Add new /Edit  admin Category
     * @params - id (will pass only in case of edit form)
     */

    public function savePartner($id = NULL) {


        $title = ($id) ? "Admin - Edit Partner" : "Admin - Add New Partner";
        $this->set(compact('title'));
        $data = ($id) ? $this->Partners->get($id) : [];

        $this->loadModel('Categories');
        $categoryList = $this->Categories->find('list', ['keyField' => 'id','valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
        $this->set('categoryList', $categoryList);
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            
            if (empty($id)) {
                $partner = $this->Partners->newEntity();
                $partner = $this->Partners->patchEntity($partner, $this->request->data);
            } else
                $partner = $this->Partners->patchEntity($data, $this->request->data);

            if ($partner->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {

                if ($this->Partners->save($partner)) {
                    $this->Flash->success(__('Plans has been saved successfully.'));
                    return $this->redirect(['action' => 'partnerListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
