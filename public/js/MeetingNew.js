$.datetimepicker.setLocale('es');
$('#fecha').datetimepicker({step: 30, format: 'Y-m-d H:i', minDate: '2017-03-01 00:00:00'});

tinymce.init(
{
    setup: function (editor)
    {
        editor.on('change', function () {
        tinymce.triggerSave(); });
    },
    theme: 'silver',
    selector: '#detalles',
    height: 300,
    width: 700,
    language_url: '/assets/tinymce/langs/es_ES.js',
    plugins: 
    [
    'advlist autolink autosave lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen bbcode',
    'insertdatetime media save table paste code'
    ],
    toolbar: 
    [
    'insertfile undo redo | styleselect | bold italic | forecolor backcolor fontselect fontsizeselect',
    'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ],
    content_css:
    [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
}
);