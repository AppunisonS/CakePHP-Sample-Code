<?php

namespace App\Model\Table;

use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 * Author : Saurabh Pandey
 * Description : Users Model with schema and validation
 * 
 */
class OrdersTable extends Table {

    public function beforeSave($event, $entity, $options) {

//        $session = new Session();
//        $adminId = $session->read('Auth.Admin.id');
//        if (!empty($adminId)) {
//            if (empty($entity->id)) {
//                $entity->created_by = $adminId;
//                $entity->modified_by = $adminId;
//            } else {
//                $entity->modified_by = $adminId;
//            }
//        }
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('orders');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', ['events' =>
            ['Model.beforeSave' =>
                ['created_date' => 'new', 'modified_date' => 'always']
            ]
                ]
        );

        $this->belongsTo('Services', [
            'className' => 'Services',
            'foreignKey' => 'services_id'
        ]);


        $this->belongsTo('SubServices', [
            'className' => 'SubServices',
            'foreignKey' => 'sub_services_id'
        ]);


        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'user_id'
        ]);
        
        $this->belongsTo('Vendors', [
            'className' => 'Vendors',
            'foreignKey' => 'vendor_id'
        ]);

        $this->belongsTo('ServiceDjEventPrices', [
            'className' => 'ServiceDjEventPrices',
            'foreignKey' => 'service_dj_event_prices_id'
        ]);

        $this->belongsTo('ServicesDriverPrices', [
            'className' => 'ServicesDriverPrices',
            'foreignKey' => 'services_driver_prices_id'
        ]);


        $this->belongsTo('Xetras', [
            'className' => 'Xetras',
            'foreignKey' => false,
            'conditions' => 'FIND_IN_SET(Xetras.id,Orders.select_extra)']);


//        $this->belongsTo('VendorAvailabilities', [
//            'className' => 'VendorAvailabilities',
//            'foreignKey' => 'vendor_availabilities_id'
//        ]);
    }

    /**
     * Author -Saurabh Pandey
     * Default validation rules.
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('first_name', 'true')
                ->notEmpty('name', 'Name should not be empty');
        $validator
                ->requirePresence('last_name', 'true')
                ->notEmpty('last_name');
        $validator
                ->requirePresence('services_id', 'true')
                ->notEmpty('services_id');
        $validator
                ->requirePresence('Email', 'true')
                ->notEmpty('Email');
        $validator
                ->requirePresence('phone_number', 'true')
                ->notEmpty('phone_number');
        $validator
                ->requirePresence('location', 'true')
                ->notEmpty('location');
        $validator
                ->requirePresence('states', 'true')
                ->notEmpty('states');
//        $validator
//                ->requirePresence('city', 'true')
//                ->notEmpty('city');
        $validator
                ->requirePresence('district', 'true')
                ->notEmpty('district');
        $validator
                ->requirePresence('datepicker', 'true')
                ->notEmpty('datepicker');
//        $validator
//                ->requirePresence('plan_type', 'true')
//                ->notEmpty('plan_type');
//        $validator
//                ->requirePresence('selected_plan_duration', 'true')
//                ->notEmpty('selected_plan_duration');
        $validator
                ->requirePresence('amount', 'true')
                ->notEmpty('amount');
        $validator
                ->requirePresence('discount_price', 'true')
                ->notEmpty('discount_price');
        $validator
                ->requirePresence('total_ammount', 'true')
                ->notEmpty('total_ammount');

        return $validator;
    }

}
