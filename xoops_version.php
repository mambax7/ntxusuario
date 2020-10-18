<?php

$modversion['name']        = _MD_NOMBRE;
$modversion['version']     = "1.0";
$modversion['description'] = _MD_DESCRIPCION;
$modversion['credits']     = "http://www.natxocc.com";
$modversion['author']      = "NatxoCC";
$modversion['status']      = "RC2";
$modversion['help']        = "";
$modversion['license']     = "";
$modversion['official']    = 0;
$modversion['image']       = "ntxusuario_logo.png";
$modversion['dirname']     = "ntxusuario";

//Menu
$modversion['hasMain'] = 0;

// Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = "admin/index.php";

// Blocks
$modversion['blocks'][1]['file']        = "usuario.php";
$modversion['blocks'][1]['name']        = _MD_BL_NOMBRE;
$modversion['blocks'][1]['description'] = _MD_BL_DESCRIPCION;
$modversion['blocks'][1]['show_func']   = "funcion_usuario";
$modversion['blocks'][1]['options']     = "1|1|1|1|10|0|0";
$modversion['blocks'][1]['template']    = 'ntxusuario.tpl';


