<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Pessoa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['buscar_pessoa'] = 'Pessoa/loadBuscarPessoas';
$route['Pessoa'] = 'Pessoa/index';
$route['Pessoa/(:num)'] = 'Pessoa/index/$1';
