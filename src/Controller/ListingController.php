<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Homes controller
 * Author : Saurabh Pandey
 */
class HomesController extends AppController {
    /*
     * Home Page 
     * Description - Home Page Content
     * @params - none
     */

    public function index() {

        $title = "Home";
        $this->set(compact('title'));
        $this->set('bodyCaklss', '');
        $this->loadModel('CmsPages');
        $howItWorks = $this->CmsPages->find()->where(['page_alias' => 'listing', 'status' => Active, 'delete_status' => NotDeleted])->first();
        $this->set('listing', $listing);

   
   
    }

    public function bookingPage() {

        $title = "Listing Page";
        $this->set(compact('title'));
    }

}
