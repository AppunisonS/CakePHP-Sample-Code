<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users controller
 * Author : Saurabh Pandey
 */
class VendorsController extends AppController {
    /*
     * Admin Users Listing
     * Description - Admin Users Listing
     * @params - none
     */

    public function vendorListing() {
        $title = "Admin -Vendors Listing";
        $this->set(compact('title'));
        $this->loadModel('Vendors');

        $conditions = array('Vendors.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Vendors.first_name LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Vendors.last_name LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Vendors.email LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Vendors.phone_number LIKE'] = '%' . $this->request->data['search'] . '%';
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Vendors->find('All')->contain(['Services','VendorsDetails'])->order(['Vendors.id' => 'DESC']));
//pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'vendor');
            $this->render('index');
        }
    }

    /*
     * Admin Plan add and edit
     * Description - Add new /Edit  admin Category
     * @params - id (will pass only in case of edit form)
     */

    public function saveVendor($id = NULL) {


        $title = ($id) ? "Admin - Edit Vendor" : "Admin - Add New Vendor";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $this->loadModel('VendorsDetails');
        if (!empty($id) && isset($id)) {
            $data = $this->Vendors->find()->where(['Vendors.id' => $id])->contain(['VendorsDetails'])->hydrate(false)->first();
        } else {
            $data = [];
        }

        $servicesList = $this->Services->find('list')->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $districtsList = $this->Districts->find('list')->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $legally_eligible = array('yes' => 'yes', 'no' => 'no');
        $experience = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10');
        $about_xetra_job = array('friend' => 'Friend', 'internet' => 'Internet', 'advertisement' => 'Advertisement', 'other' => 'other');
        $commuting = array('My own car' => 'My own car', 'Public transportation' => 'Public transportation', 'Borrowing a car' => 'Borrowing a car', 'Other / not sure yet' => 'Other / not sure yet');
        $gender = array('man' => 'Man', 'woman' => 'Woman');


        $this->set(compact('servicesList', 'legally_eligible', 'experience', 'about_xetra_job', 'commuting', 'gender'));

        
        $this->set('id', $id);
        if ($this->request->is('post')) {
//            pr($this->request->data()); die;
            
             if (!empty($_FILES['vendor_image'])) {
                if (!$_FILES['vendor_image']['error']) {
                    $imageArray = $_FILES['vendor_image'];
                    $vendorImage = $this->Common->uploadFile(VENDOR_IMG_PATH, $imageArray);
                    if ($vendorImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {
                        if (!empty($data['image'])) {
                            @unlink(VENDOR_IMG_PATH . $data['image']);
                        }
                        $this->request->data['image'] = $vendorImage;
                    }
                }
            }
            
            if (empty($id)) {

                $vendor = $this->Vendors->newEntity();
                $vendor = $this->Vendors->patchEntity($vendor, $this->request->data);
            } else if (!empty($id)) {
                $datas = ($id) ? $this->Vendors->get($id) : [];
                $vendor = $this->Vendors->patchEntity($datas, $this->request->data);
            }

            if ($vendor->errors()) {
                $this->Flash->error(__('Unable to add your admin vendor validation error.'));
            } else {
                if ($result = $this->Vendors->save($vendor)) {
//                    pr($this->request->data['vendors_detail']); die;
                    
                    $vendorsDetails['id'] = $this->request->data['vendors_detail']['id'];
                    $vendorsDetails['vendor_id'] = $result->id;
                    $vendorsDetails['mobile_number'] = $this->request->data['vendors_detail']['mobile_number'];
                    $vendorsDetails['location'] = $this->request->data['vendors_detail']['location'];
                    $vendorsDetails['city'] = $this->request->data['vendors_detail']['city'];
                    $vendorsDetails['state'] = $this->request->data['vendors_detail']['state'];
                    $vendorsDetails['vendor_experience'] = $this->request->data['vendors_detail']['vendor_experience'];
                    $vendorsDetails['legally_eligible'] = $this->request->data['vendors_detail']['legally_eligible'];
                    $vendorsDetails['about_xetra_job'] = $this->request->data['vendors_detail']['about_xetra_job'];
                    $vendorsDetails['commuting'] = $this->request->data['vendors_detail']['commuting'];
                    $vendorsDetails['gender'] = $this->request->data['vendors_detail']['gender'];
//                    pr($vendorsDetails);die;
                    $insert = $this->VendorsDetails->newEntity($vendorsDetails);
                    if ($this->VendorsDetails->save($insert)) {
                        $this->Flash->success(__('Vendor has been saved successfully.'));
                        return $this->redirect(['action' => 'vendorListing']);
                    };
                }
                $this->Flash->error(__('Unable to save admin data.'));
            }
        } else {
//            pr($data);die;
            if (!empty($data)) {
                $this->request->data['vendors_detail']['mobile_number'] = $data['vendors_detail']['mobile_number'];
                $this->request->data['vendors_detail']['location'] = $data['vendors_detail']['location'];
                $this->request->data['vendors_detail']['city'] = $data['vendors_detail']['city'];
                $this->request->data['vendors_detail']['state'] = $data['vendors_detail']['state'];
                $this->request->data['vendors_detail']['vendor_experience'] = $data['vendors_detail']['vendor_experience'];
                $this->request->data['vendors_detail']['legally_eligible'] = $data['vendors_detail']['legally_eligible'];
                $this->request->data['vendors_detail']['about_xetra_job'] = $data['vendors_detail']['about_xetra_job'];
                $this->request->data['vendors_detail']['commuting'] = $data['vendors_detail']['commuting'];
                $this->request->data['vendors_detail']['gender'] = $data['vendors_detail']['gender'];
                $this->request->data = $data;
            } else {
                $this->request->data = $data;
            }
        }
    }

}
