<table border="0" width="100%">
    <tr>
        <td>
            <table border="0" width="100%">
                <tr>
                    <td align="center"><{$block.idioma_bienvenido}></td>
                </tr>
                <tr>
                    <{if $xoops_isuser}>
                    <{if $block.veravatar == 1}>
                    <td align="center"><a href="http://localhost/edituser.php?op=avatarform" alt="<{$block.idioma_cambiaravatar}>"><img src="<{$xoops_url}>/uploads/<{$block.avatar_usuario}>"></a></td>
                    <{/if}>
                    <{else}>
                    <td align="center"><img src="<{$xoops_url}>/modules/ntxusuario/images/ojos.gif"></td>
                    <{/if}>
                </tr>
                <tr>
                    <td align="center"><B><{$block.usuario}></B></td>
                </tr>
                <{if $xoops_isuser}>
                <{if $block.veravatar == 1}>
                <tr>
                    <td align="center"><img src="<{$xoops_url}>/uploads/<{$block.rangoimagen}>"></td>
                </tr>
                <tr>
                    <td align="center"><{$block.rangotitulo}></td>
                </tr>
                <{/if}>
                <{/if}>

            </table>
            <{if $xoops_isuser}>
            <table border="0" width="100%">
                <tr>
                    <td align="center" background="<{$xoops_url}>/modules/ntxusuario/images/fondo.gif">
                        <img src="<{$xoops_url}>/modules/ntxusuario/images/opciones.gif"><font color="#000000"> <{$block.idioma_menuusuario}></td>
                </tr>
            </table>
            <table border="0" width="100%">
                <tr>
                    <td align="center"><{$block.perfilusuario}></td>
                    <{if $block.nuevosmensajes > 0}>
                    <td align="center"><{$block.nuevocorreo}></td>
                    <{else}>
                    <td align="center"><{$block.mensajesprivados}></td>
                    <{/if}>
                    <td align="center"><{$block.temasactivos}></td>
                    <td align="center"><{$block.notificaciones}></td>
                    <{if $block.foronewbb == 1}>
                    <td align="center"><{$block.foros}></td>
                    <{/if}>
                    <{if $xoops_isadmin}>
                    <td align="center"><{$block.administracion}></td>
                    <{/if}>
                    <td align="center"><{$block.desconectar}></td>
                </tr>
            </table>
            <{else}>
            <table border="0" width="100%">
                <tr>
                    <td align="center" background="<{$xoops_url}>/modules/ntxusuario/images/fondo.gif">
                        <img src="<{$xoops_url}>/modules/ntxusuario/images/registrar.gif"><font color="#000000"> <{$block.idioma_registro}></td>
                </tr>

            </table>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td>

                        <form action="<{$xoops_url}>/user.php" method="post">
                            <p align="center">
                                <input type="text" name="uname" size="14" value="<{$block.idioma_nombre}>" onblur="if(this.value=='')this.value='<{$block.idioma_nombre}>';" onfocus="if(this.value=='<{$block.idioma_nombre}>')this.value='';" maxlength="60"><br>
                                <input type="password" name="pass" size="14" value="<{$block.idioma_nombre}>" onblur="if(this.value=='')this.value='<{$block.idioma_nombre}>';" onfocus="if(this.value=='<{$block.idioma_nombre}>')this.value='';" maxlength="32"><br>
                                <input type="checkbox" name="rememberme" value="On" class="formButton"> <{$block.idioma_recuerdame}><br>
                                <input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>">
                                <input type="hidden" name="op" value="login">
                                <input type="submit" value="<{$block.idioma_entrar}>">
                                <{$block.sslloginlink}></p>
                        </form>
                        <{$block.recuperarpass}>
                    </td>
                </tr>
            </table>

            <{/if}>
            <table border="0" width="100%">


                <table border="0" width="100%">
                    <tr>
                        <td align="center" background="<{$xoops_url}>/modules/ntxusuario/images/fondo.gif">
                            <img src="<{$xoops_url}>/modules/ntxusuario/images/online.gif"><font color="#000000"> <{$block.idioma_online}></td>
                    </tr>
                </table>
                <table border="0" width="100%">
                    <tr>
                        <td><img src="<{$xoops_url}>/modules/ntxusuario/images/conectados.gif"></td>
                        <td><b> <{$block.idioma_conectados}></b></td>
                        <td><b><{$block.online_total}></b></td>
                    </tr>
                    <tr>
                        <td><img src="<{$xoops_url}>/modules/ntxusuario/images/miembros.gif"></td>
                        <td> <{$block.idioma_miembros}></td>
                        <td><{$block.online_miembros}></td>
                    </tr>
                    <tr>
                        <td><img src="<{$xoops_url}>/modules/ntxusuario/images/invitados.gif"></td>
                        <td> <{$block.idioma_invitados}></td>
                        <td><{$block.online_invitados}></td>
                    </tr>
                </table>
                <{if $block.statsreg == 1}>
                <table border="0" width="100%" id="table9">
                    <tr>
                        <td align="center" background="<{$xoops_url}>/modules/ntxusuario/images/fondo.gif">
                            <img src="<{$xoops_url}>/modules/ntxusuario/images/registrar.gif"><font color="#000000"> <{$block.idioma_estadisticas}></td>
                    </tr>
                    <tr>
                        <{if $block.ultimousuario == 1}>
                        <td>
                            <marquee scrollamount="1" width="100%" scrolldelay="30" truespeed=true><{$block.nuevosmiembros}></marquee>
                        </td>
                        <{/if}>
                    </tr>
                </table>
                <table border="0" width="100%">
                    <tr>
                        <td><img src="<{$xoops_url}>/modules/ntxusuario/images/registrados.gif"></td>
                        <td><b> <{$block.idioma_registrados}></b></td>
                        <td><b><{$block.usuariosregistrados}></b></td>
                    </tr>
                    <tr>
                        <td><img src="<{$xoops_url}>/modules/ntxusuario/images/hoy.gif"></td>
                        <td> <{$block.idioma_hoy}></td>
                        <td><{$block.registradoshoy}></td>
                    </tr>
                    <tr>
                        <td><img src="<{$xoops_url}>/modules/ntxusuario/images/ayer.gif"></td>
                        <td> <{$block.idioma_ayer}></td>
                        <td><{$block.registradosayer}></td>
                    </tr>
                    <tr>
                        <td><img src="<{$xoops_url}>/modules/ntxusuario/images/ultimo.gif"></td>
                        <td><small><span style="text-transform: capitalize; font-weight:bold"> <{$block.ultimo}></span></small><img src="<{$xoops_url}>/modules/ntxusuario/images/nuevo.gif"></td>
                        <td></td>
                    </tr>
                </table>
                <{/if}>
                <{if $block.verconectados == 1}>
                <table border="0" width="100%">
                    <tr>
                        <td align="center" background="<{$xoops_url}>/modules/ntxusuario/images/fondo.gif">
                            <font color="#000000"><img src="<{$xoops_url}>/modules/ntxusuario/images/origen.gif"><{$block.idioma_conectados}></td>
                    </tr>
                </table>
                <table border="0" width="100%">

                    <tr>
                        <{$block.online_names}>
                    </tr>
                </table>
                <{/if}>
                </tr>
            </table>
            <{if $block.nuevosmensajes > 0}>
            <{if $block.verpopup == 1}>
            <script language="JavaScript" src="<{$xoops_url}>/modules/ntxusuario/include/ntxpopup.js"></script>
            <style type="text/css"> DIV.qlabel {
                font-size: 12pt;
                font-weight: bold;
                text-align: center;
                color: blue;
                padding: 0px;
                margin: 0px;
                font-family: Verdana;
                letter-spacing: 0.03em;
                border-left: 1px solid #FFFFFF;
            } </style>
            <script language="JavaScript">
                var direccion1 = "<{$xoops_url}>" + "/viewpmsg.php";
                var direccion2 = location.href;
                if (!(direccion1 == direccion2)) {
                    caja = new QBoxRes(13, 13, 13, 13, "<{$xoops_url}>/modules/ntxusuario/images/wtc.gif", "<{$xoops_url}>/modules/ntxusuario/images/wtr.gif", "<{$xoops_url}>/modules/ntxusuario/images/wmr.gif", "<{$xoops_url}>/modules/ntxusuario/images/wbr.gif", "<{$xoops_url}>/modules/ntxusuario/images/wbc.gif", "<{$xoops_url}>/modules/ntxusuario/images/wbl.gif", "<{$xoops_url}>/modules/ntxusuario/images/wml.gif", "<{$xoops_url}>/modules/ntxusuario/images/wtl.gif", "#FFE831", "<{$xoops_url}>/modules/ntxusuario/images/wbg.gif", QWndCtrl.FADEIN + QWndCtrl.HBARNOUT);
                    boton = new QButtonRes(QButton.NORMAL, 46, 29, "<{$xoops_url}>/modules/ntxusuario/images/btn2n.gif", "<{$xoops_url}>/modules/ntxusuario/images/btn2p.gif");
                    mb = new QMessageBox(null, "mb", caja, boton, "Test");
                    mb.alert('<{$block.idioma_nuevomensaje}>            ');
                }
            </script>
            <{/if}>
            <{/if}>

