<?php

namespace App\Model\Table;
use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\Validation\Validator;


//Author : Hemant Chuphal
 
class ContactUsTable extends Table {

    public function beforeSave($entity) {
        $session = new Session();
        
        $AdminSession = $session->read('Auth.Admin.id');
        if (!empty($AdminSession)) {
            if (empty($entity->id)) {
                $entity->created_by = $AdminSession;
                $entity->modified_by = $AdminSession;
            } else {
                //UPDATE
                $entity->modified_by = $AdminSession;
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
        $this->table('contact_us');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp', ['events' =>
            ['Model.beforeSave' =>
                ['created_on' => 'new', 'modified_on' => 'always']
            ]
                ]
        );
       
    }

    /**
     * Author -Yogendra 
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
                ->notEmpty('name');
        $validator
                ->requirePresence('email', 'true')
                ->notEmpty('email');
//        $validator
//                ->requirePresence('type_of_enquiry', 'true')
//                ->notEmpty('type_of_enquiry');
        $validator
                ->requirePresence('message', 'true')
                ->notEmpty('message');

        

        return $validator;
    }

}
