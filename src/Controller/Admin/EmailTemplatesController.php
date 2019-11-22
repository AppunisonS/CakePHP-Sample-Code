<?php

namespace App\Controller\Admin;

use App\Controller\AppController;


/**
 * Appunison admin controller
 * Author : Hemant Chuphal
 */
class EmailTemplatesController extends AppController {
    /*
     * Admin Member Listing
     * Description - Admin Member Listing
     * @params - none
     */

    public function emailTemplateListing() {
    	$title = "Admin -EmailTemplates Listing";
      
        $this->set(compact('title'));

        $conditions = array('delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['subject LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['description LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate('EmailTemplates');
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'emailtemplates');
            $this->render('index');
        }
    }

    /*
     * Admin Member add and edit
     * Description - Add new /Edit  admin members
     * @params - id (will pass only in case of edit form)
     */

    public function saveEmailTemplate($id = NULL) {
        
        
        $title = "Admin - Edit EmailTemplates ";
      
        $this->set(compact('title'));

        
        $data = ($id) ? $this->EmailTemplates->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
           $category = $this->EmailTemplates->newEntity();
            $category = $this->EmailTemplates->patchEntity($category, $this->request->data);
            if ($id) {
                $category = $this->EmailTemplates->patchEntity($data, $this->request->data);
            }
            if ($category->errors()) {
              
                $this->Flash->error(__('Unable to add your $category user validation error.'));
            } else {

                if ($this->EmailTemplates->save($category)) {
                    $this->Flash->success(__('EmailTemplates has been saved successfully.'));
                    return $this->redirect(['action' => 'emailTemplateListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
