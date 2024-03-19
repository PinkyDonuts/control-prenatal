@extends('admin.layout')
@section('title_page' , 'Control pre-natal')

@section('body')
	<div class="row state-overview">
      	<div class="col-lg-12">
          	<section class="panel">
              	<div class="panel-heading">
              		<h4>
                    	Controles registrados 
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
              			</div>
              		</div>
                    <form action="{{ url('/admin/control-index/filter') }}" method="GET" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="name_filter">Nombre</label>
                                    <input type="text" name="name_filter" id="name_filter" class="form-control" placeholder="Nombre" value="{{ isset($name_filter) ? $name_filter : '' }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="last_name_filter">Primer apellido</label>
                                    <input type="text" name="last_name_filter" id="last_name_filter" class="form-control" placeholder="Primer apellido" value="{{ isset($last_name_filter) ? $last_name_filter : '' }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="second_last_name_filter">Segundo apellido</label>
                                    <input type="text" name="second_last_name_filter" id="second_last_name_filter" class="form-control" placeholder="Segundo apellido" value="{{ isset($second_last_name_filter) ? $second_last_name_filter : '' }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="dni_filter">C.I</label>
                                    <input type="text" name="dni_filter" id="dni_filter" class="form-control" placeholder="C.I" value="{{ isset($dni_filter) ? $dni_filter : '' }}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="age_from_filter">Edad desde</label>
                                    <input type="number" min="1" name="age_from_filter" id="age_from_filter" class="form-control" placeholder="Edad desde" value="{{ isset($age_from_filter) ? $age_from_filter : '' }}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="age_to_filter">Edad hasta</label>
                                    <input type="number" min="1" name="age_to_filter" id="age_to_filter" class="form-control" placeholder="Edad hasta" value="{{ isset($age_to_filter) ? $age_to_filter : '' }}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button class="btn btn-success btn-block" style="margin-top:23px">
                                        Filtrar
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <a href="{{ url('/admin/control-index') }}" class="btn btn-danger btn-block" style="margin-top:23px">
                                        Remover filtros
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="{{ url('/admin/export-users-excel') }}" class="btn btn-success">
                        Exportar registros
                    </a>
              		<div class="row">
                        <br>
                        <div class="col-lg-12">
                            {{ $u->links() }}
                        </div>
                    </div>
      				<table class="table table-bordered table-hover">
      					<thead>
      						<tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                	Email
                                </th>
                                <th>
                                	Opciones
                                </th>
      						</tr>
      					</thead>
      					<tbody>
      						@forelse($u as $use)
      							<tr>
                                    <td>
                                        {{ $use->id }}
                                    </td>
                                    <td>
                                        {{ $use->name }}
                                    </td>
      								<td>
      									{{ $use->email }}
      								</td>
      								<td>
      									<div class="btn-group">
      										<a href="{{ url('/admin/control-edit/'.$use->id) }}" class="btn btn-info btn-xs">
      											Editar
      										</a>
      										<a href="{{ url('/admin/control-view/'.$use->id) }}" class="btn btn-success btn-xs" target="_blank">
      											Ver planilla
      										</a>
                                            <a href="#delete_register_{{ $use->id }}" data-toggle="modal" class="btn btn-danger btn-xs">
                                                Eliminar
                                            </a>
      									</div>
                                        <div class="modal fade" id="delete_register_{{ $use->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Seguro de eliminar el registro de <b>{{ $use->name }}?</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                        	<div class="col-lg-12 text-center">
                                                        		<div class="btn-group">
                                                        			<a href="{{ url('/admin/users/delete/'.$use->id) }}" class="btn btn-danger btn-xs">
                                                        				Si
                                                        			</a>
                                                        			<button type="button" class="btn btn-info btn-xs" data-dismiss="modal" aria-hidden="true">
		                                                                No
		                                                            </button>
                                                        		</div>
                                                        	</div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal" aria-hidden="true">
                                                                Cancelar
                                                            </button>
                                                        </div>
                                                    </div>
                                              </div>
                                          </div>
                                        </div>
      								</td>
      							</tr>
      						@empty
      							<tr>
      								<td colspan="8" class="text-center">
      									Sin resultados
      								</td>
      							</tr>
      						@endforelse
      					</tbody>
      				</table>
              	</div>
          	</section>
      	</div>
  	</div>
  	@section('scripts')
        <script>
            jQuery(document).ready(function($) {
                jQuery('.active').removeClass('active');
                jQuery('.link_list_cp').addClass('active');
            });
        </script>
  	@endsection
@stop