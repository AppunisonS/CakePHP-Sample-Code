<?php

namespace App\Model\Table;

use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admin Model
 * Author : Hemant Chuphal
 * Description : Admin Model with schema and validation
 * 
 */
class CmsPagesTable extends Table {

    public function beforeSave($entity) {
         echo"edf"; 
        $session = new Session();
        $AdminSession = $session->read('Auth.Admin.id');
       
        if (!empty($AdminSession)) {
            if (empty($entity->id)) {
                $entity->created_by = $AdminSession;
                $entity->modified_by = $AdminSession;
            } else {
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

        $this->table('cms_pages');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', [ 'events' =>
            [ 'Model.beforeSave' =>
                [ 'created_on' => 'new', 'modified_on' => 'always']
            ]
                ]
        );
    }

    /**
     * Author -Hemant Chuphal
     * Default validation rules.
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
         
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('page_title', 'true')
                ->notEmpty('page_title')
                ->add('page_title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
         $validator
                ->requirePresence('page_alias', 'true')
                ->notEmpty('page_alias')
                ->add('page_alias', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
         $validator
                ->requirePresence('page_content', 'true')
                ->notEmpty('page_content');
        return $validator;
    }

}
