/**
 * Controller: Pages
 *
 *
 */
Ext.define('T3.controller.Pages', {
	extend: 'Ext.app.Controller',

	config: {
		models: [
			'Page', 'Content'
		],
		stores: [
			'Pages', 'Content'
		],
		views: [
			'PagesList', 'ContentList', 'TabPanel'
		],

		refs: {
			pagesView: 'pageslist',
			contentView: 'contentlist'

		},

		control: {
			pagesView: {
				itemtap: 'onPageItemTap'
			},
			'contentlist #back': {
				tap: 'showPagesView'
			}
		},

		routes: {}
	},

	/**
	 * Controller Init
	 */
	init: function() {},

	/**
	 * Controller Launch
	 *
	 * @param {} application
	 */
	launch: function(app) {

	},

	showPagesView: function() {
		var view = this.getPagesView(),
			parentView = view.up('container');
		parentView.setActiveItem(view);
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