<?php

namespace App\Model\Table;

use Cake\Core\Configure;
use Cake\Network\Session;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Admin Model
 * Author : Hemant Chuphal
 * Description : Admin Model with schema and validation
 * 
 */
class AdminsTable extends Table {

    public function beforeSave($entity) {
        $session = new Session();
        $AdminSession = $session->read('Auth.Admin.id');
        if (!empty($AdminSession)) {
            if (empty($entity->id)) {
                $entity->created_by = -1;
                $entity->modified_by = -1;
            } else {
                $entity->modified_by = -1;
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

        $this->table('admins');
        $this->displayField('first_name');
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
                ->requirePresence('first_name', 'true')
                ->notEmpty('first_name');

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

        $validator
                ->dateTime('created_on')
                ->allowEmpty('created_on');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        //$rules->add($rules->isUniqueEmail(['email']));
        return $rules;
    }

    /*
     * Function to set hashed password for admin user
     * @params - password
     * return hashed password
     */
    
    /*
     * Function to set hashed password for admin user
     * @params - password
     * return hashed password
     */
    public function validationPassword(Validator $validator ) { 
        $validator 
                ->add('old_password','custom',[ 
                    'rule'=> function($value, $context) {
                          $user = $this->get($context['data']['id']); 
                          if (!empty($user)) { 
                                 if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                                       return true; 
                                 } 
                          } return false; 
                            }, 
                      'message'=>'The old password does not match the current password!', ]) ->notEmpty('old_password'); 
                        $validator ->add('new_password', [ 'length' => [ 'rule' => ['minLength', 6], 
                                                        'message' => 'The password have to be at least 6 characters!', ] ]) 
                                ->add('new_password',[ 
                                    'match'=>[ 
                                        'rule'=> ['compareWith','confirm_password'], 
                                        'message'=>'The passwords does not match!', 
                                        ] 
                                    ]) ->notEmpty('new_password'); 
                        $validator ->add('confirm_password', [ 
                            'length' => [ 'rule' => ['minLength', 6], 
                            'message' => 'The password have to be at least 6 characters!', 
                                ] 
                            ]) ->add('confirm_password',[ 
                                'match'=>[ 
                                'rule'=> ['compareWith','new_password'], 
                                'message'=>'The passwords does not match!', 
                                    ] 
                                ]) ->notEmpty('confirm_password'); 
                        return $validator; 
                        }
    
    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }
    
    
}