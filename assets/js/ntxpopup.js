function QControl_init(parent, name) {
    this.parent = parent || self;
    this.window = (parent && parent.window) || self;
    this.document = (parent && parent.document) || self.document;
    this.name = (parent && parent.name) ? (parent.name + "." + name) : ("self." + name);
    this.id = "Q";
    var h = this.hash(this.name);
    for (var j = 0; j < 8; j++) {
        this.id += QControl.HEXTABLE.charAt(h & 15);
        h >>>= 4;
    }
}

function QControl_hash(str) {
    var h = 0;
    if (str) {
        for (var j = str.length - 1; j >= 0; j--) {
            h ^= QControl.ANTABLE.indexOf(str.charAt(j)) + 1;
            for (var i = 0; i < 3; i++) {
                var m = (h = h << 7 | h >>> 25) & 150994944;
                h ^= m ? (m == 150994944 ? 1 : 0) : 1;
            }
        }
    }
    return h;
}

function QControl_nop() {
}

function QControl() {
    this.init = QControl_init;
    this.hash = QControl_hash;
    this.window = self;
    this.document = self.document;
    this.tag = null;
}

QControl.ANTABLE = "w5Q2KkFts3deLIPg8Nynu_JAUBZ9YxmH1XW47oDpa6lcjMRfi0CrhbGSOTvqzEV";
QControl.HEXTABLE = "0123456789ABCDEF";
QControl.nop = QControl_nop;
QControl.event = QControl_nop;

function QWndCtrl_center_ie4() {
    var b = this.document.body;
    this.moveTo(b.scrollLeft + Math.max(0, Math.floor((b.clientWidth - this.width) / 2)), b.scrollTop + 100);
}

function QWndCtrl_center_moz() {
    this.moveTo(self.pageXOffset + Math.max(0, Math.floor((self.innerWidth - this.width) / 2)), self.pageYOffset + 100);
}

function QWndCtrl_setEffects_ie4(fx) {
    this.effects = fx;
    with (this.wnd) {
        filters[0].enabled = (fx & 256) != 0;
        filters[1].enabled = (fx & 512) != 0;
        filters[2].enabled = (fx & 1024) != 0;
        filters[4].enabled = (fx & 2048) != 0;
    }
}

function QWndCtrl_setEffects_moz(fx) {
    this.effects = fx;
}

function QWndCtrl_setOpacity_ie4(op) {
    this.opacity = Math.max(0, Math.min(100, Math.floor(op - 0)));
    this.wnd.filters[3].opacity = this.opacity;
    this.wnd.filters[3].enabled = (this.opacity < 100);
}

function QWndCtrl_setOpacity_moz(op) {
    this.opacity = Math.max(0, Math.min(100, Math.floor(op - 0)));
    this.wnd.style.MozOpacity = this.opacity + "%";
}

function QWndCtrl_setSize_css(w, h) {
    this.wnd.style.width = (this.width = Math.floor(w - 0)) + "px";
    this.wnd.style.height = typeof (h) == "number" ? (this.height = Math.floor(h)) + "px" : "auto";
}

function QWndCtrl_setSize_ns4(w, h) {
    this.wnd.clip.width = this.width = Math.floor(w - 0);
    if (typeof (h) == "number") {
        this.wnd.clip.height = this.height = Math.floor(h);
    }
}

function QWndCtrl_focus() {
    this.setZIndex(QWndCtrl.TOPZINDEX++);
}

function QWndCtrl_setZIndex_css(z) {
    this.wnd.style.zIndex = this.zindex = z || 0;
}

function QWndCtrl_setZIndex_ns4(z) {
    this.wnd.zIndex = this.zindex = z || 0;
}

function QWndCtrl_moveTo_css(x, y) {
    this.wnd.style.left = (this.x = Math.floor(x - 0)) + "px";
    this.wnd.style.top = (this.y = Math.floor(y - 0)) + "px";
}

function QWndCtrl_moveTo_ns4(x, y) {
    this.wnd.moveTo(this.x = Math.floor(x - 0), this.y = Math.floor(y - 0));
}

function QWndCtrl_fxhandler() {
    this.fxhandler = QControl.nop;
    this.onShow(this.visible, this.tag);
}

function QWndCtrl_show_ie4(show) {
    if (this.visible != show) {
        var fx = false;
        switch (show ? this.effects & 15 : (this.effects & 240) >>> 4) {
            case 1:
                fx = this.wnd.filters[5];
                break;
            case 2:
                (fx = this.wnd.filters[6]).transition = show ? 1 : 0;
                break;
            case 3:
                (fx = this.wnd.filters[6]).transition = show ? 3 : 2;
                break;
            case 4:
                (fx = this.wnd.filters[6]).transition = show ? 5 : 4;
                break;
            case 5:
                (fx = this.wnd.filters[6]).transition = show ? 14 : 13;
                break;
            case 6:
                (fx = this.wnd.filters[6]).transition = show ? 16 : 15;
                break;
            case 7:
                (fx = this.wnd.filters[6]).transition = 12;
                break;
            case 8:
                (fx = this.wnd.filters[6]).transition = 8;
                break;
            case 9:
                (fx = this.wnd.filters[6]).transition = 9;
        }
        if (fx) {
            fx.apply();
            this.wnd.style.visibility = (this.visible = show) ? "visible" : "hidden";
            this.fxhandler = QWndCtrl_fxhandler;
            fx.play(0.3);
        } else {
            this.wnd.style.visibility = (this.visible = show) ? "visible" : "hidden";
            this.onShow(show, this.tag);
        }
    }
}

function QWndCtrl_fade_moz(op, step) {
    this._wndt = false;
    if (step) {
        op += step;
        if ((op > 0) && (op < this.opacity)) {
            this.wnd.style.MozOpacity = op + "%";
            this._wndt = setTimeout(this.name + ".fade(" + op + "," + step + ")", 50);
        } else {
            if (op <= 0) {
                this.wnd.style.visibility = "hidden";
                this.visible = false;
            }
            this.wnd.style.MozOpacity = this.opacity + "%";
            this.onShow(this.visible, this.tag);
        }
    }
}

function QWndCtrl_show_moz(show) {
    if (this.visible != show) {
        if (this._wndt) {
            clearTimeout(this._wndt);
            this._wndt = false;
        }
        var step = show ? ((this.effects & 15) == 1) && Math.floor(this.opacity / 5) : ((this.effects & 240) == 16) && -Math.floor(this.opacity / 5);
        if (step) {
            if (this.visible) {
                this.fade(this.opacity - 0, step);
            } else {
                this.wnd.style.MozOpacity = "0%";
                this.wnd.style.visibility = "visible";
                this.visible = true;
                this.fade(0, step);
            }
        } else {
            this.wnd.style.visibility = (this.visible = show) ? "visible" : "hidden";
            this.onShow(show, this.tag);
        }
    }
}

function QWndCtrl_show_css(show) {
    if (this.visible != show) {
        this.wnd.style.visibility = (this.visible = show) ? "visible" : "hidden";
        this.onShow(show, this.tag);
    }
}

function QWndCtrl_show_ns4(show) {
    if (this.visible != show) {
        this.wnd.visibility = (this.visible = show) ? "show" : "hidden";
        this.onShow(show, this.tag);
    }
}

function QWndCtrl_create_dom2() {
    with (this) {
        this.fxhandler = QControl.nop;
        var ie4 = document.body && document.body.filters;
        var moz = document.body && document.body.style && typeof (document.body.style.MozOpacity) == "string";
        document.write('<div unselectable="on" id="' + id + (ie4 ? '" onfilterchange="' + name + '.fxhandler()' : '') + '" style="position:absolute;left:' + x + 'px;top:' + y + 'px;width:' + width + (height != null ? 'px;height:' + height : '') + 'px;visibility:' + (visible ? 'visible' : 'hidden') + ';overflow:hidden' + (zindex ? ';z-index:' + zindex : '') + (ie4 ? ';filter:Gray(enabled=' + (effects & 256 ? '1' : '0') + ') Xray(enabled=' + (effects & 512 ? '1' : '0') + ') Invert(enabled=' + (effects & 1024 ? '1' : '0') + ') alpha(enabled=' + (opacity < 100 ? '1' : '0') + ',opacity=' + opacity + ') shadow(enabled=' + (effects & 2048 ? '1' : '0') + ',direction=135) BlendTrans(enabled=0) RevealTrans(enabled=0)' : '') + (moz && (opacity < 100) ? ';-moz-opacity:' + opacity + '%' : '') + '"><div unselectable="on" class="qwindow">');
        if (typeof (content) == "function") {
            this.content();
        } else {
            document.write(content);
        }
        document.write('</div></div>');
        if (this.wnd = document.getElementById ? document.getElementById(id) : (document.all.item ? document.all.item(id) : document.all[id])) {
            if (wnd.style) {
                ie4 = ie4 && wnd.filters;
                moz = moz && typeof (wnd.style.MozOpacity) == "string";
                this.moveTo = QWndCtrl_moveTo_css;
                this.setZIndex = QWndCtrl_setZIndex_css;
                this.focus = QWndCtrl_focus;
                this.setSize = QWndCtrl_setSize_css;
                this.show = ie4 ? QWndCtrl_show_ie4 : (moz ? QWndCtrl_show_moz : QWndCtrl_show_css);
                this.fade = moz ? QWndCtrl_fade_moz : QControl.nop;
                this.setOpacity = ie4 ? QWndCtrl_setOpacity_ie4 : (moz ? QWndCtrl_setOpacity_moz : QControl.nop);
                this.setEffects = ie4 ? QWndCtrl_setEffects_ie4 : (moz ? QWndCtrl_setEffects_moz : QControl.nop);
                this.center = self.innerWidth ? QWndCtrl_center_moz : (document.body && document.body.clientWidth ? QWndCtrl_center_ie4 : QControl.nop);
            }
        }
    }
}

function QWndCtrl_create_ns4(finalize) {
    with (this) {
        if (finalize) {
            if (_wnde) {
                parent.window.onload = _wnde;
                parent.window.onload();
            }
            document.open();
            document.write('<div class="qwindow">');
            this.content();
            document.write('</div>');
            document.close();
        } else {
            document.write('<layer id="' + id + '" left="' + x + '" top="' + y + '" width="' + width + '" visibility="' + (visible ? 'show' : 'hidden') + (height != null ? '" height="' + height + '" clip="' + width + ',' + height : '') + (zindex ? '" z-index="' + zindex : '') + (typeof (content) != "function" ? '"><div class="qwindow">' + content + '</div></layer>' : '">&nbsp;</layer>'));
            if (this.window = this.wnd = document.layers[id]) {
                if (this.document = wnd.document) {
                    this.show = QWndCtrl_show_ns4;
                    this.moveTo = QWndCtrl_moveTo_ns4;
                    this.setZIndex = QWndCtrl_setZIndex_ns4;
                    this.focus = QWndCtrl_focus;
                    this.center = QWndCtrl_center_moz;
                    this.setSize = QWndCtrl_setSize_ns4;
                    if (typeof (content) == "function") {
                        this._wnde = parent.window.onload;
                        parent.window.onload = new Function(name + ".create(true)");
                    }
                }
            }
        }
    }
}

function QWndCtrl_create_na() {
    this.document.write('Object is not supported.');
    this.wnd = null;
}

function QWndCtrl_create() {
    with (this) {
        this.create = (document.getElementById || document.all) ? QWndCtrl_create_dom2 : (document.layers ? QWndCtrl_create_ns4 : QWndCtrl_create_na);
        create();
    }
}

function QWndCtrl() {
    this.x = this.y = 0;
    this.width = this.height = 0;
    this.content = "";
    this.visible = true;
    this.effects = 0;
    this.opacity = 100;
    this.zindex = null;
    this._wndt = this._wnde = false;
    this.create = QWndCtrl_create;
    this.show = QControl.nop;
    this.focus = QControl.nop;
    this.center = QControl.nop;
    this.moveTo = QControl.nop;
    this.setSize = QControl.nop;
    this.setOpacity = QControl.nop;
    this.setEffects = QControl.nop;
    this.setZIndex = QControl.nop;
    this.onShow = QControl.event;
}

QWndCtrl.prototype = new QControl();
QWndCtrl.TOPZINDEX = 1000;
QWndCtrl.GRAY = 256;
QWndCtrl.XRAY = 512;
QWndCtrl.INVERT = 1024;
QWndCtrl.SHADOW = 2048;
QWndCtrl.FADEIN = 1;
QWndCtrl.FADEOUT = 16;
QWndCtrl.BOXIN = 2;
QWndCtrl.BOXOUT = 32;
QWndCtrl.CIRCLEIN = 3;
QWndCtrl.CIRCLEOUT = 48;
QWndCtrl.WIPEIN = 4;
QWndCtrl.WIPEOUT = 64;
QWndCtrl.HBARNIN = 5;
QWndCtrl.HBARNOUT = 80;
QWndCtrl.VBARNIN = 6;
QWndCtrl.VBARNOUT = 96;
QWndCtrl.DISSOLVEIN = 7;
QWndCtrl.DISSOLVEOUT = 112;
QWndCtrl.HBLINDSIN = 8;
QWndCtrl.HBLINDSOUT = 128;
QWndCtrl.VBLINDSIN = 9;
QWndCtrl.VBLINDSOUT = 144;

function QBoxCtrl_content() {
    with (this) {
        if (res) {
            this.cwidth = width - res.L - res.R - 8;
            this.cheight = height && (height - res.T - res.B - 8);
            var ec = '"><table border="0" cellspacing="0" cellpadding="0"><tr><td></td></tr></table></td>';
            document.write('<table class="qbox" border="0" cellspacing="0" cellpadding="0" width="' + (width - 8) + (height != null ? '" height="' + (height - 8) : '') + '"><tr><td width="' + res.L + '" height="' + res.T + '"><img src="' + res.TL.src + '" border="0" width="' + res.L + '" height="' + res.T + '"></td><td width="' + cwidth + '" height="' + res.T + '" background="' + res.TC.src + ec + '<td width="' + res.R + '" height="' + res.T + '"><img src="' + res.TR.src + '" border="0" width="' + res.R + '" height="' + res.T + '"></td></tr><tr><td width="' + res.L + (cheight != null ? '" height="' + cheight : '') + '" background="' + res.ML.src + ec + '<td width="' + cwidth + '" bgcolor="' + res.bgcolor + (cheight != null ? '" height="' + cheight : '') + (res.bgtile ? '" background="' + res.bgtile.src : '') + '" align="left" valign="top" class="body" unselectable="on">');
            if (typeof (body) == "function") {
                this.body();
            } else {
                document.write(body);
            }
            document.write('</td><td width="' + res.R + (cheight != null ? '" height="' + cheight : '') + '" background="' + res.MR.src + ec + '</tr><tr><td width="' + res.L + '" height="' + res.B + '"><img src="' + res.BL.src + '" border="0" width="' + res.L + '" height="' + res.B + '"></td><td width="' + cwidth + '" height="' + res.B + '" background="' + res.BC.src + ec + '<td width="' + res.R + '" height="' + res.B + '"><img src="' + res.BR.src + '" border="0" width="' + res.R + '" height="' + res.B + '"></td></tr></table><br>');
        }
    }
}

function QBoxCtrl() {
    this.res = false;
    this.body = "&nbsp;";
    this.cwidth = this.cheight = 0;
    this.content = QBoxCtrl_content;
}

QBoxCtrl.prototype = new QWndCtrl();

function QMessageBox_alert(msg) {
    if (typeof (msg) == "string") {
        this.label.set(this.value = msg);
    }
    this.center();
    this.focus();
    this.show(true);
}

function QMessageBox_close() {
    with (this.parent) {
        if (!onClose(tag)) show(false);
    }
}

function QMessageBox_body() {
    with (this) {
        document.write('<table border="0" width="' + cwidth + '"><tr><td align="left" valign="top" unselectable="on">');
        this.label = new QLabel(this, "label", value);
        document.write('</td></tr><tr><td height="' + (bres.height + 14) + '" align="center" valign="bottom" unselectable="on">');
        this.button = new QButton(this, "button", bres, "Close");
        document.write('</td></tr></table>');
        button.onClick = QMessageBox_close;
    }
}

function QMessageBox(parent, name, box, btn, msg, effects, opacity) {
    this.init(parent, name);
    if ((this.res = box) && (this.bres = btn)) {
        this.value = typeof (msg) == "string" ? msg : "";
        this.width = Math.max(200, Math.floor(Math.sqrt(555 * this.value.length)));
        this.height = null;
        this.x = this.y = 0;
        this.visible = false;
        this.zindex = null;
        this.body = QMessageBox_body;
        var j = QMessageBox.arguments.length;
        this.effects = j > 5 ? effects : (box.effects != null ? box.effects : 0);
        this.opacity = j > 6 ? opacity : (box.opacity != null ? box.opacity : 100);
        this.create();
        this.alert = QMessageBox_alert;
        this.onClose = QControl.event;
    } else {
        this.document.write("invalid resource");
    }
}

QMessageBox.prototype = new QBoxCtrl();

function QLabel_set_ie(value) {
    this.label.innerText = (this.value = value) || "\xA0";
}

function QLabel_set_dom2(value) {
    with (this.label) {
        replaceChild(this.document.createTextNode((this.value = value) || "\xA0"), firstChild);
    }
}

function QLabel_set_ns4(value) {
    this.value = value || "";
    with (this) {
        document.open();
        document.write('<div class="qlabel">' + (clickable ? '<a href="#" title="' + tooltip + '" onClick="return ' + name + '.doEvent()" onMouseOut="window.top.status=\'\'" onMouseOver="window.top.status=' + name + '.tooltip;return true">' + value + '</a>' : value) + '</div>');
        document.close();
    }
}

function QLabel_doEvent() {
    this.onClick(this.value, this.tag);
    return false;
}

function QLabel(parent, name, value, clickable, tooltip) {
    this.init(parent, name);
    this.value = value || "";
    this.clickable = clickable || false;
    this.tooltip = tooltip || "";
    this.doEvent = QLabel_doEvent;
    this.onClick = QControl.event;
    with (this) {
        if (document.getElementById || document.all) {
            document.write(clickable ? '<div class="qlabel" unselectable="on"><a id="' + id + '" href="#" title="' + tooltip + '" onClick="return ' + name + '.doEvent()" onMouseOver="window.top.status=' + name + '.tooltip;return true" onMouseOut="window.top.status=\'\'" hidefocus="true" unselectable="on">' + (value || '&nbsp;') + '</a></div>' : '<div id="' + id + '" class="qlabel" unselectable="on">' + (value || '&nbsp;') + '</div>');
            this.label = document.getElementById ? document.getElementById(id) : (document.all.item ? document.all.item(id) : document.all[id]);
            this.set = (label && (label.innerText ? QLabel_set_ie : (label.replaceChild && QLabel_set_dom2))) || QControl.nop;
        } else if (document.layers) {
            var suffix = "";
            for (var j = value.length; j < QLabel.TEXTQUOTA; j++) suffix += " &nbsp;";
            document.write('<div><ilayer id="i' + id + '"><layer id="' + id + '"><div class="qlabel">' + (clickable ? '<a href="#" title="' + tooltip + '" onClick="return ' + name + '.doEvent()" onMouseOver="window.top.status=' + name + '.tooltip;return true" onMouseOut="window.top.status=\'\'">' + value + suffix + '</a>' : value + suffix) + '</div></layer></ilayer></div>');
            this.label = (this.label = document.layers["i" + id]) && label.document.layers[id];
            this.document = label && label.document;
            this.set = (label && document) ? QLabel_set_ns4 : QControl.nop;
        } else {
            document.write("Object is not supported");
        }
    }
}

QLabel.prototype = new QControl();
QLabel.TEXTQUOTA = 50;

function QButton_update() {
    with (this) {
        image.src = ((!enabled && res.imgD) || (value ? res.imgP : res.imgN)).src;
    }
}

function QButton_doEvent() {
    with (this) {
        if (enabled) {
            if (res.style == 1) {
                this.value = value ? 0 : 1;
                update();
            }
            onClick(value, tag);
        }
    }
    return false;
}

function QButton_enable(state) {
    this.enabled = state;
    this.update();
}

function QButton_set(value) {
    if (this.enabled) {
        this.value = value ? 1 : 0;
        this.update();
    }
    return true;
}

function QButton(parent, name, res, tooltip) {
    this.init(parent, name);
    if (res) {
        this.res = res;
        this.tip = tooltip || "";
        this.enabled = true;
        this.value = 0;
        this.set = QButton_set;
        this.enable = QButton_enable;
        this.update = QButton_update;
        this.doEvent = QButton_doEvent;
        this.onClick = QControl.event;
        with (this) {
            document.write('<a href="#" hidefocus="true" unselectable="on"' + (tip ? ' title="' + tip + '"' : '') + ' onClick="return ' + name + '.doEvent()" onMouseOver="' + (res.style == 2 ? name + '.set(1);' : '') + 'window.top.status=' + name + '.tip;return true" onMouseOut="' + (!res.style || (res.style == 2) ? name + '.set();' : '') + 'window.top.status=\'\'"' + (!res.style ? ' onMouseDown="return ' + name + '.set(1)" onMouseUp="return ' + name + '.set()"' : '') + '><img class="qbutton" name="' + id + '" src="' + res.imgN.src + '" border="0" width="' + res.width + '" height="' + res.height + '"></a>');
            this.image = document.images[id] || new Image(1, 1);
        }
    } else {
        this.document.write("invalid resource");
    }
}

QButton.prototype = new QControl();
QButton.NORMAL = 0;
QButton.CHECKBOX = 1;
QButton.WEB = 2;
QButton.SIGNAL = 3;

function QButtonRes(style, width, height, normal, pressed, disabled) {
    this.style = style;
    this.width = width;
    this.height = height;
    this.imgN = new Image(width, height);
    this.imgN.src = normal;
    this.imgP = new Image(width, height);
    this.imgP.src = pressed;
    if (disabled) {
        this.imgD = new Image(width, height);
        this.imgD.src = disabled;
    }
}

function QBoxRes(t, r, b, l, tc, tr, mr, br, bc, bl, ml, tl, bgcolor, bgtile, effects, opacity) {
    var args = QBoxRes.arguments.length;
    this.T = t;
    this.R = r;
    this.B = b;
    this.L = l;
    this.TC = new Image();
    this.TC.src = tc;
    this.TR = new Image(r, t);
    this.TR.src = tr;
    this.MR = new Image();
    this.MR.src = mr;
    this.BR = new Image(r, b);
    this.BR.src = br;
    this.BC = new Image();
    this.BC.src = bc;
    this.BL = new Image(l, b);
    this.BL.src = bl;
    this.ML = new Image();
    this.ML.src = ml;
    this.TL = new Image(l, t);
    this.TL.src = tl;
    this.bgcolor = bgcolor || "#FFFFFF";
    if (bgtile) {
        this.bgtile = new Image();
        this.bgtile.src = bgtile;
    } else {
        this.bgtile = false;
    }
    this.effects = (args > 13) ? effects : null;
    this.opacity = (args > 14) ? opacity : null;
}








