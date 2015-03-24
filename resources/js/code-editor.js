$(function () {
    $('textarea.code-editor').each(function () {
        var val = $(this).val() || "\n\n";

        CodeMirror.fromTextArea($(this)[0], {
            lineNumbers: true,
            tabSize: 4,
            styleActiveLine: true,
            matchBrackets: true,
            mode: "xml",
            htmlMode: true,
            viewportMargin: Infinity,
            minHeight: 12,
            theme: 'pastel-on-dark'
        }).setValue(val);
    });
});
