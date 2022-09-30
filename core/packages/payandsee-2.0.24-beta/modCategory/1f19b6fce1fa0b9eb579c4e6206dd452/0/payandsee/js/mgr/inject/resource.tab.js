Ext.override(MODx.panel.Resource, {

    pasOriginals: {
        getFields: MODx.panel.Resource.prototype.getFields,
        beforeSubmit: MODx.panel.Resource.prototype.beforeSubmit,
        success: MODx.panel.Resource.prototype.success,
        failure: MODx.panel.Resource.prototype.failure
    },

    getFields: function (config) {
        var fields = this.pasOriginals.getFields.call(this, config);

        var record = {
            resource: payandsee.config.resource || null,
            content: payandsee.config.content || null,
        };

        fields.filter(function (row) {
            if (row.id == 'modx-resource-tabs') {
                row.items.push({
                    xtype: 'payandsee-panel-content-update',
                    title: _('payandsee'),
                    record: record,
                    update: record.content ? true : false
                });
            }
        });

        return fields;
    },

    success: function (o) {
        var $this = this,
            form = $this.getForm(),
            values = form.getValues(),
            pasOriginals = this.pasOriginals,
            fields = {};

        Ext.iterate(values, function (key, value) {
            if (key.indexOf(payandsee.config.key_prefix) === 0) {
                fields[key.substr(4)] = value;
            }
        });

        if (Object.keys(fields).length > 0) {
            MODx.Ajax.request({
                url: payandsee.config['connector_url'],
                params: Ext.apply({
                    action: 'mgr/content/update',
                }, fields),
                listeners: {
                    success: {
                        fn: function (response) {
                            pasOriginals.success.call($this, o);
                        },
                        scope: this
                    },
                    failure: {
                        fn: function (response) {
                            pasOriginals.success.call($this, o);

                            var errors = [];
                            Ext.iterate(response.data, function (value, key) {
                                value['id'] = payandsee.config.key_prefix + value['id'];
                                errors.push(value);
                            });
                            form.markInvalid(errors);
                            if (response.message) {
                                MODx.msg.alert(_('error'), response.message);
                            }

                        }, scope: this
                    },
                }
            });
        }
        else {
            pasOriginals.success.call($this, o);
        }

    }

});