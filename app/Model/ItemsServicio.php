<?php
App::uses('AppModel', 'Model');

class ItemsServicio extends AppModel {
	public $displayField = 'id';

	public $belongsTo = array(
		'Servicio'=>array(
			'className'=>'Servicio',
			'foreignKey'=>'servicio_id',

		),
	);

}
