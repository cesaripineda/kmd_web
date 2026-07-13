<?php
App::uses('AppModel', 'Model');

class MpGeneral extends AppModel {
    public $displayField = 'titulo';

    public $belongsTo = array(
        'Empresa' => array(
            'className' => 'Empresa',
            'foreignKey' => 'empresa_id'
        )
    );

    public $hasMany = array(
        'Mp' => array(
            'className' => 'Mp',
            'foreignKey' => 'mp_general_id',
            'dependent' => true
        )
    );
}
