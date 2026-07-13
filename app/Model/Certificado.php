<?php
App::uses('AppModel', 'Model');
/**
 * Certificado Model
 *
 * @property Empresa $Empresa
 * @property User $User
 * @property ActividadsRelacion $ActividadsRelacion
 * @property CertificadoProducto $CertificadoProducto
 */
class Certificado extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Direccion' => array(
			'className' => 'Direccion',
			'foreignKey' => 'direccion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */

	public $hasAndBelongsToMany = array(
		'Producto' => array(
			'className' => 'Producto',
			'joinTable' => 'certificado_productos',
			'foreignKey' => 'certificado_id',
			'associationForeignKey' => 'producto_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
