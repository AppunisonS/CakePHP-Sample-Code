<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 *  Guests controller
 * Author : Saurabh Pandey
 */
class OrdersController extends AppController {
    /*
     * Admin Guests Listing
     * Description - Guests Features Listing
     * @params - none
     */

    public function orderListing() {
        
        $title = "Admin -Orders Listing";
        $this->set(compact('title'));

        $conditions = array('Orders.delete_status' => NotDeleted,'Orders.status' => Active);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Orders.services_name LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Orders.first_name LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Orders.Email LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Orders.phone_number LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Orders.location LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Orders.states LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Orders.district LIKE'] = '%' . $this->request->data['search'] . '%';
            
        }

        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->Orders->find('All')->contain(['SubServices'])->order(['Orders.id' => 'DESC']));
//        pr($Results);die;
        $this->set(compact('Results'));

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'order');
            $this->render('index');
        }
    }

    

}
