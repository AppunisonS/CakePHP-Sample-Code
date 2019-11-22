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
class VendorAvailabilitiesTable extends Table {

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

        $this->table('vendor_availabilities');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', ['events' =>
            ['Model.beforeSave' =>
                ['created_date' => 'new', 'modified_date' => 'always']
            ]
                ]
        );

//         $this->hasOne('Orders', [
//            'className' => 'Orders',
//            'foreignKey' => 'vendor_availabilities_id'
//        ]);
//        'VendorAvailabilities.id !=' => 'Orders.vendor_availabilities_id', 
//         
        

//        $this->User->find('all', array(
//    'conditions' => array(
//        'NOT' => array(
//            'User.id' => array(1, 2, 3)
//        )
//    )
//));
        
        
          $this->hasOne('Orders', [
            'className' => 'Orders',
            'foreignKey' => 'vendor_availabilities_id',
            'conditions' => ['VendorAvailabilities.id !='=>'Orders.vendor_availabilities_id'
                ]
            ]);
          
          
//       $this->hasOne('Orders', [
//            'className' => 'Orders',
//            'foreignKey' => 'vendor_availabilities_id',
//            'conditions' => [
//            'NOT'=>['Orders.vendor_availabilities_id'=>'VendorAvailabilities.id']]]);
//           
           
//           'NOT(Orders.vendor_availabilities_id,VendorAvailabilities.id)']);
//            'conditions' => [
//                'Orders.vendor_availabilities_id ' => 'VendorAvailabilities.id']]);

//         $this->belongsTo('Vendors', [
//            'className' => 'Vendors',
//            'foreignKey' => 'vendor_id',
//            'dependent' => true,
//            'cascadeCallbacks' => true
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
                ->requirePresence('vendor_id', 'true')
                ->notEmpty('vendor_id', 'vendor_id should not be empty');
        $validator
                ->requirePresence('day', 'true')
                ->notEmpty('day');

        $validator
                ->requirePresence('date', 'true')
                ->notEmpty('date');

        $validator
                ->requirePresence('time', 'true')
                ->notEmpty('time');

        $validator
                ->requirePresence('availabilities_date', 'true')
                ->notEmpty('availabilities_date');




        return $validator;
    }

}
