<?php
/* Smarty version 3.1.44, created on 2022-08-25 07:36:03
  from '/var/www/apply_marine/manager/templates/default/element/tv/renders/input/hidden.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_630726638372e1_17625462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83cad6850ea2f1a1a62aa312d1d8332a67f42d84' => 
    array (
      0 => '/var/www/apply_marine/manager/templates/default/element/tv/renders/input/hidden.tpl',
      1 => 1661369577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_630726638372e1_17625462 (Smarty_Internal_Template $_smarty_tpl) {
?><input id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" name="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->get('value'), ENT_QUOTES, 'UTF-8', true);?>
" />

<?php echo '<script'; ?>
>
// <![CDATA[

MODx.on('ready',function() {
    var fld = MODx.load({
    
        xtype: 'hidden'
        ,applyTo: 'tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
'
        ,value: '<?php echo strtr($_smarty_tpl->tpl_vars['tv']->value->get('value'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/", "<!--" => "<\!--", "<s" => "<\s", "<S" => "<\S" ));?>
'
    
    });
    var p = Ext.getCmp('modx-panel-resource');
    if (p) {
        p.add(fld);
        p.doLayout();
    }
});

// ]]>
<?php echo '</script'; ?>
>
<?php }
}
