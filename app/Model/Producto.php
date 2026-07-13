<?php
App::uses('AppModel', 'Model');

class Producto extends AppModel {
	public $displayField = 'id';
	public $belongsTo = array(
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id'
		)
	);

	public $hasAndBelongsToMany = array(
		'Mp' => array(
			'className' => 'Mp',
			'joinTable' => 'productos_mps',
			'foreignKey' => 'producto_id',
			'associationForeignKey' => 'mp_id',
			'unique' => '',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
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
