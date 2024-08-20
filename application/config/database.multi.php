<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$con = [
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'rest'
];

if($_SERVER['SERVER_NAME'] == 'siakad.deerdeveloper.com'){
	$con = [
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'deerdeve_siakad',
		'password' => 'siakad12345',
		'database' => 'deerdeve_siakad'
	];
} else if($_SERVER['SERVER_NAME'] == 'app.dsq.ponpes.id'){
	$con = [
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'rest'
	];
}

$active_group = 'default';
$query_builder = TRUE;
$db['default'] = array_merge($con, [
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
]);