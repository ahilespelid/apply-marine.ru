payandsee.window.CreateContent = function (config) {
    config = config || {};
    config.update = Boolean(config.update || false);

    Ext.applyIf(config, {
        title: _('create'),
        width: 600,
        autoHeight: true,
        fields: this.getFields(config),
        listeners: this.getListeners(config),
        action: 'mgr/content/create',
        url: payandsee.config['connector_url'],
        bodyCssClass: 'payandsee-window payandsee-window-tabs',
    });
    payandsee.window.CreateContent.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.window.CreateContent, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'modx-tabs',
            defaults: {
                border: false,
                autoHeight: true,
            },
            border: true,
            activeTab: 0,
            autoHeight: true,
            hideMode: 'offsets',
            deferredRender: false,
            items: this.getTabs(config),
        }]
    },

    getTabs: function (config) {

        var tabs = [];
        var add = {
            content: {
                layout: 'form',
                hideMode: 'offsets',
                items: this.getContent(config)
            },
            rates: {
                items: this.getContentRate(config),
                disabled: !config.update
            },
            subscriptions: {
                items: this.getSubscription(config),
                disabled: !config.update
            }
        };

        (payandsee.config.window_content_tabs || []).filter(function (tab) {
            if (add[tab]) {
                Ext.applyIf(add[tab], {
                    title: _('payandsee_tab_' + tab)
                });
                tabs.push(add[tab]);
            }
        });

        return tabs;
    },

    getContent: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id'
        }, {
            xtype: 'textfield',
            fieldLabel: _('payandsee_name'),
            name: 'name',
            anchor: '100%',
            allowBlank: false
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
                        items: this.getContentLeftFields(config)
                    }, {
                        columnWidth: .5,
                        border: false,
                        layout: 'form',
                        cls: 'right-column',
                        items: this.getContentRightFields(config)
                    }]
                }]
            }]
        }, {
            xtype: 'textarea',
            fieldLabel: _('payandsee_description'),
            msgTarget: 'under',
            name: 'description',
            anchor: '100%',
            height: 100,
            allowBlank: true
        }, {
            xtype: 'xcheckbox',
            hideLabel: true,
            boxLabel: _('payandsee_nested'),
            name: 'nested',
            checked: parseInt(config.record.nested),
        }];
    },

    getContentLeftFields: function (config) {
        return [{
            xtype: 'payandsee-combo-resource',
            custm: true,
            clear: true,
            fieldLabel: _('payandsee_resource'),
            msgTarget: 'under',
            name: 'resource',
            anchor: '100%',
            allowBlank: false
        }];
    },

    getContentRightFields: function (config) {
        return [{
            xtype: 'payandsee-combo-status',
            class: 'PasContent',
            custm: true,
            clear: true,
            fieldLabel: _('payandsee_status'),
            msgTarget: 'under',
            name: 'status',
            anchor: '100%',
            allowBlank: false
        }];
    },

    getContentRate: function (config) {
        return [{
            width: '100%',
            xtype: 'payandsee-grid-rate',
            excludeTopBarFields: ['content', 'search'],
            excludeColumnFields: ['content'],
            content: config.record.id || 0
        }];
    },

    getSubscription: function (config) {
        return [{
            width: '100%',
            xtype: 'payandsee-grid-subscription',
            excludeTopBarFields: ['content', 'search'],
            excludeColumnFields: ['content'],
            content: config.record.id || 0,
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

});
Ext.reg('payandsee-window-create-content', payandsee.window.CreateContent);