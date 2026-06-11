<?php
App::uses('AppModel', 'Model');

class Alerta extends AppModel {
	public $displayField = 'id';

	public $belongsTo = array(
		'Producto'=>array(
			'className'=>'Producto',
			'foreignKey'=>'producto_id',
			'fields'=>array('id','nombre_web','marca_web','nombre_producto','marca'),
		),
		'Establecimiento'=>array(
			'className'=>'Establecimiento',
			'foreignKey'=>'establecimiento_id',
			'fields'=>array('id','nombre'),
		),
	);
}
