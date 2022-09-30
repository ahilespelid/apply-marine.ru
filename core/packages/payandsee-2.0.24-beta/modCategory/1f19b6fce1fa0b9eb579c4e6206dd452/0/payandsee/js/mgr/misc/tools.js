
payandsee.tools.colors = [
    '000000', '993300', '333399', '333333', '008000', '008080', '0000FF', '666699', '808080',
    'FF0000', 'FF9900', '99CC00', '339966', '33CCCC', '3366FF', '800080', '969696', 'FF00FF',
    'FFCC00', 'FFFF00', '00FF00', '00FFFF', '00CCFF', 'FF99CC', 'FFCC99', '99CCFF', 'CC99FF',
    'CCFFFF', 'C0C0C0', 'FFFFFF',
];

payandsee.tools.getMenu = function (actions, grid, selected) {
    var menu = [];
    var cls, icon, title, action = '';

    for (var i in actions) {
        if (!actions.hasOwnProperty(i)) {
            continue;
        }

        var a = actions[i];
        if (!a['menu']) {
            if (a == '-') {
                menu.push('-');
            }
            continue;
        } else if (menu.length > 0 && (/^sep/i.test(a['action']))) {
            menu.push('-');
            continue;
        }

        if (selected.length > 1) {
            if (!a['multiple']) {
                continue;
            } else if (typeof(a['multiple']) == 'string') {
                a['title'] = a['multiple'];
            }
        }

        cls = a['cls'] ? a['cls'] : '';
        icon = a['icon'] ? a['icon'] : '';
        title = a['title'] ? a['title'] : a['title'];
        action = a['action'] ? grid[a['action']] : '';

        menu.push({
            handler: action,
            text: String.format(
                '<span class="{0}"><i class="x-menu-item-icon {1}"></i>{2}</span>',
                cls, icon, title
            )
        });
    }

    return menu;
};


payandsee.tools.renderActions = function (value, props, row) {
    var res = [];
    var cls, icon, title, action, item = '';
    for (var i in row.data.actions) {
        if (!row.data.actions.hasOwnProperty(i)) {
            continue;
        }
        var a = row.data.actions[i];
        if (!a['button']) {
            continue;
        }

        cls = a['cls'] ? a['cls'] : '';
        icon = a['icon'] ? a['icon'] : '';
        action = a['action'] ? a['action'] : '';
        title = a['title'] ? a['title'] : '';

        item = String.format(
            '<li class="{0}"><button class="btn btn-default {1}" action="{2}" title="{3}"></button></li>',
            cls, icon, action, title
        );

        res.push(item);
    }

    return String.format(
        '<ul class="payandsee-row-actions">{0}</ul>',
        res.join('')
    );
};


payandsee.tools.handleChecked = function (checkbox) {
    var workCount = checkbox.workCount;
    if (!!!workCount) {
        workCount = 1;
    }
    var hideLabel = checkbox.hideLabel;
    if (!!!hideLabel) {
        hideLabel = false;
    }
    var disableWork = checkbox.disableWork;
    if (disableWork == undefined) {
        disableWork = true;
    }

    var checked = checkbox.getValue();
    var nextField = checkbox.nextSibling();

    for (var i = 0; i < workCount; i++) {
        if (checked) {
            nextField.show().enable();
        }
        else {
            if (disableWork) {
                nextField.hide().disable();
            }
            else {
                nextField.hide();
            }
        }
        nextField.hideLabel = hideLabel;
        nextField = nextField.nextSibling();
    }
    return true;
};


payandsee.tools.arrayIntersect = function (array1, array2) {
    var result = array1.filter(function (n) {
        return array2.indexOf(n) !== -1;
    });

    return result;
};


payandsee.tools.inArray = function (needle, haystack) {
    for (key in haystack) {
        if (haystack[key] == needle) return true;
    }

    return false;
};


payandsee.tools.cloneArray = function (arr) {
    var i, copy;

    if( Array.isArray( arr ) ) {
        copy = arr.slice( 0 );
        for( i = 0; i < copy.length; i++ ) {
            copy[ i ] = payandsee.tools.cloneArray( copy[ i ] );
        }
        return copy;
    } else if( typeof arr === 'object' ) {
        throw 'Cannot clone array containing an object!';
    } else {
        return arr;
    }
};


payandsee.tools.renderReplace = function(value, replace, color) {
    if (!value) {
        return '';
    } else if (!replace) {
        return value;
    }
    if (!color) {
        return String.format('<span>{0}</span>', replace);
    }
    return String.format('<span class="payandsee-render-replace" style="color: #{1}">{0}</span>', replace, color);
};


payandsee.tools.renderColor = function (value, props, row) {
    return String.format('<span class="payandsee-grid-color" style="background: #{0}"></span>', value);
};


payandsee.tools.renderCost = function (v, m) {
    v = String(v).replace(/[^0-9.\-]/g, "");
    v = (Math.round((v - 0) * 100)) / 100;
    v = (v == Math.floor(v)) ? v + ".00" : ((v * 10 == Math.floor(v * 10)) ? v + "0" : v);
    v = String(v);

    var ps = v.split('.'),
        whole = ps[0],
        sub = ps[1] ? ',' + ps[1] : ',00',
        r = /(\d+)(\d{3})/;

    while (r.test(whole)) {
        whole = whole.replace(r, '$1' + '.' + '$2');
    }
    if (!m && MODx.lang['payandsee_unit_cost']) {
        m = MODx.lang['payandsee_unit_cost'];
    }
    else if (!m && !MODx.lang['payandsee_unit_cost']) {
        m = '';
    }
    return whole + sub + ' ' + m;
};


payandsee.tools.renderDate = function (string) {
    value = Ext.util.Format.date(string, MODx.config['manager_date_format']+' '+MODx.config['manager_time_format']);
    return value;
};


payandsee.tools.handleColor = function (palette, color) {
    var colorField = palette.nextSibling();
    if (!!color) {
        colorField.setValue(color);
    }
    else {
        palette.value = colorField.getValue();
    }

    return true;
};


payandsee.tools.empty = function (value) {
    return (typeof(value) == 'undefined' || value == 0 || value === null || value === false || (typeof(value) == 'string' && value.replace(/\s+/g, '') == '') || (typeof(value) == 'object' && value.length == 0));
};


payandsee.tools.userLink = function (value, id, blank, urlOnly) {
    if (!value) {
        return '';
    }
    else if (!id) {
        return value;
    }

    var url = '?a=security/user/update&id=' + id;
    if(urlOnly) {
        return url;
    }

    return String.format(
        '<a href="{0}" class="user-link" target="{1}">{2}</a>',
        url,
        (blank ? '_blank' : '_self'),
        value
    );
};


payandsee.tools.resourceLink = function (value, id, blank, urlOnly) {
    if (!value) {
        return '';
    }
    else if (!id) {
        return value;
    }

    var url = 'index.php?a=resource/update&id=' + id;
    if(urlOnly) {
        return url;
    }

    return String.format(
        '<a href="{0}" class="resource-link" target="{1}">{2}</a>',
        url,
        (blank ? '_blank' : '_self'),
        value
    );
};
