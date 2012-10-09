/**
 * Controller: Pages
 *
 *
 */
Ext.define('T3.controller.Pages', {
	extend: 'Ext.app.Controller',
	config: {
		refs: {
			contentView: 'contentlist'
		},
		control: {
			'pageslist': {
				itemtap: 'onPageItemTap'
			}
		}
	},
	onPageItemTap: function(list, index, target, record) {
		var store = Ext.getStore('Content'),
			proxy = store.getProxy(),
			view = this.getContentView(),
			parentView = view.up('container');

		proxy.setExtraParam( 'id', record.get('uid'));
		store.load();
		view.down('titlebar').setTitle(record.get('title'));
		parentView.setActiveItem(view);
	}
});