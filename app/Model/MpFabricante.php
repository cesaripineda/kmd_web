<?php
App::uses('AppModel', 'Model');

class MpFabricante extends AppModel {

	public $useTable = 'mp_fabricantes';

	public $belongsTo = array(
		'Mp' => array(
			'className' => 'Mp',
			'foreignKey' => 'mp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
