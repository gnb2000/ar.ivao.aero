tinymce.init(
{
    setup: function (editor)
    {
        editor.on('change', function () {
        tinymce.triggerSave(); });
    },
    theme: 'silver',
    relative_urls: false,
    selector: '#remarks',
    height: 400,
    width: 700,
    language_url: '/assets/tinymce/langs/es_ES.js',
    fontsize_formats: '8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 36pt 48pt 72pt',
    plugins: 
    [
    'advlist autolink autosave lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media save autosave table paste'
    ],
    toolbar: 
    [
    'insertfile undo redo | styleselect | bold italic | forecolor backcolor fontselect fontsizeselect',
    'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image save'
    ],
    content_css:
    [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});

tinymce.init(
{
    setup: function (editor)
    {
        editor.on('change', function () {
        tinymce.triggerSave(); });
    },
    theme: 'silver',
    relative_urls: false,
    selector: '#remarksen',
    height: 400,
    width: 700,
    language_url: '/assets/tinymce/langs/es_ES.js',
    fontsize_formats: '8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 36pt 48pt 72pt',
    plugins: 
    [
    'advlist autolink autosave lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media save autosave table paste code'
    ],
    toolbar: 
    [
    'insertfile undo redo | styleselect | bold italic | forecolor backcolor fontselect fontsizeselect',
    'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image save'
    ],
    content_css:
    [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});