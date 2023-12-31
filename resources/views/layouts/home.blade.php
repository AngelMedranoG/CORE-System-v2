
<!DOCTYPE html>
<html lang="es">
	<!--begin::Head-->
	<head>
		<title>CORE System</title>
		<meta charset="utf-8" />
		<meta name="description" content="Sistema Central de Informaci;on" />
		<meta name="keywords" content="core, system, sistema, central" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="es_MX" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="CORE System" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="CORE System" />
		<link rel="canonical" href="" />
		<link rel="shortcut icon" href="{{asset('media/logos/favicon.ico')}}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->		
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        
		<link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="false" data-kt-app-sidebar-fixed="false" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@include('layouts.header_home')
				<!--end::Header-->
				<!--begin::Wrapper-->
                <div id="kt_app_content" class="app-content flex-column-fluid">

				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    
                    <div id="kt_app_content_container" class="app-container container-fluid pt-6">
									<!--begin::Row-->
                                    
                    @yield('content')

					
                </div>
				</div>
				<!--end::Wrapper-->
                </div>
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Drawers-->
	
		<!--end::Drawers-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->
	
		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->	
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>