<?php
App::uses('AppModel', 'Model');

class Estadistica extends AppModel {
	public $displayField = 'id';

	public $belongsTo = array(
		'Categoria'=>array(
			'className'=>'Categoria',
			'foreignKey'=>'categoria_id',
		),
	);
}
