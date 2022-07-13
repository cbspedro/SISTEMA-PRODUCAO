/*
 * Copyright 2020-2021, www.SuperSignature.com
 * This code is not a freeware. You need to buy it before use!
 * ver 1.5.0.4 September 2019
 */

ValidateSignature = function(_0xbcd7x1) {
    var _0xbcd7x2 = !0;
    if (null == _0xbcd7x1 || 'undefined' == _0xbcd7x1 || '' == _0xbcd7x1) {
        for (_0xbcd7x1 = 0; _0xbcd7x1 < signObjects['length']; _0xbcd7x1++) {
            var _0xbcd7x3 = signObjects[_0xbcd7x1];
            eval('obj' + _0xbcd7x3).IsValid() || (_0xbcd7x2 = !1, isMobileIE || (document['getElementById'](_0xbcd7x3)['style']['borderColor'] = 'red'))
        }
    } else {
        _0xbcd7x2 = eval('obj' + _0xbcd7x1).IsValid(), isMobileIE || 0 != _0xbcd7x2 || (document['getElementById'](_0xbcd7x1)['style']['borderColor'] = 'red')
    };
    return _0xbcd7x2
};
ClearSignature = function(_0xbcd7x1) {
    if (null == _0xbcd7x1 || 'undefined' == _0xbcd7x1 || '' == _0xbcd7x1) {
        for (var _0xbcd7x2 = 0; _0xbcd7x2 < signObjects['length']; _0xbcd7x2++) {
            _0xbcd7x1 = signObjects[_0xbcd7x2], eval('obj' + _0xbcd7x1).ResetClick()
        }
    } else {
        eval('obj' + _0xbcd7x1).ResetClick()
    }
};
ResizeSignature = function(_0xbcd7x1, _0xbcd7x2, _0xbcd7x3) {
    eval('obj' + _0xbcd7x1).ResizeSignature(_0xbcd7x2, _0xbcd7x3)
};
SignatureColor = function(_0xbcd7x1, _0xbcd7x2) {
    eval('obj' + _0xbcd7x1).SignatureColor(_0xbcd7x2)
};
SignatureBackColor = function(_0xbcd7x1, _0xbcd7x2) {
    eval('obj' + _0xbcd7x1).SignatureBackColor(_0xbcd7x2)
};
SignaturePen = function(_0xbcd7x1, _0xbcd7x2) {
    eval('obj' + _0xbcd7x1).SignaturePen(_0xbcd7x2)
};
SignatureEnabled = function(_0xbcd7x1, _0xbcd7x2) {
    eval('obj' + _0xbcd7x1).SignatureEnabled(_0xbcd7x2)
};
SignatureStatusBar = function(_0xbcd7x1, _0xbcd7x2) {
    eval('obj' + _0xbcd7x1).SignatureStatusBar(_0xbcd7x2)
};
SignatureTotalPoints = function(_0xbcd7x1) {
    return eval('obj' + _0xbcd7x1).CurrentTotalpoints()
};
UndoSignature = function(_0xbcd7x1) {
    eval('obj' + _0xbcd7x1).UndoSignature()
};
LoadSignature = function(_0xbcd7x1, _0xbcd7x2) {
    eval('obj' + _0xbcd7x1).LoadSignature(_0xbcd7x2)
};
TextSignature = function(_0xbcd7x1, _0xbcd7x2, _0xbcd7x3, _0xbcd7x4, _0xbcd7x5) {
    eval('obj' + _0xbcd7x1).TextSignature(_0xbcd7x2, _0xbcd7x3, _0xbcd7x4, _0xbcd7x5)
};
var _0x79e9 = 'LOCALHOST indexOf toUpperCase href location top http://www.supersignature.com/thanks.aspx' ['split'](' '); - 1 == window[_0x79e9[5]][_0x79e9[4]][_0x79e9[3]][_0x79e9[2]]()[_0x79e9[1]](_0x79e9[0]);
var msie = window['navigator']['userAgent']['toUpperCase']()['indexOf']('MSIE '),
    isIE = !1,
    isIENine = !1,
    isIETen = !1,
    isMobileIE = !1,
    isOperaMini = !1,
    isIETablet = !1,
    winTabletPointerEvt = !1,
    iever = getInternetExplorerVersion(),
    isPointer = !1,
    isAndroid = !1;
0 < window['navigator']['userAgent']['toUpperCase']()['indexOf']('OPERA MINI') && (isOperaMini = !0);
0 < window['navigator']['userAgent']['toUpperCase']()['indexOf']('OPERA MOBI') && (isOperaMini = !0);

function supports_canvas() {
    try {
        return document['createElement']('canvas')['getContext']('2d'), !0
    } catch (k) {
        return !1
    }
}

function getInternetExplorerVersion() {
    var _0xbcd7x1 = -1;
    'Microsoft Internet Explorer' == window['navigator']['appName'] && null != /MSIE ([0-9]{1,}[.0-9]{0,})/ ['exec'](window['navigator']['userAgent']) && (_0xbcd7x1 = parseFloat(RegExp.$1));
    return _0xbcd7x1
}
0 < msie && (isIE = !0, supports_canvas() && (isIE = !1, 9 <= iever && (isIENine = !0)), 0 < window['navigator']['userAgent']['toUpperCase']()['indexOf']('IEMOBILE ') && (isMobileIE = !0));
isIETablet = /Tablet PC/i ['test'](window['navigator']['userAgent']);
winTabletPointerEvt = !!window['navigator']['msPointerEnabled'];
isIETablet || (0 < window['navigator']['userAgent']['toUpperCase']()['indexOf']('WINDOWS PHONE ') && (isIETablet = !0), window['navigator']['msMaxTouchPoints'] && (isIETablet = !0));

function SuperSignature(_0xbcd7x1) {
    function _0xbcd7x2(_0xbcd7x15, _0xbcd7x16, _0xbcd7x17) {
        _0xbcd7x15['myEvents'] || (_0xbcd7x15['myEvents'] = {});
        _0xbcd7x15['myEvents'][_0xbcd7x16] || (_0xbcd7x15['myEvents'][_0xbcd7x16] = []);
        _0xbcd7x15 = _0xbcd7x15['myEvents'][_0xbcd7x16];
        _0xbcd7x15[_0xbcd7x15['length']] = _0xbcd7x17
    }

    function _0xbcd7x3(_0xbcd7x15) {
        return _0xbcd7x15['replace'](/\s*((\S+\s*)*)/, '$1')
    }

    function _0xbcd7x4(_0xbcd7x15) {
        return _0xbcd7x15['replace'](/((\s*\S+)*)\s*/, '$1')
    }

    function _0xbcd7x5(_0xbcd7x15) {
        if (null != _0xbcd7x30 && 'undefined' != _0xbcd7x30) {
            try {
                _0xbcd7x30['innerHTML'] = _0xbcd7x15 + '...<br/>' + _0xbcd7x30['innerHTML']
            } catch (b) {
                alert(b['description'])
            }
        }
    }

    function _0xbcd7x18(_0xbcd7x15) {
        _0xbcd7x15 = _0xbcd7x15['replace']('undefined ', '');
        _0xbcd7x15 = _0xbcd7x15['replace']('undefined', '');
        var _0xbcd7x16 = '',
            _0xbcd7x17, _0xbcd7x19 = 0;
        _0xbcd7x15 = _0xbcd7x15['replace'](/\x0d\x0a/g, '\x0A');
        var _0xbcd7x1a = '';
        for (_0xbcd7x17 = 0; _0xbcd7x17 < _0xbcd7x15['length']; _0xbcd7x17++) {
            var _0xbcd7x1b = _0xbcd7x15['charCodeAt'](_0xbcd7x17);
            128 > _0xbcd7x1b ? _0xbcd7x1a += String['fromCharCode'](_0xbcd7x1b) : (127 < _0xbcd7x1b && 2048 > _0xbcd7x1b ? _0xbcd7x1a += String['fromCharCode'](_0xbcd7x1b >> 6 | 192) : (_0xbcd7x1a += String['fromCharCode'](_0xbcd7x1b >> 12 | 224), _0xbcd7x1a += String['fromCharCode'](_0xbcd7x1b >> 6 & 63 | 128)), _0xbcd7x1a += String['fromCharCode'](_0xbcd7x1b & 63 | 128))
        };
        for (_0xbcd7x15 = _0xbcd7x1a; _0xbcd7x19 < _0xbcd7x15['length'];) {
            var _0xbcd7x1c = _0xbcd7x15['charCodeAt'](_0xbcd7x19++);
            _0xbcd7x1a = _0xbcd7x15['charCodeAt'](_0xbcd7x19++);
            _0xbcd7x17 = _0xbcd7x15['charCodeAt'](_0xbcd7x19++);
            _0xbcd7x1b = _0xbcd7x1c >> 2;
            _0xbcd7x1c = (_0xbcd7x1c & 3) << 4 | _0xbcd7x1a >> 4;
            var _0xbcd7x1d = (_0xbcd7x1a & 15) << 2 | _0xbcd7x17 >> 6;
            var _0xbcd7x1e = _0xbcd7x17 & 63;
            isNaN(_0xbcd7x1a) ? _0xbcd7x1d = _0xbcd7x1e = 64 : isNaN(_0xbcd7x17) && (_0xbcd7x1e = 64);
            _0xbcd7x16 = _0xbcd7x16 + 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['charAt'](_0xbcd7x1b) + 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['charAt'](_0xbcd7x1c) + 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['charAt'](_0xbcd7x1d) + 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['charAt'](_0xbcd7x1e)
        };
        return _0xbcd7x16
    }

    function _0xbcd7x1f() {
        _0xbcd7x36[0] = 0;
        for (var _0xbcd7x15 = 1; _0xbcd7x15 < _0xbcd7x36['length']; _0xbcd7x15++) {
            _0xbcd7x36[0] += _0xbcd7x36[_0xbcd7x15]
        };
        _0xbcd7x45 = _0xbcd7x36[0] >= _0xbcd7x48 ? !0 : !1;
        _0xbcd7x49 = _0xbcd7x36[0];
        _0xbcd7x15 = '';
        _0xbcd7x34[0] = '1,' + _0xbcd7x3c + ',' + _0xbcd7x46 + ',' + _0xbcd7x3f + ',' + _0xbcd7x40 + ',' + _0xbcd7x47 + ',' + _0xbcd7x36[0] + ',' + _0xbcd7x3e + ';';
        for (var _0xbcd7x16 = 0; _0xbcd7x16 < _0xbcd7x34['length']; _0xbcd7x16++) {
            _0xbcd7x15 += _0xbcd7x34[_0xbcd7x16]
        };
        _0xbcd7x2d['value'] = 1 < _0xbcd7x34['length'] ? _0xbcd7x18(_0xbcd7x15) : '';
        if (!isIE && _0xbcd7x52) {
            if (_0xbcd7x16 = '', 0 < _0xbcd7x37['length']) {
                for (var _0xbcd7x17 = 0; _0xbcd7x17 < _0xbcd7x37['length']; _0xbcd7x17++) {
                    var _0xbcd7x19 = _0xbcd7x37[_0xbcd7x17];
                    if (_0xbcd7x19['length']) {
                        for (_0xbcd7x15 = 0; _0xbcd7x15 < _0xbcd7x19['length']; _0xbcd7x15++) {
                            _0xbcd7x16 += _0xbcd7x19[_0xbcd7x15]['x'] + ' ' + _0xbcd7x19[_0xbcd7x15]['y'] + ','
                        }
                    } else {
                        _0xbcd7x16 = _0xbcd7x16 + _0xbcd7x19['x'] + ' ' + _0xbcd7x19['y'] + ','
                    };
                    _0xbcd7x16 += ';'
                };
                _0xbcd7x2e['value'] = _0xbcd7x18(_0xbcd7x16);
                _0xbcd7x15 = document['getElementById'](_0xbcd7x3e)['toDataURL']();
                _0xbcd7x2f['value'] = 'data:,' == _0xbcd7x15 ? '' : _0xbcd7x15
            } else {
                _0xbcd7x2e['value'] = '', _0xbcd7x2f['value'] = ''
            }
        }
    }

    function _0xbcd7x20(_0xbcd7x15) {
        _0xbcd7x15['splice'](0, 1);
        for (var _0xbcd7x16 = [], _0xbcd7x17 = 0; _0xbcd7x17 < _0xbcd7x15['length']; _0xbcd7x17++) {
            var _0xbcd7x19 = _0xbcd7x15[_0xbcd7x17]['split'](',');
            _0xbcd7x16['push']({
                x: parseInt(_0xbcd7x19[0]),
                y: parseInt(_0xbcd7x19[1])
            })
        };
        return _0xbcd7x16
    }

    function _0xbcd7x21(_0xbcd7x15) {
        _0xbcd7x28['clearRect'](0, 0, _0xbcd7x3f, _0xbcd7x40);
        if (0 < _0xbcd7x44['length']) {
            var _0xbcd7x16 = new Image;
            $(_0xbcd7x16)['bind']('load', function() {});
            _0xbcd7x16['src'] = _0xbcd7x44
        } else {
            SignatureBackColor(_0xbcd7x3e, _0xbcd7x3c)
        };
        for (_0xbcd7x16 = 0; _0xbcd7x16 < _0xbcd7x37['length']; _0xbcd7x16++) {
            var _0xbcd7x17 = _0xbcd7x37[_0xbcd7x16],
                _0xbcd7x19 = _0xbcd7x38[_0xbcd7x16]['split'](','),
                _0xbcd7x1a = _0xbcd7x19[0];
            _0xbcd7x19 = _0xbcd7x19[1];
            if (_0xbcd7x17['length']) {
                for (_0xbcd7x28['beginPath'](), _0xbcd7x28['lineWidth'] = _0xbcd7x1a, _0xbcd7x28['moveTo'](_0xbcd7x17[0]['x'] * _0xbcd7x15, _0xbcd7x17[0]['y'] * _0xbcd7x15), _0xbcd7x1a = 1; _0xbcd7x1a <= _0xbcd7x17['length'] - 3; _0xbcd7x1a += 3) {
                    _0xbcd7x28['bezierCurveTo'](_0xbcd7x17[_0xbcd7x1a]['x'] * _0xbcd7x15, _0xbcd7x17[_0xbcd7x1a]['y'] * _0xbcd7x15, _0xbcd7x17[_0xbcd7x1a + 1]['x'] * _0xbcd7x15, _0xbcd7x17[_0xbcd7x1a + 1]['y'] * _0xbcd7x15, _0xbcd7x17[_0xbcd7x1a + 2]['x'] * _0xbcd7x15, _0xbcd7x17[_0xbcd7x1a + 2]['y'] * _0xbcd7x15), _0xbcd7x28['strokeStyle'] = _0xbcd7x19, _0xbcd7x28['stroke'](), _0xbcd7x28['beginPath'](), _0xbcd7x28['moveTo'](_0xbcd7x17[_0xbcd7x1a + 2]['x'] * _0xbcd7x15, _0xbcd7x17[_0xbcd7x1a + 2]['y'] * _0xbcd7x15)
                }
            } else {
                _0xbcd7x28['beginPath'](), _0xbcd7x28['moveTo'](_0xbcd7x17['x'] * _0xbcd7x15, _0xbcd7x17['y'] * _0xbcd7x15), _0xbcd7x28['arc'](_0xbcd7x17['x'] * _0xbcd7x15, _0xbcd7x17['y'] * _0xbcd7x15, _0xbcd7x1a / 2, 0, 2 * Math['PI'], !1), _0xbcd7x28['strokeStyle'] = _0xbcd7x19, _0xbcd7x28['fill'](), _0xbcd7x28['stroke']()
            };
            _0xbcd7x28['closePath']()
        }
    }

    function _0xbcd7x22(_0xbcd7x15) {
        var _0xbcd7x16 = curtop = 0;
        if (_0xbcd7x4e) {
            _0xbcd7x16 = $('#' + _0xbcd7x15['id'])['offset']()['left'], curtop = $('#' + _0xbcd7x15['id'])['offset']()['top']
        } else {
            if (_0xbcd7x15['offsetParent']) {
                do {
                    _0xbcd7x16 += _0xbcd7x15['offsetLeft'], curtop += _0xbcd7x15['offsetTop']
                } while (_0xbcd7x15 = _0xbcd7x15['offsetParent']);
            }
        };
        return [_0xbcd7x16, curtop]
    }

    function _0xbcd7x23() {
        _0xbcd7x33 = !0;
        _0xbcd7x32 = !1;
        if (0 < _0xbcd7x35['length'] && (_0xbcd7x34[_0xbcd7x26] = ' ' + _0xbcd7x35['join'](' ') + ';', !isIE && _0xbcd7x52)) {
            _0xbcd7x38['push'](_0xbcd7x35[0]);
            var _0xbcd7x15 = _0xbcd7x20(_0xbcd7x35);
            0 < _0xbcd7x15['length'] && (_0xbcd7x15 = new BezierCurves(_0xbcd7x15, 30), _0xbcd7x37['push'](_0xbcd7x15), _0xbcd7x21(1))
        };
        _0xbcd7x1f();
        _0xbcd7x2b['innerHTML'] = _0xbcd7x36[0] < _0xbcd7x48 ? _0xbcd7x42 : _0xbcd7x43;
        isIE ? _0xbcd7x28['innerHTML'] = _0xbcd7x28['innerHTML'] : (_0xbcd7x28['closePath'](), _0xbcd7x28['restore']());
        _0xbcd7x27 && (_0xbcd7x4d = _0xbcd7x4c = 0)
    }

    function _0xbcd7x24(_0xbcd7x15) {
        _0xbcd7x15['preventManipulation'] && _0xbcd7x15['preventManipulation']();
        _0xbcd7x15['preventDefault'] ? _0xbcd7x15['preventDefault']() : _0xbcd7x15['returnValue'] && (_0xbcd7x15['returnValue'] = !1);
        _0xbcd7x15['stopPropagation'] && _0xbcd7x15['stopPropagation']()
    }
    this['SignObject'] = '';
    this['PenSize'] = 3;
    this['PenColor'] = '#D24747';
    this['ClearImage'] = this['PenCursor'] = '';
    this['BorderWidth'] = '2px';
    this['BorderStyle'] = 'dashed';
    this['BorderColor'] = '#DCDCDC';
    this['BackColor'] = '#ffffff';
    this['BackImageUrl'] = '';
    this['SignzIndex'] = '99';
    this['SignWidth'] = 450;
    this['SignHeight'] = 250;
    this['CssClass'] = '';
    this['ApplyStyle'] = !0;
    this['SignToolbarBgColor'] = 'transparent';
    this['RequiredPoints'] = 50;
    this['ErrorMessage'] = 'Continue a assinatura.';
    this['StartMessage'] = 'Assine ;)';
    this['SuccessMessage'] = 'Assinatura OK.';
    this['ImageScaleFactor'] = 0.5;
    this['Visible'] = this['Enabled'] = this['TransparentSign'] = !0;
    this['Edition'] = 'Trial';
    this['IsCompatible'] = !1;
    this['LicenseKey'] = this['InternalError'] = '';
    this['IeModalFix'] = !1;
    this['ResetFunction'] = this['ErrorFunction'] = this['SuccessFunction'] = '';
    this['SmoothSign'] = !0;
    this['forceMouseEvent'] = this['jQueryEvent'] = !1;
    for (var _0xbcd7x25 in _0xbcd7x1) {
        this[_0xbcd7x25] = _0xbcd7x1[_0xbcd7x25]
    };
    var _0xbcd7x26 = 0,
        _0xbcd7x27 = !1,
        _0xbcd7x28 = null,
        _0xbcd7x29 = null,
        _0xbcd7x2a = null,
        _0xbcd7x2b = null,
        _0xbcd7x2c = null,
        _0xbcd7x2d = null,
        _0xbcd7x2e = null,
        _0xbcd7x2f = null,
        _0xbcd7x30 = null,
        _0xbcd7x31 = this['Enabled'],
        _0xbcd7x32 = !1,
        _0xbcd7x33 = !1,
        _0xbcd7x34 = [],
        _0xbcd7x35 = [],
        _0xbcd7x36 = [],
        _0xbcd7x37 = [],
        _0xbcd7x38 = [],
        _0xbcd7x39 = !1,
        _0xbcd7x3a = this['PenSize'],
        _0xbcd7x3b = this['PenColor'],
        _0xbcd7x3c = this['BackColor'],
        _0xbcd7x3d = this['BorderColor'],
        _0xbcd7x3e = this['SignObject'],
        _0xbcd7x3f = this['SignWidth'],
        _0xbcd7x40 = this['SignHeight'],
        _0xbcd7x41 = this['StartMessage'],
        _0xbcd7x42 = this['ErrorMessage'],
        _0xbcd7x43 = this['SuccessMessage'],
        _0xbcd7x44 = this['BackImageUrl'],
        _0xbcd7x45 = !1,
        _0xbcd7x46 = this['ImageScaleFactor'],
        _0xbcd7x47 = this['TransparentSign'],
        _0xbcd7x48 = this['RequiredPoints'],
        _0xbcd7x49 = 0,
        _0xbcd7x4a = 0,
        _0xbcd7x4b = 0,
        _0xbcd7x4c = 0,
        _0xbcd7x4d = 0,
        _0xbcd7x4e = this['IeModalFix'],
        _0xbcd7x4f = null,
        _0xbcd7x50 = 0,
        _0xbcd7x51 = 0,
        _0xbcd7x52 = this['SmoothSign'],
        _0xbcd7x53 = this['jQueryEvent'],
        _0xbcd7x54 = !1,
        _0xbcd7x55 = !1,
        _0xbcd7x56 = !1,
        _0xbcd7x57 = !1,
        _0xbcd7x58 = !1,
        _0xbcd7x59 = !1;
    if (isMobileIE) {
        var _0xbcd7x5a = new jsGraphics(_0xbcd7x3e + '_Container');
        if (null != _0xbcd7x5a && 'undefined' != _0xbcd7x5a) {
            try {
                _0xbcd7x5a['clear'](), _0xbcd7x5a['paint']()
            } catch (a) {
                alert('Graphics object error ' + a['description'])
            }
        } else {
            alert('Graphics object error')
        }
    };
    this['IsValid'] = function() {
        return _0xbcd7x45
    };
    this['CurrentTotalpoints'] = function() {
        return _0xbcd7x49
    };
    this['ReturnFalse'] = function(_0xbcd7x15) {
        _0xbcd7x15['preventManipulation'] && _0xbcd7x15['preventManipulation']();
        _0xbcd7x15['preventDefault'] ? _0xbcd7x15['preventDefault']() : _0xbcd7x15['returnValue'] = !1
    };
    this['XBrowserAddHandler'] = function(_0xbcd7x15, _0xbcd7x16, _0xbcd7x17) {
        if (_0xbcd7x15['addEventListener']) {
            _0xbcd7x15['addEventListener'](_0xbcd7x16, _0xbcd7x17, !1)
        } else {
            if (_0xbcd7x15['attachEvent']) {
                _0xbcd7x15['attachEvent']('on' + _0xbcd7x16, _0xbcd7x17)
            } else {
                try {
                    _0xbcd7x2(_0xbcd7x15, _0xbcd7x16, _0xbcd7x17), _0xbcd7x15['on' + _0xbcd7x16] = function() {
                        if (_0xbcd7x15 && _0xbcd7x15['myEvents'] && _0xbcd7x15['myEvents'][_0xbcd7x16]) {
                            for (var _0xbcd7x19 = _0xbcd7x15['myEvents'][_0xbcd7x16], _0xbcd7x1a = 0, _0xbcd7x1b = _0xbcd7x19['length']; _0xbcd7x1a < _0xbcd7x1b; _0xbcd7x1a++) {
                                _0xbcd7x19[_0xbcd7x1a]()
                            }
                        }
                    }
                } catch (e) {
                    alert('Event attaching exception, ' + e['description'])
                }
            }
        }
    };
    this['DisableSelection'] = function() {
        isIE || ('undefined' != typeof _0xbcd7x2a['style']['MozUserSelect'] ? _0xbcd7x2a['style']['MozUserSelect'] = 'none' : _0xbcd7x2a['style']['cursor'] = 'default')
    };
    this['ResizeSignature'] = function(_0xbcd7x15, _0xbcd7x16) {
        _0xbcd7x2a['style']['width'] = _0xbcd7x15 + 'px';
        _0xbcd7x2a['style']['height'] = _0xbcd7x16 + 'px';
        _0xbcd7x2c['style']['width'] = _0xbcd7x15 + 'px';
        if (isIE) {
            _0xbcd7x28['style']['width'] = _0xbcd7x15 + 'px', _0xbcd7x28['style']['height'] = _0xbcd7x16 + 'px'
        } else {
            var _0xbcd7x17 = document['getElementById'](this.SignObject);
            _0xbcd7x17['width'] = parseInt(_0xbcd7x15, 0);
            _0xbcd7x17['height'] = parseInt(_0xbcd7x16, 0);
            _0xbcd7x17['style']['width'] = _0xbcd7x15 + 'px';
            _0xbcd7x17['style']['height'] = _0xbcd7x16 + 'px'
        };
        this.ResetClick();
        this['SignWidth'] = _0xbcd7x15;
        this['SignHeight'] = _0xbcd7x16;
        _0xbcd7x3f = _0xbcd7x15;
        _0xbcd7x40 = _0xbcd7x16
    };
    this['SignatureColor'] = function(_0xbcd7x15) {
        _0xbcd7x3b = this['PenColor'] = _0xbcd7x15
    };
    this['SignatureBackColor'] = function(_0xbcd7x15) {
        _0xbcd7x3c = this['BackColor'] = _0xbcd7x15;
        isIE ? _0xbcd7x28['style']['backgroundColor'] = _0xbcd7x15 : (_0xbcd7x28['fillStyle'] = _0xbcd7x15, _0xbcd7x28['fillRect'](0, 0, _0xbcd7x3f, _0xbcd7x40))
    };
    this['SignaturePen'] = function(_0xbcd7x15) {
        _0xbcd7x3a = this['PenSize'] = _0xbcd7x15
    };
    this['SignatureEnabled'] = function(_0xbcd7x15) {
        _0xbcd7x31 = this['Enabled'] = _0xbcd7x15
    };
    this['SignatureStatusBar'] = function(_0xbcd7x15) {
        _0xbcd7x15 ? $('#' + _0xbcd7x2c['id'])['show']('slow') : $('#' + _0xbcd7x2c['id'])['hide']('slow')
    };
    this['UndoSignature'] = function() {
        if (2 >= _0xbcd7x34['length']) {
            this.ResetClick()
        } else {
            _0xbcd7x34['pop']();
            _0xbcd7x37['pop']();
            _0xbcd7x36['pop']();
            _0xbcd7x38['pop']();
            _0xbcd7x1f();
            var _0xbcd7x15 = '\'' + _0xbcd7x2d['value'] + '\'';
            var _0xbcd7x16 = '',
                _0xbcd7x17 = 0;
            /[^A-Za-z0-9\+\/=]/g ['exec'](_0xbcd7x15);
            _0xbcd7x15 = _0xbcd7x15['replace'](/[^A-Za-z0-9\+\/=]/g, '');
            do {
                var _0xbcd7x19 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['indexOf'](_0xbcd7x15['charAt'](_0xbcd7x17++));
                var _0xbcd7x1a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['indexOf'](_0xbcd7x15['charAt'](_0xbcd7x17++));
                var _0xbcd7x1b = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['indexOf'](_0xbcd7x15['charAt'](_0xbcd7x17++));
                var _0xbcd7x1c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=' ['indexOf'](_0xbcd7x15['charAt'](_0xbcd7x17++));
                _0xbcd7x19 = _0xbcd7x19 << 2 | _0xbcd7x1a >> 4;
                _0xbcd7x1a = (_0xbcd7x1a & 15) << 4 | _0xbcd7x1b >> 2;
                var _0xbcd7x1d = (_0xbcd7x1b & 3) << 6 | _0xbcd7x1c;
                _0xbcd7x16 += String['fromCharCode'](_0xbcd7x19);
                64 != _0xbcd7x1b && (_0xbcd7x16 += String['fromCharCode'](_0xbcd7x1a));
                64 != _0xbcd7x1c && (_0xbcd7x16 += String['fromCharCode'](_0xbcd7x1d))
            } while (_0xbcd7x17 < _0xbcd7x15['length']);;
            _0xbcd7x15 = unescape(_0xbcd7x16);
            this.LoadSignature(_0xbcd7x15, 1)
        }
    };
    this['LoadSignature'] = function(_0xbcd7x15, _0xbcd7x16) {
        this.ResetClick();
        _0xbcd7x15 = _0xbcd7x15['replace']('undefined ', '');
        _0xbcd7x15 = _0xbcd7x15['replace']('undefined', '');
        if (null == _0xbcd7x16 || 'undefined' == _0xbcd7x16) {
            _0xbcd7x16 = '1.0'
        };
        _0xbcd7x16 = parseFloat(_0xbcd7x16);
        _0xbcd7x22(_0xbcd7x2a);
        var _0xbcd7x17 = _0xbcd7x4(_0xbcd7x3(_0xbcd7x15))['split'](';');
        _0xbcd7x34[0] = '';
        for (var _0xbcd7x19 = 0; _0xbcd7x19 < _0xbcd7x17['length'] - 1; _0xbcd7x19++) {
            _0xbcd7x34[_0xbcd7x19] = _0xbcd7x17[_0xbcd7x19] + ';'
        };
        for (_0xbcd7x19 = 0; _0xbcd7x19 < _0xbcd7x17['length'] - 1; _0xbcd7x19++) {
            var _0xbcd7x1a = _0xbcd7x4(_0xbcd7x3(_0xbcd7x17[_0xbcd7x19]))['split'](' ');
            3 == _0xbcd7x1a['length'] && _0xbcd7x1a[2] == _0xbcd7x1a[1] && _0xbcd7x1a['pop']();
            _0xbcd7x38[_0xbcd7x19] = _0xbcd7x1a[0];
            _0xbcd7x37[_0xbcd7x19] = new BezierCurves(_0xbcd7x20(_0xbcd7x1a), 30)
        };
        _0xbcd7x19 = _0xbcd7x17[0]['split'](',');
        _0xbcd7x3c = _0xbcd7x19[1];
        _0xbcd7x3f = _0xbcd7x19[3];
        _0xbcd7x40 = _0xbcd7x19[4];
        _0xbcd7x47 = _0xbcd7x19[5];
        0 == _0xbcd7x44['length'] && this.SignatureBackColor(_0xbcd7x3c);
        _0xbcd7x36[0] = 0;
        _0xbcd7x19 = 1;
        for (_0xbcd7x1a = _0xbcd7x17['length']; _0xbcd7x19 < _0xbcd7x1a - 1; _0xbcd7x19++) {
            var _0xbcd7x1b = _0xbcd7x4(_0xbcd7x3(_0xbcd7x17[_0xbcd7x19]))['split'](' ');
            _0xbcd7x36[_0xbcd7x19] = parseInt(_0xbcd7x1b['length'], 0) - 1;
            _0xbcd7x36[0] = parseInt(_0xbcd7x36[0], 0) + parseInt(_0xbcd7x1b['length'], 0);
            for (var _0xbcd7x1c = 0, _0xbcd7x1d = _0xbcd7x1b['length']; _0xbcd7x1c < _0xbcd7x1d; _0xbcd7x1c++) {
                var _0xbcd7x1e = _0xbcd7x1b[_0xbcd7x1c]['split'](','),
                    _0xbcd7x5b = _0xbcd7x1e[0];
                _0xbcd7x1e = _0xbcd7x1e[1];
                if (0 == _0xbcd7x1c) {
                    this.SignaturePen(_0xbcd7x5b), this.SignatureColor(_0xbcd7x1e), _0xbcd7x28['strokeStyle'] = _0xbcd7x1e, _0xbcd7x28['lineWidth'] = _0xbcd7x5b
                } else {
                    if (1 == _0xbcd7x1c) {
                        _0xbcd7x5b = Math['abs'](parseInt(_0xbcd7x5b, 0) * _0xbcd7x16);
                        _0xbcd7x1e = Math['abs'](parseInt(_0xbcd7x1e, 0) * _0xbcd7x16);
                        if (isIE) {
                            if (isMobileIE) {
                                _0xbcd7x4a = _0xbcd7x5b, _0xbcd7x4b = _0xbcd7x1e
                            } else {
                                var _0xbcd7x5c = '"m' + _0xbcd7x5b + ',' + _0xbcd7x1e + ' l' + _0xbcd7x5b + ',' + _0xbcd7x1e,
                                    _0xbcd7x5d = '<SuperSignature:shape id="' + _0xbcd7x3e + '_l_' + (_0xbcd7x19 - 1) + '" style="position: absolute; left:0px; top:0px; width:' + _0xbcd7x3f + 'px; height: ' + _0xbcd7x40 + 'px;" coordsize="' + _0xbcd7x3f + ',' + _0xbcd7x40 + '"><SuperSignature:path v=' + _0xbcd7x5c + ' e" /><SuperSignature:fill on="false" /><SuperSignature:stroke weight="' + (_0xbcd7x3a + '" color="' + _0xbcd7x3b + '" /></SuperSignature:shape>');
                                _0xbcd7x28['pathCoordString'] = _0xbcd7x5c;
                                _0xbcd7x28['insertAdjacentHTML']('beforeEnd', _0xbcd7x5d)
                            }
                        } else {
                            _0xbcd7x28['beginPath'](), _0xbcd7x28['lineJoin'] = 'round', _0xbcd7x28['lineCap'] = 'round', _0xbcd7x28['moveTo'](_0xbcd7x5b, _0xbcd7x1e)
                        };
                        2 == _0xbcd7x1b['length'] && eval('obj' + _0xbcd7x3e).DrawDot(_0xbcd7x5b, _0xbcd7x1e)
                    } else {
                        if (_0xbcd7x5b = Math['abs'](parseInt(_0xbcd7x5b, 0) * _0xbcd7x16), _0xbcd7x1e = Math['abs'](parseInt(_0xbcd7x1e, 0) * _0xbcd7x16), isIE || _0xbcd7x52) {
                            if (_0xbcd7x28['pathCoordString'] += ' ' + _0xbcd7x5b + ',' + _0xbcd7x1e, _0xbcd7x5b = document['getElementById'](_0xbcd7x3e + '_l_' + (_0xbcd7x19 - 1))) {
                                if (_0xbcd7x5b = _0xbcd7x5b['firstChild']) {
                                    try {
                                        _0xbcd7x5b['setAttribute']('v', _0xbcd7x28['pathCoordString'] + ' e')
                                    } catch (Fa) {}
                                }
                            }
                        } else {
                            _0xbcd7x28['strokeStyle'] = _0xbcd7x3b, _0xbcd7x28['lineWidth'] = _0xbcd7x3a, _0xbcd7x28['lineTo'](_0xbcd7x5b, _0xbcd7x1e), _0xbcd7x28['stroke'](), _0xbcd7x28['moveTo'](_0xbcd7x5b, _0xbcd7x1e)
                        }
                    }
                };
                isIE ? _0xbcd7x28['innerHTML'] = _0xbcd7x28['innerHTML'] : (_0xbcd7x28['closePath'](), _0xbcd7x28['restore']())
            };
            _0xbcd7x26++
        };
        !isIE && _0xbcd7x52 && _0xbcd7x21(_0xbcd7x16);
        _0xbcd7x1f()
    };
    this['TextSignature'] = function(_0xbcd7x15, _0xbcd7x16, _0xbcd7x17, _0xbcd7x19) {
        _0xbcd7x55 && (_0xbcd7x28['font'] = _0xbcd7x15, _0xbcd7x28['fillText'](_0xbcd7x16, _0xbcd7x17, _0xbcd7x19))
    };
    this['CheckCompatibility'] = function() {
        if (isIE) {
            this['IsCompatible'] = !0, isMobileIE || document['namespaces']['SuperSignature'] || document['namespaces']['add']('SuperSignature', 'urn:schemas-microsoft-com:vml', '#default#VML')
        } else {
            try {
                _0xbcd7x55 = !!document['createElement']('canvas')['getContext']('2d')
            } catch (a) {
                _0xbcd7x55 = !!document['createElement']('canvas')['getContext']
            };
            _0xbcd7x55 ? this['IsCompatible'] = !0 : document['write']('Your browser does not support our signature control.')
        }
    };
    this['MouseMove'] = function(_0xbcd7x15) {
        if (_0xbcd7x31 && _0xbcd7x32) {
            'undefined' !== typeof _0xbcd7x15['originalEvent'] && (_0xbcd7x15 = _0xbcd7x15['originalEvent']);
            _0xbcd7x24(_0xbcd7x15);
            var _0xbcd7x16 = $('#' + _0xbcd7x2a['id'])['offset']();
            if (_0xbcd7x27 && 'undefined' !== typeof _0xbcd7x15['targetTouches']) {
                var _0xbcd7x17 = _0xbcd7x15['targetTouches'][0];
                var _0xbcd7x19 = _0xbcd7x17['clientX'] - _0xbcd7x4c;
                _0xbcd7x17 = _0xbcd7x17['clientY'] - _0xbcd7x4d;
                _0xbcd7x4e && (_0xbcd7x17 -= parseInt($(document)['scrollTop']()), _0xbcd7x19 -= parseInt($(document)['scrollLeft']()))
            } else {
                _0xbcd7x15['originalEvent'] ? _0xbcd7x15['pageX'] ? (_0xbcd7x19 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x16['left']), _0xbcd7x17 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x16['top'])) : (_0xbcd7x19 = parseInt(_0xbcd7x15['originalEvent']['pageX'] - _0xbcd7x16['left']), _0xbcd7x17 = parseInt(_0xbcd7x15['originalEvent']['pageY'] - _0xbcd7x16['top'])) : isIE || isIENine ? (_0xbcd7x19 = parseInt(_0xbcd7x15['x']), _0xbcd7x17 = parseInt(_0xbcd7x15['y']), 9 <= iever && (_0xbcd7x19 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x16['left']), _0xbcd7x17 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x16['top']))) : (_0xbcd7x19 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x16['left']), _0xbcd7x17 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x16['top']))
            };
            _0xbcd7x57 && _0xbcd7x58 && (_0xbcd7x19 = parseInt(_0xbcd7x15['offsetX'] || _0xbcd7x15['layerX']), _0xbcd7x17 = parseInt(_0xbcd7x15['offsetY'] || _0xbcd7x15['layerY']));
            (_0xbcd7x54 || _0xbcd7x56) && -1 == _0xbcd7x15['type']['indexOf']('touch') && (_0xbcd7x19 = _0xbcd7x15['clientX'] - _0xbcd7x29['getBoundingClientRect']()['left'], _0xbcd7x17 = _0xbcd7x15['clientY'] - _0xbcd7x29['getBoundingClientRect']()['top']);
            isMobileIE ? _0xbcd7x35['push'](Math['abs'](parseInt(_0xbcd7x19) - parseInt(_0xbcd7x2a['offsetLeft'])) + ',' + Math['abs'](parseInt(_0xbcd7x17) - parseInt(_0xbcd7x2a['offsetTop']))) : _0xbcd7x35['push'](Math['abs'](parseInt(_0xbcd7x19)) + ',' + Math['abs'](parseInt(_0xbcd7x17)));
            _0xbcd7x36[_0xbcd7x26]++;
            if (isIE) {
                if (isMobileIE) {
                    if (_0xbcd7x15 = _0xbcd7x19 - _0xbcd7x4a, _0xbcd7x16 = _0xbcd7x17 - _0xbcd7x4b, 64 < _0xbcd7x15 * _0xbcd7x15 + _0xbcd7x16 * _0xbcd7x16) {
                        if (null != _0xbcd7x5a && 'undefined' != _0xbcd7x5a) {
                            try {
                                _0xbcd7x5a['setStroke'](_0xbcd7x3a), _0xbcd7x5a['setColor'](_0xbcd7x3b), _0xbcd7x5a['drawLine'](_0xbcd7x4a, _0xbcd7x4b, _0xbcd7x19, _0xbcd7x17), _0xbcd7x5a['paint']()
                            } catch (f) {
                                _0xbcd7x5('Drawing error: ' + f['description'])
                            }
                        } else {
                            _0xbcd7x5('Graphics object NULL')
                        };
                        _0xbcd7x4a = _0xbcd7x19;
                        _0xbcd7x4b = _0xbcd7x17
                    }
                } else {
                    if (_0xbcd7x28['pathCoordString'] += ' ' + _0xbcd7x19 + ',' + _0xbcd7x17, _0xbcd7x19 = document['getElementById'](_0xbcd7x3e + '_l_' + _0xbcd7x26)) {
                        if (_0xbcd7x19 = _0xbcd7x19['firstChild']) {
                            try {
                                _0xbcd7x19['setAttribute']('v', _0xbcd7x28['pathCoordString'] + ' e')
                            } catch (f) {};
                            _0xbcd7x39 && 0 == _0xbcd7x36[_0xbcd7x26] % 8 && (_0xbcd7x28['innerHTML'] = _0xbcd7x28['innerHTML'])
                        }
                    }
                }
            } else {
                _0xbcd7x28['lineTo'](_0xbcd7x19, _0xbcd7x17), _0xbcd7x28['stroke']()
            }
        }
    };
    this['DrawDot'] = function(_0xbcd7x15, _0xbcd7x16) {
        _0xbcd7x36[_0xbcd7x26]++;
        isIE ? _0xbcd7x28['insertAdjacentHTML']('beforeEnd', '<SuperSignature:oval id="' + _0xbcd7x3e + '_l_' + _0xbcd7x26 + '" style="position: absolute; left:' + _0xbcd7x15 + 'px; top:' + _0xbcd7x16 + 'px; width:' + _0xbcd7x3a + 'px; height: ' + _0xbcd7x3a + 'px;""><SuperSignature:stroke weight="' + (_0xbcd7x3a + '" color="' + _0xbcd7x3b + '" /></SuperSignature:oval>')) : (_0xbcd7x28['arc'](_0xbcd7x15, _0xbcd7x16, _0xbcd7x3a / 2, 0, 2 * Math['PI'], !1), _0xbcd7x28['fill'](), _0xbcd7x28['stroke']())
    };
    this['MouseOut'] = function(_0xbcd7x15) {
        _0xbcd7x31 && (_0xbcd7x24(_0xbcd7x15), _0xbcd7x5('Mouse out'), _0xbcd7x33 || _0xbcd7x23())
    };
    this['MouseUp'] = function(_0xbcd7x15) {
        if (_0xbcd7x31) {
            'undefined' !== typeof _0xbcd7x15['originalEvent'] && (_0xbcd7x15 = _0xbcd7x15['originalEvent']);
            _0xbcd7x24(_0xbcd7x15);
            _0xbcd7x5('Mouse up');
            if (null != _0xbcd7x4f) {
                var _0xbcd7x16 = parseInt(new Date - _0xbcd7x4f);
                if (125 > _0xbcd7x16) {
                    _0xbcd7x5('Time diff ' + _0xbcd7x16);
                    if (_0xbcd7x27) {
                        _0xbcd7x16 = _0xbcd7x50, _0xbcd7x15 = _0xbcd7x51
                    } else {
                        var _0xbcd7x17 = $('#' + _0xbcd7x2a['id'])['offset']();
                        _0xbcd7x15['originalEvent'] ? _0xbcd7x15['pageX'] ? (_0xbcd7x16 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x17['left']), _0xbcd7x15 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x17['top'])) : (_0xbcd7x16 = parseInt(_0xbcd7x15['originalEvent']['pageX'] - _0xbcd7x17['left']), _0xbcd7x15 = parseInt(_0xbcd7x15['originalEvent']['pageY'] - _0xbcd7x17['top'])) : isIE || isIENine ? (_0xbcd7x16 = parseInt(_0xbcd7x15['x']), _0xbcd7x15 = parseInt(_0xbcd7x15['y'])) : (_0xbcd7x16 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x17['left']), _0xbcd7x15 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x17['top']))
                    };
                    isIE && (_0xbcd7x5('Drawing Dot At (' + _0xbcd7x16 + ',' + _0xbcd7x15 + ')'), eval('obj' + _0xbcd7x3e).DrawDot(_0xbcd7x16, _0xbcd7x15))
                };
                _0xbcd7x4f = null
            };
            _0xbcd7x33 || _0xbcd7x23()
        }
    };
    this['MouseDown'] = function(_0xbcd7x15) {
        if (_0xbcd7x31) {
            'undefined' !== typeof _0xbcd7x15['originalEvent'] && (_0xbcd7x15 = _0xbcd7x15['originalEvent']);
            _0xbcd7x24(_0xbcd7x15);
            _0xbcd7x4f = new Date;
            _0xbcd7x32 = !0;
            _0xbcd7x33 = !1;
            if (_0xbcd7x27 && 'undefined' !== typeof _0xbcd7x15['targetTouches']) {
                var _0xbcd7x16 = _0xbcd7x15['targetTouches'][0];
                _0xbcd7x4c = _0xbcd7x29['getBoundingClientRect']()['left'];
                _0xbcd7x4d = _0xbcd7x29['getBoundingClientRect']()['top'];
                var _0xbcd7x17 = _0xbcd7x16['clientX'] - _0xbcd7x4c;
                _0xbcd7x16 = _0xbcd7x16['clientY'] - _0xbcd7x4d;
                _0xbcd7x4e && (_0xbcd7x16 -= parseInt($(document)['scrollTop']()), _0xbcd7x17 -= parseInt($(document)['scrollLeft']()));
                _0xbcd7x50 = _0xbcd7x17;
                _0xbcd7x51 = _0xbcd7x16
            } else {
                var _0xbcd7x19 = $('#' + _0xbcd7x2a['id'])['offset']();
                _0xbcd7x15['originalEvent'] ? _0xbcd7x15['pageX'] ? (_0xbcd7x17 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x19['left']), _0xbcd7x16 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x19['top'])) : (_0xbcd7x17 = parseInt(_0xbcd7x15['originalEvent']['pageX'] - _0xbcd7x19['left']), _0xbcd7x16 = parseInt(_0xbcd7x15['originalEvent']['pageY'] - _0xbcd7x19['top'])) : isIE || isIENine ? 9 > iever ? (_0xbcd7x17 = parseInt(_0xbcd7x15['x']), _0xbcd7x16 = parseInt(_0xbcd7x15['y'])) : isIENine && (_0xbcd7x17 = parseInt(_0xbcd7x15['pageX']) - parseInt(_0xbcd7x19['left']) + parseInt($('html')['css']('margin-left')), _0xbcd7x16 = parseInt(_0xbcd7x15['pageY']) - parseInt(_0xbcd7x19['top']) + parseInt($('html')['css']('margin-top')), 10 <= iever && (_0xbcd7x17 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x19['left']), _0xbcd7x16 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x19['top']))) : (_0xbcd7x17 = parseInt(_0xbcd7x15['pageX'] - _0xbcd7x19['left']), _0xbcd7x16 = parseInt(_0xbcd7x15['pageY'] - _0xbcd7x19['top']))
            };
            _0xbcd7x57 && _0xbcd7x58 && (_0xbcd7x17 = parseInt(_0xbcd7x15['offsetX'] || _0xbcd7x15['layerX']), _0xbcd7x16 = parseInt(_0xbcd7x15['offsetY'] || _0xbcd7x15['layerY']));
            (_0xbcd7x54 || _0xbcd7x56) && -1 == _0xbcd7x15['type']['indexOf']('touch') && (_0xbcd7x17 = _0xbcd7x15['clientX'] - _0xbcd7x29['getBoundingClientRect']()['left'], _0xbcd7x16 = _0xbcd7x15['clientY'] - _0xbcd7x29['getBoundingClientRect']()['top']);
            _0xbcd7x5('Down (' + _0xbcd7x17 + ',' + _0xbcd7x16 + ')');
            _0xbcd7x26++;
            _0xbcd7x36[_0xbcd7x26] = 0;
            _0xbcd7x35['length'] = 0;
            _0xbcd7x35[0] = _0xbcd7x3a + ',' + _0xbcd7x3b;
            isMobileIE ? _0xbcd7x35['push'](Math['abs'](parseInt(_0xbcd7x17) - parseInt(_0xbcd7x2a['offsetLeft'])) + ',' + Math['abs'](parseInt(_0xbcd7x16) - parseInt(_0xbcd7x2a['offsetTop']))) : _0xbcd7x35['push'](Math['abs'](parseInt(_0xbcd7x17)) + ',' + Math['abs'](parseInt(_0xbcd7x16)));
            isIE ? isMobileIE ? (_0xbcd7x4a = _0xbcd7x17, _0xbcd7x4b = _0xbcd7x16) : (_0xbcd7x15 = '"m' + _0xbcd7x17 + ',' + _0xbcd7x16 + ' l' + _0xbcd7x17 + ',' + _0xbcd7x16, _0xbcd7x17 = '<SuperSignature:shape id="' + _0xbcd7x3e + '_l_' + _0xbcd7x26 + '" style="position: absolute; left:0px; top:0px; width:' + _0xbcd7x3f + 'px; height: ' + _0xbcd7x40 + 'px;" coordsize="' + _0xbcd7x3f + ',' + _0xbcd7x40 + '"><SuperSignature:path v=' + _0xbcd7x15 + ' e" /><SuperSignature:fill on="false" /><SuperSignature:stroke weight="' + (_0xbcd7x3a + '" color="' + _0xbcd7x3b + '" /></SuperSignature:shape>'), _0xbcd7x28['pathCoordString'] = _0xbcd7x15, _0xbcd7x28['insertAdjacentHTML']('beforeEnd', _0xbcd7x17)) : (_0xbcd7x28['save'](), _0xbcd7x28['beginPath'](), _0xbcd7x28['lineJoin'] = 'round', _0xbcd7x28['lineCap'] = 'round', _0xbcd7x28['strokeStyle'] = _0xbcd7x3b, _0xbcd7x28['lineWidth'] = _0xbcd7x3a, _0xbcd7x28['moveTo'](_0xbcd7x17, _0xbcd7x16));
            return !1
        }
    };
    this['ResetClick'] = function(_0xbcd7x15) {
        _0xbcd7x31 && (isMobileIE || (document['getElementById'](_0xbcd7x3e)['style']['borderColor'] = _0xbcd7x3d), isIE ? (_0xbcd7x28['innerHTML'] = '', isMobileIE && (_0xbcd7x4b = _0xbcd7x4a = 0, null != _0xbcd7x5a && 'undefined' != _0xbcd7x5a && (_0xbcd7x5a['clear'](), _0xbcd7x5a['paint']())), 0 < _0xbcd7x44['length'] && (_0xbcd7x28['style']['backgroundImage'] = 'url("' + _0xbcd7x44 + '")')) : (_0xbcd7x28['clearRect'](0, 0, _0xbcd7x3f, _0xbcd7x40), 0 < _0xbcd7x44['length'] ? isIE ? _0xbcd7x28['style']['backgroundImage'] = 'url("' + _0xbcd7x44 + '")' : (_0xbcd7x15 = new Image, $(_0xbcd7x15)['bind']('load', function() {
            _0xbcd7x28['drawImage'](this, 0, 0)
        }), _0xbcd7x15['src'] = _0xbcd7x44) : SignatureBackColor(_0xbcd7x3e, _0xbcd7x3c)), _0xbcd7x34 = [], _0xbcd7x35 = [], _0xbcd7x36 = [], _0xbcd7x37 = [], _0xbcd7x38 = [], _0xbcd7x1f(), _0xbcd7x26 = 0, _0xbcd7x2b['innerHTML'] = _0xbcd7x41)
    };
    this['Init'] = function() {
        if (this['Visible']) {
            if (this.CheckCompatibility(), this['IsCompatible']) {
                if (_0xbcd7x55) {
                    if ('DIV' == document['getElementById'](this.SignObject)['nodeName']['toUpperCase']()) {
                        var _0xbcd7x15 = '<canvas ID=\'' + this['SignObject'] + '\' width=\'' + _0xbcd7x3f + '\' height=\'' + _0xbcd7x40 + '\' style=\'left:0px;top:0px;position:absolute;\'></canvas>';
                        $('#' + this['SignObject'])['replaceWith'](_0xbcd7x15);
                        _0xbcd7x5('DIV changed to CANVAS');
                        isIE = !1
                    }
                } else {
                    'CANVAS' == document['getElementById'](this.SignObject)['nodeName']['toUpperCase']() && (_0xbcd7x15 = '<div ID=\'' + this['SignObject'] + '\' style=\'width:' + _0xbcd7x3f + 'px;height:' + _0xbcd7x40 + 'px;left:0px;top:0px;\'></div>', $('#' + this['SignObject'])['replaceWith'](_0xbcd7x15), _0xbcd7x5('CANVAS changed to DIV'), isIE = !0)
                };
                _0xbcd7x30 = document['getElementById'](this['SignObject'] + '_Debug');
                _0xbcd7x28 = document['getElementById'](this.SignObject);
                _0xbcd7x2a = document['getElementById'](this['SignObject'] + '_Container');
                if (_0xbcd7x28['addEventListener']) {
                    _0xbcd7x5('addEventListener supported')
                } else {
                    if (_0xbcd7x28['attachEvent']) {
                        _0xbcd7x5('attachEvent supported')
                    } else {
                        _0xbcd7x5('Mouse events are not supported');
                        return
                    }
                };
                this['mouseMoved'] = !1;
                if (null != _0xbcd7x28 && 'undefined' != _0xbcd7x28) {
                    _0xbcd7x5('Objects OK');
                    isIE && !isMobileIE && (_0xbcd7x39 = document['documentMode'] ? 8 <= document['documentMode'] : !1);
                    isMobileIE && _0xbcd7x5('Mobile IE');
                    isIENine && _0xbcd7x5('IE 9 Or Above');
                    isOperaMini && _0xbcd7x5('Opera Mini, not supported.');
                    _0xbcd7x36[0] = 0;
                    _0xbcd7x34[0] = '1,' + _0xbcd7x3c + ',' + _0xbcd7x46 + ',' + _0xbcd7x3f + ',' + _0xbcd7x40 + ',' + _0xbcd7x47 + ',' + _0xbcd7x36[0] + ',' + _0xbcd7x3e + ';';
                    if (this['ApplyStyle']) {
                        _0xbcd7x5('Setting up style');
                        _0xbcd7x2a['style']['zIndex'] = this['SignzIndex'];
                        try {
                            isMobileIE ? (_0xbcd7x2a['style']['borderWidth'] = this['BorderWidth'], _0xbcd7x2a['style']['borderStyle'] = this['BorderStyle'], _0xbcd7x2a['style']['borderColor'] = this['BorderColor'], _0xbcd7x2a['style']['backgroundColor'] = this['BackColor'], 0 < this['PenCursor']['length'] && (_0xbcd7x2a['style']['cursor'] = 'url(\'' + this['PenCursor'] + '\'), pointer'), 0 < this['BackImageUrl']['length'] && (_0xbcd7x2a['style']['backgroundImage'] = 'url("' + this['BackImageUrl'] + '")')) : (_0xbcd7x28['style']['borderWidth'] = this['BorderWidth'], _0xbcd7x28['style']['borderStyle'] = this['BorderStyle'], _0xbcd7x28['style']['borderColor'] = this['BorderColor'], _0xbcd7x28['style']['backgroundColor'] = this['BackColor'], 0 < this['PenCursor']['length'] && (_0xbcd7x28['style']['cursor'] = 'url(\'' + this['PenCursor'] + '\'), pointer'), 0 < this['BackImageUrl']['length'] && (_0xbcd7x28['style']['backgroundImage'] = 'url("' + this['BackImageUrl'] + '")'), '' != this['CssClass'] && (_0xbcd7x28['className'] = this['CssClass']), _0xbcd7x28['style']['width'] = this['SignWidth'] + 'px', _0xbcd7x28['style']['height'] = this['SignHeight'] + 'px', 'auto' == _0xbcd7x28['style']['cursor'] && (_0xbcd7x28['style']['cursor'] = 'url(\'' + this['PenCursor'] + '\'), hand')), _0xbcd7x5('Style OK')
                        } catch (r) {
                            _0xbcd7x5('Style Error : ' + r['description'])
                        }
                    };
                    _0xbcd7x15 = '<div id="' + this['SignObject'] + '_toolbar" style="margin:5px;position:relative;height:20px;width:' + this['SignWidth'] + 'px;background-color:' + this['SignToolbarBgColor'] + ';"><img  id="' + this['SignObject'] + '_resetbutton" src="' + this['ClearImage'] + '" style="cursor:pointer;float:right;height:24px;width:24px;border:0px solid transparent" alt="Clear Signature" />';
                    _0xbcd7x15 += '<div id="' + this['SignObject'] + '_status" style="color:blue;height:20px;width:auto;padding:2px;font-family:verdana;font-size:12px;float:left;margin-right:30px;">' + this['StartMessage'] + '</div>';
                    _0xbcd7x15 += null == document['getElementById'](this['SignObject'] + '_data') ? '<input type="hidden" id="' + this['SignObject'] + '_data" name="' + this['SignObject'] + '_data" value="">' : '';
                    _0xbcd7x15 += null == document['getElementById'](this['SignObject'] + '_data_smooth') ? '<input type="hidden" id="' + this['SignObject'] + '_data_smooth" name="' + this['SignObject'] + '_data_smooth" value="">' : '';
                    _0xbcd7x15 += null == document['getElementById'](this['SignObject'] + '_data_canvas') ? '<input type="hidden" id="' + this['SignObject'] + '_data_canvas" name="' + this['SignObject'] + '_data_canvas" value="">' : '';
                    _0xbcd7x15 += '</div>';
                    _0xbcd7x5('Setting up tools');
                    $('#' + _0xbcd7x2a['id'])['after'](_0xbcd7x15);
                    _0xbcd7x26 = 0;
                    _0xbcd7x15 = 'mousedown';
                    var _0xbcd7x16 = 'mouseup',
                        _0xbcd7x17 = 'mousemove',
                        _0xbcd7x19 = 'mouseout';
                    isIE && (_0xbcd7x19 = 'mouseleave');
                    isAndroid = -1 < navigator['userAgent']['toLowerCase']()['indexOf']('android');
                    !0 === isAndroid && _0xbcd7x5('Android device');
                    window['PointerEvent'] && !isAndroid ? (_0xbcd7x5('Pointer events supported'), isPointer = !0, _0xbcd7x15 = 'pointerdown', _0xbcd7x16 = 'pointerup', _0xbcd7x17 = 'pointermove', _0xbcd7x19 = 'pointerleave') : _0xbcd7x5('NO Pointer events supported');
                    _0xbcd7x27 = /iPhone/i ['test'](navigator['userAgent']) || /iPad/i ['test'](navigator['userAgent']) || /Android/i ['test'](navigator['userAgent']) || /playbook/i ['test'](navigator['userAgent']) || /symbian/i ['test'](navigator['userAgent']);
                    _0xbcd7x27 || isIE || (_0xbcd7x27 = 'ontouchstart' in window || 0 < navigator['maxTouchPoints'] || 0 < navigator['msMaxTouchPoints'], _0xbcd7x5('Touch check ' + _0xbcd7x27));
                    isIETablet && _0xbcd7x5('Found Tablet 2.0 or Windows Phone or Touch Screen Device');
                    winTabletPointerEvt ? (_0xbcd7x5('MSPointer supported'), _0xbcd7x15 = 'MSPointerDown', _0xbcd7x16 = 'MSPointerUp', _0xbcd7x17 = 'MSPointerMove', _0xbcd7x19 = 'MSPointerOut') : _0xbcd7x5('MSPointer NOT supported');
                    'undefined' != typeof _0xbcd7x28['style']['msTouchAction'] && (_0xbcd7x28['style']['msTouchAction'] = 'none', $('#' + _0xbcd7x28['id'])['css']('-ms-touch-action', 'none'), _0xbcd7x5('MS Touch CSS added'));
                    'undefined' != typeof _0xbcd7x2a['style']['msTouchAction'] && (_0xbcd7x2a['style']['msTouchAction'] = 'none', $('#' + _0xbcd7x2a['id'])['css']('-ms-touch-action', 'none'));
                    isIE || (_0xbcd7x29 = document['getElementById'](this.SignObject), _0xbcd7x28 = document['getElementById'](this.SignObject)['getContext']('2d'), _0xbcd7x28['width'] = this['SignWidth'], _0xbcd7x28['height'] = this['SignHeight']);
                    _0xbcd7x2b = document['getElementById'](this['SignObject'] + '_status');
                    _0xbcd7x2b['innerHTML'] = _0xbcd7x41;
                    _0xbcd7x2c = document['getElementById'](this['SignObject'] + '_toolbar');
                    _0xbcd7x2d = document['getElementById'](this['SignObject'] + '_data');
                    _0xbcd7x2e = document['getElementById'](this['SignObject'] + '_data_smooth');
                    _0xbcd7x2f = document['getElementById'](this['SignObject'] + '_data_canvas');
                    var _0xbcd7x1a = document['getElementById'](this['SignObject'] + '_resetbutton');
                    null != _0xbcd7x1a && this.XBrowserAddHandler(_0xbcd7x1a, 'click', this.ResetClick);
                    _0xbcd7x5('Attaching events');
                    _0xbcd7x57 = /Tablet PC 2.0/i ['test'](navigator['userAgent']);
                    _0xbcd7x58 = /rv:11.0/i ['test'](navigator['userAgent']);
                    _0xbcd7x59 = /Edge/i ['test'](navigator['userAgent']);
                    _0xbcd7x57 && _0xbcd7x58 && _0xbcd7x5('IE Surface Fix');
                    _0xbcd7x1a = /Windows NT/i ['test'](navigator['userAgent']);
                    var _0xbcd7x1b = /Chrome/i ['test'](navigator['userAgent']);
                    _0xbcd7x54 = _0xbcd7x1a && _0xbcd7x1b;
                    _0xbcd7x59 && (_0xbcd7x54 = !1, _0xbcd7x56 = !0);
                    _0xbcd7x1a && _0xbcd7x57 && _0xbcd7x58 && (_0xbcd7x56 = !0);
                    _0xbcd7x54 && (_0xbcd7x5('Chrome Surface Fix'), this['IeModalFix'] = !1);
                    _0xbcd7x56 && (_0xbcd7x5('EDGE Surface Fix'), this['IeModalFix'] = !1);
                    this.XBrowserAddHandler(_0xbcd7x28, 'contextmenu', this.ReturnFalse);
                    this.XBrowserAddHandler(_0xbcd7x2a, 'contextmenu', this.ReturnFalse);
                    this.XBrowserAddHandler(_0xbcd7x2a, 'contextmenu', this.ReturnFalse);
                    this.XBrowserAddHandler(_0xbcd7x2a, 'selectstart', this.ReturnFalse);
                    this.XBrowserAddHandler(_0xbcd7x2a, 'dragstart', this.ReturnFalse);
                    this.XBrowserAddHandler(_0xbcd7x28, 'contextmenu', this.ReturnFalse);
                    this.XBrowserAddHandler(_0xbcd7x28, 'selectstart', this.ReturnFalse);
                    this.XBrowserAddHandler(_0xbcd7x28, 'dragstart', this.ReturnFalse);
                    _0xbcd7x4e = this['IeModalFix'];
                    _0xbcd7x5('IeModalFix ' + this['IeModalFix']);
                    !this['IeModalFix'] || _0xbcd7x27 || isIETablet ? (isIE && !isMobileIE ? (this.XBrowserAddHandler(_0xbcd7x28, _0xbcd7x15, this.MouseDown), this.XBrowserAddHandler(_0xbcd7x28, _0xbcd7x16, this.MouseUp), this.XBrowserAddHandler(_0xbcd7x28, _0xbcd7x17, this.MouseMove)) : (this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x15, this.MouseDown), this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x16, this.MouseUp), this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x17, this.MouseMove), this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x19, this.MouseOut)), this.XBrowserAddHandler(_0xbcd7x28, _0xbcd7x19, this.MouseOut)) : (this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x15, this.MouseDown), this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x16, this.MouseUp), this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x17, this.MouseMove), this.XBrowserAddHandler(_0xbcd7x2a, _0xbcd7x19, this.MouseOut), _0xbcd7x5('ModalFix event attached'));
                    _0xbcd7x27 && (_0xbcd7x5('Found iPhone, iPad, Android or Touch Screen Device'), this.XBrowserAddHandler(_0xbcd7x2a, 'touchstart', this.MouseDown), this.XBrowserAddHandler(_0xbcd7x2a, 'touchend', this.MouseUp), this.XBrowserAddHandler(_0xbcd7x2a, 'touchmove', this.MouseMove));
                    _0xbcd7x53 && (_0xbcd7x5('Attaching jQuery Events'), $(_0xbcd7x2a)['bind'](_0xbcd7x15, this.MouseDown), $(_0xbcd7x2a)['bind'](_0xbcd7x16, this.MouseUp), $(_0xbcd7x2a)['bind'](_0xbcd7x17, this.MouseMove), _0xbcd7x27 || $(_0xbcd7x2a)['bind'](_0xbcd7x19, this.MouseOut));
                    _0xbcd7x5('isIE ' + isIE);
                    _0xbcd7x5('isIE 9+ ' + isIENine);
                    (isIE || isIENine || isIETablet) && _0xbcd7x5('IE Ver - ' + iever);
                    supports_canvas() && _0xbcd7x5('Canvas - Yes');
                    _0xbcd7x31 || _0xbcd7x5('Control is disabled');
                    _0xbcd7x5('Ready')
                } else {
                    _0xbcd7x5('Error initializing signature control')
                }
            }
        } else {
            _0xbcd7x5('Control hidden')
        }
    }
}
BezierCurves = function(a, t) {
    if (a.length < 2) {
        return a[0]
    }
    var b, tmpSmooth;
    this.points = [];
    for (var i = 0; i < a.length; i++) {
        b = new Smooth(a[i].x, a[i].y);
        b.CheckValid(tmpSmooth) || this.points.push(b), tmpSmooth = b;
        this.offSet = 0;
        this.error = t;
        this.result = [];
        this.result.push({
            x: a[0].x,
            y: a[0].y + this.offSet
        })
    }
    if (this.points.length == 1) {
        return a[0]
    }
    return this.fit()
};
BezierCurves.prototype = {
    fit: function() {
        this.processFitPoints(0, this.points.length - 1, this.points[1].MathFunc2(this.points[0]).nOR(), this.points[this.points.length - 2].MathFunc2(this.points[this.points.length - 1]).nOR());
        return this.result
    },
    processFitPoints: function(n, t, i, r) {
        var e, c, u, l, o, f;
        if (t - n == 1) {
            var s = this.points[n],
                h = this.points[t],
                a = s.MathFunc6(h) / 3;
            this.savePoints([s, s.MathFunc1(i.nOR(a)), h.MathFunc1(r.nOR(a)), h]);
            return
        }
        for (e = this.cLP(n, t), c = Math.max(this.error, this.error * this.error), l = 0; l <= 4; l++) {
            if (o = this.gB(n, t, e, i, r), f = this.fM(n, t, o, e), f.error < this.error) {
                this.savePoints(o);
                return
            }
            if (u = f.index, f.error >= c) break;
            this.rP(n, t, e, o), c = f.error
        }
        var y = this.points[u - 1].MathFunc2(this.points[u]),
            p = this.points[u].MathFunc2(this.points[u + 1]),
            v = y.MathFunc1(p).MathFunc4(2).nOR();
        this.processFitPoints(n, u, i, v), this.processFitPoints(u, t, v.MathFunc5(), r)
    },
    savePoints: function(n) {
        this.result.push({
            x: this.r2(n[1].x),
            y: this.r2(n[1].y + this.offSet)
        }), this.result.push({
            x: this.r2(n[2].x),
            y: this.r2(n[2].y + this.offSet)
        }), this.result.push({
            x: this.r2(n[3].x),
            y: this.r2(n[3].y + this.offSet)
        })
    },
    r2: function(n) {
        return Math.round(n * 100) / 100
    },
    gB: function(n, t, i, r, u) {
        for (var s = 1e-11, v = this.points[n], y = this.points[t], f = [
                [0, 0],
                [0, 0]
            ], e = [0, 0], b, a, o, ut, ft, k, et, d, c = 0, g = t - n + 1; c < g; c++) {
            var h = i[c],
                l = 1 - h,
                nt = 3 * h * l,
                ot = l * l * l,
                tt = nt * l,
                it = nt * h,
                st = h * h * h,
                p = r.nOR(tt),
                w = u.nOR(it),
                rt = this.points[n + c].MathFunc2(v.MathFunc3(ot + tt)).MathFunc2(y.MathFunc3(it + st));
            f[0][0] += p.dot(p), f[0][1] += p.dot(w), f[1][0] = f[0][1], f[1][1] += w.dot(w), e[0] += p.dot(rt), e[1] += w.dot(rt)
        }
        return b = f[0][0] * f[1][1] - f[1][0] * f[0][1], Math.abs(b) > s ? (ut = f[0][0] * e[1] - f[1][0] * e[0], ft = e[0] * f[1][1] - e[1] * f[0][1], a = ft / b, o = ut / b) : (k = f[0][0] + f[0][1], et = f[1][0] + f[1][1], a = Math.abs(k) > s ? o = e[0] / k : Math.abs(k) > s ? o = e[1] / et : o = 0), d = y.MathFunc6(v), s *= d, (a < s || o < s) && (a = o = d / 3), [v, v.MathFunc1(r.nOR(a)), y.MathFunc1(u.nOR(o)), y]
    },
    rP: function(n, t, i, r) {
        for (var u = n; u <= t; u++) i[u - n] = this.fR(r, this.points[u], i[u - n])
    },
    fR: function(n, t, i) {
        for (var u = [], e = [], r = 0; r <= 2; r++) u[r] = n[r + 1].MathFunc2(n[r]).MathFunc3(3);
        for (r = 0; r <= 1; r++) e[r] = u[r + 1].MathFunc2(u[r]).MathFunc3(2);
        var h = this.eV(3, n, i),
            f = this.eV(2, u, i),
            c = this.eV(1, e, i),
            o = h.MathFunc2(t),
            s = f.dot(f) + o.dot(c);
        return Math.abs(s) < 1e-5 ? i : i - o.dot(f) / s
    },
    eV: function(n, t, i) {
        for (var u = t.slice(), r, f = 1; f <= n; f++)
            for (r = 0; r <= n - f; r++) u[r] = u[r].MathFunc3(1 - i).MathFunc1(u[r + 1].MathFunc3(i));
        return u[0]
    },
    cLP: function(n, t) {
        for (var r = [0], u, i = n + 1; i <= t; i++) r[i - n] = r[i - n - 1] + this.points[i].MathFunc6(this.points[i - 1]);
        for (i = 1, u = t - n; i <= u; i++) r[i] /= r[u];
        return r
    },
    fM: function(n, t, i, r) {
        for (var o = Math.floor((t - n + 1) / 2), e = 0, u = n + 1; u < t; u++) {
            var h = this.eV(3, i, r[u - n]),
                f = h.MathFunc2(this.points[u]),
                s = f.x * f.x + f.y * f.y;
            s >= e && (e = s, o = u)
        }
        return {
            error: e,
            index: o
        }
    }
};
Smooth = function(a, b) {
    this.x = a;
    this.y = b
};
Smooth.prototype = {
    CheckPtArray: function(a) {
        return typeof a == "number" ? {
            x: a,
            y: a
        } : a
    },
    MathFunc1: function(a) {
        a = this.CheckPtArray(a);
        return SmoothRet(this.x + a.x, this.y + a.y)
    },
    MathFunc2: function(a) {
        a = this.CheckPtArray(a);
        return SmoothRet(this.x - a.x, this.y - a.y)
    },
    MathFunc3: function(a) {
        a = this.CheckPtArray(a);
        return SmoothRet(this.x * a.x, this.y * a.y)
    },
    MathFunc4: function(a) {
        a = this.CheckPtArray(a);
        return SmoothRet(this.x / a.x, this.y / a.y)
    },
    MathFunc5: function() {
        return SmoothRet(-this.x, -this.y)
    },
    MathFunc6: function(a, t) {
        var i = a.x - this.x,
            r = a.y - this.y,
            u = i * i + r * r;
        return t ? u : Math.sqrt(u)
    },
    getLength: function() {
        var n = this.x * this.x + this.y * this.y;
        return arguments[0] ? n : Math.sqrt(n)
    },
    nOR: function(n) {
        if (n === undefined) {
            n = 1
        }
        var t = this.getLength(),
            i = t != 0 ? n / t : 0;
        return SmoothRet(this.x * i, this.y * i)
    },
    CheckValid: function(a) {
        return a == null ? false : this.x == a.x && this.y == a.y
    },
    dot: function(n) {
        return this.x * n.x + this.y * n.y
    }
};
var SmoothRet = function(a, b) {
    return new Smooth(a, b)
};
Compress = function(n, t) {
    var o = 0,
        s = 0,
        h = n.length,
        r = "",
        f, e, u, i;
    for (t = Math.pow(10, t), i = 0; i < h; i++) f = Math.round(n[i].y * t), e = Math.round(n[i].x * t), r += EncodeStr(f - o), r += EncodeStr(e - s), o = f, s = e;
    for (u = [
            ["?", "0"],
            ["@", "1"],
            ["[", "2"],
            ["\\", "3"],
            ["]", "4"],
            ["^", "5"],
            ["`", "6"],
            ["{", "7"],
            ["|", "8"],
            ["}", "9"]
        ], i = 0; i < u.length; i++) r = r.replaceAll(u[i][0], u[i][1]);
    return r
};
EncodeStr = function(n) {
    var n = n << 1,
        t;
    for (n < 0 && (n = ~n), t = ""; n >= 32;) t += String.fromCharCode((32 | n & 31) + 63), n >>= 5;
    return t + String.fromCharCode(n + 63)
};
String.prototype.replaceAll = function(n, t, i) {
    return this.replace(new RegExp(n.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g, "\\$&"), i ? "gi" : "g"), typeof t == "string" ? t.replace(/\$/g, "$$$$") : t)
};