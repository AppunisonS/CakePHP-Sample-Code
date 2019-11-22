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
class VendorDetailsTable extends Table {

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

        $this->table('vendors_details');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', ['events' =>
            ['Model.beforeSave' =>
                ['created_date' => 'new', 'modified_date' => 'always']
            ]
                ]
        );
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
                ->requirePresence('vendor_id', 'true')
                ->notEmpty('vendor_id', 'vendor_id should not be empty');
        $validator
                ->requirePresence('mobile_number', 'true')
                ->notEmpty('mobile_number');

        $validator
                ->requirePresence('address', 'true')
                ->notEmpty('address');

        $validator
                ->requirePresence('city', 'true')
                ->notEmpty('city');
        
        $validator
                ->requirePresence('state', 'true')
                ->notEmpty('state');
        
        $validator
                ->requirePresence('zip', 'true')
                ->notEmpty('zip');

        $validator
                ->requirePresence('vendor_experience', 'true')
                ->notEmpty('vendor_experience');


        return $validator;
    }

}
