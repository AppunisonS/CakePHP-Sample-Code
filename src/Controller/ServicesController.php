<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Services controller
 * Author : Saurabh Pandey
 */
class ServicesController extends AppController {
    /*
     * Home Page 
     * Description - Home Page Content
     * @params - none
     */

    public function initialize() {
        parent::initialize();
        $class = "service_detail";
        $this->set(compact('class'));
    }

    public function index($id = NULL) {
//        $id = base64_decode($id);
//        pr($id);die;
        $title = "Home";
        $this->set(compact('title'));
        $this->set('id', $id);
        // For Featch FAQ Data //
        $this->loadModel('Faqs');
        $this->loadModel("WebsiteSettings");
         $this->loadModel("ServicesFaqs");
         
        $websiteSettings = $this->WebsiteSettings->find()->first();

        $xetra_job_faq_contant = $websiteSettings['xetra_job_faq_contant'];
        $faq_title = $websiteSettings['faq_title'];
        $this->set(compact('xetra_job_faq_contant', 'faq_title'));

        $faqDatas = $this->Faqs->find()->where(['services_id'=>$id,'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('faqDatas', $faqDatas);

        $servicesFaqDatas = $this->ServicesFaqs->find()->where(['services_id'=>$id,'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('servicesFaqDatas', $servicesFaqDatas);
        
        
        // END FAQ Data Featch //

        $this->loadModel('Services');
        $services = $this->Services->find()->contain(['ServicesDriverPrices'])->where(['id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->first();
//        pr($services);die;
        $this->set('services', $services);

        $this->loadModel('CmsPages');
        $howItWorks = $this->CmsPages->find()->where(['page_alias' => 'how-it-works', 'status' => Active, 'delete_status' => NotDeleted])->first();
        $this->set('howItWorks', $howItWorks);

        // fatech Data from Xetras table //
        $this->loadModel('Xetras');
        $xetrasData = $this->Xetras->find()->where(['services_id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
//        pr($xetrasData);die;
        $this->set('xetrasData', $xetrasData);

        $this->loadModel('TrustAndSecurities');
        $trustAndSecurities = $this->TrustAndSecurities->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('trustAndSecurities', $trustAndSecurities);
    }

}
