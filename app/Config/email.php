<?php
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'sistema@kosher.com.mx',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('not_reply@kmd.com.mx' => 'KMD Sistema de gestión'),
		'host' => 'ssl://dottie.lunarbreeze.com',
		'port' => 465,
		'timeout' => 30,
		'username' => 'cpineda@aigelbs.com',
		'password' => '#c1e9s8a6ri',
		'client' => null,
		'log' => false,
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

}
