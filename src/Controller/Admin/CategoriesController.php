<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Category controller
 * Author : Saurabh Pandey
 */
class CategoriesController extends AppController {
    /*
     * Admin Category Listing
     * Description - Admin Category Listing
     * @params - none
     */

    public function categoryListing() {
        $title = "Admin -Categories Listing";
        $this->set(compact('title'));

        $conditions = array('Categories.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Categories.name LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Categories->find('All'));

        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'categories');
            $this->render('index');
        }
    }

    /*
     * Admin Category add and edit
     * Description - Add new /Edit  admin Category
     * @params - id (will pass only in case of edit form)
     */

    public function saveCategory($id = NULL) {


        $title = ($id) ? "Admin - Edit Category" : "Admin - Add New Category";
        $this->set(compact('title'));
        $data = ($id) ? $this->Categories->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
            if (empty($id)) {
                $category = $this->Categories->newEntity();
                $category = $this->Categories->patchEntity($category, $this->request->data);
            } else
                $category = $this->Categories->patchEntity($data, $this->request->data);

            if ($category->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {

                if ($this->Categories->save($category)) {
                    $this->Flash->success(__('Categories has been saved successfully.'));
                    return $this->redirect(['action' => 'categoryListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
