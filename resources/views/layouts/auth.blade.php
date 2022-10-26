<!DOCTYPE html>


<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development, ree admin themes, bootstrap admin, bootstrap dashboard" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		
		<link href="{{ asset("assets/backend/css/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/backend/css/style.bundle.css") }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	
	<body id="kt_body" class="bg-white">
 
        @yield('pagecontent')

		<script src="{{ asset("assets/backend/js/plugins.bundle.js") }}"></script>
		<script src="{{ asset("assets/backend/js/scripts.bundle.js") }}"></script>
		<script src="{{ asset("assets/backend/js/general.js") }}"></script>	
	</body>
</html>













