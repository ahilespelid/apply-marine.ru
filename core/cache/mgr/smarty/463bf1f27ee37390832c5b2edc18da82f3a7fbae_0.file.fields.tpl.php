<?php
/* Smarty version 3.1.44, created on 2022-08-25 07:36:03
  from '/var/www/apply_marine/core/components/localizator/elements/templates/fields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_630726639df238_87756701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '463bf1f27ee37390832c5b2edc18da82f3a7fbae' => 
    array (
      0 => '/var/www/apply_marine/core/components/localizator/elements/templates/fields.tpl',
      1 => 1658148514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_630726639df238_87756701 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/apply_marine/core/model/smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),));
echo $_smarty_tpl->tpl_vars['OnResourceTVFormPrerender']->value;?>


<?php if ($_smarty_tpl->tpl_vars['formcaption']->value != '') {?>
    <h2><?php echo $_smarty_tpl->tpl_vars['formcaption']->value;?>
</h2>
<?php }?> 

<input type="hidden" class="mulititems_grid_item_fields" name="mulititems_grid_item_fields" value='<?php echo $_smarty_tpl->tpl_vars['fields']->value;?>
' />
<input type="hidden" name="action" value='mgr/content/<?php echo $_smarty_tpl->tpl_vars['formAction']->value;?>
' />
<input type="hidden" name="resource_id" value='<?php echo $_smarty_tpl->tpl_vars['resource_id']->value;?>
' />

<div id="modx-window-mi-grid-update-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
-tabs" style="margin-top:0px;">

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'topcategory', false, NULL, 'topcat', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['topcategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['topcategory']->value) {
$_smarty_tpl->tpl_vars['topcategory']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_topcat']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_topcat']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_topcat']->value['index'];
?>

        <?php if (count($_smarty_tpl->tpl_vars['topcategory']->value['tabs']) > 0) {?>

            <?php if (count($_smarty_tpl->tpl_vars['categories']->value) < 2 || ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_topcat']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_topcat']->value['first'] : null) && $_smarty_tpl->tpl_vars['topcategory']->value['print_before_tabs'])) {?>
                <div id="modx-tv-tab_<?php echo $_smarty_tpl->tpl_vars['topcategory']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
" >
            <?php } else { ?>
                <div id="modx-tv-tab_<?php echo $_smarty_tpl->tpl_vars['topcategory']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
" class="x-tab-main" title="<?php echo ucfirst((($tmp = @$_smarty_tpl->tpl_vars['topcategory']->value['category'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['_lang']->value['uncategorized'] : $tmp));?>
">
            <?php }?>

                <div id="modx-tv-vtabs_<?php echo $_smarty_tpl->tpl_vars['topcategory']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
" class="x-form-label-top">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topcategory']->value['tabs'], 'category', false, NULL, 'cat', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_cat']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_cat']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_cat']->value['index'];
?>
                    

                    <?php if (count($_smarty_tpl->tpl_vars['category']->value['tvs']) > 0) {?>

                        <?php if (count($_smarty_tpl->tpl_vars['topcategory']->value['tabs']) < 2 || ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_cat']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_cat']->value['first'] : null) && $_smarty_tpl->tpl_vars['category']->value['print_before_tabs'])) {?>
                            <div id="modx-tv-vtab_<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
" >
                        <?php } else { ?>
                            <div id="modx-tv-vtab_<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
" class="x-tab" title="<?php echo ucfirst((($tmp = @$_smarty_tpl->tpl_vars['category']->value['category'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['_lang']->value['uncategorized'] : $tmp));?>
" style="min-height: 45px">
                        <?php }?>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['tvs'], 'tv', false, NULL, 'tv', array (
));
$_smarty_tpl->tpl_vars['tv']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tv']->value) {
$_smarty_tpl->tpl_vars['tv']->do_else = false;
?>

                            <?php if ($_smarty_tpl->tpl_vars['tv']->value->type == "description_is_code") {?>

                                <?php echo $_smarty_tpl->tpl_vars['tv']->value->get('formElement');?>

                               
                            <?php } elseif ($_smarty_tpl->tpl_vars['tv']->value->type != "hidden") {?>
                                <?php if ($_smarty_tpl->tpl_vars['tv']->value->type == "checkbox") {?>
                                    <input type="hidden" name="tvlocalizator_<?php echo $_smarty_tpl->tpl_vars['tv']->value->name;?>
[]" value="" />
                                <?php }?>
                                <div class="x-form-item x-tab-item <?php echo smarty_function_cycle(array('values'=>",alt"),$_smarty_tpl);?>
 modx-tv" id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-tr" style="padding: 10px 0 0 ;<?php if ($_smarty_tpl->tpl_vars['tv']->value->display == "none") {?>display:none;<?php }?> ">
                                    <label for="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" class="x-form-item-label modx-tv-label" style="width: auto;margin-bottom:2px;">
                                        <div class="modx-tv-label-title"> 
                                            <?php if ($_smarty_tpl->tpl_vars['showCheckbox']->value) {?><input type="checkbox" name="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-checkbox" class="modx-tv-checkbox" value="1" /><?php }?>
                                            <span class="modx-tv-caption" id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-caption"><?php echo $_smarty_tpl->tpl_vars['tv']->value->caption;?>
</span>
                                        </div>

                                        <?php if ($_smarty_tpl->tpl_vars['tv']->value->description) {?><span class="modx-tv-label-description"><?php echo $_smarty_tpl->tpl_vars['tv']->value->description;?>
</span><?php }?>
                                    </label>
                                    <?php if ($_smarty_tpl->tpl_vars['tv']->value->inherited) {?><br /><span class="modx-tv-inherited"><?php echo $_smarty_tpl->tpl_vars['_lang']->value['tv_value_inherited'];?>
</span><?php }?>
                                    <div class="x-form-clear-left"></div>
                                    <div class="x-form-element modx-tv-form-element" style="padding-left: 0px;">
                                        <input type="hidden" id="tvdef<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->default_text, ENT_QUOTES, 'UTF-8', true);?>
" />
                                        <?php echo $_smarty_tpl->tpl_vars['tv']->value->get('formElement');?>

                                    </div>
                                </div>
                                <?php echo '<script'; ?>
 type="text/javascript">Ext.onReady(function() { new Ext.ToolTip({target: 'tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
-caption',html: '[[*<?php echo $_smarty_tpl->tpl_vars['tv']->value->name;?>
]]'});});<?php echo '</script'; ?>
>
                            <?php } else { ?>
                                <input type="hidden" id="tvdef<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->default_text, ENT_QUOTES, 'UTF-8', true);?>
" />
                                <?php echo $_smarty_tpl->tpl_vars['tv']->value->get('formElement');?>

                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </div>
                        
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <?php if (count($_smarty_tpl->tpl_vars['topcategory']->value['tabs']) > 1) {?>
                    
                        <?php echo '<script'; ?>
 type="text/javascript">
                        // <![CDATA[
                        Ext.onReady(function() {    

                            MODx.load({
                                xtype: 'modx-vtabs'
                                ,applyTo: 'modx-tv-vtabs_<?php echo $_smarty_tpl->tpl_vars['topcategory']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
                                ,activeTab: 0
                                ,autoTabs: true
                                ,border: false
                                ,plain: true
                                ,width: '95%'
                                ,hideMode: 'offsets'
                                ,deferredRender: false
                                ,id: 'modx-tv-vtab_<?php echo $_smarty_tpl->tpl_vars['topcategory']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
                                ,defaults: {
                                    bodyStyle: 'padding: 5px;'
                                    ,autoHeight: true
                                }
                                ,padding: '0 0 0 5px'
                                ,headerCfg: {
                                    tag: 'div'
                                    ,cls: 'x-tab-panel-header vertical-tabs-header'
                                    ,id: 'modx-tv-vtab_<?php echo $_smarty_tpl->tpl_vars['topcategory']->value['id'];?>
-header-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
                                }
                            });
                        });    
                        // ]]>
                        <?php echo '</script'; ?>
>
                    
                <?php }?>
            </div>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php if (count($_smarty_tpl->tpl_vars['categories']->value) > 1) {?>
    
        <?php echo '<script'; ?>
 type="text/javascript">
        // <![CDATA[
        Ext.onReady(function() {    

            MODx.load({
                xtype: 'modx-tabs'
                ,applyTo: 'modx-window-mi-grid-update-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
-tabs'
                ,autoTabSelector: 'div.x-tab-main'
                ,activeTab: 0
                ,autoTabs: true
                ,border: false
                ,plain: true
                ,anchor: '100%'
                ,hideMode: 'offsets'
                ,defaults: {
                    bodyStyle: 'padding: 5px;'
                    ,autoHeight: true
                    ,autoWidth: true
                }
                ,deferredRender: false
            });
        });    
        // ]]>
        <?php echo '</script'; ?>
>
        <style>
            #modx-window-mi-grid-update-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
-tabs .vertical-tabs-header .x-tab-strip>li:not(.x-tab-edge){
                min-height:45px;
            }
        
        </style>
    
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['OnResourceTVFormRender']->value;?>


<br class="clear" /><?php }
}
