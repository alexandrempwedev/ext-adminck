/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here.
    // For complete reference see:
    // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html
    config.language = "zh-tw";
    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        { name: "clipboard", groups: ["clipboard", "undo"] },
        // { name: "editing", groups: ["find", "selection", "spellchecker"] },
        { name: "links" },
        { name: "insert" },
        { name: "forms" },
        { name: "tools" },
        { name: "document", groups: ["doctools", "document", "mode"] },
        { name: "others" },
        "/",
        { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
        {
            name: "paragraph",
            groups: ["list", "indent", "blocks", "align", "bidi"],
        },
        { name: "styles" },
        { name: "colors" },
        // { name: "about" },
    ];

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = "Subscript,Superscript";

    // Set the most common block elements.
    config.format_tags = "p;h1;h2;h3;pre";

    config.contentsCss = [];

    config.font_names =
        "Arial/Arial, Helvetica, sans-serif;Comic Sans MS/Comic Sans MS, cursive;Courier New/Courier New, Courier, monospace;Georgia/Georgia, serif;Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;Tahoma/Tahoma, Geneva, sans-serif;Times New Roman/Times New Roman, Times, serif;Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;Verdana/Verdana, Geneva, sans-serif;新細明體;標楷體;微軟正黑體";

    // Simplify the dialog windows.
    config.removeDialogTabs =
        "image2:Link;link:upload;image2:Upload;image2:advanced";

    config.removePlugins = 'image';

    config.extraPlugins =
        "colorbutton,colordialog,justify,templates,colordialog,font,tableresize,copyformatting,elementspath,showblocks,youtube,image2";

    config.allowedContent = true;
};
