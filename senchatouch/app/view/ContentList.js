Ext.define('T3.view.ContentList', {
	extend: 'Ext.dataview.DataView',
	alias: 'widget.contentlist',
	requires: ['Ext.TitleBar'],

	config: {
		store: 'Content',
		styleHtmlContent: true,
		itemTpl: [
			'<div class="ce">',
			'	<h1>{header}</h1>',
			'	<div class="bodytext">{bodytext}</div>',
			'	<div class="images">',
			'		<tpl if="ctype == \'textpic\'">',
			'			<tpl for="images">',
			'				<img src="http://src.sencha.io/-40/{.}" alt="" />',
			'			</tpl>',
			' 		</tpl>',
			'	</div>',
			'</div>'
		],
		items: [
			{
				xtype: 'titlebar',
				docked: 'top',
				items: [
					{
						text: 'back',
						ui: 'back',
						itemId: 'back'
					}
				]
			}
		]
	}

});