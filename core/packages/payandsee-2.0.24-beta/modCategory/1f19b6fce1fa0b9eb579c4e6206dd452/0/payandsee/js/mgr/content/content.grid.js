payandsee.grid.Content = function (config) {
    config = config || {};

    this.exp = new Ext.grid.RowExpander({
        expandOnDblClick: false,
        enableCaching: false,
        tpl: new Ext.Template('<p class="desc">{description}</p>'),
        renderer: function (v, p, record) {
            return record.data.description != '' && record.data.description != null ? '<div class="x-grid3-row-expander">&#160;</div>' : '&#160;';
        }
    });

    this.dd = function (grid) {
        this.dropTarget = new Ext.dd.DropTarget(grid.container, {
            ddGroup: 'dd',
            copy: false,
            notifyDrop: function (dd, e, data) {
                var store = grid.store.data.items;
                var target = store[dd.getDragData(e).rowIndex].id;
                var source = store[data.rowIndex].id;
                if (target != source) {
                    dd.el.mask(_('loading'), 'x-mask-loading');
                    MODx.Ajax.request({
                        url: payandsee.config['connector_url'],
                        params: {
                            action: config.action || 'mgr/content/sort',
                            source: source,
                            target: target
                        },
                        listeners: {
                            success: {
                                fn: function (r) {
                                    dd.el.unmask();
                                    grid.refresh();
                                },
                                scope: grid
                            },
                            failure: {
                                fn: function (r) {
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
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/content/getlist'
        },
        save_action: 'mgr/content/updatefromgrid',
        autosave: true,
        save_callback: this._updateRow,
        fields: this.getFields(config),
        columns: this.getColumns(config),
        tbar: this.getTopBar(config),
        listeners: this.getListeners(config),

        sm: this.sm,
        plugins: this.exp,
        /*ddGroup: 'dd',
         enableDragDrop: true,*/

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
        cls: 'payandsee-grid payandsee-grid-content',
        bodyCssClass: 'grid-with-buttons',
        stateful: true,
        stateId: 'payandsee-grid-content-state'

    });
    payandsee.grid.Content.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.grid.Content, MODx.grid.Grid, {
    windows: {},

    getFields: function (config) {
        config = config || {};

        var fields =  payandsee.tools.cloneArray(payandsee.config.grid_content_fields || []);
        Ext.iterate(config.excludeColumnFields || [], function (field, i) {
            fields.remove(field)
        });

        return fields;
    },

    getTopBarComponent: function (config) {
        config = config || {};

        var fields = ['menu', 'update', 'left', 'status', 'search', 'spacer'];

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
                    text: '<i class="icon icon-toggle-on green"></i> ' + _('payandsee_action_active'),
                    cls: 'payandsee-cogs',
                    handler: this.active,
                    scope: this
                }, {
                    text: '<i class="icon icon-toggle-off red"></i> ' + _('payandsee_action_inactive'),
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
            status: {
                xtype: 'payandsee-combo-status',
                width: 190,
                custm: true,
                clear: true,
                addall: true,
                class: config.class,
                value: 0,
                listeners: {
                    select: {
                        fn: this._filterByCombo,
                        scope: this
                    },
                    afterrender: {
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

    getColumns: function (config) {
        var columns = [this.exp, this.sm];
        var add = {
            id: {
                width: 10,
                hidden: true,
                sortable: true
            },
            name: {
                width: 35,
                sortable: true,
                renderer: function (value, metaData, record) {
                    var pagetitle = record['json']['resource_pagetitle'],
                        s = payandsee.tools.resourceLink(value, record['json']['resource']);
                    if (pagetitle) {
                        s = s + String.format(' <sub class="content-pagetitle"">{0}</sub>', pagetitle);
                    }
                    return s;
                }
            },
            status: {
                width: 25,
                sortable: true,
                editor: {
                    xtype: 'payandsee-combo-status',
                    custm: true,
                    clear: true,
                    class: config.class,
                    allowBlank: false
                },
                renderer: function (value, metaData, record) {
                    return payandsee.tools.renderReplace(value, record['json']['status_name'], record['json']['status_color'])
                }
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

    getListeners: function (config) {
        return {
            render: {
                fn: this.dd,
                scope: this
            },
            /*afterrender: function(grid) {
             var params = payandsee.tools.Hash.get();
             if (!!params['contents']) {
             this.update(grid, Ext.EventObject, {data: {id: params['contents']}});
             }
             }*/
        };
    },

    getMenu: function (grid, rowIndex) {
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


    setAction: function (method, field, value) {
        var ids = this._getSelectedIds();
        if (!ids.length && (field !== 'false')) {
            return false;
        }
        MODx.Ajax.request({
            url: payandsee.config.connector_url,
            params: {
                action: 'mgr/content/multiple',
                method: method,
                field_name: field,
                field_value: value,
                ids: Ext.util.JSON.encode(ids)
            },
            listeners: {
                success: {
                    fn: function () {
                        this.refresh();
                    },
                    scope: this
                },
                failure: {
                    fn: function (response) {
                        MODx.msg.alert(_('error'), response.message);
                    },
                    scope: this
                }
            }
        })
    },

    remove: function () {
        Ext.MessageBox.confirm(
            _('payandsee_action_remove'),
            _('payandsee_confirm_remove'),
            function (val) {
                if (val == 'yes') {
                    this.setAction('remove');
                }
            },
            this
        );
    },


    active: function (btn, e) {
        this.setAction('setproperty', 'status', 2);
    },

    inactive: function (btn, e) {
        this.setAction('setproperty', 'status', 3);
    },

    create: function (btn, e) {
        var record = {
            status: 1
        };
        var w = MODx.load({
            xtype: 'payandsee-window-create-content',
            record: record,
            class: this.config.class,
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
    },

    update: function (btn, e, row) {
        if (typeof(row) != 'undefined') {
            this.menu.record = row.data;
        }
        else if (!this.menu.record) {
            return false;
        }
        var id = this.menu.record.id;
        MODx.Ajax.request({
            url: this.config.url,
            params: {
                action: 'mgr/content/get',
                id: id,
                process: true,
                //aliases: Ext.util.JSON.encode(['User', 'UserProfile'])
            },
            listeners: {
                success: {
                    fn: function (r) {
                        var record = r.object;
                        var w = MODx.load({
                            xtype: 'payandsee-window-create-content',
                            title: _('payandsee_action_update'),
                            action: 'mgr/content/update',
                            class: this.config.class,
                            record: record,
                            update: true,
                            listeners: {
                                success: {
                                    fn: this.refresh,
                                    scope: this
                                },
                                /* afterrender: function() {
                                 payandsee.tools.Hash.add('contents', r.object['id']);
                                 },
                                 hide: function() {
                                 payandsee.tools.Hash.remove('contents');
                                 }*/
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

    _filterByCombo: function (cb) {
        this.getStore().baseParams[cb.name] = cb.value;
        this.getBottomToolbar().changePage(1);
    },

    _doSearch: function (tf) {
        this.getStore().baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
    },

    _clearSearch: function () {
        this.getStore().baseParams.query = '';
        this.getBottomToolbar().changePage(1);
    },

    _updateRow: function () {
        this.refresh();
    },

    _getSelectedIds: function () {
        var ids = [];
        var selected = this.getSelectionModel().getSelections();

        for (var i in selected) {
            if (!selected.hasOwnProperty(i)) {
                continue;
            }
            ids.push(selected[i]['id']);
        }

        return ids;
    }

});
Ext.reg('payandsee-grid-content', payandsee.grid.Content);
