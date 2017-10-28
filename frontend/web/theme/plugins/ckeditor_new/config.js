/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';


    config.toolbar = 'Full';
    config.toolbar_Full = [
        ['Source', '-', 'Preview'],
        ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print'],
        ['Find', 'Replace'],
        ['Bold', 'Italic', 'Underline', 'Strike'],
        ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
        ['Outdent', 'Indent'],
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['TextColor', 'BGColor'],
        '/', ['Styles', 'Format', 'Font', 'FontSize'],
        ['Link', 'Unlink'],
        ['Maximize', '-', 'judgements', '-', 'acts', '-', 'actsections', '-', 'customindent']
    ];



};