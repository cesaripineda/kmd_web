<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property Certificado $Certificado
 * @property Reporte $Reporte
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

	public $validate = array(
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'El email no es v&aacute;lido'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Es necesario poner una contrase&ntilde;a'
            )
        )
    );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
    /*public $hasMany = array(

		'Eventos' => array(
			'className' => 'FullCalendar.Event',
			'foreignKey' => 'executed_by',
			'dependent' => false,
			'conditions' => 'CURDATE() <= end',
			'fields' => '',
			'order' => 'END asc',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),

	);*/

	public $belongsTo = array(
		'Establecimiento' => array(
			'className' => 'Establecimiento',
			'foreignKey' => 'establecimiento_id'
		)
	);

}
