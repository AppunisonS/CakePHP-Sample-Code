<?php

namespace App\Model\Table;

use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubServices Model
 * Author : Saurabh Pandey
 * Description : SubServices Model with schema and validation
 * 
 */
class ServiceDjEventPricesTable extends Table {

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

        $this->table('service_dj_event_prices');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp', ['events' =>
            ['Model.beforeSave' =>
                ['created_date' => 'new', 'modified_date' => 'always']
            ]
                ]
        );

//        $this->hasMany('servicesUnitPrices', [
//            'className' => 'servicesUnitPrices',
//            'foreignKey' => 'sub_services_id',
//            'dependent' => true,
//            'cascadeCallbacks' => true
//        ]);
//        
//         $this->hasMany('Xetras', [
//            'className' => 'Xetras',
//            'foreignKey' => 'sub_services_id',
//            'dependent' => true,
//            'cascadeCallbacks' => true
//        ]);


        $this->belongsTo('Services', [
            'className' => 'Services',
            'foreignKey' => 'services_id'
        ]);

//        $this->belongsTo('Guests', [
//            'className' => 'Guests',
//            'foreignKey' => 'guests_id',
//            'dependent' => true,
//            'cascadeCallbacks' => true
//        ]);

        $this->belongsTo('Events', [
            'className' => 'Events',
            'foreignKey' => 'event_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

//        $this->belongsTo('AdditionalServices', [
//            'className' => 'AdditionalServices',
//            'foreignKey' => 'additional_services_id',
//            'dependent' => true,
//            'cascadeCallbacks' => true
//        ]);
//        $this->belongsTo('Musics', [
//            'className' => 'Musics',
//            'foreignKey' => 'musics_id',
//            'dependent' => true,
//            'cascadeCallbacks' => true
//        ]);

        $this->belongsTo('SubServices', [
            'className' => 'SubServices',
            'foreignKey' => 'sub_services_id'
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
                ->requirePresence('services_id', 'true')
                ->notEmpty('services_id');

        return $validator;
    }

}
