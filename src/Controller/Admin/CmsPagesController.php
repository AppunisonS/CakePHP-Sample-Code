<?php

namespace App\Controller\Admin;

use App\Controller\AppController;






/**
 * Appunison admin controller
 * Author : Hemant Chuphal
 */
class CmsPagesController extends AppController {
    /*
     * Admin Member Listing
     * Description - Admin Member Listing
     * @params - none
     */

    public function cmsPageListing() {
        $title = "Admin -Cms Pages Listing";
      
        $this->set(compact('title'));

        $conditions = array('delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['page_title LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['page_content LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate('CmsPages');
//        pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'cmspages');
            $this->render('index');
        }
    }

    /*
     * Admin Member add and edit
     * Description - Add new /Edit  admin members
     * @params - id (will pass only in case of edit form)
     */

    public function saveCmsPage($id = NULL) {
        
        $title = "Admin - Edit CmsPage ";
        $this->set(compact('title'));
        $this->loadModel('CmsPages');
        $data = ($id) ? $this->CmsPages->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        
        if ($this->request->is('post')) {
           if(empty($id)){
           $cmsPage = $this->CmsPages->newEntity();
          
            $cmsPage = $this->CmsPages->patchEntity($cmsPage, $this->request->data);
        }
            if ($id) {
                $cmsPage = $this->CmsPages->patchEntity($data, $this->request->data);
            }
            if ($cmsPage->errors()) {
              
                $this->Flash->error(__('Unable to add your cms page validation error.'));
            } else {
                if ($this->CmsPages->save($cmsPage)) {
                    $this->Flash->success(__('CmsPage has been saved successfully.'));
                    return $this->redirect(['action' => 'cmsPageListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
