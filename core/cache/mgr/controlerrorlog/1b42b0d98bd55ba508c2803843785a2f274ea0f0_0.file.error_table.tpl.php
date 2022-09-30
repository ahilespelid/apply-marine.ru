<?php
/* Smarty version 3.1.44, created on 2022-08-28 06:58:13
  from '/var/www/apply_marine/core/components/controlerrorlog/templates/error_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_630b1205a605d2_51031849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b42b0d98bd55ba508c2803843785a2f274ea0f0' => 
    array (
      0 => '/var/www/apply_marine/core/components/controlerrorlog/templates/error_table.tpl',
      1 => 1661370222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_630b1205a605d2_51031849 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/apply_marine/core/model/smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<table class="error-log-table">
	<thead>
	<tr>
		<th><i class="celicon celicon-minus-square toggle" id="toggle-total" onclick="controlErrorLog.toggleAll(this)"></i></th>
		<th class="date"><?php echo $_smarty_tpl->tpl_vars['lexicon']->value['date'];?>
</th>
		<th class="time"><?php echo $_smarty_tpl->tpl_vars['lexicon']->value['time'];?>
</th>
		<th class="type"><?php echo $_smarty_tpl->tpl_vars['lexicon']->value['type'];?>
</th>
        <?php if ($_smarty_tpl->tpl_vars['defExists']->value) {?>
			<th class="type"><?php echo $_smarty_tpl->tpl_vars['lexicon']->value['def'];?>
</th>
        <?php }?>
		<th><?php echo $_smarty_tpl->tpl_vars['lexicon']->value['file'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['lexicon']->value['line'];?>
</th>
	</tr>
	</thead>
	<tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'message');
$_smarty_tpl->tpl_vars['message']->iteration = 0;
$_smarty_tpl->tpl_vars['message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->do_else = false;
$_smarty_tpl->tpl_vars['message']->iteration++;
$__foreach_message_0_saved = $_smarty_tpl->tpl_vars['message'];
?>
		<tr id="elt-row<?php echo $_smarty_tpl->tpl_vars['message']->iteration;?>
" class="<?php echo mb_strtolower($_smarty_tpl->tpl_vars['message']->value->type, 'UTF-8');?>
-message error-data <?php if ($_smarty_tpl->tpl_vars['message']->value->type == 'FATAL') {?>text-error<?php }?>">
			<td><div class="type-border"></div><i class="celicon celicon-minus-square error-data toggle" onclick="controlErrorLog.toggle(this)"></i></td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value->date,((string)$_smarty_tpl->tpl_vars['dateFormat']->value));?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['message']->value->time;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['message']->value->type;?>
</td>
            <?php if ($_smarty_tpl->tpl_vars['defExists']->value) {?>
				<td><?php echo $_smarty_tpl->tpl_vars['message']->value->def;?>
</td>
            <?php }?>
			<td><?php echo $_smarty_tpl->tpl_vars['message']->value->file;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['message']->value->line;?>
</td>
		</tr>
		<tr id="elt-row<?php echo $_smarty_tpl->tpl_vars['message']->iteration;?>
-message" class="<?php echo mb_strtolower($_smarty_tpl->tpl_vars['message']->value->type, 'UTF-8');?>
-message error-description <?php if ($_smarty_tpl->tpl_vars['message']->value->type == 'FATAL') {?>text-error<?php }?>">
			<td colspan="<?php if ($_smarty_tpl->tpl_vars['defExists']->value) {?>7<?php } else { ?>6<?php }?>"><div class="type-border"></div>
				<pre><?php echo $_smarty_tpl->tpl_vars['message']->value->message;?>
</pre>
			</td>
		</tr>
    <?php
$_smarty_tpl->tpl_vars['message'] = $__foreach_message_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</tbody>
</table><?php }
}