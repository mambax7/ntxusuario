<?php

$moduleDirName      = basename(__DIR__);
$moduleDirNameUpper = mb_strtoupper($moduleDirName);

$modversion['version']             = '2.01';
$modversion['module_status']       = 'Beta 1';
$modversion['release_date']        = '2020/10/17';
$modversion['name']                = _MD_NOMBRE;
$modversion['description']         = _MD_DESCRIPCION;
$modversion['credits']             = 'Mamba';
$modversion['author']              = 'NatxoCC, http://www.natxocc.com';
$modversion['status']              = 'Beta 1';
$modversion['license']             = 'GNU GPL 2.0 or later';
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
$modversion['hasAdmin']    = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex']  = 'admin/index.php';
$modversion['adminmenu']   = 'admin/menu.php';

// ------------------- Help files ------------------- //
$modversion['help']        = 'page=help';
$modversion['helpsection'] = [
    ['name' => _MI_NTXUSUARIO_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_NTXUSUARIO_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_NTXUSUARIO_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_NTXUSUARIO_SUPPORT, 'link' => 'page=support'],
];

// Blocks
$modversion['blocks'][] = [
    'file'        => 'usuario.php',
    'name'        => _MD_BL_NOMBRE,
    'description' => _MD_BL_DESCRIPCION,
    'show_func'   => 'funcion_usuario',
    'options'     => '1|1|1|1|10|0|0',
    'template'    => 'ntxusuario.tpl',
];

