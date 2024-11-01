(function() {
	tinymce.PluginManager.add('true_wpcalc_loan_button', function( editor, url ) { 
		editor.addButton( 'true_wpcalc_loan_button', { 
			image : url + '/wpcalc.png',
			type: 'menubutton',
			title: 'Loan calculators', 
			menu: [ 				 
						{
							text: 'Loan calculator',
							onclick: function() {
								editor.insertContent('[wpcalc-loan id=1]');
								}
						},
						{
							text: 'Mortage calculator',
							onclick: function() {
								editor.insertContent('[wpcalc-loan id=2]');
								}
						},
						{
							text: 'Auto loan calculator',
							onclick: function() {
								editor.insertContent('[wpcalc-loan id=3]');
								}
						}
						
				
				
			]
		});
	});
})();