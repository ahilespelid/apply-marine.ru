payandsee.window.CreateAlert = function (config) {
    config = config || {};

    Ext.applyIf(config, {
        title: _('create'),
        width: 600,
        autoHeight: true,
        fields: this.getFields(config),
        action: 'mgr/alert/create',
        url: payandsee.config['connector_url'],
        bodyCssClass: 'payandsee-window',
    });
    payandsee.window.CreateAlert.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.window.CreateAlert, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id'
        }, {
            layout: 'column',
            border: false,
            items: [{
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-class',
                    fieldLabel: _('payandsee_class'),
                    name: 'class',
                    anchor: '100%',
                    allowBlank: false,
                    listeners: {
                        select: {
                            fn: function (combo, row) {
                                this.handleStatus();
                            },
                            scope: this
                        },
                    },
                }]
            }, {
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-status',
                    class: config.record.class || '',
                    fieldLabel: _('payandsee_status'),
                    name: 'status',
                    anchor: '100%',
                    allowBlank: false,

                }]
            }]
        }, {
            xtype: 'textfield',
            fieldLabel: _('payandsee_email'),
            name: 'email',
            anchor: '100%',
            allowBlank: false
        }, {
            layout: 'column',
            border: false,
            items: [{
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'textfield',
                    fieldLabel: _('payandsee_subject'),
                    name: 'subject',
                    anchor: '100%',
                    allowBlank: false
                }]
            }, {
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'textfield',
                    fieldLabel: _('payandsee_body'),
                    name: 'body',
                    anchor: '100%',
                    allowBlank: false
                }]
            }]
        }, {
            xtype: 'textarea',
            fieldLabel: _('payandsee_description'),
            msgTarget: 'under',
            name: 'description',
            anchor: '100%',
            height: 50,
            allowBlank: true
        }, {
            xtype: 'checkboxgroup',
            hideLabel: true,
            columns: 3,
            items: [{
                xtype: 'xcheckbox',
                boxLabel: _('payandsee_active'),
                name: 'active',
                checked: parseInt(config.record.active)
            }]
        }];
    },

    handleStatus: function () {
        var f = this.fp.getForm();
        var _class = f.findField('class');
        var _status = f.findField('status');

        _status.baseParams.class = _class.getValue();
        if (!!_status.pageTb) {
            _status.pageTb.show();
        }
        _status.store.load();
    }

});
Ext.reg('payandsee-alert-window-create', payandsee.window.CreateAlert);
