<?php
App::uses('AppModel', 'Model');

class Producto extends AppModel {
	public $displayField = 'id';
	public $hasAndBelongsToMany = array(
		'Certificado' => array(
			'className' => 'Certificado',
			'joinTable' => 'certificado_productos',
			'foreignKey' => 'producto_id',
			'associationForeignKey' => 'certificado_id',
			//'unique' => 'keepExisting',
			'conditions' => 'Certificado.vigencia >= NOW()',
			'fields' => '',
			'order' => 'Certificado.id ASC',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),

	);
}
