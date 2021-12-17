<?php
		define('DB_SERVER','localhost');
		define('DB_NAME','ivao-ar-plesk_web');
		define('DB_USER','web');
		define('DB_PASS','5CgbgiAn@1b1Gvuf');
		
		$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos.</p>');
		$conTERS = mysqli_connect(DB_SERVER, 'ar-ters', DB_PASS, 'ivao-ar-plesk_ters') or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos de TERS.</p>');
		$conSA = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, 'extraweb') or die('<p class="alert-danger">Error de conexi&oacute;n con la base de datos de South America.</p>');

		mysqli_set_charset($con,"utf8");
?>