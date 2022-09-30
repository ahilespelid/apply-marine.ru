payandsee.grid.Status = function(config) {
    config = config || {};

    this.exp = new Ext.grid.RowExpander({
        expandOnDblClick: false,
        enableCaching: false,
        tpl: new Ext.Template('<p class="desc">{description}</p>'),
        renderer: function(v, p, record) {
            return record.data.description != '' && record.data.description != null ? '<div class="x-grid3-row-expander">&#160;</div>' : '&#160;';
        }
    });

    this.dd = function(grid) {
        this.dropTarget = new Ext.dd.DropTarget(grid.container, {
            ddGroup: 'dd',
            copy: false,
            notifyDrop: function(dd, e, data) {
                var store = grid.store.data.items;
                var target = store[dd.getDragData(e).rowIndex].id;
                var source = store[data.rowIndex].id;
                if (target != source) {
                    dd.el.mask(_('loading'), 'x-mask-loading');
                    MODx.Ajax.request({
                        url: payandsee.config.connector_url,
                        params: {
                            action: config.action || 'mgr/status/sort',
                            class: config.class || '',
                            source: source,
                            target: target,
                        },
                        listeners: {
                            success: {
                                fn: function(r) {
                                    dd.el.unmask();
                                    grid.refresh();
                                },
                                scope: grid
                            },
                            failure: {
                                fn: function(r) {
                                    dd.el.unmask();
                                },
                                scope: grid
                            }
                        }
                    });
                }
            }
        });
    };

    this.sm = new Ext.grid.CheckboxSelectionModel();

    Ext.applyIf(config, {
        url: payandsee.config.connector_url,
        baseParams: {
            action: 'mgr/status/getlist',
            class: config.class || ''
        },
        save_action: 'mgr/status/updatefromgrid',
        autosave: true,
        save_callback: this._updateRow,
        fields: this.getFields(config),
        columns: this.getColumns(config),
        tbar: this.getTopBar(config),
        listeners: this.getListeners(config),

        sm: this.sm,
        plugins: this.exp,
        ddGroup: 'dd',
        enableDragDrop: true,

        autoHeight: true,
        paging: true,
        pageSize: 10,
        remoteSort: true,
        viewConfig: {
            forceFit: true,
            enableRowBody: true,
            autoFill: true,
            showPreview: true,
            scrollOffset: 0
        },
        cls: 'payandsee-grid payandsee-grid-status',
        bodyCssClass: 'grid-with-buttons',
        stateful: true,
        stateId: 'payandsee-grid-status-state'

    });
    payandsee.grid.Status.superclass.constructor.call(this, config);
    this.getStore().sortInfo = {
        field: 'rank',
        direction: 'ASC'
    };
};
Ext.extend(payandsee.grid.Status, MODx.grid.Grid, {
    windows: {},

    getFields: function (config) {
        config = config || {};

        var fields =  payandsee.tools.cloneArray(payandsee.config.grid_status_fields || []);
        Ext.iterate(config.excludeColumnFields || [], function (field, i) {
            fields.remove(field)
        });

        return fields;
    },

    getTopBarComponent: function (config) {
        config = config || {};

        var fields = ['menu', 'update', 'left', 'class', 'spacer'];

        Ext.iterate(config.excludeTopBarFields || [], function (field, i) {
            fields.remove(field)
        });

        return fields;
    },

    getTopBar: function (config) {
        var tbar = [];

        var add = {
            menu: {
                text: '<i class="icon icon-cogs"></i> ',
                menu: [{
                    text: '<i class="icon icon-plus"></i> ' + _('payandsee_action_create'),
                    cls: 'payandsee-cogs',
                    handler: this.create,
                    scope: this
                }, {
                    text: '<i class="icon icon-trash-o red"></i> ' + _('payandsee_action_remove'),
                    cls: 'payandsee-cogs',
                    handler: this.remove,
                    scope: this
                }, '-', {
                    text: '<i class="icon icon-toggle-on green"></i> ' + _('payandsee_action_turnon'),
                    cls: 'payandsee-cogs',
                    handler: this.active,
                    scope: this
                }, {
                    text: '<i class="icon icon-toggle-off red"></i> ' + _('payandsee_action_turnoff'),
                    cls: 'payandsee-cogs',
                    handler: this.inactive,
                    scope: this
                }]
            },
            update: {
                text: '<i class="icon icon-refresh"></i>',
                handler: this._updateRow,
                scope: this
            },
            left: '->',
            class: {
                xtype: 'payandsee-combo-class',
                width: 190,
                custm: true,
                clear: true,
                addall: false,
                value: config.class,
                listeners: {
                    select: {
                        fn: this._filterByCombo,
                        scope: this
                    }
                }
            },
            search: {
                xtype: 'payandsee-field-search',
                width: 190,
                listeners: {
                    search: {
                        fn: function (field) {
                            this._doSearch(field);
                        },
                        scope: this
                    },
                    clear: {
                        fn: function (field) {
                            field.setValue('');
                            this._clearSearch();
                        },
                        scope: this
                    }
                }
            },
            spacer: {
                xtype: 'spacer',
                style: 'width:1px;'
            }
        };

        var fields = this.getTopBarComponent(config);
        Ext.iterate(fields, function (field, i) {
            if (add[field]) {
                tbar.push(add[field]);
            }
        });

        return tbar;
    },

    getColumns: function(config) {
        var columns = [this.exp, this.sm];
        var add = {
            id: {
                width: 10,
                sortable: true,
                hidden: true
            },
            name: {
                width: 25,
                sortable: true,
                editor: {
                    xtype: 'textfield'
                },
                renderer: function (value, metaData, record) {
                    var s = value;

                    if (parseInt(record['json']['allowed'])) {
                        s = s + String.format(' <sub class="status-allowed"">{0}</sub>', _('payandsee_allowed'));
                    }
                    return s;
                }
            },
            color: {
                width: 25,
                sortable: true,
                renderer: payandsee.tools.renderColor
            },
            actions: {
                width: 15,
                sortable: false,
                renderer: payandsee.tools.renderActions,
                id: 'actions'
            }
        };

        var fields = this.getFields(config);
        Ext.iterate(fields, function (field, i) {
            if (add[field]) {
                Ext.applyIf(add[field], {
                    header: _('payandsee_header_' + field) || '<i class="icon icon-info"></i>',
                    tooltip: _('payandsee_tooltip_' + field) || _('payandsee_' + field),
                    dataIndex: field
                });
                columns.push(add[field]);
            }
        });

        return columns;
    },

    getListeners: function(config) {
        return {
            render: {
                fn: this.dd,
                scope: this
            }
        };
    },

    getMenu: function(grid, rowIndex) {
        var ids = this._getSelectedIds();
        var row = grid.getStore().getAt(rowIndex);
        var menu = payandsee.tools.getMenu(row.data['actions'], this, ids);
        this.addContextMenuItem(menu);
    },

    onClick: function (e) {
        var elem = e.getTarget();
        if (elem.nodeName == 'BUTTON') {
            var row = this.getSelectionModel().getSelected();
            if (typeof(row) != 'undefined') {
                var action = elem.getAttribute('action');
                if (action == 'showMenu') {
                    var ri = this.getStore().find('id', row.id);
                    return this._showMenu(this, ri, e);
                } else if (typeof this[action] === 'function') {
                    this.menu.record = row.data;
                    return this[action](this, e);
                }
            }
        }
        return this.processEvent('click', e);
    },

    setAction: function(method, field, value) {
        var ids = this._getSelectedIds();
        if (!ids.length && (field !== 'false')) {
            return false;
        }
        MODx.Ajax.request({
            url: payandsee.config.connector_url,
            params: {
                action: 'mgr/status/multiple',
                method: method,
                field_name: field,
                field_value: value,
                ids: Ext.util.JSON.encode(ids)
            },
            listeners: {
                success: {
                    fn: function() {
                        this.refresh();
                    },
                    scope: this
                },
                failure: {
                    fn: function(response) {
                        MODx.msg.alert(_('error'), response.message);
                    },
                    scope: this
                }
            }
        })
    },

    active: function(btn, e) {
        this.setAction('setproperty', 'active', 1);
    },

    inactive: function(btn, e) {
        this.setAction('setproperty', 'active', 0);
    },

    remove: function() {
        Ext.MessageBox.confirm(
            _('payandsee_action_remove'),
            _('payandsee_confirm_remove'),
            function(val) {
                if (val == 'yes') {
                    this.setAction('remove');
                }
            },
            this
        );
    },

    update: function(btn, e, row) {
        if (typeof(row) != 'undefined') {
            this.menu.record = row.data;
        }
        else if (!this.menu.record) {
            return false;
        }
        var id = this.menu.record.id;
        var cls = this.menu.record.class;
        MODx.Ajax.request({
            url: this.config.url,
            params: {
                action: 'mgr/status/get',
                id: id,
                class: cls
            },
            listeners: {
                success: {
                    fn: function (r) {
                        var record = r.object;
                        var w = MODx.load({
                            xtype: 'payandsee-status-window-create',
                            title: _('payandsee_action_update'),
                            action: 'mgr/status/update',
                            record: record,
                            update: true,
                            listeners: {
                                success: {
                                    fn: function () {
                                        this.refresh();
                                    }, scope: this
                                }
                            }
                        });
                        w.reset();
                        w.setValues(record);
                        w.show(e.target);
                    }, scope: this
                }
            }
        });
    },

    create: function(btn, e) {
        var record = {
            active: 1,
            class: this.getStore().baseParams.class || this.config.class || 'PasContent',
            color: '000000'
        };

        w = MODx.load({
            xtype: 'payandsee-status-window-create',
            record: record,
            listeners: {
                success: {
                    fn: this.refresh,
                    scope: this
                }
            }
        });
        w.reset();
        w.setValues(record);
        w.show(e.target);
    },

    _filterByCombo: function (cb) {
        this.config[cb.name] = cb.value;
        this.getStore().baseParams[cb.name] = cb.value;
        this.getBottomToolbar().changePage(1);
    },

    _doSearch: function(tf) {
        this.getStore().baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
    },

    _clearSearch: function() {
        this.getStore().baseParams.query = '';
        this.getBottomToolbar().changePage(1);
    },

    _updateRow: function() {
        this.refresh();
    },

    _getSelectedIds: function() {
        var ids = [];
        var selected = this.getSelectionModel().getSelections();

        for (var i in selected) {
            if (!selected.hasOwnProperty(i)) {
                continue;
            }
            ids.push([selected[i]['json']['id'], selected[i]['json']['class']]);
        }

        return ids;
    }

});
Ext.reg('payandsee-grid-status', payandsee.grid.Status);
