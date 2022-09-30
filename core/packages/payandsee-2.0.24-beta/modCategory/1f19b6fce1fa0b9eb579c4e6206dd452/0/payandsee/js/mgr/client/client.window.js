payandsee.window.CreateClient = function (config) {
    config = config || {};
    config.update = Boolean(config.update || false);

    Ext.applyIf(config, {
        title: _('create'),
        width: 600,
        autoHeight: true,
        fields: this.getFields(config),
        listeners: this.getListeners(config),
        action: 'mgr/client/create',
        url: payandsee.config['connector_url'],
        bodyCssClass: 'payandsee-window payandsee-window-tabs',
    });
    payandsee.window.CreateClient.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.window.CreateClient, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'modx-tabs',
            defaults: {
                border: false,
                autoHeight: true
            },
            border: true,
            activeTab: 0,
            autoHeight: true,
            hideMode: 'offsets',
            deferredRender: false,
            items: this.getTabs(config)
        }]
    },

    getTabs: function (config) {

        var tabs = [];
        var add = {
            client: {
                layout: 'form',
                items: this.getClient(config)
            },
            subscriptions: {
                //layout: 'form',
                items: this.getSubscription(config),
                disabled: !config.update
            }
        };

        (payandsee.config.window_client_tabs || []).filter(function(tab) {
            if (add[tab]) {
                Ext.applyIf(add[tab], {
                    title: _('payandsee_tab_' + tab)
                });
                tabs.push(add[tab]);
            }
        });

        return tabs;
    },

    getClient: function (config) {
        return [{
            xtype: 'hidden',
            name: 'email'
        }, {
            items: [{
                layout: 'form',
                cls: 'modx-panel',
                items: [{
                    layout: 'column',
                    border: false,
                    items: [{
                        columnWidth: .5,
                        border: false,
                        layout: 'form',
                        items: [{
                            xtype: 'payandsee-combo-user',
                            custm: true,
                            clear: true,
                            create: true,
                            fieldLabel: _('payandsee_user'),
                            msgTarget: 'under',
                            name: 'id',
                            anchor: '100%',
                            allowBlank: false,
                            listeners: {
                                select: {
                                    fn: function (combo, row) {
                                        this.handleEmail();
                                    },
                                    scope: this
                                },
                            },
                        }]
                    }, {
                        columnWidth: .5,
                        border: false,
                        layout: 'form',
                        cls: 'right-column',
                        items: [{
                            xtype: 'payandsee-combo-status',
                            class: 'PasClient',
                            custm: true,
                            clear: true,
                            fieldLabel: _('payandsee_status'),
                            msgTarget: 'under',
                            name: 'status',
                            anchor: '100%',
                            allowBlank: false
                        }/*,{
                            xtype: 'payandsee-combo-context',
                            custm: true,
                            clear: true,
                            fieldLabel: _('payandsee_context'),
                            msgTarget: 'under',
                            name: 'context',
                            anchor: '100%',
                            allowBlank: false
                        }*/]
                    }]
                }]
            }]
        },{
            xtype: 'spacer',
            style: 'width:1px;height:10px;'
        }];
    },

    getSubscription: function (config) {
        return [{
            width: '100%',
            xtype: 'payandsee-grid-subscription',
            excludeTopBarFields: ['client', 'search'],
            excludeColumnFields: ['client'],
            client: config.record.id || 0
        }];
    },

    getListeners: function (config) {
        return Ext.applyIf(config.listeners || {}, {
            afterrender: function () {
                this.fp.getForm().on('beforeaction', function (form, submit) {
                    submit.getParams = function () {
                        var bp = this.form.baseParams;
                        var p = this.options.params || form.getFieldValues();

                        if (p) {
                            if (typeof p == "object") {
                                p = Ext.urlEncode(Ext.applyIf(p, bp));
                            } else if (typeof p == 'string' && bp) {
                                p += '&' + Ext.urlEncode(bp);
                            }
                        } else if (bp) {
                            p = Ext.urlEncode(bp);
                        }
                        return p;
                    };
                    submit.run = function () {
                        var o = this.options,
                            method = this.getMethod(),
                            isGet = method == 'GET';

                        if (o.clientValidation === false || this.form.isValid()) {
                            if (o.submitEmptyText === false) {
                                var fields = this.form.items,
                                    emptyFields = [],
                                    setupEmptyFields = function (f) {
                                        if (f.el.getValue() == f.emptyText) {
                                            emptyFields.push(f);
                                            f.el.dom.value = "";
                                        }
                                        if (f.isComposite && f.rendered) {
                                            f.items.each(setupEmptyFields);
                                        }
                                    };

                                fields.each(setupEmptyFields);
                            }
                            Ext.Ajax.request(Ext.apply(this.createCallback(o), {
                                url: this.getUrl(isGet),
                                method: method,
                                headers: o.headers,
                                params: this.getParams(),
                                isUpload: this.form.fileUpload
                            }));
                            if (o.submitEmptyText === false) {
                                Ext.each(emptyFields, function (f) {
                                    if (f.applyEmptyText) {
                                        f.applyEmptyText();
                                    }
                                });
                            }
                        } else if (o.clientValidation !== false) {
                            this.failureType = Ext.form.Action.CLIENT_INVALID;
                            this.form.afterAction(this, false);
                        }
                    };
                });


            },

        });
    },

    loadDropZones: function () {

    },

    handleEmail: function () {
        var f = this.fp.getForm();
        var _id = f.findField('id');
        var _email = f.findField('email');

        var email = _id.getValue();
        _id.getStore().each(function(r){
            if (r.data['id'] == email) {
                _email.setValue(r.data['email']);
            }
        });
    },

});
Ext.reg('payandsee-window-create-client', payandsee.window.CreateClient);

