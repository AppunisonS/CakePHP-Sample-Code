<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  Guests controller
 * Author : Saurabh Pandey
 */
class GuestsController extends AppController {
    /*
     * Admin Guests Listing
     * Description - Guests Features Listing
     * @params - none
     */

    public function guestListing() {

        $title = "Admin -Guests Listing";
        $this->set(compact('title'));
        $this->loadModel('Events');

        $conditions = array('Guests.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Events.event_id LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Guests.percentage LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Guests.no_of_people LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Guests->find('All'));
//        pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'guests');
            $this->render('index');
        }
    }

    /*
     * Admin Guests add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function saveGuest($id = NULL) {

        $title = ($id) ? "Admin - Edit Guests" : "Admin - Add New Guests";
        $this->set(compact('title'));
        $this->loadModel('Events');
        $data = ($id) ? $this->Guests->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);

        if ($this->request->is('post')) {
            if (empty($id)) {
                $partner = $this->Guests->newEntity();
                $partner = $this->Guests->patchEntity($partner, $this->request->data);
            } else
                $partner = $this->Guests->patchEntity($data, $this->request->data);

            if ($partner->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->Guests->save($partner)) {
                    $this->Flash->success(__('Guests has been saved successfully.'));
                    return $this->redirect(['action' => 'guestListing']);
                }
                $this->Flash->error(__('Unable to save guest data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
