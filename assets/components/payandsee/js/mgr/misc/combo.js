Ext.namespace('payandsee.combo');


payandsee.combo.Search = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        xtype: 'twintrigger',
        ctCls: 'x-field-search',
        allowBlank: true,
        msgTarget: 'under',
        emptyText: _('search'),
        name: 'query',
        triggerAction: 'all',
        clearBtnCls: 'x-field-search-clear',
        searchBtnCls: 'x-field-search-go',
        onTrigger1Click: this._triggerSearch,
        onTrigger2Click: this._triggerClear
    });
    payandsee.combo.Search.superclass.constructor.call(this, config);
    this.on('render', function () {
        this.getEl().addKeyListener(Ext.EventObject.ENTER, function () {
            this._triggerSearch();
        }, this);
    });
    this.addEvents('clear', 'search');
};
Ext.extend(payandsee.combo.Search, Ext.form.TwinTriggerField, {

    initComponent: function () {
        Ext.form.TwinTriggerField.superclass.initComponent.call(this);
        this.triggerConfig = {
            tag: 'span',
            cls: 'x-field-search-btns',
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger ' + this.searchBtnCls
            }, {
                tag: 'div',
                cls: 'x-form-trigger ' + this.clearBtnCls
            }]
        };
    },

    _triggerSearch: function () {
        this.fireEvent('search', this);
    },

    _triggerClear: function () {
        this.fireEvent('clear', this);
    }

});
Ext.reg('payandsee-field-search', payandsee.combo.Search);


payandsee.combo.Class = function (config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear ? 62 : 31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-class-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-class-clear'
            });
        }

        config.initTrigger = function () {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function (t, all, index) {
                t.hide = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'class',
        hiddenName: config.name || 'class',
        displayField: 'name',
        valueField: 'id',
        editable: true,
        fields: ['name', 'id'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/misc/class/getlist',
            combo: true,
            addall: config.addall || 0,
            class: config.class || ''
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{name}</b></span>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-class',
        clearValue: function () {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function (index) {
            return this.triggers[index];
        },

        onTrigger1Click: function () {
            this.onTriggerClick();
        },

        onTrigger2Click: function () {
            this.clearValue();
        }
    });
    payandsee.combo.Class.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Class, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-class', payandsee.combo.Class);


payandsee.combo.Resource = function(config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear?62:31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-resource-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-resource-clear'
            });
        }

        config.initTrigger = function() {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function(t, all, index) {
                t.hide = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'resource',
        hiddenName: config.name || 'resource',
        displayField: 'pagetitle',
        valueField: 'id',
        editable: true,
        fields: ['pagetitle', 'id'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/misc/resource/getlist',
            combo: true,
            templates: MODx.config['payandsee_working_templates'] || ''
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{pagetitle}</b>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-resource',
        clearValue: function() {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function(index) {
            return this.triggers[index];
        },

        onTrigger1Click: function() {
            this.onTriggerClick();
        },

        onTrigger2Click: function() {
            this.clearValue();
        }
    });
    payandsee.combo.Resource.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Resource, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-resource', payandsee.combo.Resource);


payandsee.combo.Content = function(config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear?62:31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-content-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-content-clear'
            });
        }

        config.initTrigger = function() {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function(t, all, index) {
                t.hide = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'content',
        hiddenName: config.name || 'content',
        displayField: 'name',
        valueField: 'id',
        editable: true,
        fields: ['id', 'name', 'description'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/content/getlist',
            combo: true,
            addall: config.addall || 0,
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item" ext:qtip="{description}">',
            '<small>({id})</small> <b>{name}</b>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-content',
        clearValue: function() {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function(index) {
            return this.triggers[index];
        },

        onTrigger1Click: function() {
            this.onTriggerClick();
        },

        onTrigger2Click: function() {
            this.clearValue();
        }
    });
    payandsee.combo.Content.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Content, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-content', payandsee.combo.Content);


payandsee.combo.Context = function(config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear?62:31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-context-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-context-clear'
            });
        }

        config.initTrigger = function() {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function(t, all, index) {
                t.hide = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'context',
        hiddenName: config.name || 'context',
        displayField: 'name',
        valueField: 'key',
        editable: true,
        fields: ['name', 'key', 'description'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/misc/context/getlist',
            combo: true,
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({key})</small> <b>{name}</b>',
            '<tpl if="description"><br><small>{description}</small></tpl>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-context',
        clearValue: function() {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function(index) {
            return this.triggers[index];
        },

        onTrigger1Click: function() {
            this.onTriggerClick();
        },

        onTrigger2Click: function() {
            this.clearValue();
        }
    });
    payandsee.combo.Context.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Context, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-context', payandsee.combo.Context);


payandsee.combo.User = function(config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear?62:31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-user-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-user-clear'
            });
        }

        config.initTrigger = function() {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function(t, all, index) {
                t.hide = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'username',
        hiddenName: config.name || 'username',
        displayField: 'username',
        valueField: 'id',
        editable: true,
        fields: ['id', 'username', 'email'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/misc/user/getlist',
            combo: true,
            create: config.create || false
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{username}</b>',
            '<tpl if="email"><br><small>{email}</small></tpl>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-user',
        clearValue: function() {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function(index) {
            return this.triggers[index];
        },

        onTrigger1Click: function() {
            this.onTriggerClick();
        },

        onTrigger2Click: function() {
            this.clearValue();
        }
    });
    payandsee.combo.User.superclass.constructor.call(this, config);
    this.on('expand', function () {
        if (!!this.pageTb) {
            this.pageTb.show();
        }
    });
};
Ext.extend(payandsee.combo.User, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-user', payandsee.combo.User);


payandsee.combo.Client = function(config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear?62:31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-client-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-client-clear'
            });
        }

        config.initTrigger = function() {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function(t, all, index) {
                t.hide = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'client',
        hiddenName: config.name || 'client',
        displayField: 'username',
        valueField: 'id',
        editable: true,
        fields: ['id', 'username', 'email'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/client/getlist',
            combo: true,
            addall: config.addall || 0,
            novalue: config.novalue || 0,
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{username}</b>',
            '<tpl if="email"><br><small>{email}</small></tpl>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-client',
        clearValue: function() {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function(index) {
            return this.triggers[index];
        },

        onTrigger1Click: function() {
            this.onTriggerClick();
        },

        onTrigger2Click: function() {
            this.clearValue();
        }
    });
    payandsee.combo.Client.superclass.constructor.call(this, config);
    this.on('expand', function () {
        if (!!this.pageTb) {
            this.pageTb.show();
        }
    });
};
Ext.extend(payandsee.combo.Client, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-client', payandsee.combo.Client);


payandsee.combo.Status = function (config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear ? 62 : 31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-status-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-status-clear'
            });
        }

        config.initTrigger = function () {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function (t, all, index) {
                t.hide = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'status',
        hiddenName: config.name || 'status',
        displayField: 'name',
        valueField: 'id',
        editable: true,
        fields: ['id', 'name', 'description'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/status/getlist',
            combo: true,
            addall: config.addall || 0,
            novalue: config.novalue || 0,
            class: config.class || ''
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item" ext:qtip="{description}">',
            '<small>({id})</small> <b>{name}</b></span>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-search-status',
        clearValue: function () {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function (index) {
            return this.triggers[index];
        },

        onTrigger1Click: function () {
            this.onTriggerClick();
        },

        onTrigger2Click: function () {
            this.clearValue();
        }
    });
    payandsee.combo.Status.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Status, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-status', payandsee.combo.Status);


payandsee.combo.Boolean = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        name: config.name || 'boolean',
        hiddenName: config.name || 'boolean',
        store: new Ext.data.SimpleStore({
            fields: ['d','v'],
            data: [[_('yes'), 1],[_('no'), 0]]
        })
    });
    payandsee.combo.Boolean.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.combo.Boolean, MODx.combo.Boolean);
Ext.reg('payandsee-combo-boolean', payandsee.combo.Boolean);


payandsee.combo.DateUnit = function (config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear ? 62 : 31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-dateunit-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-dateunit-clear'
            });
        }
        config.initTrigger = function () {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function (t, all, index) {
                t.hide = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'dateunit',
        hiddenName: config.name || 'dateunit',
        displayField: 'name',
        valueField: 'id',
        editable: false,
        fields: ['id', 'name', 'description'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/misc/dateunit/getlist',
            combo: true,
            addall: config.addall || 0,
            novalue: config.novalue || 0,
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item" ext:qtip="{description}">',
            '<b>{name}</b>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-dateunit',
        clearValue: function () {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
            this.getStore().reload();

            if (!!this.pageTb) {
                this.pageTb.show();
            }
        },

        getTrigger: function (index) {
            return this.triggers[index];
        },

        onTrigger1Click: function () {
            this.onTriggerClick();
        },

        onTrigger2Click: function () {
            this.clearValue();
        }
    });
    payandsee.combo.DateUnit.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.combo.DateUnit, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-dateunit', payandsee.combo.DateUnit);


payandsee.combo.DateTime = function(config) {
    config = config || {};

    Ext.applyIf(config,{
        timePosition:'right',
        allowBlank: true,
        hiddenFormat:'Y-m-d H:i:s',
        dateFormat: MODx.config['manager_date_format'],
        timeFormat: MODx.config['manager_time_format'],
        cls: 'date-combo',
        ctCls: 'date-combo',
    });

    payandsee.combo.DateTime.superclass.constructor.call(this,config);
};
Ext.extend(payandsee.combo.DateTime,Ext.ux.form.DateTime,{

});
Ext.reg('payandsee-combo-datetime',payandsee.combo.DateTime);


payandsee.combo.Actions = function (config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear ? 62 : 31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-actions-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-actions-clear'
            });
        }
        config.initTrigger = function () {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function (t, all, index) {
                t.hide = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'actions',
        hiddenName: config.name || 'actions',
        displayField: 'name',
        valueField: 'id',
        editable: false,
        fields: ['id', 'name', 'description'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config['connector_url'],
        baseParams: {
            action: 'mgr/misc/action/getlist',
            combo: true,
            class: config.class || '',
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item" ext:qtip="{description}">',
            '<b>{name}</b>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-actions',
        clearValue: function () {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
            this.getStore().reload();

            if (!!this.pageTb) {
                this.pageTb.show();
            }
        },

        getTrigger: function (index) {
            return this.triggers[index];
        },

        onTrigger1Click: function () {
            this.onTriggerClick();
        },

        onTrigger2Click: function () {
            this.clearValue();
        }
    });
    payandsee.combo.Actions.superclass.constructor.call(this, config);
};
Ext.extend(payandsee.combo.Actions, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-actions', payandsee.combo.Actions);


/*

payandsee.combo.Date = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        name: 'date',
        ctCls: 'x-field-date',
        msgTarget: 'under',
       // emptyText: _('search'),
        allowBlank: true
    });

    payandsee.combo.Date.superclass.constructor.call(this, config);
    
};
Ext.extend(payandsee.combo.Date, Ext.form.DateField, {

    onRender:function(ct, position) {
        Ext.form.DateField.superclass.onRender.call(this, ct, position);
        Ext.DomHelper.append(ct.child('div.x-form-field-trigger-wrap'), {
            tag:'div',
            cls:'x-form-trigger x-form-date-clear'
        }, true);

        ct.child('div.x-form-date-clear').on('click', function(e, target, options){
            this.setValue('');
            this.fireEvent("reset");
        }, this);
    }

});
Ext.reg('payandsee-combo-date', payandsee.combo.Date);


payandsee.combo.DateTime = function(config) {
    config = config || {};

    Ext.applyIf(config,{
        timePosition:'right',
        allowBlank: true,
        hiddenFormat:'Y-m-d H:i:s',
        dateFormat: MODx.config.manager_date_format,
        timeFormat: MODx.config.manager_time_format,
        dateWidth: 100,
        timeWidth: 100,
        cls: 'date-combo',
        ctCls: 'date-combo'
    });

    payandsee.combo.DateTime.superclass.constructor.call(this,config);

};
Ext.extend(payandsee.combo.DateTime,Ext.ux.form.DateTime,{

});
Ext.reg('payandsee-combo-datetime',payandsee.combo.DateTime);


payandsee.combo.Browser = function(config) {
    config = config || {};

    if (config.length != 0 && typeof config.openTo !== "undefined") {
        if (!/^\//.test(config.openTo)) {
            config.openTo = '/' + config.openTo;
        }
        if (!/$\//.test(config.openTo)) {
            var tmp = config.openTo.split('/')
            delete tmp[tmp.length - 1];
            tmp = tmp.join('/');
            config.openTo = tmp.substr(1)
        }
    }

    Ext.applyIf(config, {
        width: 300,
        triggerAction: 'all'
    });
    payandsee.combo.Browser.superclass.constructor.call(this, config);
    this.config = config;

};
Ext.extend(payandsee.combo.Browser, Ext.form.TriggerField, {
    browser: null,

    onRender: function(ct, position) {
        this.doc = Ext.isIE ? Ext.getBody() : Ext.getDoc();
        Ext.form.TriggerField.superclass.onRender.call(this, ct, position);

        this.wrap = this.el.wrap({
            cls: 'x-form-field-wrap x-form-field-trigger-wrap'
        });
        this.trigger = this.wrap.createChild(this.triggerConfig || {
            tag: 'div',
            cls: 'x-form-trigger ' + (this.triggerClass || '')
        });
        this.initTrigger();
        if (!this.width) {
            this.wrap.setWidth(this.el.getWidth() + this.trigger.getWidth());
        }
        this.resizeEl = this.positionEl = this.wrap;

    },

    onTriggerClick: function(btn) {
        if (this.disabled) {
            return false;
        }

        //if (this.browser === null) {
        this.browser = MODx.load({
            xtype: 'modx-browser',
            id: Ext.id(),
            multiple: true,
            source: this.config.source || MODx.config.default_media_source,
            rootVisible: this.config.rootVisible || false,
            allowedFileTypes: this.config.allowedFileTypes || '',
            wctx: this.config.wctx || 'web',
            openTo: this.config.openTo || '',
            rootId: this.config.rootId || '/',
            hideSourceCombo: this.config.hideSourceCombo || false,
            hideFiles: this.config.hideFiles || true,
            listeners: {
                'select': {
                    fn: function(data) {
                        this.setValue(data.fullRelativeUrl);
                        this.fireEvent('select', data);

                        var i = Ext.get(this.config.id);
                        if (i) {
                            i.applyStyles('background-image: url(/' + data.fullRelativeUrl + ');background-repeat:repeat-x;');
                        }

                    },
                    scope: this
                }
            }
        });
        //}
        this.browser.win.buttons[0].on('disable', function(e) {
            this.enable()
        })
        this.browser.win.tree.on('click', function(n, e) {
            path = this.getPath(n);
            this.setValue(path);
        }, this);
        this.browser.win.tree.on('dblclick', function(n, e) {
            path = this.getPath(n);
            this.setValue(path);
            this.browser.hide()
        }, this);
        this.browser.show(btn);
        return true;
    },

    onDestroy: function() {
        payandsee.combo.Browser.superclass.onDestroy.call(this);
    },

    getPath: function(n) {
        if (n.id == '/') {
            return '';
        }
        data = n.attributes;
        path = data.path + '/';

        return path;
    }
});
Ext.reg('payandsee-combo-browser', payandsee.combo.Browser);








payandsee.combo.Chunk = function(config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear?62:31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-chunk-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-chunk-clear'
            });
        }

        config.initTrigger = function() {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function(t, all, index) {
                t.hide = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'chunk',
        hiddenName: config.name || 'chunk',
        displayField: 'name',
        valueField: 'id',
        editable: true,
        fields: ['id', 'name', 'description'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config.connector_url,
        baseParams: {
            action: 'mgr/misc/chunk/getlist',
            mode: 'chunks',
            combo: config.combo || true
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{name}</b></span>',
            '<tpl if="description"><br><small>{description}</small></tpl>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-chunk',
        clearValue: function() {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function(index) {
            return this.triggers[index];
        },

        onTrigger1Click: function() {
            this.onTriggerClick();
        },

        onTrigger2Click: function() {
            this.clearValue();
        }
    });
    payandsee.combo.Chunk.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Chunk, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-chunk', payandsee.combo.Chunk);


payandsee.combo.Class = function (config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear ? 62 : 31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-class-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-class-clear'
            });
        }

        config.initTrigger = function () {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function (t, all, index) {
                t.hide = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'class',
        hiddenName: config.name || 'class',
        displayField: 'name',
        valueField: 'id',
        editable: true,
        fields: ['name', 'id'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config.connector_url,
        baseParams: {
            action: 'mgr/misc/class/getlist',
            combo: true,
            addall: config.addall || 0,
            class: config.class || ''
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{name}</b></span>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-class',
        clearValue: function () {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function (index) {
            return this.triggers[index];
        },

        onTrigger1Click: function () {
            this.onTriggerClick();
        },

        onTrigger2Click: function () {
            this.clearValue();
        }
    });
    payandsee.combo.Class.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Class, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-class', payandsee.combo.Class);


payandsee.combo.Client = function(config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear?62:31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-client-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-client-clear'
            });
        }

        config.initTrigger = function() {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function(t, all, index) {
                t.hide = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function() {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'client',
        hiddenName: config.name || 'client',
        displayField: 'username',
        valueField: 'id',
        editable: true,
        fields: ['username', 'id', 'fullname'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config.connector_url,
        baseParams: {
            action: 'mgr/client/getlist',
            addall: config.addall || 0,
            combo: true
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{username}</b><br/>{fullname}</span>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-payandsee-client',
        clearValue: function() {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function(index) {
            return this.triggers[index];
        },

        onTrigger1Click: function() {
            this.onTriggerClick();
        },

        onTrigger2Click: function() {
            this.clearValue();
        }
    });
    payandsee.combo.Client.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Client, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-client', payandsee.combo.Client);




payandsee.combo.Content = function (config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear ? 62 : 31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-content-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-content-clear'
            });
        }

        config.initTrigger = function () {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function (t, all, index) {
                t.hide = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'content',
        hiddenName: config.name || 'content',
        displayField: 'name',
        valueField: 'id',
        editable: true,
        fields: ['name', 'id'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config.connector_url,
        baseParams: {
            action: 'mgr/content/getlist',
            combo: true,
            addall: config.addall || 0,
            class: config.class || ''
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{name}</b></span>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-search-content',
        clearValue: function () {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function (index) {
            return this.triggers[index];
        },

        onTrigger1Click: function () {
            this.onTriggerClick();
        },

        onTrigger2Click: function () {
            this.clearValue();
        }
    });
    payandsee.combo.Content.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Content, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-content', payandsee.combo.Content);



payandsee.combo.Type = function (config) {
    config = config || {};

    if (config.custm) {
        config.triggerConfig = [{
            tag: 'div',
            cls: 'x-field-search-btns',
            style: String.format('width: {0}px;', config.clear ? 62 : 31),
            cn: [{
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-type-go'
            }]
        }];
        if (config.clear) {
            config.triggerConfig[0].cn.push({
                tag: 'div',
                cls: 'x-form-trigger x-field-payandsee-type-clear'
            });
        }

        config.initTrigger = function () {
            var ts = this.trigger.select('.x-form-trigger', true);
            this.wrap.setStyle('overflow', 'hidden');
            var triggerField = this;
            ts.each(function (t, all, index) {
                t.hide = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = 'none';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                t.show = function () {
                    var w = triggerField.wrap.getWidth();
                    this.dom.style.display = '';
                    triggerField.el.setWidth(w - triggerField.trigger.getWidth());
                };
                var triggerIndex = 'Trigger' + (index + 1);

                if (this['hide' + triggerIndex]) {
                    t.dom.style.display = 'none';
                }
                t.on('click', this['on' + triggerIndex + 'Click'], this, {
                    preventDefault: true
                });
                t.addClassOnOver('x-form-trigger-over');
                t.addClassOnClick('x-form-trigger-click');
            }, this);
            this.triggers = ts.elements;
        };
    }
    Ext.applyIf(config, {
        name: config.name || 'type',
        hiddenName: config.name || 'type',
        displayField: 'name',
        valueField: 'id',
        editable: true,
        fields: ['name', 'id'],
        pageSize: 10,
        emptyText: _('payandsee_combo_select'),
        hideMode: 'offsets',
        url: payandsee.config.connector_url,
        baseParams: {
            action: 'mgr/type/getlist',
            combo: true,
            addall: config.addall || 0,
            novalue: config.novalue || 0,
            class: config.class || ''
        },
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<small>({id})</small> <b>{name}</b></span>',
            '</div></tpl>',
            {
                compiled: true
            }),
        cls: 'input-combo-search-type',
        clearValue: function () {
            if (this.hiddenField) {
                this.hiddenField.value = '';
            }
            this.setRawValue('');
            this.lastSelectionText = '';
            this.applyEmptyText();
            this.value = '';
            this.fireEvent('select', this, null, 0);
        },

        getTrigger: function (index) {
            return this.triggers[index];
        },

        onTrigger1Click: function () {
            this.onTriggerClick();
        },

        onTrigger2Click: function () {
            this.clearValue();
        }
    });
    payandsee.combo.Type.superclass.constructor.call(this, config);

};
Ext.extend(payandsee.combo.Type, MODx.combo.ComboBox);
Ext.reg('payandsee-combo-type', payandsee.combo.Type);


*/
