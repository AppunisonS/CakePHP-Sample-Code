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
class CardDetailsTable extends Table {

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

        $this->table('card_details');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', ['events' =>
            ['Model.beforeSave' =>
                ['created_date' => 'new', 'modified_date' => 'always']
            ]
                ]
        );

        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'user_id'
        ]);
        
         $this->belongsTo('Orders', [
            'className' => 'Orders',
            'foreignKey' => 'order_id'
        ]);
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
                ->requirePresence('card_number', 'true')
                ->notEmpty('card_number','number should not be empty');
        
        $validator
                ->requirePresence('card_month', 'true')
                ->notEmpty('card_month','month should not be empty');
        
        $validator
                ->requirePresence('card_cvc', 'true')
                ->notEmpty('card_cvc','cvc should not be empty');
        
        
        return $validator;
    }


}
