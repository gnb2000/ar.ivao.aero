tinymce.remove();
tinymce.init
({
    setup: function (editor)
    {
        editor.on('change', function () {
        tinymce.triggerSave(); });
    },
    theme: 'modern',
    relative_urls: false,
    selector: '#comments',
    height: 200,
    width: 550,
    language_url: '/assets/tinymce/langs/es_ES.js',
    fontsize_formats: '8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 36pt 48pt 72pt',
    plugins: 
    [
    'advlist autolink autosave lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media save table paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | forecolor backcolor fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    content_css:
    [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});
