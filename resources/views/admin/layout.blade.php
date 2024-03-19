<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="Mosaddek">
	    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	    <link rel="shortcut icon" href="img/favicon.png">
	    <title>@yield('title_page')</title>
	    <!-- Bootstrap core CSS -->
	    <link href="{{ asset('/template_content/css/bootstrap.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('/template_content/css/bootstrap-reset.css') }}" rel="stylesheet">
	    <!--external css-->
	    <link href="{{ asset('/template_content/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
	    <link href="{{ asset('/template_content/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
	    <link rel="s{{ asset('/template_content/tylesheet" href="css/owl.carousel.css') }}" type="text/css">
	    <!--right slidebar-->
	    <link href="{{ asset('/template_content/css/slidebars.css') }}" rel="stylesheet">
	    <!-- Custom styles for this template -->
	    <link href="{{ asset('/template_content/css/style.css') }}" rel="stylesheet">
	    <link href="{{ asset('/template_content/css/style-responsive.css') }}" rel="stylesheet" />
	    <link rel="stylesheet" href="{{ asset('/dropify/dist/css/dropify.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('/select2/dist/css/select2.min.css') }}">
	    <link rel="stylesheet" href="{{ asset('/template_content/js/dropzone.css') }}">
	    <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
		<style>
			*{
				font-family: "Madimi One", sans-serif;
			}
		</style>	
	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
	    <!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	      <script src="js/respond.min.js"></script>
	    <![endif]-->
  	</head>
  	<body>
	  	<section id="container" >
	      	<!--header start-->
	      	<header class="header blue-bg" style="background: #658eab;border: none">
              	<div class="sidebar-toggle-box">
                  	<i class="fa fa-bars"></i>
              	</div>
	            <!--logo start-->
	            <a href="{{ url('/admin/home') }}" class="logo">
	            	Inicio
	            </a>
	            <!--logo end-->
	            <div class="top-nav ">
	                <!--search & user info start-->
	                <ul class="nav pull-right top-menu">
	                    <!-- user login dropdown start-->
	                    <li class="dropdown">
	                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="border: none !important;background: #999;color: #fff;">
	                            <span class="username" style="color: #fff;">
	                            	ADMIN
	                            </span>
	                            <b class="caret" style="color: #333 !important;"></b>
	                        </a>
	                        <ul class="dropdown-menu extended logout">
	                            <div class="log-arrow-up"></div>
	                            <li>
	                            	<a href="{{ url('/logout') }}">
	                            		<i class="fa fa-key"></i> Salir
	                            	</a>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
	            </div>
	        </header>
	      	<!--header end-->
	      	<!--sidebar start-->
	      	<aside>
	          	<div id="sidebar"  class="nav-collapse" style="background:#48718d">
	              	<!-- sidebar menu start-->
	              	<ul class="sidebar-menu" id="nav-accordion">
	                  	<li>
	                      	<a class="active" href="{{ url('/admin/home') }}">
	                          	<i class="fa fa-home" style="color:#fff"></i>
	                          	<span>Home</span>
	                      	</a>
	                  	</li>
	                  	<li class="sub-menu">
	                      	<a href="{{ url('/admin/control-add') }}" class="link_add_cp">
	                          	<span>
	                          		-Nuevo registro de control prenatal
	                          	</span>
	                      	</a>
	                  	</li>
	                  	<li class="sub-menu">
	                      	<a href="{{ url('/admin/control-index') }}" class="link_list_cp">
	                          	<span>
	                          		-Lista de control prenatal
	                          	</span>
	                      	</a>
	                  	</li>
	                  	<li class="sub-menu">
	                      	<a href="{{ url('/admin/edit-perfil') }}" class="link_edit_perfil">
	                          	<span>
	                          		-Editar perfil
	                          	</span>
	                      	</a>
	                  	</li>
	                  	<li class="sub-menu">
	                      	<a href="{{ url('/back-up') }}" class="btn btn-warning" style="color:#fff">
	                          	<span>
	                          		Respaldar DB
	                          	</span>
	                      	</a>
	                  	</li>
	                  	<li class="sub-menu">
	                      	<a href="{{ asset('/manual/manual_usuario.pdf') }}" class="btn btn-info" target="_blank" style="color:#fff">
	                          	<span>
	                          		Manual
	                          	</span>
	                      	</a>
	                  	</li>
	                  	<li class="sub-menu">
	                      	<a href="{{ url('/archivos/control-prenatal.zip') }}" class="btn btn-success" style="color:#fff">
	                          	<span>
	                          		Archivos
	                          	</span>
	                      	</a>
	                  	</li>
	              	</ul>
	              	<!-- sidebar menu end-->
	          		<ul style="position:absolute;bottom: 10px;">
	          			{{-- <li style="display: inline-block;margin-left: 15px;">
	          				<a href="https://uptbolivar.com/" target="_blank">
	      						<img src="{{ asset('/logo12.jpeg') }}" width="40" style="border-radius: 100%;">
	      					</a>
	          			</li> --}}
	          			<li style="display: inline-block;margin-left: 40px;">
	          				<a href="http://www.mpps.gob.ve/" target="_blank">
          						<img src="{{ asset('/logo22.jpeg') }}" width="40" style="border-radius: 100%;">
          					</a>
	          			</li>
	          			<li style="display: inline-block;margin-left: 10px;">
	          				<a href="http://www.ispeb.gob.ve/" target="_blank">
          						<img src="{{ asset('/logo32.jpeg') }}" width="40" style="border-radius: 100%;">
          					</a>
	          			</li>
	          		</ul>
	          	</div>
	      	</aside>
	      	<!--sidebar end-->
	      	<!--main content start-->
	      	<section id="main-content">
	          	<section class="wrapper">
	              	@yield('body')
	          	</section>
	      	</section>
	      	<!--main content end-->

	      	<!--footer start-->
	      	<footer class="site-footer" style="background:#658eab;font-size: 1.4em;">
	          <div class="text-center">
	              	<?php echo date('Y'); ?> &copy; Todos los derechos reservados.
	              	{{-- <a href="#" class="go-top">
	                  	<i class="fa fa-angle-up"></i>
	              	</a> --}}
	          	</div>
	      	</footer>
	      	<!--footer end-->
	  	</section>

	    <!-- js placed at the end of the document so the pages load faster -->
	    <script src="{{ asset('/template_content/js/jquery.js') }}"></script>
	    <script src="{{ asset('/template_content/js/bootstrap.min.js') }}"></script>
	    <script src="{{ asset('/template_content/js/jquery.dcjqaccordion.2.7.js') }}" class="include" type="text/javascript"></script>
	    <script src="{{ asset('/template_content/js/jquery.scrollTo.min.js') }}"></script>
	    <script src="{{ asset('/template_content/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('/template_content/js/jquery.sparkline.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('/template_content/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
	    <script src="{{ asset('/template_content/js/owl.carousel.js') }}" ></script>
	    <script src="{{ asset('/template_content/js/jquery.customSelect.min.js') }}" ></script>
	    <script src="{{ asset('/template_content/js/respond.min.js') }}" ></script>

	    <!--right slidebar-->
	    <script src="{{ asset('/template_content/js/slidebars.min.js') }}"></script>

	    <!--common script for all pages-->
	    <script src="{{ asset('/template_content/js/common-scripts.js') }}"></script>

	    <!--script for this page-->
	    <script src="{{ asset('/template_content/js/sparkline-chart.js') }}"></script>
	    <script src="{{ asset('/template_content/js/easy-pie-chart.js') }}"></script>
	    <script src="{{ asset('/template_content/js/count.js') }}"></script>
	    <script src="{{ asset('/dropify/dist/js/dropify.min.js') }}"></script>
	    <script src="{{ asset('/select2/dist/js/select2.full.min.js') }}"></script>
	    <script src="{{ asset('/tinymce/tinymce.min.js') }}"></script>
	    <script src="{{ asset('/template_content/js/dropzone.js') }}"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	  	<script>
	      //owl carousel
	      	$(document).ready(function() {
	          	$("#owl-demo").owlCarousel({
	              	navigation : true,
	              	slideSpeed : 300,
	              	paginationSpeed : 400,
	              	singleItem : true,
				  	autoPlay:true
	          	});
	      	});
	      	//custom select box
	      	$(function(){
	          	$('select.styled').customSelect();
	      	});

	      	$(window).on("resize",function(){
	          	var owl = $("#owl-demo").data("owlCarousel");
	          	owl.reinit();
	      	});

	      	$('.dropify').dropify({
				messages: {
	                default: 'Click aqui o arrastra un archivo',
	                remove: 'Remover',
	                error: 'Error, archivo no soportado',
	                replace:'Click aqui o arrastra un archivo para reemplazar'
	            }
			});

			var xValues = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
			var yValues = [
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '01')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '02')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '03')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '04')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '05')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '06')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '07')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '08')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '09')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '10')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '11')->count() }}',
				'{{ App\User::whereYear('created_at', date('Y'))->whereMonth('created_at', '12')->count() }}',
			];
			var barColors = ["#d7e3fc ", "#ffc09f","#a0ced9","#fcf5c7","#d6eadf","#809bce", "#b8e0d2","#f0efeb","#fce1e4","#daeaf6","#7ec4cf","#d1cfe2 "];

			new Chart("myChart", {
			  type: "bar",
			  data: {
			    labels: xValues,
			    datasets: [{
			      backgroundColor: barColors,
			      data: yValues
			    }]
			  },
			  options: {
			    legend: {display: false},
			    title: {
			      display: true,
			      text: "Estadisticas de registros año {{ date('Y') }}"
			    }
			  }
			});
	  	</script>
	  	@yield('scripts')
  	</body>
</html>
