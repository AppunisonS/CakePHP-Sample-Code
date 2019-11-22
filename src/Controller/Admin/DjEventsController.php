<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Services admin controller
 * Author : Saurabh Pandey
 */
class DjEventsController extends AppController {
    /*
     * Services   Listing
     * Description -  Services   Listing
     * @params - none
     */

    public function djEventsListing() {
        $title = "Admin -Services";
        $this->set(compact('title'));
        $this->loadModel('Services');
        $this->loadModel('ServiceDjEventPrices');

        $conditions = array('ServiceDjEventPrices.delete_status' => NotDeleted);
        if ($this->request->is('post') && !empty($this->request->data['search'])) {
            $conditions['OR']['Services.name LIKE'] = '%' . $this->request->data['search'] . '%';
            $conditions['OR']['Events.event_name LIKE'] = '%' . $this->request->data['search'] . '%';
        }
        $this->paginate = [
            'limit' => PAGING_SIZE,
            'conditions' => $conditions,
        ];
        $Results = $this->paginate($this->ServiceDjEventPrices->find('all')->contain(['Services', 'Events', 'SubServices']));
//           pr($Results);die;
        $this->set(compact('Results'));
        if ($this->request->is('ajax')) {
            $this->viewBuilder()->layout('ajax');
            $this->viewBuilder()->templatePath('Element' . DS . 'admin' . DS . 'djevents');
            $this->render('index');
        }
    }

    public function saveDjEvents($id = NULL) {
//      echo "dj";die; party_and_event
        $title = "Admin - Edit Dj Event ";
        $this->set(compact('title'));
        $this->loadModel('servicesUnitPrices');
        $this->loadModel('Services');
        $this->loadModel('SubServices');
        $this->loadModel('Events');
        $this->loadModel('Musics');
        $this->loadModel('Guests');
        $this->loadModel('AdditionalServices');
        $this->loadModel('ServiceDjEventPrices');

        $data = ($id) ? $this->ServiceDjEventPrices->get($id) : [];
        //SET Field for validation
        $this->set('id', $id);
        $servicesNameList = $this->Services->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['status' => Active, 'delete_status' => NotDeleted]);

        $subServicesList = $this->SubServices->find('list', ['keyField' => 'id', 'valueField' => ['name']])->where(['services_id' => '6', 'status' => Active, 'delete_status' => NotDeleted]);
        $eventsNameList = $this->Events->find('list', ['keyField' => 'id', 'valueField' => ['event_name']])->where(['status' => Active, 'delete_status' => NotDeleted]);

        // $musicsNameList = $this->Musics->find('list', ['keyField' => 'id', 'valueField' => ['music_name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
        //$noOfPeopleList = $this->Guests->find('list', ['keyField' => 'id', 'valueField' => ['no_of_people']])->where(['status' => Active, 'delete_status' => NotDeleted]);
        //$additionalServicesNameList = $this->AdditionalServices->find('list', ['keyField' => 'id', 'valueField' => ['additional_services_name']])->where(['status' => Active, 'delete_status' => NotDeleted]);
        //$equipmentProvidedList = array('The Venue' => 'The Venue', 'The DJ' => 'The DJ');
        //$eventsPlaceList = array('Indoors' => 'Indoors', 'Outdoors' => 'Outdoors', 'Not sure yet' => 'Not sure yet');
        // $this->set(compact('servicesNameList','subServicesList', 'eventsNameList', 'musicsNameList', 'noOfPeopleList', 'additionalServicesNameList', 'equipmentProvidedList', 'eventsPlaceList'));

        $this->set(compact('servicesNameList', 'subServicesList', 'eventsNameList'));


        if ($this->request->is('post')) {
            //  pr($this->request->data);die;

            if (empty($id)) {
                $djEvent = $this->ServiceDjEventPrices->newEntity();
                $djEvent = $this->ServiceDjEventPrices->patchEntity($djEvent, $this->request->data);
            } else {
                $djEvent = $this->ServiceDjEventPrices->patchEntity($data, $this->request->data);
            }
//            pr($djEvent);die;
            if ($djEvent->errors()) {
                $this->Flash->error(__('Unable to add Dj Events validation error.'));
            } else {

                if ($this->ServiceDjEventPrices->save($djEvent)) {
                    $this->Flash->success(__('Events has been saved successfully.'));
                    return $this->redirect(['action' => 'djEventsListing']);
                }
                $this->Flash->error(__('Unable to save Event data.'));
            }
        } else {
            $this->request->data = $data;
        }
    }

}
