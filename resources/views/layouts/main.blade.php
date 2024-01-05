<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Ned Digital</title>
		<meta charset="utf-8" />
		<meta name="description" content="Sistema Central de Informaci;on" />
		<meta name="keywords" content="core, system, sistema, central" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="es_MX" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Ned Digital" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="Ned Digital" />
		<link rel="canonical" href="" />
		<link rel="shortcut icon" href="{{asset('media/logos/favicon.ico')}}" />
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		
		<link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
		
		@livewireStyles

		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

		<script>
			var defaultThemeMode = "light"; 
			var themeMode; 
			if ( document.documentElement ) { 
				if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { 
					themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); 
				} else { 
					if ( localStorage.getItem("data-bs-theme") !== null ) { 
						themeMode = localStorage.getItem("data-bs-theme"); 
					} else { 
						themeMode = defaultThemeMode; 
					} 
				} 
				
				if (themeMode === "system") { 
					themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
				} 

				document.documentElement.setAttribute("data-bs-theme", themeMode); 
			}
		</script>
		
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">

				@include('layouts.header')

				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

					@include('layouts.sidebars.index')

					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">

						<div class="d-flex flex-column flex-column-fluid">

							@yield('subheader')

							<div id="kt_app_content" class="app-content flex-column-fluid">

								<div id="kt_app_content_container" class="app-container container-fluid">
                                    @yield('content')
								</div>
							</div>

						</div>

						@include('layouts.footer')

					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
	
		<script>var hostUrl = "assets/";</script>
		<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('js/scripts.bundle.js')}}"></script>
		<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
	
		@livewireScripts

		@stack('js')

		{!! Toastr::message() !!}
		
	</body>
</html>