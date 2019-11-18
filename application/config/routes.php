<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Pessoa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['buscar_pessoa'] = 'Pessoa/index';
$route['cad_pessoa'] = 'Pessoa/cad_pessoa';
$route['cad_pessoa/(:num)'] = 'Pessoa/cad_pessoa/$1';
