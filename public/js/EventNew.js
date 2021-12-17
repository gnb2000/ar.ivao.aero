$.datetimepicker.setLocale('es');
$('#fechainicio').datetimepicker({format: 'Y-m-d H:i'});
$('#fechafin').datetimepicker({format: 'Y-m-d H:i'});

tinymce.init(
{
    setup: function (editor)
    {
        editor.on('change', function () {
        tinymce.triggerSave(); });
    },
    theme: 'silver',
    selector: '#detalles',
    height: 400,
    width: 800,
    language_url: '/assets/tinymce/langs/es_ES.js',
    plugins: 
    [
    'advlist autolink autosave lists preview',
    'searchreplace fullscreen',
    'insertdatetime media save table paste'
    ],
    toolbar: 
    [
    'undo redo | styleselect | backcolor fontselect fontsizeselect',
    'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | save'
    ],
    content_css:
    [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});