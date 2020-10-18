<?php

$moduleDirName      = basename(__DIR__);
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

$modversion['name']                = _MD_NOMBRE;
$modversion['version']             = '2.01';
$modversion['description']         = _MD_DESCRIPCION;
$modversion['credits']             = 'http://www.natxocc.com';
$modversion['author']              = 'NatxoCC';
$modversion['status']              = 'Beta 1';
$modversion['help']                = '';
$modversion['license']             = '';
$modversion['official']            = 0;
$modversion['dirname']             = $moduleDirName;
$modversion['modicons16']          = 'assets/images/icons/16';
$modversion['modicons32']          = 'assets/images/icons/32';
$modversion['image']               = 'assets/images/logoModule.png';
$modversion['module_website_url']  = 'https://xoops.org';
$modversion['module_website_name'] = 'XOOPS';
$modversion['min_php']             = '7.1';
$modversion['min_xoops']           = '2.5.10';
$modversion['min_admin']           = '1.2';

//Menu
$modversion['hasMain'] = 0;

// Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php';

// Blocks
$modversion['blocks'][1]['file']        = 'usuario.php';
$modversion['blocks'][1]['name']        = _MD_BL_NOMBRE;
$modversion['blocks'][1]['description'] = _MD_BL_DESCRIPCION;
$modversion['blocks'][1]['show_func']   = 'funcion_usuario';
$modversion['blocks'][1]['options']     = '1|1|1|1|10|0|0';
$modversion['blocks'][1]['template']    = 'ntxusuario.tpl';


