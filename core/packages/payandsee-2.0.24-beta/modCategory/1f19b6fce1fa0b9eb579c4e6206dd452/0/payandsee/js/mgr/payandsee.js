var payandsee = function (config) {
	config = config || {};
	payandsee.superclass.constructor.call(this, config);
};
Ext.extend(payandsee, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, tools: {}
});
Ext.reg('payandsee', payandsee);

payandsee = new payandsee();