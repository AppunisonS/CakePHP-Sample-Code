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
class JobRequestsTable extends Table {

    public function beforeSave($event, $entity, $options) {

        $session = new Session();
        $userId = $session->read('Auth.User.id');
        if (!empty($userId)) {
            if (empty($entity->id)) {
                $entity->created_by = $userId;
                $entity->modified_by = $userId;
            } else {
                $entity->modified_by = $userId;
            }
        }
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('job_requests');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', ['events' =>
            ['Model.beforeSave' =>
                ['created_date' => 'new', 'modified_date' => 'always']
            ]
                ]
        );

        $this->belongsTo('Vendors', [
            'className' => 'Vendors',
            'foreignKey' => 'vendor_id'
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
                ->requirePresence('order_id', 'true')
                ->notEmpty('order_id','order number should not be empty');
     
        
        
        return $validator;
    }


}
