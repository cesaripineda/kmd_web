<?php
App::uses('AppModel', 'Model');

class Direccion extends AppModel {
    public $displayField = 'alias';

    public $hasMany = array(
        'Empresa' => array(
            'className' => 'Empresa',
            'foreignKey' => 'direccion_id',
            'dependent' => false
        )
    );
}
