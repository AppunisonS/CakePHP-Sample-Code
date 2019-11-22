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
class VendorsTable extends Table {

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

        $this->table('vendors');
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
        $this->hasMany('VendorAvailabilities', [
            'className' => 'VendorAvailabilities',
            'foreignKey' => 'vendor_id',
            'joinType' => 'LEFT'
        ]);
        
        $this->hasMany('Orders', [
            'className' => 'Orders',
            'foreignKey' => 'vendor_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasOne('VendorsDetails', [
            'className' => 'VendorsDetails',
            'foreignKey' => 'vendor_id',
            'dependent' => true,
            'cascadeCallbacks' => true
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
                ->requirePresence('first_name', 'true')
                ->notEmpty('name', 'Name should not be empty');
        $validator
                ->requirePresence('last_name', 'true')
                ->notEmpty('last_name');

        $validator
                ->email('email')
                ->requirePresence('email', 'create')
                ->notEmpty('email')
                ->add('email', 'custom', ['rule' => function ($value, $context) {
                        $fieldName = $context['field'];
                        $condition[$fieldName] = $context['data'][$fieldName];
                        if ($this->hasField('delete_status')) {
                            $condition["delete_status"] = NotDeleted;
                        }
                        if (!empty($context['data']["id"])) {
                            $condition["id !="] = $context['data']["id"];
                        }
                        $result = $this->find()->where($condition)->count();
                        if ($result == 0) {
                            return true;
                        } else {
                            return false;
                        }
                    }]);

        $validator
                ->requirePresence('password', 'create')
                ->notEmpty('password');

        return $validator;
    }

}
