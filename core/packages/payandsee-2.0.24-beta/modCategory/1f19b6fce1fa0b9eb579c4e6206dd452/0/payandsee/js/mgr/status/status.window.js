payandsee.window.CreateStatus = function (config) {
    config = config || {};

    Ext.applyIf(config, {
        title: _('create'),
        width: 600,
        autoHeight: true,
        fields: this.getFields(config),
        action: 'mgr/status/create',
        url: payandsee.config['connector_url'],
        bodyCssClass: 'payandsee-window',
    });
    payandsee.window.CreateStatus.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.window.CreateStatus, MODx.Window, {

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
                    xtype: 'textfield',
                    fieldLabel: _('payandsee_name'),
                    name: 'name',
                    anchor: '100%',
                    allowBlank: false
                }]
            }, {
                columnWidth: 0.5,
                layout: 'form',
                defaults: {border: false, anchor: '100%'},
                items: [{
                    xtype: 'payandsee-combo-class',
                    fieldLabel: _('payandsee_class'),
                    name: 'class',
                    anchor: '100%',
                    allowBlank: false
                }]
            }]
        }, {
            xtype: 'colorpalette',
            cls: 'payandsee-colorpalette',
            itemCls: 'x-color-palette payandsee-colorpalette-main',
            fieldLabel: _('payandsee_color'),
            colors: payandsee.tools.colors,
            listeners: {
                select: payandsee.tools.handleColor,
                beforerender: payandsee.tools.handleColor
            }
        }, {
            xtype: 'hidden',
            name: 'color'
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
            columns: 4,
            items: [{
                xtype: 'xcheckbox',
                boxLabel: _('payandsee_active'),
                name: 'active',
                checked: parseInt(config.record.active)
            }, {
                xtype: 'xcheckbox',
                boxLabel: _('payandsee_allowed'),
                name: 'allowed',
                checked: parseInt(config.record.allowed)
            }]
        }];

    }

});
Ext.reg('payandsee-status-window-create', payandsee.window.CreateStatus);
