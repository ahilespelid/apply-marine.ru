<?php
/* Smarty version 3.1.44, created on 2022-08-25 07:36:03
  from '/var/www/apply_marine/core/components/yandexcoordstv/tv/tpl/yandexcoordstv.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_6307266399c8e4_49794087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '328df3ac5835d728afa6fd10f0682582cfb3fe02' => 
    array (
      0 => '/var/www/apply_marine/core/components/yandexcoordstv/tv/tpl/yandexcoordstv.tpl',
      1 => 1635403912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6307266399c8e4_49794087 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="yandexcoordstv__wrapper">
    <div class="yandexcoordstv__map">
        <div id="yandexcoordstv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" class="yandexcoordstv__map__inner"></div>
    </div>

    <input
            id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
"
            name="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
"
            class="yandexcoordstv__input"
            type="text"
            value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->get('value'), ENT_QUOTES, 'UTF-8', true);?>
"
            <?php echo $_smarty_tpl->tpl_vars['style']->value;?>

            tvtype="<?php echo $_smarty_tpl->tpl_vars['tv']->value->type;?>
"
    />
</div>

<?php echo '<script'; ?>
 type="text/javascript">

    /* API YANDEX*/
    //
    // Дождёмся загрузки API и готовности DOM.
    ymaps.ready(init);

    function init() {
        var center<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
 = [<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->get('value'), ENT_QUOTES, 'UTF-8', true);?>
];
        if ('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->get('value'), ENT_QUOTES, 'UTF-8', true);?>
' == '') {
            center<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
 = [51.485489, 46.126783];
        }
        var myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
,
            myMap<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
 = new ymaps.Map('yandexcoordstv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
', {
                center: center<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
,
                zoom: 9,
                controls: []
            }), mySearchControl = new ymaps.control.SearchControl({
                options: {
                    noPlacemark: true
                }
            }), zoomControl = new ymaps.control.ZoomControl({
                options: {
                    size: "small"
                }
            });

        myMap<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.controls.add(mySearchControl);
        myMap<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.controls.add(zoomControl);
        // Если уже TV заполнено
        if ('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->get('value'), ENT_QUOTES, 'UTF-8', true);?>
' != '') {
            myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
 = createPlacemark([<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->get('value'), ENT_QUOTES, 'UTF-8', true);?>
]);
            myMap<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.geoObjects.add(myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
);
            getAddress(myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.geometry.getCoordinates());
        }

        //Слушаем выбор поиска
        mySearchControl.events.add('resultselect', function (e) {
            var index = e.get('index');
            var coords = mySearchControl.getResult(index)._value.geometry.getCoordinates();
            setMarker<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
(coords);
        });

        setMarker<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
 = function (coords) {
            // Если метка уже создана – просто передвигаем ее.
            if (myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
) {
                myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.geometry.setCoordinates(coords);
            }
            // Если нет – создаем.
            else {
                myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
 = createPlacemark(coords);
                myMap<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.geoObjects.add(myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
);
                // Слушаем событие окончания перетаскивания на метке.
                myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.events.add('dragend', function () {
                    getAddress(myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.geometry.getCoordinates());
                });
            }
            getAddress(coords);
        };


        //Отслеживаем событие перемещения метки
        if (myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
) {
            myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.events.add("dragend", function (e) {
                var coords = this.geometry.getCoordinates();
                setMarker<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
(coords);
            }, myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
);
        }


        // Слушаем клик на карте.
        myMap<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.events.add('click', function (e) {
            var coords = e.get('coords');
            setMarker<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
(coords);
        });


        // Создание метки.
        function createPlacemark(coords) {
            return new ymaps.Placemark(coords, {
                iconCaption: 'поиск...'
            }, {
                preset: 'islands#violetDotIconWithCaption',
                draggable: true
            });
        }

        // Определяем адрес по координатам (обратное геокодирование).
        function getAddress(coords) {
            myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.properties.set('iconCaption', 'поиск...');
            ymaps.geocode(coords).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0),
                    array = firstGeoObject.properties.get('description').split(', '),
                    country = array[0],
                    city = array[1];
                myPlacemark<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
.properties
                    .set({
                        iconCaption: firstGeoObject.properties.get('name'),
                        balloonContent: firstGeoObject.properties.get('text')
                    });
                $('#tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
').val(coords);
            });
        }
    }

    /* emd API YANDEX*/

    // <![CDATA[
    
    Ext.onReady(function () {
        var fld = MODx.load({
            
            xtype: 'textfield'
            , applyTo: 'tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
'
            , enableKeyEvents: true
            , msgTarget: 'under'
            , allowBlank: <?php if ($_smarty_tpl->tpl_vars['params']->value['allowBlank'] == 1 || $_smarty_tpl->tpl_vars['params']->value['allowBlank'] == 'true') {?>true<?php } else { ?>false<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['minLength']) {?>, minLength: <?php echo $_smarty_tpl->tpl_vars['params']->value['minLength'];
}?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['maxLength']) {?>, maxLength: <?php echo $_smarty_tpl->tpl_vars['params']->value['maxLength'];
}?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['regex']) {?>, regex: new RegExp('<?php echo $_smarty_tpl->tpl_vars['params']->value['regex'];?>
')<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['regexText']) {?>, regexText: '<?php echo $_smarty_tpl->tpl_vars['params']->value['regexText'];?>
'<?php }?>
            
            , listeners: {'keydown': {fn: MODx.fireResourceFormChange, scope: this}}
        });
        Ext.getCmp('modx-panel-resource').getForm().add(fld);
        MODx.makeDroppable(fld);
    });
    
    // ]]>
<?php echo '</script'; ?>
>
<?php }
}
