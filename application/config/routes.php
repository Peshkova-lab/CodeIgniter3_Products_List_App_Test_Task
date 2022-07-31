<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['pages/getChosenCategory'] = 'pages/getChosenCategory';
$route['create_category'] = 'pages/create_category';
$route['create_product'] = 'pages/create_product';
$route['pages']='pages/view';
$route['pages/success'] = 'pages/success';
//$route['success']='pages/view/create_product/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
