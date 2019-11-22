<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  Plans controller
 * Author : Saurabh Pandey
 */
class EventsController extends AppController {
    /*
     * Admin Plans Listing
     * Description - Plans Features Listing
     * @params - none
     */

    public function eventListing() {
        $title = "Admin -Event Listing";
        $this->set(compact('title'));

        $conditions = array('Events.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Events.event_name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Events->find('All'));
        //pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'events');
            $this->render('index');
        }
    }

    /*
     * Admin Plans add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function saveEvent($id = NULL) {

        $title = ($id) ? "Admin - Edit Events" : "Admin - Add New Events";
        $this->set(compact('title'));
        $data = ($id) ? $this->Events->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            if (empty($id)) {
                $partner = $this->Events->newEntity();
                $partner = $this->Events->patchEntity($partner, $this->request->data);
            } else
                $partner = $this->Events->patchEntity($data, $this->request->data);

            if ($partner->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->Events->save($partner)) {
                    $this->Flash->success(__('Events has been saved successfully.'));
                    return $this->redirect(['action' => 'eventListing']);
                }
                $this->Flash->error(__('Unable to save plan data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
