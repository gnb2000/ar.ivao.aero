tinymce.remove();
tinymce.init
({
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
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media save table paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | forecolor backcolor fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | save',
    content_css:
    [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});

$.datetimepicker.setLocale('es');
$('#fecha').datetimepicker(
{
	dayOfWeekStart: 1,
	format: 'Y-m-d',
	timepicker: false
}
);