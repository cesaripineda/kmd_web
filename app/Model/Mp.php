<?php
App::uses('AppModel', 'Model');

class Mp extends AppModel {
    public $displayField = 'nombre_ingrediente';

    public $belongsTo = array(
        'Empresa' => array(
            'className' => 'Empresa',
            'foreignKey' => 'empresa_id'
        ),
        'MpGeneral' => array(
            'className' => 'MpGeneral',
            'foreignKey' => 'mp_general_id'
        )
    );

    public $hasMany = array(
        'MpFabricante' => array(
            'className' => 'MpFabricante',
            'foreignKey' => 'mp_id',
            'dependent' => true
        )
    );
}
