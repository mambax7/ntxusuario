<?php

use Xmf\Module\Admin;
use Xmf\Request;
use XoopsModules\Ntxusuario\{Helper
};

/** @var Admin $adminObject */

require_once __DIR__ . '/admin_header.php';

function ntxusuario()
{
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
    global $xoopsDB, $xoopsModule;
    xoops_cp_header();

    $adminObject = Admin::getInstance();
    $adminObject->displayNavigation(basename(__FILE__));

    $sql    = 'SELECT options FROM ' . $xoopsDB->prefix('newblocks') . " WHERE dirname='ntxusuario'";
    $result = $xoopsDB->query($sql);
    [$resultado] = $xoopsDB->fetchRow($result);
    $config = explode('|', $resultado);
    echo '<h4>' . _ADMIN_TITULO . '</h4>';

    $form               = new XoopsThemeForm(_ADM_CONFIGURACION, 'addform', 'config.php');
    $formavatar         = new  XoopsFormRadioYN  (_ADM_VERAVATAR, 'veravatar', $config[0], _ADM_SI, _ADM_NO);
    $formconectados     = new  XoopsFormRadioYN  (_ADM_VERUSUARIOSCON, 'verconectados', $config[1], _ADM_SI, _ADM_NO);
    $formpopup          = new  XoopsFormRadioYN  (_ADM_POPUP, 'verpopup', $config[2], _ADM_SI, _ADM_NO);
    $formstats          = new XoopsFormRadioYN (_ADM_ESTADISTICAREGISTROS, 'statreg', $config[6], _ADM_SI, _ADM_NO);
    $formultimousuario  = new  XoopsFormRadioYN  (_ADM_ULTUSUARIO, 'ultimousuario', $config[3], _ADM_SI, _ADM_NO);
    $formultimocantidad = new XoopsFormText(_ADM_ULTCANTIDAD, 'cantidad', 3, 10, $config[4]);
    $formnewbb          = new  XoopsFormRadioYN  (_ADM_NEWBB, 'vernewbb', $config[5], _ADM_SI, _ADM_NO);
    $op_hidden          = new XoopsFormHidden('op', 'modconfig');
    $submit_button      = new XoopsFormButton('', 'submir', _ADM_ENVIAR, 'submit');
    $form->addElement($formavatar);
    $form->addElement($formconectados);
    $form->addElement($formpopup);
    $form->addElement($formstats);
    $form->addElement($formultimousuario);
    $form->addElement($formultimocantidad);
    $form->addElement($formnewbb);
    $form->addElement($op_hidden);
    $form->addElement($submit_button);
    $form->display();
    echo '<br>';
    echo '<br>';
    $form          = new XoopsThemeForm(_ADM_CONFIGURACION, 'addform2', 'config.php');
    $op_hidden     = new XoopsFormHidden('op', 'autoscript');
    $submit_button = new XoopsFormButton(_ADM_SCRIPTAUTOMATICO, 'submir2', _ADM_ENVIAR, 'submit');
    $form->addElement($op_hidden);
    $form->addElement($submit_button);
    $form->display();
    xoops_cp_footer();
}

function actualizaDB()
{
    global $xoopsDB, $xoopsModule, $veravatar, $verconectados, $verpopup, $ultimousuario, $cantidad, $vernewbb, $statreg;
    $config = $veravatar . '|' . $verconectados . '|' . $verpopup . '|' . $ultimousuario . '|' . $cantidad . '|' . $vernewbb . '|' . $statreg;
    $sql    = 'UPDATE ' . $xoopsDB->prefix('newblocks') . ' SET options=' . $xoopsDB->quoteString($config) . " WHERE dirname='ntxusuario'";
    $xoopsDB->query($sql);
    redirect_header('config.php', 3, _ADM_ACTCORRECTA);
}

function autoscript()
{
    global $xoopsDB, $xoopsModule;
    $sql    = 'SELECT bid FROM ' . $xoopsDB->prefix('newblocks') . " WHERE dirname='ntxusuario'";
    $result = $xoopsDB->query($sql);
    [$resultado] = $xoopsDB->fetchRow($result);
    $blockid = $resultado;
    $sql     = 'UPDATE ' . $xoopsDB->prefix('newblocks') . " SET visible=1 WHERE dirname='ntxusuario'";
    $xoopsDB->query($sql);
    $sql = 'UPDATE ' . $xoopsDB->prefix('block_module_link') . " SET module_id='0' WHERE block_id=" . $blockid . '';
    $xoopsDB->query($sql);
    $sql = 'INSERT INTO ' . $xoopsDB->prefix('group_permission') . " (gperm_groupid, gperm_itemid, gperm_modid, gperm_name) VALUES ('3', " . $blockid . ", '1','block_read')";
    $xoopsDB->query($sql);
    redirect_header('config.php', 3, _ADM_ACTCORRECTA);
}

$op = $_POST['op'] ?? ($_GET['op'] ?? 'main');
switch ($op) {
    case 'modconfig';
        $veravatar     = $_POST['veravatar'];
        $verconectados = $_POST['verconectados'];
        $verpopup      = $_POST['verpopup'];
        $ultimousuario = $_POST['ultimousuario'];
        $cantidad      = $_POST['cantidad'];
        $vernewbb      = $_POST['vernewbb'];
        $statreg       = $_POST['statreg'];
        actualizaDB();
        break;
    case 'autoscript';
        autoscript();
        break;
    case 'main':
        ntxusuario();
        break;
    default:
        ntxusuario();
        break;
}

