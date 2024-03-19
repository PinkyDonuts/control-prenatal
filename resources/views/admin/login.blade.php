<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/template_content/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/template_content/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('/template_content/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('/template_content/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/template_content/css/style-responsive.css') }}" rel="stylesheet" />
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

  	<body class="login-body" style="background:#658eab">
  		<!-- Single button -->
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12" style="text-align:right">
    				<br>
    				<div class="btn-group">
					  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: transparent;border: none;margin-top: 20px;float: right !important;">
					    	<img src="{{ asset('/information2.png') }}" width="50">
					  	</button>
					  	<ul class="dropdown-menu" style="width: 350px;right: 0;left: auto;">
					  		<li>
					  			<h3 style="margin-top: 5px" class="text-center">
					  				Responsable del proyecto
					  			</h3>
					  			<hr>
					  		</li>
					    	<li>
					    		<div class="row">
					    			<div class="col-lg-3">
					    				<div style="width:70px;height:70px;background-color:#f2f2f2;border-radius:100%;margin-left: 10px;background-image: url('{{ asset('/participantes/laura.jpeg') }}');background-size: cover;background-position: center;"></div>
					    			</div>
					    			<div class="col-lg-9">
							    		<ul style="margin-top:5px;margin-left: 10px">
							    			<li>Laura León</li>
							    			<li>laurapaulina.leon@gmail.com</li>
							    			<li>+58 4249031436</li>
							    		</ul>
					    			</div>
					    		</div>
					    	</li>
					    	<li>
					    		<hr>
					    	</li>
					    	{{-- <li>
					    		<div class="row">
					    			<div class="col-lg-3">
					    				<div style="width:70px;height:70px;background-color:#f2f2f2;border-radius:100%;margin-left: 10px;background-image: url('{{ asset('/participantes/oscar.jpeg') }}');background-size: cover;background-position: center;"></div>
					    			</div>
					    			<div class="col-lg-9">
							    		<ul style="margin-top:5px;margin-left: 10px">
							    			<li>Omar Colmenares</li>
							    			<li>omarcolmenares0502@gmail.com</li>
							    			<li>+58 4126959914</li>
							    		</ul>
					    			</div>
					    		</div>
					    	</li>
					    	<li>
					    		<hr>
					    	</li>
					    	<li>
					    		<div class="row">
					    			<div class="col-lg-3">
					    				<div style="width:70px;height:70px;background-color:#f2f2f2;border-radius:100%;margin-left: 10px;background-image: url('{{ asset('/participantes/samuel.jpeg') }}');background-size: cover;background-position: center;"></div>
					    			</div>
					    			<div class="col-lg-9">
							    		<ul style="margin-top:5px;margin-left: 10px">
							    			<li>Samuel Gutiérrez</li>
							    			<li>samuelgc22@gmail.com</li>
							    			<li>+58 4127968769</li>
							    		</ul>
							    		<div style="height: 10px;"></div>
					    			</div>
					    		</div>
					    	</li> --}}
					  	</ul>
					</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-center" style="margin-bottom:0px;color: #fff;text-shadow: 1px 2px 3px #222;">
		      			APLICACION PARA EL CONTROL DE EMBARAZADAS EN EL DEPARTAMENTO DE GINECOLOGIA Y OBSTETRICIA DEL AMBULATORIO PETRA EMILIA MORENO, ADSCRITO AL INSTITUTO DE SALUD PUBLICA DEL ESTADO BOLIVAR
		      		</h1> <br>
    			</div>
    		</div>
	      	<form class="form-signin" action="{{ url('/admin/login') }}" method="POST" autocomplete="off" style="margin-top:20px;filter: drop-shadow(2px 5px 8px #111);margin-bottom: 20px;border-radius: 15px;">
	      		{{ csrf_field() }}
	        	<h2 class="form-signin-heading" style="background:#48718d;border-radius: 0px;border-radius: 15px 15px 0px 0px;font-family: 'Madimi One', sans-serif;font-size: 2em;">
	        		{{-- <img src="{{ asset('/landing_assets/logo-blanco.svg') }}" width="200"> --}}
	        		Login
	        	</h2>
	        	<div class="login-wrap">
	        		@if(count($errors) > 0)
	        			<div class="form-group">
	        				<div class="alert alert-danger text-center" style="font-size: 2em;">
	        					{{ $errors->first() }}
	        				</div>
	        			</div>
	        		@endif
	        		@if(session()->has('error'))
	        			<div class="form-group">
	        				<div class="alert alert-danger text-center" style="font-size: 2em;">
	        					{{ session()->get('error') }}
	        				</div>
	        			</div>
	        		@endif
	        		<div class="form-group">
	            		<input type="text" class="form-control" placeholder="Email" name="email" value="" style="font-size: 1.4em;" />
	        		</div>
	        		<div class="form-group">
	            		<input type="password" class="form-control" placeholder="Password" name="password" value="" style="font-size: 1.4em;" />
	        		</div>
	            	<button class="btn btn-lg btn-login btn-block" type="submit" style="background:#48718d;box-shadow: none;box-shadow: 3px 3px 4px #999;font-family: 'Madimi One', sans-serif;font-size: 1.5em;">
	            		Ingresar
	            	</button>
	        	</div>
	          	<!-- modal -->
	      	</form>
          	<div class="row">
          		<div class="col-lg-4"></div>
          		<div class="col-lg-4">
          			<div class="row">
          				<div class="col-lg-2 text-center">
          				</div>
          				<div class="col-lg-4 text-center">
          					<br>
          					<a href="http://www.mpps.gob.ve/" target="_blank">
          						<img src="{{ asset('/logo22.jpeg') }}" width="80%" style="background:#ff5594;border-radius: 100%;filter: drop-shadow(2px 5px 8px #111);">
          					</a>
          				</div>
          				<div class="col-lg-4 text-center">
          					<br>	
          					<a href="http://www.ispeb.gob.ve/" target="_blank">
          						<img src="{{ asset('/logo32.jpeg') }}" width="80%" style="background:#ff5594;border-radius: 100%;filter: drop-shadow(2px 5px 8px #111);">
          					</a>
          				</div>
          			</div>
          		</div>
          	</div>
	    </div>
	    <!-- js placed at the end of the document so the pages load faster -->
	    <script src="{{ asset('/template_content/js/jquery.js') }}"></script>
	    <script src="{{ asset('/template_content/js/bootstrap.min.js') }}"></script>
  	</body>
</html>
