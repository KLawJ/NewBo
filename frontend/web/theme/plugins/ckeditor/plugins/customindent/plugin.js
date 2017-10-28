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
		IndentPara(editor.getSelectedHtml());		 
		//CallCfWindow(theSelectedText);
	}
	},
	//Section 2 : Create the button and add the functionality to it
	c = 'customindent';
	CKEDITOR.plugins.add(c,{
	init:function(editor){
	editor.addCommand(c,a);
	editor.ui.addButton('customindent',{
	label:'Indent Para',
	icon: this.path + 'icon-cindent.png',
	command:c
});
}
});
})();


