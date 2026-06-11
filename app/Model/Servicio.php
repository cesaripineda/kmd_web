<?php
App::uses('AppModel', 'Model');

class Servicio extends AppModel {
	public $displayField = 'id';

	public $belongsTo = array(
		'Establecimiento'=>array(
			'className'=>'Establecimiento',
			'foreignKey'=>'establecimiento_id',

		),
		'Creado'=>array(
			'className'=>'User',
			'foreignKey'=>'user_id',
		),
		'Supervisor'=>array(
			'className'=>'User',
			'foreignKey'=>'supervisor_id',
		)
	);

	public $hasMany = array(
		'Items'=>array(
			'className'=>'ItemsServicio',
			'foreignKey'=>'servicio_id',
		),
	);

}
