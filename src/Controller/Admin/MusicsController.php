<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  Musics controller
 * Author : Saurabh Pandey
 */
class MusicsController extends AppController {
    /*
     * Admin Musics Listing
     * Description - Musics Features Listing
     * @params - none
     */

    public function musicListing() {
        $title = "Admin -Musics Listing";
        $this->set(compact('title'));

        $conditions = array('Musics.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Musics.music_name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Musics->find('All'));

        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'musics');
            $this->render('index');
        }
    }

    /*
     * Admin Musics add and edit
     * Description - Add new /Edit  admin Features
     * @params - id (will pass only in case of edit form)
     */

    public function saveMusic($id = NULL) {


        $title = ($id) ? "Admin - Edit Musics" : "Admin - Add New Musics";
        $this->set(compact('title'));
        $data = ($id) ? $this->Musics->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            if (empty($id)) {
                $partner = $this->Musics->newEntity();
                $partner = $this->Musics->patchEntity($partner, $this->request->data);
            } else
                $partner = $this->Musics->patchEntity($data, $this->request->data);

            if ($partner->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
                if ($this->Musics->save($partner)) {
                    $this->Flash->success(__('Musics has been saved successfully.'));
                    return $this->redirect(['action' => 'musicListing']);
                }
                $this->Flash->error(__('Unable to save music data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
