<?php

/**
 * @param $options
 * @return array|false
 */
function funcion_usuario($options)
{
    global $xoopsUser, $xoopsModule, $xoopsConfig, $xoopsDB;
    $sql    = 'SELECT options FROM ' . $xoopsDB->prefix('newblocks') . " WHERE dirname='ntxusuario'";
    $result = $xoopsDB->query($sql);
    [$resultado] = $xoopsDB->fetchRow($result);
    $config = explode('|', $resultado);

    $onlineHandler = xoops_getHandler('online');
    // mt_srand((double)microtime() * 1000000);
    $block = [];
    if (mt_rand(1, 100) < 11) {
        $onlineHandler->gc(300);
    }
    if (is_object($xoopsUser)) {
        $pmHandler = xoops_getHandler('privmessage');
        $criteria   = new CriteriaCompo(new Criteria('read_msg', 0));
        $criteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
        $nuevosmensajes                = $pmHandler->getCount($criteria);
        $uid                           = $xoopsUser->getVar('uid');
        $uname                         = $xoopsUser->getVar('uname');
        $usuario                       = $xoopsUser->getVar('uname');
        $rangoclase                    = $xoopsUser->rank();
        $block['rangoimagen']          = $rangoclase['image'];
        $block['rangotitulo']          = $rangoclase['title'];
        $block['avatar_usuario']       = $xoopsUser->getVar('user_avatar');
        $perfilusuario                 = '<a href="' . XOOPS_URL . '/user.php"><img src="' . XOOPS_URL . '/modules/ntxusuario/images/perfil.gif" alt="' . _TIP_PERFIL . '"></a>';
        $mensajesprivados              = '<a href="' . XOOPS_URL . '/viewpmsg.php"><img src="' . XOOPS_URL . '/modules/ntxusuario/images/mensajes.gif" alt="' . _TIP_MENSAJES . '"></a>';
        $nuevocorreo                   = '<a href="' . XOOPS_URL . '/viewpmsg.php"><img src="' . XOOPS_URL . '/modules/ntxusuario/images/nuevocorreo.gif" alt="' . $nuevosmensajes . ' ' . _TIP_MENSAJESNUEVOS . '"></a>';
        $administracion                = '<a href="' . XOOPS_URL . '/admin.php"><img src="' . XOOPS_URL . '/modules/ntxusuario/images/administracion.gif" alt="' . _TIP_ADMIN . '"></a>';
        $foros                         = '<a href="' . XOOPS_URL . '/modules/newbb"><img src="' . XOOPS_URL . '/modules/ntxusuario/images/foros.gif" alt="' . _TIP_FOROS . '"></a>';
        $notificaciones                = '<a href="' . XOOPS_URL . '/notifications.php"><img src="' . XOOPS_URL . '/modules/ntxusuario/images/notificaciones.gif" alt="' . _TIP_NOTIFICACIONES . '"></a>';
        $desconectar                   = '<a href="' . XOOPS_URL . '/user.php?op=logout"><img src="' . XOOPS_URL . '/modules/ntxusuario/images/desconectar.gif" alt="' . _TIP_DESCONECTAR . '"></a>';
        $block['idioma_cambiaravatar'] = _CAMBIAR_AVATAR;
        $block['perfilusuario']        = $perfilusuario;
        $block['mensajesprivados']     = $mensajesprivados;
        $block['nuevocorreo']          = $nuevocorreo;
        $block['nuevosmensajes']       = $nuevosmensajes;
        $block['notificaciones']       = $notificaciones;
        $block['foros']                = $foros;
        $block['foronewbb']            = $config[5];
        $block['administracion']       = $administracion;
        $block['desconectar']          = $desconectar;
    } else {
        $uid                        = 0;
        $uname                      = '';
        $usuario                    = _INVITADO;
        $recuperarpass              = '<center><a href="' . XOOPS_URL . '/user.php#lost" title="' . _TIP_RECUPERAR_PASS . '">' . _RECUPERAR_PASS . '</a></center>';
        $block['idioma_nombre']     = _NOMBRE;
        $block['idioma_entrar']     = _ENTRAR;
        $block['idioma_recuerdame'] = _RECUERDAME;
        $block['idioma_registro']   = '<a href="' . XOOPS_URL . '/register.php" title="' . _REGISTRATECOM . '">' . _REGISTRATE . '</a>';
        $block['recuperarpass']     = $recuperarpass;
    }

    if (is_object($xoopsModule)) {
        $onlineHandler->write($uid, $uname, time(), $xoopsModule->getVar('mid'), $_SERVER['REMOTE_ADDR']);
    } else {
        $onlineHandler->write($uid, $uname, time(), 0, $_SERVER['REMOTE_ADDR']);
    }
    $onlines        =& $onlineHandler->getAll();
    $moduleHandler = xoops_getHandler('module');
    $modules        = $moduleHandler->getList(new Criteria('isactive', 1));
    if (false !== $onlines) {
        $total       = count($onlines);
        $invitados   = 0;
        $miembros    = '';
        $invitadosip = '';
        require XOOPS_ROOT_PATH . '/modules/ntxusuario/include/geoip.inc';
        $gi = geoip_open(XOOPS_ROOT_PATH . '/modules/ntxusuario/include/GeoIP.dat', GEOIP_STANDARD);
        for ($i = 0; $i < $total; $i++) {
            if ($onlines[$i]['online_uid'] > 0) {
                $bandera = geoip_country_code_by_addr($gi, $onlines[$i]['online_ip']);
                $bandera = strtolower($bandera);
                if (!$bandera) {
                    $bandera = 'online';
                }
                $onlineUsers[$i]['module'] = ($onlines[$i]['online_module'] > 0) ? $modules[$onlines[$i]['online_module']] : '';
                $miembros                  .= '<tr><td><img src="'
                                              . XOOPS_URL
                                              . '/modules/ntxusuario/images/banderas/'
                                              . $bandera
                                              . '.gif"></td><td><font size="1"><a href="'
                                              . XOOPS_URL
                                              . '/userinfo.php?uid='
                                              . $onlines[$i]['online_uid']
                                              . '">'
                                              . $onlines[$i]['online_uname']
                                              . '</a></td><td><font size="1">'
                                              . $onlineUsers[$i]['module']
                                              . '</td></tr>';
            } else {
                $bandera = geoip_country_code_by_addr($gi, $onlines[$i]['online_ip']);
                $bandera = strtolower($bandera);
                if (!$bandera) {
                    $bandera = 'online';
                }
                $onlineUsers[$i]['module'] = ($onlines[$i]['online_module'] > 0) ? $modules[$onlines[$i]['online_module']] : '';
                if ($xoopsUser) {
                    if ($xoopsUser->isAdmin(-1)) {
                        $direccionip = $onlines[$i]['online_ip'];
                    } else {
                        $direccionip = _INVITADO;
                    }
                } else {
                    $direccionip = _INVITADO;
                }

                $invitadosip .= '<tr><td><img src="' . XOOPS_URL . '/modules/ntxusuario/images/banderas/' . $bandera . '.gif"></td><td><font size="1">' . $direccionip . '</a></td><td><font size="1">' . $onlineUsers[$i]['module'] . '</font></td></tr>';

                $invitados++;
            }
        }
        geoip_close($gi);

        $memberHandler        = xoops_getHandler('member');
        $hari_ini              = formatTimestamp(time());
        $usuarios_registrados  = $memberHandler->getUserCount(new Criteria('level', 0, '>'));
        $registrados_hoy       = $memberHandler->getUserCount(new Criteria('user_regdate', mktime(0, 0, 0), '>='));
        $registrados_desdeayer = $memberHandler->getUserCount(new Criteria('user_regdate', (mktime(0, 0, 0) - (24 * 3600)), '>='));
        $criteria              = new CriteriaCompo(new Criteria('level', 0, '>'));
        $criteria->setOrder('DESC');
        $criteria->setSort('user_regdate');
        $criteria->setLimit($config[4]);
        $nuevosmiemb       = $memberHandler->getUsers($criteria);
        $ultimo_registrado = $nuevosmiemb[0]->getVar('uname');
        $nuevosmiembros    = '<b>' . _NUEVOSMIEMBROS . ':</b> ';
        foreach ($nuevosmiemb as $iValue) {
            $nuevosmiembros .= '<small>[<span style="text-transform: uppercase">' . $iValue->getVar('uname') . '</span>-<i>' . formatTimestamp($iValue->getVar('user_regdate'), 's') . '</i></small>] ';
        }

        $miembros .= $invitadosip;
        if (1 == $xoopsConfig['use_ssl'] && '' != $xoopsConfig['sslloginlink']) {
            $block['sslloginlink'] = "<a href=\"javascript:openWithSelfMain('" . $xoopsConfig['sslloginlink'] . "', 'ssllogin', 300, 200);\">" . _MB_SYSTEM_SECURE . '</a>';
        }
        $block['idioma_bienvenido']   = _BIENVENIDO;
        $block['idioma_conectados']   = _CONECTADOS;
        $block['idioma_miembros']     = _MIEMBROS;
        $block['idioma_invitados']    = _INVITADOS;
        $block['idioma_menuusuario']  = _MENUUSUARIO;
        $block['idioma_online']       = _ONLINE;
        $block['idioma_nuevomensaje'] = _NUEVOMENSAJE;
        $block['idioma_estadisticas'] = _ESTADISTICAS;
        $block['idioma_registrados']  = _REGISTRADOS;
        $block['idioma_hoy']          = _HOY;
        $block['idioma_ayer']         = _AYER;
        $block['online_total']        = $total;
        $block['online_names']        = $miembros;
        $block['online_miembros']     = $total - $invitados;
        $block['online_invitados']    = $invitados;
        $block['usuario']             = $usuario;
        $block['nuevosmiembros']      = $nuevosmiembros;
        $block['veravatar']           = $config[0];
        $block['verconectados']       = $config[1];
        $block['verpopup']            = $config[2];
        $block['ultimousuario']       = $config[3];
        $block['statsreg']            = $config[6];
        $block['usuariosregistrados'] = $usuarios_registrados;
        $block['registradoshoy']      = $registrados_hoy;
        $block['registradosayer']     = $registrados_desdeayer - $registrados_hoy;
        $block['ultimo']              = $ultimo_registrado;

        return $block;
    } else {
        return false;
    }
}


