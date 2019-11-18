<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'cad';
//$active_record = TRUE;
$query_builder = TRUE;


$db['cad']['hostname'] = 'localhost';
$db['cad']['username'] = 'root';
$db['cad']['password'] = '';
$db['cad']['database'] = 'cadastro';
$db['cad']['dbdriver'] = 'mysqli';
$db['cad']['dbprefix'] = '';
$db['cad']['pconnect'] = FALSE;
$db['cad']['db_debug'] = (ENVIRONMENT !== 'production');
$db['cad']['cache_on'] = FALSE;
$db['cad']['cachedir'] = '';
$db['cad']['char_set'] = 'utf8';
$db['cad']['dbcollat'] = 'utf8_general_ci';
$db['cad']['swap_pre'] = '';
$db['cad']['stricton'] = FALSE;

