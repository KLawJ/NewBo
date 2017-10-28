/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config
    // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
    // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
    // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
    config.toolbar = [
        { name: 'document', groups: ['mode', 'document', 'doctools'], items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates'] },
        { name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
        { name: 'editing', groups: ['spellchecker'], items: ['Scayt'] },
        '/',
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
        { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
        { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
        { name: 'tools', items: ['Maximize', 'ShowBlocks'] },
        { name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
        { name: 'colors', items: ['TextColor', 'BGColor'] },
        '/',
        { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] }
    ];

    // Toolbar groups configuration.
    config.toolbarGroups = [
        { name: 'clipboard', groups: ['clipboard', 'undo'] },
        { name: 'editing', groups: ['find', 'selection', 'spellchecker'] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'forms' },
        { name: 'tools' },
        { name: 'document', groups: ['mode', 'document', 'doctools'] },
        { name: 'others' },
        { name: 'alignment', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
        '/',
        { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
        { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'] },
        { name: 'alignment', groups: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'about' }
    ];;

    // config.font_names = 'Arial;Times New Roman;Verdana;' + CKEDITOR.config.font_names;

    // config.toolbar_Full = [
    //     { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },

    //     {
    //         name: 'paragraph',
    //         items: ['Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-',
    //             'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'
    //         ]
    //     }

    // ];

    // config.toolbar = 'Full';







    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Subscript,Superscript';

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Simplify the dialog windows.
    //config.removeDialogTabs = 'image:advanced;link:advanced';
    config.extraPlugins = 'font', 'justify';
    config.contentsCss = './theme/plugins/ckeditor/fonts.css';

    // Define changes to default configuration here:
    //config.contentsCss = '../theme/plugins/ckeditor/fonts.css';
    //the next line add the new font to the combobox in CKEditor
    //config.font_names = '<Cutsom Font Name>/<YourFontName>;' + config.font_names;
    config.font_names = CKEDITOR.config.font_names;
    config.font_names = 'Kartika/kartika;' + config.font_names;

};