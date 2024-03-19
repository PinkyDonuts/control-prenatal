@extends('admin.layout')
@section('title_page' , 'Admin segurtonic - Editar perfil')

@section('body')
	<div class="row state-overview">
      	<div class="col-lg-12">
          	<section class="panel">
              	<div class="panel-heading">
              		<h4>
                        Editar perfil 
              		</h4>
              		<div style="width:150px;height:150px;background-color: #333;background-image: url('{{ Auth::user()->agent->avatar }}');background-size: cover;background-position: center;border-radius: 100%;border: solid 2px #999;"></div>
              	</div>
              	<div class="panel-body">
              		<div class="row">
              			<div class="col-lg-12">
              				@if(session()->has('msj'))
              					<div class="alert alert-success text-center">
              						{{ session()->get('msj') }}
              					</div>	
              				@endif
              			</div>
              		</div>
              		<form action="{{ url('/admin/perfil') }}" method="POST" autocomplete="off" enctype="multipart/form-data" id="form_proposal">
              			{{ csrf_field() }}
              			<div class="row">
                            <div class="col-lg-3">
                            	<div class="form-group">
	                                <label for="name">Nombre</label>
	                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            	</div>
                            </div>
                            <div class="col-lg-3">
                            	<div class="form-group">
	                                <label for="email">Email</label>
	                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            	</div>
                            </div>
                            <div class="col-lg-3">
                            	<div class="form-group">
	                                <label for="phone">Telefono</label>
	                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->agent->phone }}">
                            	</div>
                            </div>
                            <div class="col-lg-3">
                            	<div class="form-group">
	                                <label for="company_id">Aseguradora</label>
	                                <select name="company_id" id="company_id" class="form-control select2">
	                                	<option value="">Selecicone</option>
	                                	@foreach(App\Models\Company::get() as $com)
	                                		<option value="{{ $com->id }}" {{ Auth::user()->agent->company_id == $com->id ? 'selected' : '' }}>
	                                			{{ $com->title }}
	                                		</option>
	                                	@endforeach
	                                </select>
                            	</div>
                            </div>
                            <div class="col-lg-6">
                            	<div class="form-group">
	                                <label for="address">Direccion</label>
	                                <input type="text" name="address" class="form-control" value="{{ Auth::user()->agent->address }}">
                            	</div>
                            </div>
                            <div class="col-lg-2">
                            	<div class="form-group">
	                                <label for="postal_code">Codigo postal</label>
	                                <input type="text" name="postal_code" class="form-control" value="{{ Auth::user()->agent->postal_code }}">
                            	</div>
                            </div>
                            <div class="col-lg-2">
                            	<div class="form-group">
	                                <label for="postal_code">Provincia</label>
	                                <select name="province" id="province" class="form-control select2">
	                                	<option value="">Selecicone</option>
	                                	@foreach(DB::table('provinces')->orderBy('name' , 'asc')->get() as $pro)
	                                		<option value="{{ $pro->name }}" {{ Auth::user()->agent->province == $pro->name ? 'selected' : '' }}>
	                                			{{ $pro->name }}
	                                		</option>
	                                	@endforeach
	                                </select>
                            	</div>
                            </div>
                            <div class="col-lg-2">
                            	<div class="form-group">
	                                <label for="town">Poblacion</label>
	                                <input type="text" name="town" class="form-control" value="{{ Auth::user()->agent->town }}">
                            	</div>
                            </div>
                            <div class="col-lg-12">
	                            <div class="form-group">
		                			<label for="avatar">Avatar</label>
		                			<input type="file" id="avatar" class="dropify" name="avatar" data-height="130" accept="image/*" data-default-file="{{ isset($age) && $age->avatar ? $age->avatar : '' }}"/>
		                		</div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12">
                        	<span class="text-primary">
                        		*Deje los campos vacios para mantener la misma contraseña
                        	</span>
                        </div>
                        <div class="col-lg-6">
                        	<div class="form-group">
                        		<label for="password">Contraseña</label>
	                            <input type="password" name="password" class="form-control">
                        	</div>
                        </div>
                        <div class="col-lg-6">
                        	<div class="form-group">
                        		<label for="confirm_password">Confirmar Contraseña</label>
	                            <input type="confirm_password" name="confirm_password" class="form-control">
                        	</div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <button class="btn btn-success btn-block send_proposal">
                                    Guardar datos
                                </button>
                            </div>
                        </div>
              		</form>
              	</div>
          	</section>
      	</div>
  	</div>
  	@section('scripts')
  		<script>
            $(document).ready(function() {
                $('.select2').select2();
            });
  		</script>
  	@endsection
@stop