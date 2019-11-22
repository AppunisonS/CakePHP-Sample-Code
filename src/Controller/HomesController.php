<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
use Cake\Mailer\Email;

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
        $this->loadModel('Vendors');
        $this->loadModel('Cities');
        $this->loadModel('VendorAvailabilities');

        $howItWorks = $this->CmsPages->find()->where(['page_alias' => 'how-it-works', 'status' => Active, 'delete_status' => NotDeleted])->first();
        $this->set('howItWorks', $howItWorks);

        $features = $this->CmsPages->find()->where(['page_alias' => 'features', 'status' => Active, 'delete_status' => NotDeleted])->first();
        $this->set('features', $features);

        $this->loadModel('Testimonials');
        $testimonials = $this->Testimonials->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('testimonials', $testimonials);

        $this->loadModel('Services');
        $services = $this->Services->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('services', $services);


        $this->loadModel('Cities');
        $cities = $this->Cities->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('cities', $cities);

        $this->loadModel('TrustAndSecurities');
        $trustAndSecurities = $this->TrustAndSecurities->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('trustAndSecurities', $trustAndSecurities);

        if ($this->request->is('post')) {
//            pr($this->request->data);die;
            $postServiceId = $this->request->data['services_id'];
            $postCity = $this->request->data['city'];
            $city = array();
            if ($this->request->is('post') && !empty($postServiceId) && !empty($postCity)) {
//                pr($this->request->data);
                $current_date = date("Y-m-d");
                $vendors11 = $this->Vendors->find('all')->where(['Vendors.delete_status' => NotDeleted,
                                    'Vendors.status' => Active, 'Vendors.blok_status' => NotBlocked,
                                    'Vendors.services_id' => $postServiceId, 'VendorsDetails.city' => $postCity
                                ])
                                ->contain([
                                    'VendorAvailabilities' => array(
                                        'conditions' => array('VendorAvailabilities.availabilities_date >' => $current_date)
                                    ), 'VendorsDetails'
                                ])->hydrate(false)->toArray();

//                pr($vendors11); die;
                if (isset($vendors11) && !empty($vendors11)) {
                    foreach ($vendors11 as $keyCity => $valCity) {
                        $city[] = $valCity['vendors_detail']['city'];
                    }
                    $cityData = array_unique($city);
                    if (!empty($cityData)) {
                        if (in_array(strtolower($this->request->data['city']), $cityData)) {

                            return $this->redirect(['action' => 'professional/' . $postCity . '/' . $postServiceId]);
                        } else {
                            $this->Flash->usererror(__('Sorry, we don’t cover your area yet, but will let you know when we do!'));
                        }
                    }
                    $this->Flash->usererror(__('Sorry, we don’t cover your area yet, but will let you know when we do!'));
                    return $this->redirect(['action' => 'index']);
                } else {

                    $this->Flash->usererror(__('Sorry, we don’t cover your area yet, but will let you know when we do!'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->usererror(__('Sorry, please select both field!'));
        }
    }

    public function professional($postCity = NULL, $postServiceId = NULL) {

        $title = "Listing Page";
        $this->set(compact('title'));
        $this->set('click', $postServiceId);
        $this->loadModel('Services');
        $this->loadModel('Vendors');
        $this->loadModel('VendorAvailabilities');
        $this->loadModel('Districts');

        $districtsList = $this->Districts->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('cities', $districtsList);

        $services = $this->Services->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('services', $services);

        $current_date = date("Y-m-d");
        $myDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "+1 month"));

        $datetime1 = date_create($current_date);
        $datetime2 = date_create($myDate);
        $interval = date_diff($datetime1, $datetime2);
        $restDate = $interval->format('%a ');

        // data formate = 03-11-2018 and get date or day//
        $date = date('D', strtotime($current_date));
        $currentDay = date('d', strtotime($current_date));

        if ($this->request->is('post')) {
            $postCity = $this->request->data['city'];
            $postServiceId = $this->request->data['services_id'];
            $this->set('click', $postServiceId);
//            pr($this->request->data);
        }

        if (!empty($postCity) && !empty($postCity)) {

            $vendorsDeatils = $this->Vendors->find('all')->where(['Vendors.delete_status' => NotDeleted,
                                'Vendors.status' => Active, 'Vendors.blok_status' => NotBlocked,
                                'Vendors.services_id' => $postServiceId, 'VendorsDetails.city' => $postCity
                            ])
                            ->contain([
                                'VendorAvailabilities' => ['Orders',
                                    'conditions' => ['VendorAvailabilities.availabilities_date >' => $current_date],
                                    'sort' => ['VendorAvailabilities.availabilities_date' => 'ASC']
                                ], 'VendorsDetails'
                            ])->hydrate(false)->toArray();

//            pr($vendorsDeatils);die;
        }

        $this->set(compact('vendorsDeatils', 'restDate'));
    }

    public function vendorDetails($id) {

        $title = "Vendor Details Page";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $this->loadModel('Vendors');
        $this->loadModel('VendorAvailabilities');

        $current_date = date("Y-m-d");

        $myDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "+1 month"));

        $datetime1 = date_create($current_date);
        $datetime2 = date_create($myDate);
        $interval = date_diff($datetime1, $datetime2);
        $restDate = $interval->format('%a ');

        $vendorsDeatils = $this->Vendors->find()->where(['Vendors.id' => $id, 'Vendors.delete_status' => NotDeleted,
                            'Vendors.status' => Active, 'Vendors.blok_status' => NotBlocked
                        ])
                        ->contain([
                            'VendorAvailabilities' => [
                                'conditions' => ['VendorAvailabilities.availabilities_date >' => $current_date]
                                , 'sort' => ['VendorAvailabilities.availabilities_date' => 'ASC']
                            ], 'VendorsDetails'
                        ])->hydrate(false)->toArray();

//        pr($vendorsDeatils);die;
        $this->set(compact('vendorsDeatils', 'restDate'));
    }

    public function bookingPage($id = NULL, $vendorId = NULL, $vendorAvabId = NULL) {


        $id = base64_decode($id);
        $vendorId = base64_decode($vendorId);
        $vendorAvabId = base64_decode($vendorAvabId);
//pr($vendorAvabId);die;
        // Set Bydefult Services Which User Selected Previous//
        $services_id = $id;
        $title = "Booking Page";
        $this->set(compact('title'));
        $this->loadModel('SubServices');
        $this->loadModel('Services');
        $this->loadModel('Vehicles');
        $this->loadModel('ServicesDriverPrices');
        $this->loadModel('ServicesUnitPrices');
        $this->loadModel('ServiceDjEventPrices');
        $this->loadModel('PlanTypes');
        $this->loadModel('Vendors');
        $this->loadModel('Orders');
        $this->loadModel('EmailTemplates');
        $this->loadModel('CardDetails');
        $this->loadModel('JobRequests');
        $this->loadModel('VendorAvailabilities');

        $this->loadModel('Districts');

        $districtsList = $this->Districts->find('list', ['keyField' => 'district', 'valueField' => ['district']])->where(['Districts.status' => Active, 'Districts.delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set('districtsList', $districtsList);

        if (isset($vendorAvabId) && !empty($vendorAvabId)) {
            $vendorAvailabilitiesData = $this->VendorAvailabilities->find()->where(['id' => $vendorAvabId, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->first();
            $this->request->data['datepicker'] = date('m/d/Y', strtotime($vendorAvailabilitiesData['availabilities_date']));
            $this->request->data['timepicker'] = $vendorAvailabilitiesData['time'];
            $this->request->data['vendor_availabilities_id'] = $vendorAvabId;
            $this->set('vendorAvabId', $vendorAvabId);
        }

        $this->loadModel('WebsiteSettings');
        $WebsiteSettings = $this->WebsiteSettings->find()->first();

//        pr($WebsiteSettings);die;
        $sessionUserInfo = $this->request->Session()->read('Auth.User');

        $emailTemp = $this->EmailTemplates->find()
                        ->where(['alias' => 'order-has-been-sent'])
                        ->hydrate(false)->first();

        $patientGenger = array('male' => 'Male', 'female' => 'Female');
        $planTypes = $this->PlanTypes->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        // Find Services Data By Id //
        $servicesName = $this->Services->find()->where(['id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->first();

        // Use Less For Now //
        $servicesData = $this->Services->find()->where(['id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->contain(['ServicesDriverPrices', 'ServiceDjEventPrices', 'SubServices' => ['servicesUnitPrices'], 'Xetras'])->hydrate(false)->first();
        // end //

        if ($id != '3') {
            $subServicesList = $this->SubServices->find('list')->where(['services_id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        } else {
            $vehiclesList = $this->Vehicles->find('list')->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
            $servicesDriverPricesList = $this->ServicesDriverPrices->find()->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        }
        $subServicesData = $this->SubServices->find()->where(['SubServices.services_id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->contain(['servicesUnitPrices', 'Xetras'])->hydrate(false)->toArray();
        // Find All Services List//
        $this->set(compact('services_id', 'patientGenger', 'planTypes', 'vehiclesList', 'servicesDriverPricesList', 'servicesData', 'servicesName', 'subServicesData', 'subServicesList', 'vendorId', 'vendorAvabId'));

        /* =========Payumoney integration ============= */
//        $MERCHANT_KEY = $WebsiteSettings->payu_merchant_key;
//        $SALT = $WebsiteSettings->payu_salt;
//        $PAYU_BASE_URL = $WebsiteSettings->payu_base_url;
//        $txnid = '';
//        if (empty($txnid)) {
//            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);  // Generate random transaction id
//        }
//        $hash = '';
//        $hashSequence = ($MERCHANT_KEY . "|" . $txnid . "|" . $totalAmount . "|" . $productInfo . "|" . $firstname . "|" . $email . "|||||||||||" . $SALT);
//        $hash = strtolower(hash("sha512", $hashSequence));
//        $this->set(compact('PAYU_BASE_URL', 'MERCHANT_KEY', 'SALT', 'PAYU_BASE_URL', 'txnid', 'hash', 'productInfo', 'totalAmount'));
//        /* =========End Payumoney Integration ========= */



        if ($this->request->is('post')) {
//            pr($this->request->data); die;
            if (isset($this->request->data['vendor_id']) && !empty($this->request->data['vendor_id'])) {
                $vendorsList = $this->Vendors->find()->where(['Vendors.id' => $this->request->data['vendor_id'], 'Vendors.services_id' => $this->request->data['services_id'], 'status' => Active, 'delete_status' => NotDeleted, 'blok_status' => NotBlocked])->hydrate(false)->toArray();
            } else {


                $vendorsList = $this->Vendors->find()->where(['Vendors.services_id' => $this->request->data['services_id'], 'status' => Active, 'delete_status' => NotDeleted, 'blok_status' => NotBlocked])->hydrate(false)->toArray();
            }

//            pr($vendorsList);die;
            $orderId = Text::uuid();

            $this->request->data['order_id'] = $orderId;
            $this->request->data['user_id'] = $sessionUserInfo['id'];
            $this->request->data['services_id'] = $this->request->data['services_id'];

            $this->request->data['first_name'] = $this->request->data['first_name'];
            $this->request->data['last_name'] = $this->request->data['last_name'];
            $this->request->data['Email'] = $this->request->data['Email'];
            $this->request->data['phone_number'] = $this->request->data['phone_number'];
            $this->request->data['location'] = $this->request->data['location'];
            $this->request->data['states'] = $this->request->data['states'];
//            $this->request->data['city'] = $this->request->data['city'];
            $this->request->data['district'] = $this->request->data['district'];
            $this->request->data['services_name'] = $this->request->data['services'];
            $this->request->data['description_about_job'] = $this->request->data['description_about_job'];
            $this->request->data['datepicker'] = date('Y-m-d', strtotime($this->request->data['datepicker']));
            $this->request->data['timepicker'] = date('h:i:s', strtotime($this->request->data['timepicker']));
            //$this->request->data['timepicker'] = $this->request->data['timepicker'];

            $this->request->data['plan_type'] = isset($this->request->data['plan_type']) ? $this->request->data['plan_type'] : '';
            $this->request->data['selected_plan_duration'] = isset($this->request->data['selected_plan_duration']) ? $this->request->data['selected_plan_duration'] : '';
            $this->request->data['unit_time'] = isset($this->request->data['unit_time']) ? $this->request->data['unit_time'] : '';

            $this->request->data['amount'] = $this->request->data['amount'];
            $this->request->data['discount_price'] = $this->request->data['discount_price'];
            $this->request->data['total_ammount'] = $this->request->data['total_ammount'];
//            $this->request->data['vendor_id'] = "";

            $orderData = $this->Orders->newEntity();
            $orderData = $this->Orders->patchEntity($orderData, $this->request->data);
//            pr($orderData);die;
            if ($orderSaveData = $this->Orders->save($orderData)) {

                // Send Mail to User For Conformatation//
                $emailContent = utf8_decode($emailTemp['description']);
                $fullName = $this->request->data['first_name'] . ' ' . $this->request->data['last_name'];
                $content = str_replace(array('{full_name}'), array($fullName), $emailContent);
                $email = new Email('default');
                $email->transport('defaultEmail');
                $email->template("default", "default");
                $email->from(EMAIL_FROM);
                $email->to($this->request->data['Email']);
                $email->subject($emailTemp['subject']);
                $email->emailFormat('html');
                $email->viewVars(['content' => $content]);
//                $email->send();
                if ($email->send()) {
                    if (empty($this->request->data['vendor_id'])) {
                        if (count($vendorsList) > 0) {

                            $i = 1;
                            foreach ($vendorsList as $keyVen => $valVan) {
                                $jobRequestsData = $this->JobRequests->newEntity();
                                $jobRequestData['order_id'] = $orderSaveData->id;
                                $jobRequestData['vendor_id'] = $valVan['id'];
                                $jobRequestsData = $this->JobRequests->patchEntity($jobRequestsData, $jobRequestData);
                                $this->JobRequests->save($jobRequestsData);
                                $i++;
                                if (count($vendorsList) < $i) {
                                    $this->Flash->usersuccess(__('Order has been created successfully.'));
                                    return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
                                }
                            }
                        } else {
                            $jobRequestsData = $this->JobRequests->newEntity();
                            $jobRequestData['order_id'] = $orderSaveData->id;
//                            $jobRequestData['vendor_id'] = $valVan['id'];
                            $jobRequestsData = $this->JobRequests->patchEntity($jobRequestsData, $jobRequestData);
                            $this->JobRequests->save($jobRequestsData);
                            $this->Flash->usersuccess(__('Order has been created successfully.'));
                            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
                        }
                    } else{
                        
                        return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
                    }
                }
            }
        }
    }

    // Function for Fatch Data Regarding Sub Services In Booking Page using Ajax //


    function getDataToSelectedSubcat($id = NULL) {
        $this->loadModel('ServicesUnitPrices');
        $this->loadModel('ServiceDjEventPrices');
        $this->loadModel('Xetras');
        $this->loadModel('Guests');
        $this->loadModel('Musics');
        $this->loadModel('AdditionalServices');

        $this->viewBuilder()->layout('ajax_front');

        if ($this->request->is('ajax')) {

            $musicsNameList = $this->Musics->find('list', ['keyField' => 'id', 'valueField' => ['music_name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
            $additionalServicesNameList = $this->AdditionalServices->find('list', ['keyField' => 'id', 'valueField' => ['additional_services_name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
            $equipmentProvidedList = array('The Venue' => 'The Venue', 'The DJ' => 'The DJ');
            $eventsPlaceList = array('Indoors' => 'Indoors', 'Outdoors' => 'Outdoors', 'Not sure yet' => 'Not sure yet');
            $this->set(compact('musicsNameList', 'noOfPeopleList', 'additionalServicesNameList', 'equipmentProvidedList', 'eventsPlaceList'));


            $servicesUnitPrices = $this->ServicesUnitPrices->find()->where(['ServicesUnitPrices.sub_services_id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
            $serviceDjEventPrices = $this->ServiceDjEventPrices->find()->where(['ServiceDjEventPrices.sub_services_id' => $id])->contain(['Events'])->hydrate(false)->toArray();
            $xetrasPrices = $this->Xetras->find()->where(['Xetras.sub_services_id' => $id, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
            $noOfPeopleList = $this->Guests->find('list', ['keyField' => 'id', 'valueField' => ['no_of_people']])->where(['status' => Active, 'delete_status' => NotDeleted]);

            $this->set(compact('servicesUnitPrices', 'serviceDjEventPrices', 'xetrasPrices', 'noOfPeopleList'));
            if (!empty($servicesUnitPrices)) {
                $this->viewBuilder()->templatePath('Element' . DS . 'frontElements' . DS . 'servicesunitprice');
                $this->render('index');
            }
            if (!empty($serviceDjEventPrices)) {
                $this->viewBuilder()->templatePath('Element' . DS . 'frontElements' . DS . 'servicesdjeventprice');
                $this->render('index');
            }
        }
    }

    function getGuestPrice($id = NULL) {
        $this->loadModel('Guests');
        $this->viewBuilder()->layout('ajax_front');
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $guestPricesData = $this->Guests->find()->where(['Guests.id' => $id])->hydrate(false)->toArray();
            echo json_encode($guestPricesData);
            die;
        }
    }

    function getEventPriceData($id = NULL) {
        $this->loadModel('ServiceDjEventPrices');
        $this->viewBuilder()->layout('ajax_front');
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $eventPricesData = $this->ServiceDjEventPrices->find()->where(['ServiceDjEventPrices.id' => $id])->hydrate(false)->toArray();
            echo json_encode($eventPricesData);
            die;
        }
    }

    function getServiceDjEventPricesData($id = NULL) {
        $this->loadModel('ServicesUnitPrices');
        $this->loadModel('ServiceDjEventPrices');
        $this->viewBuilder()->layout('ajax_front');
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $serviceDjEventPricesData = $this->ServiceDjEventPrices->find()->where(['ServiceDjEventPrices.id' => $id])->contain(['AdditionalServices', 'Musics', 'Events', 'Guests'])->hydrate(false)->toArray();
            echo json_encode($serviceDjEventPricesData);
            die;
        }
    }

    function getXetraServicesData($id = NULL) {
        $this->loadModel('Xetras');
        $this->viewBuilder()->layout('ajax_front');
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $xetraData = $this->Xetras->find()->where(['Xetras.id' => $id])->hydrate(false)->toArray();
            echo json_encode($xetraData);
            die;
        }
    }

    public function getServicesDriverPrices($Model = NULL, $comp_field = NULL, $id = NULL) {

        $this->viewBuilder()->layout('ajax');
        $this->loadModel($Model);
        $this->autoRender = false;
        $data = $this->$Model->find()->where(['id' => $id])->first();
//        echo $data['description'];
        echo json_encode($data);
        die;
    }

    function getPlanData($id = NULL) {

        $this->loadModel('PlanTypes');
        $this->viewBuilder()->layout('ajax_front');
        if ($this->request->is('ajax')) {
            $planWiseData = $this->PlanTypes->find()->where(['PlanTypes.duration' => $id, 'status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
            $this->set(compact('planWiseData'));
            if (!empty($planWiseData)) {
                $this->viewBuilder()->templatePath('Element' . DS . 'frontElements' . DS . 'plantype');
                $this->render('index');
            }
        }
    }

    public function listing() {

        $title = "Listing Page";
        $this->set(compact('title'));
    }

    public function contact() {

        $title = "Contact Page";
        $this->set(compact('title'));
        $this->loadModel("WebsiteSettings");
        $this->loadModel("ContactUs");
        $websiteSettings = $this->WebsiteSettings->find()->first();
        $this->set(compact('websiteSettings'));

        $query = $this->ContactUs->newEntity();
        if ($this->request->is('post')) {
//            pr($this->request->data); die;
            $query = $this->ContactUs->patchEntity($query, $this->request->data);
            if ($query->errors()) {
                $this->Flash->usererror(__('Unable to submit your message.'));
                return $this->redirect(['action' => 'index']);
            } else {
                if ($this->ContactUs->save($query)) {
                    $this->Flash->usersuccess(__('Form has been submitted successfully.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->usererror(__('Unable to submit your message.'));
            }
        }
    }

    public function about() {

        $title = "About Page";
        $this->set(compact('title'));
        $this->loadModel("CmsPages");
        $cmsPages = $this->CmsPages->find()->where(['CmsPages.page_alias' => 'About-us'])->hydrate(false)->first();
        $this->set(compact('cmsPages'));
    }

    public function singUpPro() {

        $title = "sing Up Pro";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $this->loadModel('Vendors');

        $servicesList = $this->Services->find('list')->where(['status' => Active, 'delete_status' => NotDeleted])->hydrate(false)->toArray();
        $this->set(compact('servicesList'));

        $vendor = $this->Vendors->newEntity();

        $password = new DefaultPasswordHasher();
        if ($this->request->is('post')) {

            $this->request->data['password'] = $password->hash($this->request->data['confirm_password']);
            $this->request->data['reference_id'] = time();

            $vendor = $this->Vendors->patchEntity($vendor, $this->request->data);
            if ($vendor->errors()) {
                $this->Flash->usererror(__('Unable to add vendor validation error.'));
            } else {
                $vendorSaveData = $this->Vendors->save($vendor);
                if ($vendorSaveData) {
//                    $servicesId = $this->request->data['services_id'];
                    $lastInsertedId = $vendorSaveData->id;
                    $this->Flash->usersuccess(__('Vendor has been created successfully.please fill all personal info to Active your account'));
                    return $this->redirect(['action' => 'personalInfo/' . $lastInsertedId]);
                }
                $this->Flash->usererror(__('Unable to add vendor database error.'));
            }
        }
    }

    public function personalInfo($id = NULL) {

        $title = "Personal Info";
        $this->set(compact('title'));
        $this->loadModel('Vendors');
        $this->loadModel('VendorsDetails');

        $legally_eligible = array('yes' => 'yes', 'no' => 'no');
        $experience = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10');
        $about_xetra_job = array('friend' => 'Friend', 'internet' => 'Internet', 'advertisement' => 'Advertisement', 'other' => 'other');
        $commuting = array('My own car' => 'My own car', 'Public transportation' => 'Public transportation', 'Borrowing a car' => 'Borrowing a car', 'Other / not sure yet' => 'Other / not sure yet');

        $this->set(compact('id', 'servicesId', 'experience', 'legally_eligible', 'about_xetra_job', 'commuting'));

        $this->loadModel('EmailTemplates');

        $emailTemp = $this->EmailTemplates->find()
                        ->where(['alias' => 'account-activation-link-for-vendor'])
                        ->hydrate(false)->first();

        $vendordetails = $this->VendorsDetails->newEntity();

        if ($this->request->is('post')) {
//            pr($this->request->data);die;

            if (!empty($_FILES['scanned_background_papers_from_peru'])) {
                if (!$_FILES['scanned_background_papers_from_peru']['error']) {
                    $imageArray = $_FILES['scanned_background_papers_from_peru'];
                    $backgroundImage = $this->Common->uploadFile(SCANNED_BACKGROUND_PATH, $imageArray);
                    if ($backgroundImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {

                        $this->request->data['scanned_background_papers_from_peru'] = $backgroundImage;
                    }
                }
            }


            if (!empty($_FILES['scanned_certification_papers'])) {
                if (!$_FILES['scanned_certification_papers']['error']) {
                    $imageSCArray = $_FILES['scanned_certification_papers'];
                    $catificationImage = $this->Common->uploadFile(SCANNED_CATIFICATION_PATH, $imageSCArray);
                    if ($catificationImage == '') {
                        $this->Flash->error(__('Image file not valid.'));
                    } else {

                        $this->request->data['scanned_certification_papers'] = $catificationImage;
                    }
                }
            }


//            $this->request->data['city'] = strtolower($this->request->data['city']);
            $this->request->data['city'] = strtolower($this->request->data['district']); // district is worked as city //
            $this->request->data['state'] = strtolower($this->request->data['state']);
//            $this->request->data['services_id'] = $this->request->data['services_id'];
//pr($this->request->data);die;
            $vendordetails = $this->VendorsDetails->patchEntity($vendordetails, $this->request->data);
            if ($vendordetails->errors()) {
                $this->Flash->usererror(__('Unable to add vendor detials validation error.'));
            } else {
                if ($saveVendorsDetail = $this->VendorsDetails->save($vendordetails)) {
                    $getVendorDetails = $this->Vendors->find()->where(['Vendors.id' => $this->request->data['vendor_id']])->hydrate(false)->first();

                    $emailContent = utf8_decode($emailTemp['description']);
                    $link = SITE_PATH . 'homes/vendorActivateAccount/' . $saveVendorsDetail->id;
                    $fullName = $getVendorDetails['first_name'] . ' ' . $getVendorDetails['last_name'];
                    $content = str_replace(array('{full_name}', '{link}'), array($fullName, $link), $emailContent);
                    $email = new Email('default');
                    $email->transport('defaultEmail');
                    $email->template("default", "default");
                    $email->from(EMAIL_FROM);
                    $email->to($getVendorDetails['email']);
                    $email->subject($emailTemp['subject']);
                    $email->emailFormat('html');
                    $email->viewVars(['content' => $content]);
                    $email->send();
                    $this->Flash->usersuccess(__('Vendor has been created successfully.'));
                    return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
                }
                $this->Flash->usererror(__('Unable to add vendor detials database error.'));
            }
        }
    }

    public function vendorActivateAccount($id = NULL) {

        $this->loadModel('Vendors');
        $this->viewBuilder()->layout(false);
        $this->autoRender = false;
        $vendor = $this->Vendors->find()->where(['id' => $id, 'status' => Inactive])->first();
        if ($vendor) {
            $this->Vendors->updateAll(['status' => Active, 'form_complate' => Active], ['id' => $id]);
            $this->Flash->usersuccess(__('Vendor has been activated.'));
            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
        } else {
            $this->Flash->usererror(__('Something went wrong'));
            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
        }
    }

}
