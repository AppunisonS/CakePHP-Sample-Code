<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * FAQS controller
 * Author : Saurabh Pandey
 */
class FaqsController extends AppController {
    /*
     * Admin Faq Listing
     * Description - Admin Faq Listing
     * @params - none
     */

    public function faqListing() {
        $title = "Admin -FAQ Listing";
        $this->set(compact('title'));

        $conditions = array('Faqs.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Faqs->find('All')->contain(['Services']));
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'faqs');
            $this->render('index');
        }
    }

    /*
     * Admin Faq add and edit
     * Description - Add new /Edit  admin Faq
     * @params - id (will pass only in case of edit form)
     */

    public function saveFaq($id = NULL) {


        $title = ($id) ? "Admin - Edit Faq" : "Admin - Add New Faq";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $data = ($id) ? $this->Faqs->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);

        $servicesList = $this->Services->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
        $this->set('servicesList', $servicesList);

        if ($this->request->is('post')) {
            if (empty($id)) {
                $category = $this->Faqs->newEntity();
                $category = $this->Faqs->patchEntity($category, $this->request->data);
            } else
                $category = $this->Faqs->patchEntity($data, $this->request->data);

            if ($category->errors()) {
                $this->Flash->error(__('Unable to add your admin faq validation error.'));
            } else {

                if ($this->Faqs->save($category)) {
                    $this->Flash->success(__('Faqs has been saved successfully.'));
                    return $this->redirect(['action' => 'faqListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

    /*
     * Admin Services Faq Listing
     * Description - Admin Services Faq Listing
     * @params - none
     */

    public function servicesFaqListing() {
        $title = "Admin -FAQ Listing";
        $this->set(compact('title'));

        $this->loadModel('ServicesFaqs');
        $conditions = array('ServicesFaqs.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['description LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->ServicesFaqs->find('All')->contain(['Services']));
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'faqs');
            $this->render('index1');
        }
    }

    /*
     * Admin Services Faq add and edit
     * Description - Add new /Edit  admin Services Faq
     * @params - id (will pass only in case of edit form)
     */

    public function saveServicesFaq($id = NULL) {


        $title = ($id) ? "Admin - Edit Faq" : "Admin - Add New Faq";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $this->loadModel('ServicesFaqs');

        $data = ($id) ? $this->ServicesFaqs->get($id) : [];
//        pr($data);  
        //SET Field for validation
        $this->set('id', $id);

        $servicesList = $this->Services->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
        $this->set('servicesList', $servicesList);

        if ($this->request->is('post')) {
//        pr($this->request->data); die;
            if (!empty($_FILES['faq_image'])) {
                if (!$_FILES['faq_image']['error']) {
                    $imageArray = $_FILES['faq_image'];
                    $faqImage = $this->Common->uploadFile(FAQ_IMG_PATH, $imageArray);
                    if ($faqImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(FAQ_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $faqImage;
                    }
                }
            }

            if (empty($id)) {
                $faqServices = $this->ServicesFaqs->newEntity();
                $faqServices = $this->ServicesFaqs->patchEntity($faqServices, $this->request->data);
            } else{
                 $faqServices = $this->ServicesFaqs->patchEntity($data, $this->request->data);
            }
               
//            pr($faqServices); die;
            if ($faqServices->errors()) {
                $this->Flash->error(__('Unable to add your admin Faq validation error.'));
            } else {

                if ($this->ServicesFaqs->save($faqServices)) {
                    $this->Flash->success(__('Faqs has been saved successfully.'));
                    return $this->redirect(['action' => 'servicesFaqListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
