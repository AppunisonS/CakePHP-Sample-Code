<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * SubCategory controller
 * Author : Saurabh Pandey
 */
class XetrasController extends AppController {
    /*
     * Admin SubCategory Listing
     * Description - Admin SubCategory Listing
     * @params - none
     */

    public function xetrasListing() {
        $title = "Admin -Xetras Listing";
        $this->set(compact('title'));

        $conditions = array('Xetras.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Xetras.title LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
       @ $Results = $this->paginate($this->Xetras->find('All')->contain(['Services','SubServices']));

//       pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'xetras');
            $this->render('index');
        }
    }

    /*
     * Admin SubCategory add and edit
     * Description - Add new /Edit  admin SubCategory
     * @params - id (will pass only in case of edit form)
     */

    public function saveXetras($id = NULL) {

        $title = ($id) ? "Admin - Edit Xetras" : "Admin - Add New Xetras";
        $this->set(compact('title'));
        $data = ($id) ? $this->Xetras->get($id) : [];
        $this->loadModel('Services');
//        $this->loadModel('SubServices');
//        $servicesList = $this->Services->find('list', ['keyField' => 'id','valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted])->toArray();

        $servicesList = $this->Services->find('list', ['keyField' => 'id','valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
         //pr($servicesList);die;
        $this->set('servicesList', $servicesList);
//        

        //SET Field for validation
        $this->set('id', $id);
        if ($this->request->is('post')) {
//            pr($this->request->data);die;
             if (!empty($_FILES['xetra_image'])) {
                if (!$_FILES['xetra_image']['error']) {
                    $imageArray = $_FILES['xetra_image'];
                    $xetraImage = $this->Common->uploadFile(XETRA_IMG_PATH, $imageArray);
                    if ($xetraImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(FETCH_XETRA_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $xetraImage;
                    }
                }
            }
            
            if (empty($id)) {
                $xetras = $this->Xetras->newEntity();
                $xetras = $this->Xetras->patchEntity($xetras, $this->request->data);
            } else{
//                pr($data); 
                 $xetras = $this->Xetras->patchEntity($data, $this->request->data);
            }
               

            if ($xetras->errors()) {
                $this->Flash->error(__('Unable to add your admin user validation error.'));
            } else {
//  pr($xetras);die;
                if ($this->Xetras->save($xetras)) {
                    $this->Flash->success(__('Xetras has been saved successfully.'));
                    return $this->redirect(['action' => 'xetrasListing']);
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
//            pr($data);die;
            $this->request->data = $data;
        }
    }

}
