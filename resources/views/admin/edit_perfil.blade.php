@extends('admin.layout')
@section('title_page' , 'Admin - Editar perfil')

@section('body')
	<div class="row state-overview">
      	<div class="col-lg-6">
          	<section class="panel">
              	<div class="panel-heading">
              		<h4>
                        Editar perfil
              		</h4>
              	</div>
              	<div class="panel-body">
              		<div class="row">
              			<div class="col-lg-12">
              				@if(session()->has('msj'))
              					<div class="alert alert-success text-center">
              						{{ session()->get('msj') }}
              					</div>	
              				@endif
              				@if(session()->has('error'))
              					<div class="alert alert-danger text-center">
              						{{ session()->get('error') }}
              					</div>	
              				@endif
              				@if(count($errors) > 0)
              					<div class="alert alert-danger text-center">
              						{{ $errors->first() }}
              					</div>	
              				@endif
              			</div>
              		</div>
              		<form action="{{ url('/admin/edit-perfil') }}" method="POST" autocomplete="off" enctype="multipart/form-data" id="form_proposal">
              			{{ csrf_field() }}
              			<div class="row">
              				<div class="col-lg-12">
              					<h3>
              						Datos de identificacion
              					</h3>
              				</div>
              				<div class="col-lg-12">
              					<div class="row">
              						<div class="col-lg-12">
		                            	<div class="form-group">
			                                <label for="name">Nombre(s)</label>
			                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
		                            	</div>
		                            </div>
		                            <div class="col-lg-12">
		                            	<div class="form-group">
			                                <label for="email">E-mail</label>
			                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
		                            	</div>
		                            </div>
		                            <div class="col-lg-12">
		                            	<div class="form-group">
			                                <label for="password">Contraseña 
			                                	<br>
			                                	<span>
			                                		*Deje este campo vacio para mantener la contraseña actual!
			                                	</span>
			                                </label>
			                                <input type="password" name="password" class="form-control">
		                            	</div>
		                            </div>
              					</div>
              				</div>
	                        <div class="col-lg-6">
	                            <div class="form-group">
	                                <button class="btn btn-success btn-block send_proposal">
	                                    Guardar datos
	                                </button>
	                            </div>
	                        </div>
                        </div>
              		</form>
              	</div>
          	</section>
      	</div>
  	</div>
  	@section('scripts')
  		<script>
            jQuery(document).ready(function($) {
                jQuery('.active').removeClass('active');
                jQuery('.link_edit_perfil').addClass('active');
            });
        </script>
  	@endsection
@stop