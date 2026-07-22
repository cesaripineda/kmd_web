<?php
App::uses('AppModel', 'Model');

class AutorizacionProducto extends AppModel {
    public $useTable = 'autorizacion_productos';

    public $belongsTo = array(
        'Producto' => array(
            'className' => 'Producto',
            'foreignKey' => 'producto_id'
        ),
        'Empresa' => array(
            'className' => 'Empresa',
            'foreignKey' => 'empresa_id'
        )
    );
}
