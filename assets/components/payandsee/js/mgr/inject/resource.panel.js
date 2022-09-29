payandsee.panel.ContentUpdate = function(config) {
    config = config || {};
    config.update = Boolean(config.update || false);

    Ext.apply(config, {
        forceLayout: true,
        deferredRender: false,
        autoHeight: true,
        border: false,
        bodyCssClass: 'tab-panel-wrapper form-with-labels payandsee-panel-content',
        items: this.getTabs(config),

        /*
         глючит грид в табе
         stateful: true,
         stateId: 'payandsee-panel-content-tabs',
         stateEvents: ['tabchange'],
         getState: function() {
         return {activeTab: this.items.indexOf(this.getActiveTab())};
         },*/
    });

    console.log(config.record);

    payandsee.panel.ContentUpdate.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.panel.ContentUpdate, MODx.VerticalTabs, {

    getTabs: function(config) {
        config.listeners = {
            change: {
                fn: MODx.fireResourceFormChange
            },
            select: {
                fn: MODx.fireResourceFormChange
            },
            keydown: {
                fn: MODx.fireResourceFormChange
            },
            check: {
                fn: MODx.fireResourceFormChange
            },
            uncheck: {
                fn: MODx.fireResourceFormChange
            }
        };

        var tabs = [{
            title: _('payandsee_tab_main'),
            hideMode: 'offsets',
            anchor: '100%',
            layout: 'form',
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                anchor: '100%',
                border: false,
                labelSeparator: ''
            },
            items: !config.update ? this.getTbarMain(config) : this.getMainFields(config)
        }];

        tabs.push({
            title: _('payandsee_tab_rates'),
            hideMode: 'offsets',
            anchor: '100%',
            layout: 'form',
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                anchor: '100%',
                border: false,
                labelSeparator: ''
            },
            items: !config.update ? [] : this.getContentRates(config),
            disabled: !config.update
        });

        tabs.push({
            title: _('payandsee_tab_subscriptions'),
            hideMode: 'offsets',
            anchor: '100%',
            layout: 'form',
            defaults: {
                layout: 'form',
                labelAlign: 'top',
                anchor: '100%',
                border: false,
                labelSeparator: ''
            },
            items: !config.update ? [] : this.getSubscriptionsGrid(config),
            disabled: !config.update
        });

        return tabs;
    },

    getTbarMainMenu: function(config) {
        var menu = [];

        var add = {
            create: {
                text: '<i class="icon icon-plus"></i> ' + _('payandsee_action_create'),
                cls: 'payandsee-cogs',
                handler: this.create,
                scope: this
            },
            remove: {
                text: '<i class="icon icon-trash-o"></i> ' + _('payandsee_action_remove'),
                cls: 'payandsee-cogs',
                handler: this.remove,
                scope: this
            }
        };

        if (!config.update) {
            menu.push(add.create);
        }
        if (config.update && payandsee.config.resource.id != payandsee.config.content.resource) {
            menu.push(add.create);
        }
        if (config.update && payandsee.config.resource.id == payandsee.config.content.resource) {
            menu.push(add.remove);
        }

        return menu;
    },

    getTbarMain: function(config) {
        var tbar = [];

        tbar.push({
            text: '<i class="icon icon-cogs"></i> ',
            cls: '_payandsee-cogs',
            menu: this.getTbarMainMenu(config)
        });

        if (config.update && payandsee.config.resource.id != payandsee.config.content.resource) {
            tbar.push('->', {
                html: payandsee.tools.resourceLink('<i class="icon icon-caret-up"></i> ', payandsee.config.content.resource),
                href: payandsee.tools.resourceLink('<i class="icon icon-caret-up"></i> ', payandsee.config.content.resource, false, true),
                handler: this.location
            }, {
                xtype: 'spacer',
                style: 'width:5px;'
            });
        }

        return [{
            cls: 'payandsee-panel-content-tbar',
            anchor: '100%',
            border: false,
            items: [{tbar: tbar}]
        }];
    },

    getMainFields: function(config) {
        var fields = [];

        fields.push({
            items: this.getTbarMain(config)
        });

        if (config.update) {
            fields.push({
                layout: 'column',
                defaults: {
                    layout: 'form',
                    labelAlign: 'top',
                    anchor: '100%',
                    border: false,
                    labelSeparator: ''
                },
                items: [{
                    columnWidth: .7,
                    items: this.getLeftMain(config)
                }, {
                    columnWidth: .3,
                    items: this.getRightMain(config)
                }]
            });
        }

        return fields;
    },

    getLeftMain: function(config) {
        return [{
            xtype: 'hidden',
            name: payandsee.config.key_prefix + 'id',
            value: config.record.content.id || 0,
        }, {
            xtype: 'hidden',
            name: payandsee.config.key_prefix + 'resource',
            value: config.record.content.resource || 0,
        }, {
            xtype: 'textfield',
            fieldLabel: _('payandsee_name'),
            name: payandsee.config.key_prefix + 'name',
            value: config.record.content.name || '',
            anchor: '99%',
            //msgTarget: 'under',
            allowBlank: true,//false,
            listeners: config.listeners
        }, {
            xtype: 'textarea',
            fieldLabel: _('description'),
            name: payandsee.config.key_prefix + 'description',
            anchor: '99%',
            height: 101,
            grow: false,
            value: config.record.content.description || '',
            listeners: config.listeners
        }];
    },

    getRightMain: function(config) {
        return [{
            xtype: 'payandsee-combo-status',
            class: 'PasContent',
            custm: false,
            clear: false,
            fieldLabel: _('payandsee_status'),
            name: payandsee.config.key_prefix + 'status',
            anchor: '99%',
            value: config.record.content.status || 0,
            allowBlank: false
        }, {
            xtype: 'payandsee-combo-boolean',
            fieldLabel: _('payandsee_nested'),
            name: payandsee.config.key_prefix + 'nested',
            anchor: '99%',
            value: config.record.content.nested || 0,
            listeners: config.listeners
        }/* {
            xtype: 'checkboxgroup',
            hideLabel: true,
            columns: 1,
            items: [{
                xtype: 'xcheckbox',
                boxLabel: _('payandsee_nested'),
                name: payandsee.config.key_prefix + 'nested',
                checked: parseInt(config.record.content.nested || 0),
                listeners: config.listeners
            }]
        }*/];
    },

    getContentRates: function(config) {
        return [{
            width: 500,
            xtype: 'payandsee-grid-rate',
            excludeTopBarFields: ['content', 'search'],
            excludeColumnFields: ['content'],
            content: config.record.content.id
        }];
    },

    getSubscriptionsGrid: function(config) {
        return [{
            width: 500,
            xtype: 'payandsee-grid-subscription',
            class: 'PasSubscription',
            excludeTopBarFields: ['content', 'search'],
            excludeColumnFields: ['content'],
            content: config.record.content.id
        }];
    },

    setAction: function(method, field, value, id) {
        var ids = [id]; //this.config.record.resource.id
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
                    fn: function() {
                        window.location.reload();
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

    location: function(config) {
        if (this.href) {
            window.location.href = this.href;
        }
    },

    remove: function() {
        Ext.MessageBox.confirm(
            _('payandsee_action_remove'),
            _('payandsee_confirm_remove'),
            function(val) {
                if (val == 'yes') {
                    this.setAction('remove', '', '', this.config.record.content.id);
                }
            },
            this
        );
    },

    create: function(btn, e) {
        var record = {
            resource: payandsee.config.resource.id,
            status: 1
        };
        var w = MODx.load({
            xtype: 'payandsee-window-create-content',
            record: record,
            class: this.config.class,
            listeners: {
                success: {
                    fn: function() {
                        window.location.reload();
                    },
                    scope: this
                }
            }
        });
        w.reset();

        w.setValues(record);
        w.show(e.target);
    }

});

Ext.reg('payandsee-panel-content-update', payandsee.panel.ContentUpdate);
