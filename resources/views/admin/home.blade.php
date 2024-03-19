@extends('admin.layout')
@section('title_page' , 'Control prenatal - Home')

@section('body')
	<div class="row state-overview">
      	<div class="col-lg-4 col-sm-6">
          	<section class="panel">
              	<div class="symbol terques" style="background:#48718d">
                  	<i class="fa fa-user"></i>
              	</div>
              	<div class="value">
                  	<h1 class="">
                      	{{ App\User::where('role' , 2)->count() }}
                  	</h1>
                  	<p style="font-size: 1.4em;">Total de embarazadas</p>
              	</div>
          	</section>
      	</div>
      	<div class="col-lg-4 col-sm-6">
          	<section class="panel">
              	<div class="symbol terques" style="background:#48718d">
                  	<i class="fa fa-calendar"></i>
              	</div>
              	<div class="value">
                  	<h1 class="">
                      	{{ App\User::where('role' , 2)->whereMonth('created_at' , date('m'))->count() }}
                  	</h1>
                  	<p style="font-size: 1.4em;">Registros en el ultimo mes</p>
              	</div>
          	</section>
      	</div>
      	<div class="col-lg-4 col-sm-6">
          	<section class="panel">
              	<div class="symbol terques" style="background:#48718d">
                  	<i class="fa fa-calendar"></i>
              	</div>
              	<div class="value">
                  	<h1 class="">
                      	{{ App\User::where('role' , 2)->whereYear('created_at' , date('Y'))->count() }}
                  	</h1>
                  	<p style="font-size: 1.4em;">Registros en el ultimo año</p>
              	</div>
          	</section>
      	</div>
      	<div class="col-lg-12">
      		<h1 class="text-center" style="margin-bottom:0px;color: #999;">
      			APLICACION PARA EL CONTROL DE EMBARAZADAS EN EL DEPARTAMENTO DE GINECOLOGIA Y OBSTETRICIA DEL AMBULATORIO PETRA EMILIA MORENO, ADSCRITO AL INSTITUTO DE SALUD PUBLICA DEL ESTADO BOLIVAR
      		</h1>
      	</div>
      	<div class="col-lg-12 text-center">
      		<br><br>
      		<a href="{{ url('/admin/export-stats-pdf') }}" target="_blank" class="btn btn-success">
      			Exportar PDF
      		</a>
      		<canvas id="myChart" style="width:100%;max-width:800px;margin-left:25%"></canvas>
      	</div>
  	</div>
@stop