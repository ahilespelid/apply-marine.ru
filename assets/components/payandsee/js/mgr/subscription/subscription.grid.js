payandsee.grid.Subscription = function (config) {
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
                            action: config.action || 'mgr/subscription/sort',
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
            action: 'mgr/subscription/getlist',
            client: config.client || 0,
            content: config.content || 0
        },
        save_action: 'mgr/subscription/updatefromgrid',
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
        cls: 'payandsee-grid payandsee-grid-subscription',
        bodyCssClass: 'grid-with-buttons',
        stateful: true,
        stateId: 'payandsee-grid-subscription-state'

    });
    payandsee.grid.Subscription.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.grid.Subscription, MODx.grid.Grid, {
    windows: {},

    getFields: function (config) {
        config = config || {};

        var fields =  payandsee.tools.cloneArray(payandsee.config.grid_subscription_fields || []);
        Ext.iterate(config.excludeColumnFields || [], function (field, i) {
            fields.remove(field)
        });

        return fields;
    },

    getTopBarComponent: function (config) {
        config = config || {};

        var fields = ['menu', 'update', 'left', 'client', 'content', 'status', 'search', 'spacer'];

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
                },
                //submitValue: false
            },
            client: {
                xtype: 'payandsee-combo-client',
                width: 190,
                custm: true,
                clear: true,
                addall: true,
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
            content: {
                xtype: 'payandsee-combo-content',
                width: 190,
                custm: true,
                clear: true,
                addall: true,
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
            client: {
                width: 30,
                sortable: true,
                editor: {
                    xtype: 'payandsee-combo-client',
                    custm: true,
                    clear: true,
                    allowBlank: false
                },
                renderer: function (value, metaData, record) {
                    var email = record['json']['profile_email'],
                        username = record['json']['profile_username'],
                        s = payandsee.tools.userLink(username, value);
                    if (email && username != email) {
                        s = s + String.format(' <sub class="user-email"">{0}</sub>', email);
                    }
                    return s;
                }
            },

            user: {
                width: 30,
                sortable: false,
                renderer: function (value, metaData, record) {
                    // fullname  surname
                    var username = record['json']['profile_username'],
                        fullname = record['json']['profile_fullname'],
                        surname = record['json']['profile_surname'] || '',
                        email = record['json']['profile_email'];

                    if (fullname) {
                        username = fullname + ' ' + surname;
                    }
                    username = payandsee.tools.userLink(username, record['json']['client'], true);
                    s = String.format(' <sub class="user-fullname"">{0}</sub>', username);
                    if (email) {
                        s = s + String.format(' <sub class="user-email"">{0}</sub>', email);
                    }

                    return s;
                }
            },

            content: {
                width: 25,
                sortable: true,
                editor: {
                    xtype: 'payandsee-combo-content',
                    custm: true,
                    clear: true,
                    allowBlank: false
                },
                renderer: function (value, metaData, record) {
                    var resource = record['json']['content_resource'],
                        name = record['json']['content_name'],
                        pagetitle = record['json']['resource_pagetitle'],
                        s = payandsee.tools.resourceLink(name, resource);
                    if (pagetitle) {
                        s = s + String.format(' <sub class="content-pagetitle"">{0}</sub>', pagetitle);
                    }

                    return s;
                }
            },
            status: {
                width: 20,
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
            startdate: {
                width: 25,
                sortable: true,
                editor: {
                    xtype: 'payandsee-combo-datetime',
                    timePosition: 'below',
                },
                renderer: payandsee.tools.renderDate
            },
            stopdate: {
                width: 25,
                sortable: true,
                editor: {
                    xtype: 'payandsee-combo-datetime',
                    timePosition: 'below',
                },
                renderer: payandsee.tools.renderDate
            },
            actions: {
                width: 25,
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
        return Ext.applyIf(config.listeners || {}, {
            render: {
                fn: this.dd,
                scope: this
            },
        });
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
                action: 'mgr/subscription/multiple',
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
            content: this.config.content || '0',
            client: this.config.client || '0',

            startdate: new Date(),
            stopdate: new Date(Date.now() + 1*60*1000), /* Date.now() + days*24*60*60*1000 */
            status: 1,

            term_action: 'plus',
            term_unit: 'd',
        };
        var w = MODx.load({
            xtype: 'payandsee-window-create-subscription',
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
                action: 'mgr/subscription/get',
                id: id,
                process: true,
            },
            listeners: {
                success: {
                    fn: function (r) {
                        var record = Ext.applyIf(r.object, {
                            term_action: 'plus',
                            term_unit: 'd',
                        });

                        var w = MODx.load({
                            xtype: 'payandsee-window-create-subscription',
                            title: _('payandsee_action_update'),
                            action: 'mgr/subscription/update',
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
Ext.reg('payandsee-grid-subscription', payandsee.grid.Subscription);
