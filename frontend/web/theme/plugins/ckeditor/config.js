CKEDITOR.editorConfig = function( config ){
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbar = 'Full';
	config.toolbar_Full = [
		['Source','-','Preview'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
		['Find','Replace'],
		['Bold','Italic','Underline','Strike'],
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],	
		['Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['TextColor','BGColor'],
		'/',
		['Styles','Format','Font','FontSize'],
		['Link','Unlink'],	
		['Maximize', '-','judgements','-','acts','-','actsections','-','customindent']
	];
	config.toolbar_Basic = [
		['Cut','Copy','Paste','PasteText','PasteFromWord'],
		['Bold', 'Italic', '-','-', 'Link', 'Unlink','Underline','Strike','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Font','FontSize','-','TextColor','BGColor'],
		['Maximize', '-','Hjudgements','-','Hacts','-','Hactsections']
	];
	config.toolbar_Sec = [
		['Cut','Copy','Paste','PasteText','PasteFromWord'],
		['Bold', 'Italic', '-','-', 'Link', 'Unlink','Underline','Strike','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Font','FontSize','-','TextColor','BGColor'],
		['Maximize', '-','sections']
	];
	config.toolbar_SectionEditor = [
		['Cut','Copy','Paste','PasteText','PasteFromWord'],
		['Bold', 'Italic','Underline','Strike','Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Font','FontSize','-','TextColor','BGColor']
	];
};
