(function(){
	//Section 1 : Code to execute when the toolbar button is pressed
	var a= {
		exec:function(editor){
			CKEDITOR.editor.prototype.getSelectedHtml = function(){
			var selection = this.getSelection();
	   		if( selection ){
				var bookmarks = selection.createBookmarks(),
        	 	range = selection.getRanges()[ 0 ],
         		fragment = range.clone().cloneContents();
				selection.selectBookmarks( bookmarks );
				var retval = "",
         		childList = fragment.getChildren(),
         		childCount = childList.count();
      			for ( var i = 0; i < childCount; i++ ){
					var child = childList.getItem( i );
					retval += ( child.getOuterHtml?
					child.getOuterHtml() : child.getText() );
				}
      			return retval;
   			}
		};
		ACTSECTIONInsertHTML(editor.getSelectedHtml());		 
		//CallCfWindow(theSelectedText);
	}
	},
	//Section 2 : Create the button and add the functionality to it
	b = 'actsections';
	CKEDITOR.plugins.add(b,{
	init:function(editor){
	editor.addCommand(b,a);
	editor.ui.addButton('actsections',{
	label:'Create Sections',
	icon: this.path + 'icons-section.png',
	command:b
});
}
});
})();


