<?php

namespace App\Model\Table;

use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Model
 * Author : Saurabh Pandey
 * Description : Users Model with schema and validation
 * 
 */
class UsersTable extends Table {

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

        $this->table('users');
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
                ->notEmpty('name','Name should not be empty');
//                ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
//        ;
        
        $validator
                ->requirePresence('password', 'create')
                ->notEmpty('password');
        return $validator;
    }

//    public function initialize(array $config) {
//        $this->hasMany('ADmad/HybridAuth.SocialProfiles');
//
//        \Cake\Event\EventManager::instance()->on('HybridAuth.newUser', [$this, 'createUser']);
//    }
//
//    public function createUser(\Cake\Event\Event $event) {
//        // Entity representing record in social_profiles table
//        $profile = $event->data()['profile'];
//
//        // Make sure here that all the required fields are actually present
//
//        $user = $this->newEntity(['email' => $profile->email]);
//        $user = $this->save($user);
//
//        if (!$user) {
//            throw new \RuntimeException('Unable to save new user');
//        }
//
//        return $user;
//    }

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
