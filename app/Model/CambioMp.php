<?php
App::uses('AppModel', 'Model');

class AutorizacionMp extends AppModel {
    public $useTable = 'autorizacion_mps';

    public $belongsTo = array(
        'Mp' => array(
            'className' => 'Mp',
            'foreignKey' => 'mp_id'
        ),
        'Empresa' => array(
            'className' => 'Empresa',
            'foreignKey' => 'empresa_id'
        )
    );
}
