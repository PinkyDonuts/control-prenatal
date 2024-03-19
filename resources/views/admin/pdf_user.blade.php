<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 3cm 1cm 2cm;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }
 
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            background-color: #fff;
            color: white;
            text-align: left;
            line-height: 30px;
            padding-top: 10px;
            padding-left: 20px;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }
 
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #ff5594;
            color: #333;
            text-align: center;
            line-height: 35px;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }
        #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers2 {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 50%;
          float: left;
        }
        #customers3 {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 49%;
          float: right;
        }
        #customers4 {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          /*border-collapse: collapse;*/
          width: 49%;
          float: right;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
        }

        #customers2 td, #customers2 th {
          border: 1px solid #ddd;
        }
        #customers3 td, #customers3 th {
          /*border: 1px solid #ddd;*/
        }
        #customers4 td {
          border-top: 1px solid #ddd;
          border-right: 1px solid #ddd;
          border-bottom: 1px solid #ddd;
        }

        #customers tr:nth-child(even){background-color: #f1f1f1;}
        #customers2 tr:nth-child(even){background-color: #f1f1f1;}
        #customers3 tr:nth-child(even){background-color: #f1f1f1;}
        #customers4 tr:nth-child(even){background-color: #f1f1f1;}

        #customers tr:hover {background-color: #ddd;}
        #customers2 tr:hover {background-color: #ddd;}
        #customers3 tr:hover {background-color: #ddd;}
        #customers4 tr:hover {background-color: #ddd;}

        #customers th {
          padding: 5px;
          text-align: left;
          background-color: #48718d;
          color: white;
          font-size: .8em;
        }
        #customers td {
          padding: 5px;
          text-align: left;
          font-size: .8em;
        }
        #customers2 th {
          padding: 5px;
          text-align: left;
          background-color: #48718d;
          color: white;
          font-size: .8em;
        }
        #customers2 td {
          padding: 5px;
          text-align: left;
          font-size: .8em;
        }
        #customers3 th {
          padding: 5px;
          text-align: left;
          background-color: #48718d;
          color: white;
          font-size: .8em;
        }
        #customers3 td {
          padding: 5px;
          text-align: left;
          font-size: .8em;
        }
        #customers4 th {
          padding: 5px;
          text-align: left;
          background-color: #48718d;
          color: white;
          font-size: .8em;
        }
        #customers4 td {
          padding: 5px;
          text-align: left;
          font-size: .8em;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<header>
    {{-- <img src="{{ public_path().'/logo-salvavidas-net.png' }}" width="130" style="margin-left:20px">
    <img src="{{ public_path().'/anek-logo.png' }}" width="130" style="margin-left:430px"> --}}
</header>
 
<main>
	<div style="width:100%;float:left;margin-top: -50px;">
		<ul style="list-style: none;text-align: center;margin-left: -50px;">
			<li style="display: inline-block;">
				<img src="{{ public_path().'/logo4.jpeg' }}" width="70" style="background:#fff;">
			</li>
			<li style="display: inline-block;">
				<img src="{{ public_path().'/logo5.jpeg' }}" width="70" style="background:#fff;">
			</li>
		</ul>
		<h3 style="text-align: center;margin-top: 0px;margin-bottom: 10px;">
			AMBULATORIO PETRA EMILIA MORENO
		</h3>
		<table id="customers2" style="width: 100%">
			<tbody>
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="4">
						Datos de identificacion
					</th>
				</tr>
				<tr>
					<td style="">
						<b>DNI</b>
					</td>
					<td style="">
						<b>Historia CLI</b>
					</td>
					<td style="">
						<b>Nombres y apellidos</b>
					</td>
					<td>
						<b>Seguro</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->dni }}
					</td>
					<td>
						{{ $u->secure_history }}
					</td>
					<td>
						{{ $u->name }} {{ $u->last_name.' '.$u->second_last_name }}
					</td>
					<td>
						{{ $u->secure_code }}
					</td>
				</tr>
				<tr>
					<td>
						<b>Fecha de nacimiento</b>
					</td>
					<td>
						<b>Edad</b>
					</td>
					<td>
						<b>Estado conyugal</b>
					</td>
					<td>
						<b>Escolaridad</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->born_date }}
					</td>
					<td>
						{{ $u->age }} años
					</td>
					<td>
						{{ $u->civil_status == 1 ? 'Soltero' : '' }} 
						{{ $u->civil_status == 2 ? 'Casado' : '' }} 
						{{ $u->civil_status == 3 ? 'Viudo' : '' }}
					</td>
					<td>
						{{ $u->scholarship == 1 ? 'Ninguna' : '' }} 
						{{ $u->scholarship == 2 ? 'Primaria' : '' }} 
						{{ $u->scholarship == 3 ? 'Secundaria' : '' }}
						{{ $u->scholarship == 4 ? 'Tecnico' : '' }}
						{{ $u->scholarship == 5 ? 'Universitaria' : '' }}
						{{ $u->scholarship == 6 ? 'Postgrado' : '' }}
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<b>
							Direccion:
						</b>
						{{ $u->address }}
					</td>
				</tr>
				<tr>
					<td>
						<b>Telefono fijo</b>
					</td>
					<td>
						<b>Celular</b>
					</td>
					<td colspan="2">
						<b>Email</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->phone }}
					</td>
					<td>
						{{ $u->movil }}
					</td>
					<td colspan="2">
						{{ $u->email }}
					</td>
				</tr>
				<tr>
					<td>
						<b>
							Peso anterior al embarazo(Kg)
						</b>
					</td>
					<td>
						<b>
							Talla
						</b>
					</td>
					<td colspan="2">
						<b>
							IMC
						</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->weight_bp }}
					</td>
					<td>
						{{ $u->size_bp }}
					</td>
					<td colspan="2">
						{{ $u->imc }}
					</td>
				</tr>
				<tr>
					<th style="text-align: center;" colspan="4">
						inicio de control
					</th>
				</tr>
				<tr>
					<td>
						<b>
							Fecha ultima menstruacion
						</b>
					</td>
					<td>
						<b>
							Fecha probable del parto
						</b>
					</td>
					<td>
						<b>
							Fecha 1era ecografia
						</b>
					</td>
					<td>
						<b>Tiempo de embarazo</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->menst_type == 1 ? 'Se ignora' : $u->last_menst }}
					</td>
					<td>
						{{ $u->possible_birth }}
					</td>
					<td>
						{{ $u->first_eco_date }}
					</td>
					<td>
						{{ $u->months }} mes(es) y {{ $u->days }} dia(s). 
					</td>
				</tr>
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="4">
						Salud bucal durante el embarazo
					</th>
				</tr>
				<tr>
					<td style="">
						<b>Revision odontologica al ingreso</b>
					</td>
					<td style="">
						<b>Atencion a caries</b>
					</td>
					<td style="">
						<b>Atencion a periodontitis</b>
					</td>
					<td>
						<b>Atencion a otros</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->oral && $u->oral->previous_revition == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->oral && $u->oral->caries == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->oral && $u->oral->periodontitis == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->oral && $u->oral->other_oral == 1 ? $u->oral->other_description : 'No' }}
					</td>
				</tr>
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="4">
						Detecciones en la embarazada
					</th>
				</tr>
				@foreach($u->detections as $det)
					<tr>
						<td>
							<b>
								Tiempo de deteccion
							</b>
						</td>
						<td>
							<b>
								Tipo de deteccion
							</b>
						</td>
						<td>
							<b>
								Fecha de resultado
							</b>
						</td>
						<td>
							<b>
								Valor del resultado
							</b>
						</td>
					</tr>
					<tr>
						<td>
							{{ $det->time_detection == 1 ? '< 20 semanas' : '> 20 semanas' }}
						</td>
						<td>
							{{ $det->type_detection == 1 ? 'VIH' : 'Sifilis' }}
						</td>
						<td>
							{{ $det->date_results }}
						</td>
						<td>
							{{ $det->results_detection == 1 ? 'Positivo' : ($det->results_detection == 2 ? 'Negativo' : 'Reactivo') }}
						</td>
					</tr>
				@endforeach
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="6">
						Toxicomanias activas
					</th>
				</tr>
				<tr>
					<td style="">
						<b>Tabaco</b>
					</td>
					<td style="">
						<b>Alcohol</b>
					</td>
					<td style="">
						<b>Drogas</b>
					</td>
					<td colspan="3">
						<b>Otros</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->toxic && $u->toxic->tobacco == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->toxic && $u->toxic->alcohol == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->toxic && $u->toxic->drugs == 1 ? 'Si' : 'No' }}
					</td>
					<td colspan="3">
						{{ $u->toxic && $u->toxic->other_toxic == 1 ? $u->toxic->other_description : 'No' }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="page-break"></div>
	<div style="width:100%;float:left;margin-top: -50px;">
		<table id="customers2" style="width: 100%">
			<tbody>
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="6">
						Antecedentes familiares
					</th>
				</tr>
				<tr>
					<td style="">
						<b>Ninguno</b>
					</td>
					<td style="">
						<b>Tuberculosis</b>
					</td>
					<td style="">
						<b>Diabetes</b>
					</td>
					<td>
						<b>Hipertension</b>
					</td>
					<td>
						<b>Enf. hipertensiva del embarazo</b>
					</td>
					<td>
						<b>
							Otro
						</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->familyb && $u->familyb->no_background == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->familyb && $u->familyb->tuberculosis == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->familyb && $u->familyb->diabetes == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->familyb && $u->familyb->hipertension == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->familyb && $u->familyb->hipertension_byp == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->familyb && $u->familyb->other_background == 1 ? 'Si' : 'No' }}
					</td>
				</tr>
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="6">
						Antecedentes personales patologicos
					</th>
				</tr>
				<tr>
					<td style="">
						<b>Ninguno</b>
					</td>
					<td style="">
						<b>Tuberculosis</b>
					</td>
					<td style="">
						<b>Diabetes preexistente</b>
					</td>
					<td>
						<b>Hipertension</b>
					</td>
					<td>
						<b>Preeclampsia</b>
					</td>
					<td>
						<b>
							Eclampsia
						</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->patological && $u->patological->no_background == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->tuberculosis == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->diabetes == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->hipertension == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->preeclampsia == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->eclampsia == 1 ? 'Si' : 'No' }}
					</td>
				</tr>
				<tr>
					<td style="">
						<b>Cardiopatia</b>
					</td>
					<td style="">
						<b>Nefropatia</b>
					</td>
					<td style="">
						<b>Antecedente gemelar</b>
					</td>
					<td>
						<b>Padecimiento oncologico</b>
					</td>
					<td>
						<b>VIH positivo</b>
					</td>
					<td>
						<b>
							Otro
						</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->patological && $u->patological->cardiopatia == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->nefropatia == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->gemelar == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->oncologico == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->vih == 1 ? 'Si' : 'No' }}
					</td>
					<td>
						{{ $u->patological && $u->patological->other_background == 1 ? 'Si' : 'No' }}
					</td>
				</tr>
				
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="6">
						Biologicos aplicados
					</th>
				</tr>
				<tr>
					<td colspan="2">
						<b>1era fecha de apliacacion de tetanos</b>
					</td>
					<td colspan="2">
						<b>2da fecha de apliacacion de tetanos</b>
					</td>
					<td colspan="2">
						<b>Refuerzo antiinfluenza</b>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						{{ $u->biological && $u->biological->first_date ? $u->biological->first_date : 'Sin registro'  }}
					</td>
					<td colspan="2">
						{{ $u->biological && $u->biological->second_date ? $u->biological->second_date : 'Sin registro'  }}
					</td>
					<td colspan="2">
						{{ $u->biological && $u->biological->reforzed_date ? $u->biological->reforzed_date : 'Sin registro'  }}
					</td>
				</tr>
				<tr style="background:#ff5594">
					<th style="text-align: center;" colspan="6">
						Antecedentes ginecoobstetricos
					</th>
				</tr>
				<tr>
					<td>
						<b>
							Gestas
						</b>
					</td>
					<td>
						<b>
							Para
						</b>
					</td>
					<td>
						<b>
							Cesareas
						</b>
					</td>
					<td>
						<b>
							Abortos
						</b>
					</td>
					<td>
						<b>
							Hijos nacidos vivos
						</b>
					</td>
					<td>
						<b>
							Hijos nacidos muertos
						</b>
					</td>
				</tr>
				<tr>
					<td>
						{{ $u->gyb ? $u->gyb->gestas : 'Sin registro' }}
					</td>
					<td>
						{{ $u->gyb ? $u->gyb->para : 'Sin registro' }}
					</td>
					<td>
						{{ $u->gyb ? $u->gyb->cesareas : 'Sin registro' }}
					</td>
					<td>
						{{ $u->gyb ? $u->gyb->aborts : 'Sin registro' }}
					</td>
					<td>
						{{ $u->gyb ? $u->gyb->living_children : 'Sin registro' }}
					</td>
					<td>
						{{ $u->gyb ? $u->gyb->dead_children : 'Sin registro' }}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<b>
							Tipo de metodo anticonceptivo
						</b>
					</td>
					<td>
						<b>
							Tiempo de uso
						</b>
					</td>
					<td>
						<b>
							Fracaso en uso
						</b>
					</td>
					<td colspan="2">
						<b>
							Grupo sanguineo
						</b>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						{{ $u->gyb ? $u->gyb->contraceptive_method : 'Sin registro' }}
					</td>
					<td>
						{{ $u->gyb ? $u->gyb->contraceptive_method_time : 'Sin registro' }}
					</td>
					<td>
						{{ $u->gyb && $u->gyb->failure_contraceptive_method == 1 ? 'Si' : 'No' }}
					</td>
					<td colspan="2">
						{{ $u->gyb ? $u->gyb->blood_rh : '' }} {{ $u->gyb && $u->gyb->blood_type == 1 ? 'Positivo' : 'Negativo' }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</main>
 
{{-- <footer>
    <h1>limpiezasexpress.com</h1>
</footer> --}}
</body>
</html>