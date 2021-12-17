				<head>
				<?php include ("http://ivao.com.ar/ivao/ar/stylesheet.php");?> 
				<link href="http://ivao.com.ar/ivao/ar/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
				</head>
				<body>
				<div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<script type="text/javascript" src="http://ivao.com.ar/ivao/ar/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
				<script type="text/javascript" src="http://ivao.com.ar/ivao/ar/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
				<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>