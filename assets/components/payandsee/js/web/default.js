(function (window, document, $, payandseeConfig) {
    var payandsee = payandsee || {};
    payandseeConfig.callbacksObjectTemplate = function () {
        return {
            // return false to prevent send data
            before: [],
            response: {
                success: [],
                error: []
            },
            ajax: {
                done: [],
                fail: [],
                always: []
            }
        }
    };
    payandsee.Callbacks = payandseeConfig.Callbacks = {
        Order: {
            add: payandseeConfig.callbacksObjectTemplate(),
            getcost: payandseeConfig.callbacksObjectTemplate(),
            submit: payandseeConfig.callbacksObjectTemplate(),
            getrequired: payandseeConfig.callbacksObjectTemplate()
        },
    };
    payandsee.Callbacks.add = function (path, name, func) {
        if (typeof func != 'function') {
            return false;
        }
        path = path.split('.');
        var obj = payandsee.Callbacks;
        for (var i = 0; i < path.length; i++) {
            if (obj[path[i]] == undefined) {
                return false;
            }
            obj = obj[path[i]];
        }
        if (typeof obj != 'object') {
            obj = [obj];
        }
        if (name != undefined) {
            obj[name] = func;
        }
        else {
            obj.push(func);
        }
        return true;
    };
    payandsee.Callbacks.remove = function (path, name) {
        path = path.split('.');
        var obj = payandsee.Callbacks;
        for (var i = 0; i < path.length; i++) {
            if (obj[path[i]] == undefined) {
                return false;
            }
            obj = obj[path[i]];
        }
        if (obj[name] != undefined) {
            delete obj[name];
            return true;
        }
        return false;
    };
    payandsee.ajaxProgress = false;
    payandsee.setup = function () {
        // selectors & $objects
        this.actionName = 'pasaction';
        this.action = ':submit[name=' + this.actionName + ']';
        this.form = '.pas-form';
        this.$doc = $(document);
        this.$body = $('body');
        this.$spinner = null;

        this.sendData = {
            $form: null,
            action: null,
            formData: null
        };

        this.timeout = 500;
    };
    payandsee.initialize = function () {
        payandsee.setup();
        // Indicator of active ajax request

        //noinspection JSUnresolvedFunction
        payandsee.$doc
            .ajaxStart(function () {
                payandsee.ajaxProgress = true;
            })
            .ajaxStop(function () {
                payandsee.ajaxProgress = false;
            })
            .off('submit', payandsee.form)
            .on('submit', payandsee.form, function (e) {
                e.preventDefault();
                var $form = $(this);
                var action = $form.find(payandsee.action).val();

                if (action) {
                    var formData = $form.serializeArray();
                    formData.push({
                        name: payandsee.actionName,
                        value: action
                    });
                    payandsee.sendData = {
                        $form: $form,
                        action: action,
                        formData: formData
                    };
                    payandsee.controller();
                }
            });
        // payandsee.Cart.initialize();
        payandsee.Message.initialize();
        payandsee.Order.initialize();
    };
    payandsee.controller = function () {
        var self = this;
        switch (self.sendData.action) {
            case 'order/submit':
                payandsee.Order.submit();
                break;
            default:
                return;
        }
    };
    payandsee.send = function (data, callbacks, userCallbacks) {
        var runCallback = function (callback, bind) {
            if (typeof callback == 'function') {
                return callback.apply(bind, Array.prototype.slice.call(arguments, 2));
            }
            else if (typeof callback == 'object') {
                for (var i in callback) {
                    if (callback.hasOwnProperty(i)) {
                        var response = callback[i].apply(bind, Array.prototype.slice.call(arguments, 2));
                        if (response === false) {
                            return false;
                        }
                    }
                }
            }
            return true;
        };
        // set context
        if ($.isArray(data)) {
            data.push({
                name: 'ctx',
                value: payandseeConfig.ctx
            });
        }
        else if ($.isPlainObject(data)) {
            data.ctx = payandseeConfig.ctx;
        }
        else if (typeof data == 'string') {
            data += '&ctx=' + payandseeConfig.ctx;
        }

        // set action url
        var formActionUrl = (payandsee.sendData.$form)
            ? payandsee.sendData.$form.attr('action')
            : false;
        var url = (formActionUrl)
            ? formActionUrl
            : (payandseeConfig.actionUrl)
                ? payandseeConfig.actionUrl
                : document.location.href;
        // set request method
        var formMethod = (payandsee.sendData.$form)
            ? payandsee.sendData.$form.attr('method')
            : false;
        var method = (formMethod)
            ? formMethod
            : 'post';

        // callback before
        if (runCallback(callbacks.before) === false || runCallback(userCallbacks.before) === false) {
            return;
        }

        //payandsee.Spinner.show();

        // send
        var xhr = function (callbacks, userCallbacks) {
            return $[method](url, data, function (response) {
                //payandsee.Spinner.hide();

                if (response.success) {
                    if (response.message) {
                        payandsee.Message.success(response.message);
                    }
                    runCallback(callbacks.response.success, payandsee, response);
                    runCallback(userCallbacks.response.success, payandsee, response);
                }
                else {
                    payandsee.Message.error(response.message);
                    runCallback(callbacks.response.error, payandsee, response);
                    runCallback(userCallbacks.response.error, payandsee, response);
                }
            }, 'json').done(function () {
                runCallback(callbacks.ajax.done, payandsee, xhr);
                runCallback(userCallbacks.ajax.done, payandsee, xhr);
            }).fail(function () {
                runCallback(callbacks.ajax.fail, payandsee, xhr);
                runCallback(userCallbacks.ajax.fail, payandsee, xhr);
            }).always(function () {
                runCallback(callbacks.ajax.always, payandsee, xhr);
                runCallback(userCallbacks.ajax.always, payandsee, xhr);
            });
        }(callbacks, userCallbacks);
    };

    payandsee.Order = {
        callbacks: {
            add: payandseeConfig.callbacksObjectTemplate(),
            getcost: payandseeConfig.callbacksObjectTemplate(),
            submit: payandseeConfig.callbacksObjectTemplate(),
            getrequired: payandseeConfig.callbacksObjectTemplate()
        },
        setup: function () {
            payandsee.Order.order = '.pas-order';
            payandsee.Order.inputParent = '.input-parent';

            payandsee.Order.contentInput = '[name="content"]';
            payandsee.Order.rateInput = '[name="rate"]';
            payandsee.Order.deliveryInput = '[name="delivery"]';
            payandsee.Order.paymentInput = '[name="payment"]';
            payandsee.Order.couponCodeInput = '[name="coupon_code"]';
            payandsee.Order.promoCodeInput = '[name="mspromo_code"]';

            payandsee.Order.contentInputUniquePrefix = '#content_';
            payandsee.Order.rateInputUniquePrefix = '#rate_';
            payandsee.Order.paymentInputUniquePrefix = '#payment_';
            payandsee.Order.deliveryInputUniquePrefix = '#delivery_';

            payandsee.Order.orderCost = '#pas-order-cost'
        },
        initialize: function () {
            payandsee.Order.setup();
            if ($(payandsee.Order.order).length) {
                payandsee.$doc
                    .off('change', payandsee.Order.order + ' input,' + payandsee.Order.order + ' select,' + payandsee.Order.order + ' textarea')
                    .on('change', payandsee.Order.order + ' input,' + payandsee.Order.order + ' select,' + payandsee.Order.order + ' textarea', function () {
                        var $this = $(this);
                        var key = $this.attr('name');
                        var value = $this.val();

                        payandsee.Order.add(key, value);
                    });

                var $paymentInputChecked = $(payandsee.Order.paymentInput + ':checked', payandsee.Order.order);
                if ($paymentInputChecked.length < 1) {
                    $paymentInputChecked = $(payandsee.Order.paymentInput);
                }
                $paymentInputChecked.trigger('change');

                var $rateInputChecked = $(payandsee.Order.rateInput + ':checked', payandsee.Order.order);
                if ($rateInputChecked.length < 1) {
                    $rateInputChecked = $(payandsee.Order.rateInput);
                }
                setTimeout((function () {
                    $rateInputChecked.trigger('change');
                }.bind(this)), payandsee.timeout);

            }
        },

        add: function (key, value) {
            var callbacks = payandsee.Order.callbacks;
            var old_value = value;

            callbacks.add.ajax.always = function (response) {
                response = response.responseJSON ? response.responseJSON : JSON.parse(response.responseText);
                (function (key, value, old_value) {
                    var $field = $('[name="' + key + '"]', payandsee.Order.order);
                    switch (key) {
                        case 'coupon_code':
                            $field = $(payandsee.Order.couponCodeInput);
                            if (response.data[key] != old_value) {
                                $field.trigger('click');
                            }
                            else {
                                payandsee.Order.getcost();
                            }
                            break;
                        case 'mspromo_code':
                            $field = $(payandsee.Order.promoCodeInput);
                            if (response.data[key] != old_value) {
                                $field.trigger('click');
                            }
                            else {
                                payandsee.Order.getcost();
                            }
                            break;
                        //default:
                    }

                    if (response.data[key] != 'undefined') {
                        $field.val(response.data[key]).removeClass('error').closest(payandsee.Order.inputParent).removeClass('error');
                    }
                })(key, value, old_value);
            };

            callbacks.add.response.success = function (response) {
                (function (key, value, old_value) {
                    var $field = $('[name="' + key + '"]', payandsee.Order.order);
                    switch (key) {
                        case 'content':
                            $field = $(payandsee.Order.contentInputUniquePrefix + response.data[key]);
                            if (response.data[key] != old_value) {
                                $field.trigger('click');
                            }
                            else {
                                payandsee.Order.getcost();
                            }
                            break;
                        case 'rate':
                            $field = $(payandsee.Order.rateInputUniquePrefix + response.data[key]);
                            if (response.data[key] != old_value) {
                                $field.trigger('click');
                            }
                            else {
                                payandsee.Order.getcost();
                            }
                            break;
                        case 'delivery':
                            $field = $(payandsee.Order.deliveryInputUniquePrefix + response.data[key]);
                            if (response.data[key] != old_value) {
                                $field.trigger('click');
                            }
                            else {
                                payandsee.Order.getrequired(value);
                                payandsee.Order.getcost();
                            }
                            break;
                        case 'payment':
                            $field = $(payandsee.Order.paymentInputUniquePrefix + response.data[key]);
                            if (response.data[key] != old_value) {
                                $field.trigger('click');
                            }
                            else {
                                payandsee.Order.getcost();
                            }
                            break;
                        //default:
                    }

                    if (response.data[key] != 'undefined') {
                        $field.val(response.data[key]).removeClass('error').closest(payandsee.Order.inputParent).removeClass('error');
                    }
                })(key, value, old_value);
            };
            callbacks.add.response.error = function () {
                (function (key) {
                    var $field = $('[name="' + key + '"]', payandsee.Order.order);
                    if ($field.attr('type') == 'checkbox' || $field.attr('type') == 'radio') {
                        $field.closest(payandsee.Order.inputParent).addClass('error');
                    }
                    else {
                        $field.addClass('error');
                    }
                })(key);
            };

            var data = {
                key: key,
                value: value
            };
            data[payandsee.actionName] = 'order/add';
            payandsee.send(data, payandsee.Order.callbacks.add, payandsee.Callbacks.Order.add);
        },
        getcost: function () {
            var callbacks = payandsee.Order.callbacks;
            callbacks.getcost.response.success = function (response) {
                $(payandsee.Order.orderCost, payandsee.Order.order).text(payandsee.Utils.formatPrice(response.data['cost']));
                $.map(response.data['blocks'] || {}, function (value, selector) {
                    $(selector, payandsee.Order.order).html(value);
                });
            };
            var data = {};
            data[payandsee.actionName] = 'order/getcost';
            payandsee.send(data, payandsee.Order.callbacks.getcost, payandsee.Callbacks.Order.getcost);
        },
        submit: function () {
            payandsee.Message.close();

            // Checking for active ajax request
            if (payandsee.ajaxProgress) {
                //noinspection JSUnresolvedFunction
                payandsee.$doc.ajaxComplete(function () {
                    payandsee.ajaxProgress = false;
                    payandsee.$doc.unbind('ajaxComplete');
                    payandsee.Order.submit();
                });
                return false;
            }

            var callbacks = payandsee.Order.callbacks;
            callbacks.submit.before = function () {
                $(':button, a', payandsee.Order.order).attr('disabled', true).prop('disabled', true);
            };
            callbacks.submit.response.success = function (response) {
                if (response.data['redirect']) {
                    document.location.href = response.data['redirect'];
                }
                else if (response.data['msorder']) {
                    document.location.href = /\?/.test(document.location.href)
                        ? document.location.href + '&msorder=' + response.data['msorder']
                        : document.location.href + '?msorder=' + response.data['msorder'];
                }
                else {
                    location.reload();
                }
            };
            callbacks.submit.response.error = function (response) {
                setTimeout((function () {
                    $(':button, a', payandsee.Order.order).attr('disabled', false).prop('disabled', false);
                }.bind(this)),3*payandsee.timeout);

                $('[name]', payandsee.Order.order).removeClass('error').closest(payandsee.Order.inputParent).removeClass('error');
                for (var i in response.data) {
                    if (response.data.hasOwnProperty(i)) {
                        var key = response.data[i];
                        //var $field = $('[name="' + response.data[i] + '"]', payandsee.Order.order);
                        //$field.addClass('error').closest(payandsee.Order.inputParent).addClass('error');
                        var $field = $('[name="' + key + '"]', payandsee.Order.order);
                        if ($field.attr('type') == 'checkbox' || $field.attr('type') == 'radio') {
                            $field.closest(payandsee.Order.inputParent).addClass('error');
                        }
                        else {
                            $field.addClass('error');
                        }
                    }
                }
            };
            return payandsee.send(payandsee.sendData.formData, payandsee.Order.callbacks.submit, payandsee.Callbacks.Order.submit);
        },
        getrequired: function (value) {
            var callbacks = payandsee.Order.callbacks;
            callbacks.getrequired.response.success = function (response) {
                $('[name]', payandsee.Order.order).removeClass('required').closest(payandsee.Order.inputParent).removeClass('required');
                var requires = response.data['requires'];
                for (var i = 0, length = requires.length; i < length; i++) {
                    $('[name=' + requires[i] + ']', payandsee.Order.order).addClass('required').closest(payandsee.Order.inputParent).addClass('required');
                }
            };
            callbacks.getrequired.response.error = function () {
                $('[name]', payandsee.Order.order).removeClass('required').closest(payandsee.Order.inputParent).removeClass('required');
            };

            var data = {
                id: value
            };
            data[payandsee.actionName] = 'order/getrequired';
            payandsee.send(data, payandsee.Order.callbacks.getrequired, payandsee.Callbacks.Order.getrequired);
        }
    };

    payandsee.Message = {
        initialize: function () {
            payandsee.Message.close = function () {
            };
            payandsee.Message.show = function (message) {
                if (message != '') {
                    alert(message);
                }
            };

            if (typeof($.fn.jGrowl) != 'function') {
                $.getScript(payandseeConfig.assetsUrl + 'vendor/jgrowl/jquery.jgrowl.min.js', function () {
                    payandsee.Message.initialize();
                });
            }
            else {
                $.jGrowl.defaults.closerTemplate = null;
                payandsee.Message.close = function () {
                    $.jGrowl('close');
                };
                payandsee.Message.show = function (message, options) {
                    if (message != '') {
                        $.jGrowl(message, options);
                    }
                }
            }
        },
        success: function (message) {
            payandsee.Message.show(message, {
                theme: 'pas-message-success',
                sticky: false
            });
        },
        error: function (message) {
            payandsee.Message.show(message, {
                theme: 'pas-message-error',
                sticky: false
            });
        },
        info: function (message) {
            payandsee.Message.show(message, {
                theme: 'pas-message-info',
                sticky: false
            });
        }
    };

    payandsee.Utils = {
        empty: function (val) {
            return (typeof(val) == 'undefined' || val == 0 || val === null || val === false || (typeof(val) == 'string' && val.replace(/\s+/g, '') == '') || (typeof(val) == 'object' && val.length == 0));
        },
        formatPrice: function (price) {
            var pf = payandseeConfig.price_format;
            price = this.number_format(price, pf[0], pf[1], pf[2]);

            if (payandseeConfig.price_format_no_zeros) {
                price = price.replace(/(0+)$/, '');
                price = price.replace(/[^0-9]$/, '');
            }

            return price;
        },
        formatWeight: function (weight) {
            var wf = payandseeConfig.weight_format;
            weight = this.number_format(weight, wf[0], wf[1], wf[2]);

            if (payandseeConfig.weight_format_no_zeros) {
                weight = weight.replace(/(0+)$/, '');
                weight = weight.replace(/[^0-9]$/, '');
            }

            return weight;
        },
        // Format a number with grouped thousands,
        number_format: function (number, decimals, dec_point, thousands_sep) {
            // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
            // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
            // bugfix by: Michael White (http://crestidg.com)
            var i, j, kw, kd, km;

            // input sanitation & defaults
            if (isNaN(decimals = Math.abs(decimals))) {
                decimals = 2;
            }
            if (dec_point == undefined) {
                dec_point = ',';
            }
            if (thousands_sep == undefined) {
                thousands_sep = '.';
            }

            i = parseInt(number = (+number || 0).toFixed(decimals)) + '';

            if ((j = i.length) > 3) {
                j = j % 3;
            }
            else {
                j = 0;
            }

            km = j
                ? i.substr(0, j) + thousands_sep
                : '';
            kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
            kd = (decimals
                ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, '0').slice(2)
                : '');

            return km + kw + kd;
        },
        getValueFromSerializedArray: function (name, arr) {
            if (!$.isArray(arr)) {
                arr = payandsee.sendData.formData;
            }
            for (var i = 0, length = arr.length; i < length; i++) {
                if (arr[i].name = name) {
                    return arr[i].value;
                }
            }
            return null;
        }
    };

    payandsee.Spinner = {
        create: function () {
            return $('<div class="pas-spinner"></div>');
        },
        show: function () {
            payandsee.$spinner = payandsee.$spinner || this.create();
            payandsee.$body.append(payandsee.$spinner);

            return payandsee.$spinner.show();
        },

        hide: function () {
            if (payandsee.$spinner) {
                return payandsee.$spinner.remove();
            }
        },
    };

    $(document).ready(function ($) {
        payandsee.initialize();
        var html = $('html');
        html.removeClass('no-js');
        if (!html.hasClass('js')) {
            html.addClass('js');
        }
    });

    window.payandsee = payandsee;
})(window, document, jQuery, payandseeConfig);