<?php

if (!isset($_GET['c'])) { $_GET['c'] = null; }
if (!isset($_GET['format'])) { $_GET['format'] = null; }
if (!isset($_GET['action'])) { $_GET['action'] = null; }
if (!isset($_GET['id'])) { $_GET['id'] = null; };

switch ($_GET['c']) {
case 'licit': 
    $controller='licit'; 
    switch ($_GET['action']) {
    case 'new': 
        $action='new'; 
        break;
    case 'create': 
        $action='create'; 
        break;
    default: 
        $action='index';
    }
    break;
default: 
    $controller='lakas';
    switch ($_GET['action']) {
    case 'show': 
        $action='show'; 
        break;
    default: 
        $action='index';
    }
}
    

switch ($_GET['format']) {
case 'js':
    break;
default:
    $_GET['format'] = 'html';
}

include_once("c_${controller}.php");
$func="c_${controller}_${action}";


$func();


