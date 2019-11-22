<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  Plans controller
 * Author : Saurabh Pandey
 */
class CitiesController extends AppController {
    /*
     * Admin Plans Listing
     * Description - Plans Features Listing
     * @params - none
     */

    public function citiesListing() {
        $title = "Admin -Cities Listing";
        $this->set(compact('title'));

        $conditions = array('Cities.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Cities.city LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Cities->find('All'));
//        pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'cities');
            $this->render('index');
        }
    }

    /*
     * Admin Plans add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function saveCities($id = NULL) {

        $title = ($id) ? "Admin - Edit City" : "Admin - Add New City";
        $this->set(compact('title'));
        $data = ($id) ? $this->Cities->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            if (empty($id)) {
                $this->request->data['city'] = strtolower($this->request->data['city']);
                $cities = $this->Cities->newEntity();
                $cities = $this->Cities->patchEntity($cities, $this->request->data);
            } else
                $cities = $this->Cities->patchEntity($data, $this->request->data);

            if ($cities->errors()) {
                $this->Flash->error(__('Unable to add your admin city validation error.'));
            } else {
                if ($this->Cities->save($cities)) {
                    $this->Flash->success(__('City has been saved successfully.'));
                    return $this->redirect(['action' => 'citiesListing']);
                }
                $this->Flash->error(__('Unable to save City data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
