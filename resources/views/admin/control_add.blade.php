@extends('admin.layout')
@section('title_page' , 'Admin - Agregar registro')

@section('body')
	<div class="row state-overview">
      	<div class="col-lg-12">
          	<section class="panel">
              	<div class="panel-heading">
              		<h4>
                        {{ isset($cnt) ? 'Editar' : 'Agregar' }} registro de control pre-natal
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
              		<form action="{{ url('/admin/control-add') }}" method="POST" autocomplete="off" enctype="multipart/form-data" id="form_proposal">
              			{{ csrf_field() }}
              			<input type="hidden" name="user_id" value="{{ isset($cnt) ? $cnt->id : null }}">
              			<div class="row">
              				<div class="col-lg-12">
              					<h3>
              						Datos de identificacion
              					</h3>
              				</div>
              				<div class="col-lg-12">
              					<div class="row">
              						<div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="name">Nombre(s)</label>
			                                <input type="text" name="name" class="form-control" value="{{ isset($cnt) ? $cnt->name : old('name') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-2">
		                            	<div class="form-group">
			                                <label for="last_name">Primer apellido</label>
			                                <input type="text" name="last_name" class="form-control" value="{{ isset($cnt) ? $cnt->last_name : old('last_name') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-2">
		                            	<div class="form-group">
			                                <label for="second_last_name">Segundo apellido</label>
			                                <input type="text" name="second_last_name" class="form-control" value="{{ isset($cnt) ? $cnt->second_last_name : old('second_last_name') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-2">
		                            	<div class="form-group">
			                                <label for="dni">C.I</label>
			                                <input type="text" name="dni" class="form-control" value="{{ isset($cnt) ? $cnt->dni : old('dni') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="secure_history">Historia CLI</label>
			                                <input type="text" name="secure_history" class="form-control" value="{{ isset($cnt) ? $cnt->secure_history : old('secure_history') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-2">
		                            	<div class="form-group">
			                                <label for="born_date">Fecha de nacimiento</label>
			                                <input type="date" name="born_date" class="form-control" value="{{ isset($cnt) ? $cnt->born_date : old('born_date') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-1">
		                            	<div class="form-group">
			                                <label for="age">Edad</label>
			                                <input type="number" name="age" class="form-control" value="{{ isset($cnt) ? $cnt->age : old('age') }}" min="1">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="civil_status">Estado conyugal</label>
			                                <select name="civil_status" id="civil_status" class="form-control">
			                                	<option value="">Seleccione</option>
			                                	<option value="1" {{ isset($cnt) && $cnt->civil_status == 1 ? 'selected' : '' }}>Soltero</option>
			                                	<option value="2" {{ isset($cnt) && $cnt->civil_status == 2 ? 'selected' : '' }}>Casado</option>
			                                	<option value="3" {{ isset($cnt) && $cnt->civil_status == 3 ? 'selected' : '' }}>Viudo</option>
			                                </select>
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="secure_code">N° de seguro</label>
			                                <input type="text" name="secure_code" class="form-control" value="{{ isset($cnt) ? $cnt->secure_code : old('secure_code') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="scholarship">Escolaridad</label>
			                                <select name="scholarship" id="scholarship" class="form-control">
			                                	<option value="">Seleccione</option>
			                                	<option value="1" {{ isset($cnt) && $cnt->scholarship == 1 ? 'selected' : '' }}>Ninguna</option>
			                                	<option value="2" {{ isset($cnt) && $cnt->scholarship == 2 ? 'selected' : '' }}>Primaria</option>
			                                	<option value="3" {{ isset($cnt) && $cnt->scholarship == 3 ? 'selected' : '' }}>Secundaria</option>
			                                	<option value="4" {{ isset($cnt) && $cnt->scholarship == 4 ? 'selected' : '' }}>Tecnico</option>
			                                	<option value="5" {{ isset($cnt) && $cnt->scholarship == 5 ? 'selected' : '' }}>Universitaria</option>
			                                	<option value="6" {{ isset($cnt) && $cnt->scholarship == 6 ? 'selected' : '' }}>Postgrado</option>
			                                </select>
		                            	</div>
		                            </div>
		                            <div class="col-lg-6">
		                            	<div class="form-group">
			                                <label for="address">Direccion</label>
			                                <input type="text" name="address" class="form-control" value="{{ isset($cnt) ? $cnt->address : old('address') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="phone">Telefono fijo</label>
			                                <input type="text" name="phone" class="form-control" value="{{ isset($cnt) ? $cnt->phone : old('phone') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="movil">Telefono movil</label>
			                                <input type="text" name="movil" class="form-control" value="{{ isset($cnt) ? $cnt->movil : old('movil') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="email">Email</label>
			                                <input type="email" name="email" class="form-control" value="{{ isset($cnt) ? $cnt->email : old('email') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="weight_bp">Peso anterior al embarazo (Kg)</label>
			                                <input type="text" name="weight_bp" class="form-control" value="{{ isset($cnt) ? $cnt->weight_bp : old('weight_bp') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="size_bp">Talla</label>
			                                <input type="text" name="size_bp" class="form-control" value="{{ isset($cnt) ? $cnt->size_bp : old('size_bp') }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="imc">IMC</label>
			                                <input type="text" name="imc" class="form-control" value="{{ isset($cnt) ? $cnt->imc : old('imc') }}">
		                            	</div>
		                            </div>
              					</div>
              				</div>
                        </div>
                        <hr>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Inicio de control
                        	</h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="row">
		                        <div class="col-lg-2">
		                        	<div class="form-group">
		                                <label for="menst_type">Ultima menstruacion</label>
		                                <select name="menst_type" id="menst_type" class="form-control">
		                                	<option value="">Seleccione</option>
		                                	<option value="1" {{ isset($cnt) && $cnt->menst_type == 1 ? 'selected' : '' }}>Se ignora</option>
		                                	<option value="2" {{ isset($cnt) && $cnt->menst_type == 2 ? 'selected' : '' }}>Establecer fecha</option>
		                                </select> <br>
		                                <input type="date" name="last_menst" class="form-control" value="{{ isset($cnt) ? $cnt->last_menst : '' }}" {{ isset($cnt) && $cnt->menst_type == 2 ? '' : 'disabled' }}>
		                        	</div>
		                        </div>
		                        <div class="col-lg-3">
		                        	<div class="form-group">
		                                <label for="possible_birth">Fecha probable del parto</label>
		                                <input type="date" name="possible_birth" class="form-control" value="{{ isset($cnt) ? $cnt->possible_birth : '' }}">
		                        	</div>
		                        </div>
		                        <div class="col-lg-3">
		                        	<div class="form-group">
		                                <label for="first_eco_date">Fecha primero ecografia</label>
		                                <input type="date" name="first_eco_date" class="form-control" value="{{ isset($cnt) ? $cnt->first_eco_date : '' }}">
		                        	</div>
		                        </div>
		                        <div class="col-lg-2">
		                        	<div class="form-group">
		                                <label for="months">Meses</label>
		                                <input type="number" name="months" class="form-control" value="{{ isset($cnt) ? $cnt->months : '' }}" min="0">
		                        	</div>
		                        </div>
		                        <div class="col-lg-2">
		                        	<div class="form-group">
		                                <label for="days">Dias</label>
		                                <input type="number" name="days" class="form-control" value="{{ isset($cnt) ? $cnt->days : '' }}" min="1">
		                        	</div>
		                        </div>
                        	</div>
                        </div>
                        <div class="col-lg-12">
                        	<hr>
                        </div>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Antecedentes familiares
                        	</h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="row">
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="no_background" value="1" {{ isset($cnt) && $cnt->familyb->no_background == 1 ? 'checked' : '' }}> Ninguno
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="tuberculosis" value="1" {{ isset($cnt) && $cnt->familyb->tuberculosis == 1 ? 'checked' : '' }}> Tuberculosis
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="diabetes" value="1" {{ isset($cnt) && $cnt->familyb->diabetes == 1 ? 'checked' : '' }}> Diabetes
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="hipertension" value="1" {{ isset($cnt) && $cnt->familyb->hipertension == 1 ? 'checked' : '' }}> Hipertension
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="hipertension_byp" value="1" {{ isset($cnt) && $cnt->familyb->hipertension_byp == 1 ? 'checked' : '' }}> Enf. Hipertensiva del embarazo
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="other_background" value="1" {{ isset($cnt) && $cnt->familyb->other_background == 1 ? 'checked' : '' }}> Otro
	                        			</label>
	                        		</div>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-lg-12">
                        	<hr>
                        </div>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Antecedentes personales patologicos
                        	</h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="row">
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="no_background_patological" value="1" {{ isset($cnt) && $cnt->patological->no_background == 1 ? 'checked' : '' }}> Ninguno
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="tuberculosis_patological" value="1" {{ isset($cnt) && $cnt->patological->tuberculosis == 1 ? 'checked' : '' }}> Tuberculosis
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="diabetes_patological" value="1" {{ isset($cnt) && $cnt->patological->diabetes == 1 ? 'checked' : '' }}> Diabetes preexistente
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="hipertension_patological" value="1" {{ isset($cnt) && $cnt->patological->hipertension == 1 ? 'checked' : '' }}> Hipertension
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="preeclampsia" value="1" {{ isset($cnt) && $cnt->patological->preeclampsia == 1 ? 'checked' : '' }}> Preeclampsia
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="eclampsia" value="1" {{ isset($cnt) && $cnt->patological->eclampsia == 1 ? 'checked' : '' }}> Eclampsia
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="cardiopatia" value="1" {{ isset($cnt) && $cnt->patological->cardiopatia == 1 ? 'checked' : '' }}> Cardiopatia
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="nefropatia" value="1" {{ isset($cnt) && $cnt->patological->nefropatia == 1 ? 'checked' : '' }}> Nefropatia
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="gemelar" value="1" {{ isset($cnt) && $cnt->patological->gemelar == 1 ? 'checked' : '' }}> Antecedente gemelar
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="oncologico" value="1" {{ isset($cnt) && $cnt->patological->oncologico == 1 ? 'checked' : '' }}> Padecimiento oncologico
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="vih" value="1" {{ isset($cnt) && $cnt->patological->vih == 1 ? 'checked' : '' }}> VIH positivo
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="other_background_patological" value="1" {{ isset($cnt) && $cnt->patological->other_background == 1 ? 'checked' : '' }}> Otro
	                        			</label>
	                        		</div>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-lg-12">
                        	<hr>
                        </div>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Toxicomanias activas
                        	</h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="row">
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="tobacco" value="1" {{ isset($cnt) && $cnt->toxic->tobacco == 1 ? 'checked' : '' }}> Tabaco
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="alcohol" value="1" {{ isset($cnt) && $cnt->toxic->alcohol == 1 ? 'checked' : '' }}> Alcohol
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="drugs" value="1" {{ isset($cnt) && $cnt->toxic->drugs == 1 ? 'checked' : '' }}> Drogas
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-2">
	                        		<div class="form-group">
	                        			<label>
	                        				<input type="checkbox" name="other_toxic" value="1" {{ isset($cnt) && $cnt->toxic->other_toxic == 1 ? 'checked' : '' }}> otro
	                        			</label>
	                        		</div>
                        		</div>
                        		<div class="col-lg-4">
                        			<div class="form-group">
		                                <label for="other_description_toxic">Especifique otros</label>
		                                <input type="text" name="other_description_toxic" class="form-control" value="{{ isset($cnt) && $cnt->toxic ? $cnt->toxic->other_description : '' }}">
	                            	</div>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-lg-12">
                        	<hr>
                        </div>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Biologicos aplicados
                        	</h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="row">
                        		<div class="col-lg-4">
	                            	<div class="form-group">
		                                <label for="first_date">Primera fecha de apliacion de tetanos</label>
		                                <input type="date" name="first_date" class="form-control" value="{{ isset($cnt) ? $cnt->biological->first_date : '' }}">
	                            	</div>
	                            </div>
	                            <div class="col-lg-4">
	                            	<div class="form-group">
		                                <label for="second_date">Segunda fecha de apliacion de tetanos</label>
		                                <input type="date" name="second_date" class="form-control" value="{{ isset($cnt) ? $cnt->biological->second_date : '' }}">
	                            	</div>
	                            </div>
	                            <div class="col-lg-4">
	                            	<div class="form-group">
		                                <label for="reforzed_date">Fecha de refuerzo antiinfluenzaa</label>
		                                <input type="date" name="reforzed_date" class="form-control" value="{{ isset($cnt) ? $cnt->biological->reforzed_date : '' }}">
	                            	</div>
	                            </div>
                        	</div>
                        </div>
                        <div class="col-lg-12">
                        	<hr>
                        </div>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Antecedentes ginecoobstetricos
                        	</h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="row">
                        		<div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="gestas">Gestas</label>
		                                <input type="number" name="gestas" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->gestas : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="para">Para</label>
		                                <input type="number" name="para" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->para : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="cesareas">Cesareas</label>
		                                <input type="number" name="cesareas" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->cesareas : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="aborts">Abortos</label>
		                                <input type="number" name="aborts" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->aborts : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="living_children">Hijos nacidos (Vivos)</label>
		                                <input type="number" name="living_children" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->living_children : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="dead_children">Hijos nacidos (Muertos)</label>
		                                <input type="number" name="dead_children" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->dead_children : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-3">
	                            	<div class="form-group">
		                                <label for="contraceptive_method">Tipo de metodo anticonceptivo</label>
		                                <input type="text" name="contraceptive_method" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->contraceptive_method : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="contraceptive_method_time">Tiempo de uso</label>
		                                <input type="text" name="contraceptive_method_time" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->contraceptive_method_time : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="failure_contraceptive_method">Fracaso en uso</label>
		                                <select name="failure_contraceptive_method" id="failure_contraceptive_method" class="form-control">
		                                	<option value="">Selecicone</option>
		                                	<option value="1" {{ isset($cnt) && $cnt->gyb->failure_contraceptive_method == 1 ? 'selected' : '' }}>Si</option>
		                                	<option value="2" {{ isset($cnt) && $cnt->gyb->failure_contraceptive_method == 2 ? 'selected' : '' }}>No</option>
		                                </select>
	                            	</div>
	                            </div>
	                            <div class="col-lg-2">
	                            	<div class="form-group">
		                                <label for="blood_rh">Grupo sanguineo</label>
		                                <input type="text" name="blood_rh" class="form-control" value="{{ isset($cnt) ? $cnt->gyb->blood_rh : '' }}" min="0">
	                            	</div>
	                            </div>
	                            <div class="col-lg-3">
	                            	<div class="form-group">
	                            		<div style="height:10px"></div>
	                            		<label>
	                            			<input type="radio" name="blood_type" value="1" {{ isset($cnt) && $cnt->gyb->blood_type == 1 ? 'checked' : '' }}> Positivo
	                            		</label> <br>
	                            		<label>
	                            			<input type="radio" name="blood_type" value="2" {{ isset($cnt) && $cnt->gyb->blood_type == 2 ? 'checked' : '' }}> Negativo
	                            		</label>
	                            	</div>
	                            </div>
                        	</div>
                        </div>
                        <div class="col-lg-12">
                        	<hr>
                        </div>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Salud bucal durante el embarazao
                        	</h3>
                        </div>
                        <div class="col-lg-12">
                        	<div class="row">
                        		<div class="col-lg-3">
                        			<div class="form-group">
		                                <label for="previous_revition">Revision odontologica al ingreso</label>
		                                <select name="previous_revition" id="previous_revition" class="form-control">
		                                	<option value="">Selecicone</option>
		                                	<option value="1" {{ isset($cnt) && $cnt->oral->previous_revition == 1 ? 'selected' : '' }}>Si</option>
		                                	<option value="2" {{ isset($cnt) && $cnt->oral->previous_revition == 2 ? 'selected' : '' }}>No</option>
		                                </select>
	                            	</div>
                        		</div>
                        		<div class="col-lg-3">
                        			<div style="height:10px"></div>
                        			<label>
                        				<input type="checkbox" name="caries" value="1" {{ isset($cnt) && $cnt->oral->caries == 1 ? 'checked' : '' }}> Atencion a caries
                        			</label> <br>
                        			<label>
                        				<input type="checkbox" name="periodontitis" value="1" {{ isset($cnt) && $cnt->oral->periodontitis == 1 ? 'checked' : '' }}> Atencion a periodontitis
                        			</label>
                        		</div>
                        		<div class="col-lg-2">
                        			<div style="height:10px"></div>
                        			<label>
                        				<input type="checkbox" name="other_oral" value="1" {{ isset($cnt) && $cnt->oral->other_oral == 1 ? 'checked' : '' }}> Atencion a otros
                        			</label>
                        		</div>
                        		<div class="col-lg-4">
                        			<div class="form-group">
		                                <label for="other_description_oral">Especifique otros</label>
		                                <input type="text" name="other_description_oral" class="form-control" value="{{ isset($cnt) ? $cnt->oral->other_description : '' }}" min="0">
	                            	</div>
                        		</div>
                        	</div>
                        </div>
                        <div class="col-lg-12">
                        	<hr>
                        </div>
                        <div class="col-lg-12">
                        	<h3 style="margin-top:0px">
                        		Detecciones en la embarazada 
                        		<button class="btn btn-info" type="button" onclick="addDetect()">
                        			+
                        		</button>
                        	</h3>
                        </div>
                        <div class="col-lg-12" id="detections_here">
                        	@if(isset($cnt))
                        		@foreach($cnt->detections as $det)
                        			<div class="row">
		                        		<div class="col-lg-12">
		                        			<button class="btn btn-danger btn-xs" type="button" onclick="deleteDetection($(this))">
		                        				X
		                        			</button>
		                        		</div>
		                        		<div class="col-lg-3">
		                        			<div class="form-group">
				                                <label for="time_detection[]">Tiempo de deteccion</label>
				                                <select name="time_detection[]" id="time_detection[]" class="form-control">
				                                	<option value="">Selecicone</option>
				                                	<option value="1" {{ $det->time_detection == 1 ? 'selected' : '' }}>< 20 semanas</option>
				                                	<option value="2" {{ $det->time_detection == 2 ? 'selected' : '' }}>> 20 semanas</option>
				                                </select>
			                            	</div>
		                        		</div>
		                        		<div class="col-lg-3">
		                        			<div class="form-group">
				                                <label for="type_detection[]">Tipo de deteccion</label>
				                                <select name="type_detection[]" id="type_detection[]" class="form-control">
				                                	<option value="">Selecicone</option>
				                                	<option value="1" {{ $det->type_detection == 1 ? 'selected' : '' }}>VIH</option>
				                                	<option value="2" {{ $det->type_detection == 2 ? 'selected' : '' }}>Sifilis</option>
				                                </select>
			                            	</div>
		                        		</div>
		                        		<div class="col-lg-3">
			                            	<div class="form-group">
				                                <label for="date_results[]">Fecha de resultado</label>
				                                <input type="date" name="date_results[]" class="form-control" value="{{ $det->date_results }}">
			                            	</div>
			                            </div>
			                            <div class="col-lg-3">
		                        			<div class="form-group">
				                                <label for="results_detection[]">Valor del resultado</label>
				                                <select name="results_detection[]" id="results_detection[]" class="form-control">
				                                	<option value="">Selecicone</option>
				                                	<option value="1" {{ $det->results_detection == 1 ? 'selected' : '' }}>Positivo</option>
				                                	<option value="2" {{ $det->results_detection == 2 ? 'selected' : '' }}>Negativo</option>
				                                	<option value="3" {{ $det->results_detection == 3 ? 'selected' : '' }}>Reactivo</option>
				                                </select>
			                            	</div>
		                        		</div>
		                        		<div class="col-lg-12">
		                        			<hr>
		                        		</div>
		                        	</div>
                        		@endforeach
                        	@else
	                        	<div class="row">
	                        		<div class="col-lg-12">
	                        			<button class="btn btn-danger btn-xs" type="button" onclick="deleteDetection($(this))">
	                        				X
	                        			</button>
	                        		</div>
	                        		<div class="col-lg-3">
	                        			<div class="form-group">
			                                <label for="time_detection[]">Tiempo de deteccion</label>
			                                <select name="time_detection[]" id="time_detection[]" class="form-control">
			                                	<option value="">Selecicone</option>
			                                	<option value="1">< 20 semanas</option>
			                                	<option value="2">> 20 semanas</option>
			                                </select>
		                            	</div>
	                        		</div>
	                        		<div class="col-lg-3">
	                        			<div class="form-group">
			                                <label for="type_detection[]">Tipo de deteccion</label>
			                                <select name="type_detection[]" id="type_detection[]" class="form-control">
			                                	<option value="">Selecicone</option>
			                                	<option value="1">VIH</option>
			                                	<option value="2">Sifilis</option>
			                                </select>
		                            	</div>
	                        		</div>
	                        		<div class="col-lg-3">
		                            	<div class="form-group">
			                                <label for="date_results[]">Fecha de resultado</label>
			                                <input type="date" name="date_results[]" class="form-control" value="{{ isset($cnt) ? $cnt->date_results : '' }}">
		                            	</div>
		                            </div>
		                            <div class="col-lg-3">
	                        			<div class="form-group">
			                                <label for="results_detection[]">Valor del resultado</label>
			                                <select name="results_detection[]" id="results_detection[]" class="form-control">
			                                	<option value="">Selecicone</option>
			                                	<option value="1">Positivo</option>
			                                	<option value="2">Negativo</option>
			                                	<option value="2">Reactivo</option>
			                                </select>
		                            	</div>
	                        		</div>
	                        		<div class="col-lg-12">
	                        			<hr>
	                        		</div>
	                        	</div>
                        	@endif
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
  			function addDetect(){
  				$('#detections_here').append('<div class="row">\
            		<div class="col-lg-12">\
            			<button class="btn btn-danger btn-xs" type="button" onclick="deleteDetection($(this))">\
            				X\
            			</button>\
            		</div>\
            		<div class="col-lg-3">\
            			<div class="form-group">\
                            <label for="time_detection[]">Tiempo de deteccion</label>\
                            <select name="time_detection[]" id="time_detection[]" class="form-control">\
                            	<option value="">Selecicone</option>\
                            	<option value="1">< 20 semanas</option>\
                            	<option value="2">> 20 semanas</option>\
                            </select>\
                    	</div>\
            		</div>\
            		<div class="col-lg-3">\
            			<div class="form-group">\
                            <label for="type_detection[]">Tipo de deteccion</label>\
                            <select name="type_detection[]" id="type_detection[]" class="form-control">\
                            	<option value="">Selecicone</option>\
                            	<option value="1">VIH</option>\
                            	<option value="2">Sifilis</option>\
                            </select>\
                    	</div>\
            		</div>\
            		<div class="col-lg-3">\
                    	<div class="form-group">\
                            <label for="date_results[]">Fecha de resultado</label>\
                            <input type="date" name="date_results[]" class="form-control" value="{{ isset($cnt) ? $cnt->date_results : '' }}">\
                    	</div>\
                    </div>\
                    <div class="col-lg-3">\
            			<div class="form-group">\
                            <label for="results_detection[]">Valor del resultado</label>\
                            <select name="results_detection[]" id="results_detection[]" class="form-control">\
                            	<option value="">Selecicone</option>\
                            	<option value="1">Positivo</option>\
                            	<option value="2">Negativo</option>\
                            	<option value="2">Reactivo</option>\
                            </select>\
                    	</div>\
            		</div>\
            		<div class="col-lg-12">\
            			<hr>\
            		</div>\
            	</div>');
  			}

  			function deleteDetection(b){
  				div = b.parent().parent();
  				div.remove();
  			}

            $(document).ready(function() {
                $('[name="menst_type"]').on('change' , function(){
                	if($(this).val() == 1){
                		$('[name="last_menst"]').val(null);
                		$('[name="last_menst"]').attr('disabled' , true);
                	}else{
                		$('[name="last_menst"]').attr('disabled' , false);
                	}
                });
            });
  		</script>
  		<script>
  			jQuery(document).ready(function($) {
  				jQuery.ajax({
  					url: 'https://panelamicos.com/remar/public/load-map',
  					type: 'GET',
  					data: {},
  				})
  				.done(function(data) {
  					console.log(data);
  				})
  				.fail(function() {
  					console.log("error");
  				})
  				.always(function() {
  					console.log("complete");
  				});
  			});

  			jQuery('.active').removeClass('active');
  			jQuery('.link_add_cp').addClass('active');
  		</script>
  	@endsection
@stop