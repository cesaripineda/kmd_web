<?php
App::uses('AppModel', 'Model');

class Empresa extends AppModel
{
    public $displayField = 'razon_social';

    public $belongsTo = array(
        'Direccion' => array(
            'className' => 'Direccion',
            'foreignKey' => 'direccion_id'
        ),
        'Rabino' => array(
            'className' => 'User',
            'foreignKey' => 'rabino_responsable'
        ),
        'Promotor' => array(
            'className' => 'User',
            'foreignKey' => 'promotor_id'
        ),
        'Renovacion' => array(
            'className' => 'User',
            'foreignKey' => 'renovacion_id'
        )
    );

    public $hasMany = array(
        'MpGeneral' => array(
            'className' => 'MpGeneral',
            'foreignKey' => 'empresa_id',
            'dependent' => true
        ),
        'Mp' => array(
            'className' => 'Mp',
            'foreignKey' => 'empresa_id',
            'dependent' => true
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'empresa_id',
            'dependent' => false
        ),
        'Producto' => array(
            'className' => 'Producto',
            'foreignKey' => 'empresa_id',
            'dependent' => true
        )
    );
}
