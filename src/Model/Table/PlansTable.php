<?php

namespace App\Model\Table;

use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plans Model
 * Author : Saurabh Pandey
 * Description : Plans Model with schema and validation
 * 
 */
class PlansTable extends Table {

    public function beforeSave($event, $entity, $options) {

        $session = new Session();
        $adminId = $session->read('Auth.Admin.id');
        if (!empty($adminId)) {
            if (empty($entity->id)) {
                $entity->created_by = $adminId;
                $entity->modified_by = $adminId;
            } else {
                $entity->modified_by = $adminId;
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

        $this->table('plans');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', [ 'events' =>
            [ 'Model.beforeSave' =>
                [ 'created_date' => 'new', 'modified_date' => 'always']
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
                ->requirePresence('name', 'true')
                ->notEmpty('name')
                ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
        ;
        return $validator;
    }

}
