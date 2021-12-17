@php
$idioma = '';
if(isset($_GET['lang']))
{
	setcookie('idioma', $_GET['lang'], time() + 999999999);
	$idioma = $_GET['lang'];
}
else if(isset($_COOKIE['idioma'])) $idioma = $_COOKIE['idioma'];
else
{
	setcookie('idioma', 'es', time() + 999999999);
	$idioma = 'es';
}
@endphp
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		@yield('titulo')

		<meta name="keywords" content="IVAO Argentina, IVAO, AR" />
		<meta name="description" content="IVAO Argentina">
		<meta name="author" content="Emilio Cloquell">

		<!-- Favicon -->
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="/img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Armata" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quantico" rel="stylesheet">
        <link href="/css/ivao-font.css" rel="stylesheet">


		<!-- Vendor CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
		<link rel="stylesheet" href="/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="/vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/css/theme.css">
		<link rel="stylesheet" href="/css/theme-elements.css">
		<link rel="stylesheet" href="/css/theme-blog.css">
		<link rel="stylesheet" href="/css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="/vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="/vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="/vendor/rs-plugin/css/navigation.css">
		<link rel="stylesheet" href="/vendor/circle-flip-slideshow/css/component.css">
		
		<!-- Skin CSS -->
		<link rel="stylesheet" href="/css/skins/default.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/css/custom.css">

		<!-- Vendor -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
		<script src="/vendor/popper/umd/popper.min.js"></script>
		<script src="/vendor/common/common.min.js"></script>
		<script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
		<!-- <script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="/vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="/vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="/vendor/vide/jquery.vide.min.js"></script>
		<script src="/vendor/vivus/vivus.min.js"></script> -->

		<!-- Current Page Vendor and Views 
		<script src="/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
		<script src="/js/views/view.home.js"></script>	-->	

		<!-- Head Libs -->
		<script src="/vendor/modernizr/modernizr.min.js"></script>

		<!-- Theme Custom -->
		<script src="/js/funciones.js"></script>

		<!-- Demo -->
		@yield('headextra')
		
	</head>
	<body>
		
		<div class="body">
		<!-- Include del Top Header -->
		@php include($_SERVER['DOCUMENT_ROOT']."/header_$idioma.php"); @endphp

		<div role="main" class="main">

		<!-- Include del Carousel -->
		@php include($_SERVER['DOCUMENT_ROOT']."/carousel_$idioma.php"); @endphp

		<!-- Contenido -->
		@yield('contenido')	

		</div>
		<!-- Include del Footer -->
		@php include($_SERVER['DOCUMENT_ROOT'].'/footer.html'); @endphp
		</div>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/js/theme.js"></script>
		<!-- Theme Initialization Files -->
		<script src="/js/theme.init.js"></script>

	</body>
</html>