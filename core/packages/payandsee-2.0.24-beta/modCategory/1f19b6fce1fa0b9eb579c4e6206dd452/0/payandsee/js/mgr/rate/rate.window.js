payandsee.window.CreateRate = function (config) {
    config = config || {};

    Ext.applyIf(config, {
        title: _('create'),
        width: 600,
        autoHeight: true,
        fields: this.getFields(config),
        action: 'mgr/rate/create',
        url: payandsee.config['connector_url'],
        bodyCssClass: 'payandsee-window',
    });
    payandsee.window.CreateRate.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.window.CreateRate, MODx.Window, {

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
                    xtype: 'numberfield',
                    decimalPrecision: 2,
                    fieldLabel: _('payandsee_cost'),
                    name: 'cost',
                    anchor: '100%',
                    allowBlank: false
                }]
            }, {
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
                }]
            }]
        }, {
            layout: 'column',
            border: false,
            items: [{
                columnWidth: 0.5,
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
    }

});
Ext.reg('payandsee-rate-window-create', payandsee.window.CreateRate);
