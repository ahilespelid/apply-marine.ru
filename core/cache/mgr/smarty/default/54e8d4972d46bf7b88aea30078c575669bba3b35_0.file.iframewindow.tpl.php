<?php
/* Smarty version 3.1.44, created on 2022-08-27 09:49:31
  from '/var/www/apply_marine/core/components/migx/templates/mgr/iframewindow.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_6309e8ab177a98_14094107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54e8d4972d46bf7b88aea30078c575669bba3b35' => 
    array (
      0 => '/var/www/apply_marine/core/components/migx/templates/mgr/iframewindow.tpl',
      1 => 1635403912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6309e8ab177a98_14094107 (Smarty_Internal_Template $_smarty_tpl) {
?>

MODx.window.MigxIframe = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('migx.preview')
        ,id: 'modx-window-migx-iframe-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
        ,width: '1050'
        ,height: '600'
		,closeAction: 'hide'
        ,shadow: true
        ,resizable: true
        ,collapsible: true
        ,maximizable: true
        ,autoScroll: true
        ,forceLayout: true
        ,boxMaxHeight: '900'
        ,items: [
           {
            xtype: 'form'
            ,id:'migx_iframewin_form_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            ,target: 'iframewin_iframe_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            ,standardSubmit: true
            ,url: config.src
            ,items:[{
                xtype:'hidden'
                ,name:'migx_outputvalue'
                ,id:'migx_iframewin_json_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            },{
                xtype:'hidden'
                ,name:'HTTP_MODAUTH'
                ,value:'<?php echo $_smarty_tpl->tpl_vars['auth']->value;?>
'
            },{
                xtype:'hidden'
                ,name:'configs'
                ,value:'<?php echo $_smarty_tpl->tpl_vars['configs']->value;?>
'
            },{
                xtype:'hidden'
                ,name:'actionx' //fix for firefox - issue with form-action
                ,value:'mgr/migxdb/process'
            },{
                xtype:'hidden'
                ,name:'processaction'
                ,value:'migxiframe'
            },{
                xtype:'hidden'
                ,name:'resource_id'
                ,value: config.resource_id
            },{
                xtype:'hidden'
                ,name:'co_id'
                ,value: config.co_id
                ,id: 'migx_iframewin_co_id_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            },{
                xtype:'hidden'
                ,name:'store_params'
                ,value: config.storeParams || ''
                ,id: 'migx_iframewin_store_params_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            },{
                xtype:'hidden'
                ,name:'iframeTpl'
                ,value: config.iframeTpl
                ,id: 'migx_iframewin_iframeTpl_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            },{
                xtype:'hidden'
                ,name:'object_id'
                ,value: config.object_id
                ,id: 'migx_iframewin_object_id_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            },{
                xtype:'hidden'
                ,name:'tv_name'
                ,value: '<?php echo $_smarty_tpl->tpl_vars['tv']->value->name;?>
'
            }
            
            ]
        },
        
        {
            xtype: 'container'
            ,layout: 'anchor'
            ,width:'98%'
            , height:'98%'            
            ,anchorSize: {width:'98%', height:'98%'}
            ,autoEl: {
            tag: 'iframe'
            ,name: 'iframewin_iframe_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
'
            ,src: config.src
            }
         }]
        //,saveBtnText: _('done')
        
        ,buttons: [{
            text: config.cancelBtnText || _('close')
            ,scope: this
            ,handler: function() { this.closeWindow(); }
        }]
        ,action: 'u'
		,record_json: ''
        ,keys: [{
            key: Ext.EventObject.ENTER
            ,fn: this.submit
            ,scope: this
        }]		
    });
    MODx.window.MigxIframe.superclass.constructor.call(this,config);
    this.options = config;
    this.config = config;

    //this.on('show',this.onShow,this);
    this.addEvents({
        success: true
        ,failure: true
		//,hide:true
		//,show:true
    });
    //this.renderIframe();	
};
Ext.extend(MODx.window.MigxIframe,Ext.Window,{

    closeWindow: function() {
        this.grid.refresh();
        this.hide();
		
    }
    ,
    renderIframe: function() {
		this.add(this.iframe);
    }
    ,onShow: function() {
     var input = Ext.getCmp('migx_iframewin_json_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
');
     input.setValue(this.json);
     input.getEl().dom.name = this.jsonvarkey;
     var formpanel = Ext.getCmp('migx_iframewin_form_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
');
     var form = formpanel.getForm();
     form.getEl().dom.action=this.src;
     form.getEl().dom.target='iframewin_iframe_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
';
     form.submit();  
    }

});
Ext.reg('modx-window-mi-iframe-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
',MODx.window.MigxIframe);

<?php }
}
