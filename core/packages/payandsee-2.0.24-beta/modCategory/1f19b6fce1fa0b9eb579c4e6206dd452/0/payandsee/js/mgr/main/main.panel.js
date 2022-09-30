payandsee.panel.Main = function (config) {
    config = config || {};
    config.class = config.class || '';

    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        cls: 'payandsee-formpanel',
        layout: 'anchor',
        hideMode: 'offsets',
        items: [{
            xtype: 'modx-tabs',
            defaults: {
                border: false,
                autoHeight: true,
                deferredRender: false,
                forceLayout: true
            },
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('payandsee_contents'),
                layout: 'anchor',
                items: [{
                    html: _('payandsee_contents_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'payandsee-grid-content',
                    class: 'PasContent',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('payandsee_rates'),
                layout: 'anchor',
                items: [{
                    html: _('payandsee_rates_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'payandsee-grid-rate',
                    class: '',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('payandsee_clients'),
                layout: 'anchor',
                items: [{
                    html: _('payandsee_clients_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'payandsee-grid-client',
                    class: 'PasClient',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('payandsee_subscriptions'),
                layout: 'anchor',
                items: [{
                    html: _('payandsee_subscriptions_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'payandsee-grid-subscription',
                    class: 'PasSubscription',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('payandsee_statuses'),
                layout: 'anchor',
                items: [{
                    html: _('payandsee_statuses_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'payandsee-grid-status',
                    class: 'PasClient',
                    cls: 'main-wrapper'
                }]
            }, {
                title: _('payandsee_alerts'),
                layout: 'anchor',
                items: [{
                    html: _('payandsee_alerts_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'payandsee-grid-alert',
                    class: '',
                    cls: 'main-wrapper'
                }]
            }, /*{
                title: _('payandsee_accesses'),
                layout: 'anchor',
                items: [{
                    html: _('payandsee_accesses_intro'),
                    cls: 'panel-desc'
                }, {
                    xtype: 'payandsee-grid-access',
                    class: '',
                    cls: 'main-wrapper'
                }]
            }*/]
        }]
    });
    payandsee.panel.Main.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.panel.Main, MODx.Panel);
Ext.reg('payandsee-panel-main', payandsee.panel.Main);
