payandsee.window.CreateSubscription = function (config) {
    config = config || {};
    config.update = Boolean(config.update || false);

    Ext.applyIf(config, {
        title: _('create'),
        width: 600,
        autoHeight: true,
        fields: this.getFields(config),
        action: 'mgr/subscription/create',
        url: payandsee.config['connector_url'],
        bodyCssClass: 'payandsee-window',
    });
    payandsee.window.CreateSubscription.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.window.CreateSubscription, MODx.Window, {

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
                    xtype: 'payandsee-combo-content',
                    custm: true,
                    clear: true,
                    fieldLabel: _('payandsee_content'),
                    msgTarget: 'under',
                    name: 'content',
                    anchor: '100%',
                    allowBlank: false
                },{
                    xtype: 'payandsee-combo-status',
                    class: 'PasSubscription',
                    custm: true,
                    clear: true,
                    fieldLabel: _('payandsee_status'),
                    msgTarget: 'under',
                    name: 'status',
                    anchor: '100%',
                    allowBlank: false
                }]
            }, {
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-client',
                    custm: true,
                    clear: true,
                    fieldLabel: _('payandsee_client'),
                    msgTarget: 'under',
                    name: 'client',
                    anchor: '100%',
                    allowBlank: false
                },{}]
            }]
        }, {
            layout: 'column',
            border: false,
            items: [{
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-datetime',
                    fieldLabel: _('payandsee_startdate'),
                    msgTarget: 'under',
                    name: 'startdate',
                    anchor: '100%',
                    allowBlank: false
                }]
            }, {
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-datetime',
                    fieldLabel: _('payandsee_stopdate'),
                    msgTarget: 'under',
                    name: 'stopdate',
                    anchor: '100%',
                    allowBlank: false
                }]
            }]
        }, {
            xtype: 'xcheckbox',
            hideLabel: true,
            name: 'term_correct',
            boxLabel: _('payandsee_action_correct'),
            checked: false,
            slave: ['term_action','term_value','term_unit'],
            /*disabled: !config.update,*/
            listeners: {
                check: {
                    fn: function (field) {
                        this.handleCorrect(field);
                    },
                    scope: this
                },
                afterrender: {
                    fn: function (field) {
                        this.handleCorrect(field);
                    },
                    scope: this
                },
            }
        }, {
            layout: 'column',
            border: false,
            items: [{
                columnWidth: 0.2,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-actions',
                    class: 'PasSubscription',
                    fieldLabel: _('payandsee_action'),
                    msgTarget: 'under',
                    name: 'term_action',
                    anchor: '100%',
                    allowBlank: false,
                }]
            }, {
                columnWidth: 0.3,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'numberfield',
                    decimalPrecision: 0,
                    maskRe: /[0123456789]/,
                    fieldLabel: _('payandsee_value'),
                    name: 'term_value',
                    anchor: '100%',
                    allowBlank: false
                }]
            }, {
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-dateunit',
                    custm: true,
                    clear: true,
                    fieldLabel: _('payandsee_unit'),
                    name: 'term_unit',
                    anchor: '100%',
                    allowBlank: false,
                }]
            }]
        }];

    },

    handleCorrect: function (field) {
        var f = this.fp.getForm();

        if (field.slave) {
            var checked = field.getValue();

            for (i in field.slave) {
                var _slave = f.findField(field.slave[i]);

                if (_slave && checked) {
                    _slave.show().enable();
                }
                if (_slave && !checked) {
                    _slave.hide().disable();
                }
            }
        }
    }

});
Ext.reg('payandsee-window-create-subscription', payandsee.window.CreateSubscription);

