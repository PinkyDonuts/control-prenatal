<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\FamilyBackground;
use App\PathologicalPErsonalBackground;
use App\ToxicActive;
use App\AppliedBiological;
use App\ObgynHistory;
use App\OralHealt;
use App\Detections;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function login(Request $r){
        $r->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ] , [
            'email.required'    => 'Ingresa un email',
            'email.email'       => 'Ingresa un email valido',
            'password.required' => 'Ingresa la contraseña'
        ]);

        $credentials = [
            'email'    => $r->email,
            'password' => $r->password,
            'status'   => 1,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/home');
        }else{
            return back()->with('error' , 'Datos incorrectos')->withInput();
        }
    }

    public function logout(){
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/');
    }

    public function home(){
        return view('admin.home');
    }

    public function controlAdd(){
        return view('admin.control_add');
    }

    public function postControlAdd(Request $r){
        $r->validate([
            'name'           => 'required|alpha',
            'last_name'      => 'required|alpha',
            'dni'            => 'required|numeric',
            'secure_history' => 'required',
            'born_date'      => 'required',
            'age'            => 'required|numeric',
            'civil_status'   => 'required',
            'scholarship'    => 'required',
            'address'        => 'required',
            'movil'          => 'required|numeric',
            'email'          => 'required|email',
            'weight_bp'      => 'required',
            'size_bp'        => 'required',
            'imc'            => 'required',
        ] , [
            'name.required'           => 'Ingresa el nombre',
            'name.alpha'              => 'El nombre debe contener solo letras',
            'last_name.required'      => 'Ingresa el primer apellido',
            'last_name.alpha'         => 'El primer apellido debe contener solo letras',
            'dni.required'            => 'Ingresa el DNI',
            'dni.numeric'             => 'El DNI debe contener solo numeros',
            'secure_history.required' => 'Ingresa el codigo de historial clinico',
            'born_date.required'      => 'Ingresa la fecha de nacimiento',
            'age.required'            => 'Ingresa la edad',
            'age.numeric'             => 'La edad debe contener solo numeros',
            'civil_status.required'   => 'Selecciona el estado civil',
            'scholarship.required'    => 'Selecciona el nivel de escolaridad',
            'address.required'        => 'Ingresa la direccion',
            'movil.required'          => 'Ingresa un numero de telefono',
            'movil.numeric'           => 'El numero de telefono debe contener solo numeros',
            'email.required'          => 'Ingresa un email',
            'email.email'             => 'Ingresa un email valido',
            'weight_bp.required'      => 'Ingresa el precio antes del embarazo',
            'size_bp.required'        => 'Ingresa la talla',
            'imc.required'            => 'Ingresa el IMC',
        ]);

        $old = User::where('email' , $r->email)->first();
        $u = new User;
        if ($r->user_id) {
            $u = User::find($r->user_id);
            $old = User::where('email' , $r->email)->where('id' , '!=' , $u->id)->first();
        }

        if ($old) {
            return back()->with('error' , 'Este email ya esta asociado a un registro pre-natal');
        }

        $u->name             = $r->name;
        $u->last_name        = $r->last_name;
        $u->second_last_name = $r->second_last_name;
        $u->dni              = $r->dni;
        $u->secure_history   = $r->secure_history;
        $u->born_date        = $r->born_date;
        $u->age              = $r->age;
        $u->civil_status     = $r->civil_status;
        $u->secure_code      = $r->secure_code;
        $u->scholarship      = $r->scholarship;
        $u->address          = $r->address;
        $u->phone            = $r->phone;
        $u->movil            = $r->movil;
        $u->email            = $r->email;
        $u->weight_bp        = $r->weight_bp;
        $u->size_bp          = $r->size_bp;
        $u->imc              = $r->imc;
        $u->menst_type       = $r->menst_type;
        $u->last_menst       = $r->last_menst;
        $u->possible_birth   = $r->possible_birth;
        $u->first_eco_date   = $r->first_eco_date;
        $u->months           = $r->months;
        $u->days             = $r->days;
        $u->role             = 2;
        $u->status           = 1;
        $u->save();

        $fb = new FamilyBackground;
        if($r->user_id){
            $fb = FamilyBackground::where('user_id' , $r->user_id)->first();
        }

        $fb->user_id          = $u->id;
        $fb->no_background    = $r->no_background ? 1 : 0;
        $fb->tuberculosis     = $r->tuberculosis ? 1 : 0;
        $fb->diabetes         = $r->diabetes ? 1 : 0;
        $fb->hipertension     = $r->hipertension ? 1 : 0;
        $fb->hipertension_byp = $r->hipertension_byp ? 1 : 0;
        $fb->other_background = $r->other_background ? 1 : 0;
        $fb->save();

        $ap = new PathologicalPErsonalBackground;
        if($r->user_id){
            $ap = PathologicalPErsonalBackground::where('user_id' , $r->user_id)->first();
        }

        $ap->user_id          = $u->id;
        $ap->no_background    = $r->no_background_patological ? 1 : 0;
        $ap->tuberculosis     = $r->tuberculosis_patological ? 1 : 0;
        $ap->diabetes         = $r->diabetes_patological ? 1 : 0;
        $ap->hipertension     = $r->hipertension_patological ? 1 : 0;
        $ap->preeclampsia     = $r->preeclampsia ? 1 : 0;
        $ap->eclampsia        = $r->eclampsia ? 1 : 0;
        $ap->cardiopatia      = $r->cardiopatia ? 1 : 0;
        $ap->nefropatia       = $r->nefropatia ? 1 : 0;
        $ap->gemelar          = $r->gemelar ? 1 : 0;
        $ap->oncologico       = $r->oncologico ? 1 : 0;
        $ap->vih              = $r->vih ? 1 : 0;
        $ap->other_background = $r->other_background_patological ? 1 : 0;
        $ap->save();

        $ta = new ToxicActive;
        if($r->user_id){
            $ta = ToxicActive::where('user_id' , $r->user_id)->first();
        }

        $ta->user_id           = $u->id;
        $ta->tobacco           = $r->tobacco ? 1 : 0;
        $ta->alcohol           = $r->alcohol ? 1 : 0;
        $ta->drugs             = $r->drugs ? 1 : 0;
        $ta->other_toxic       = $r->other_toxic ? 1 : 0;
        $ta->other_description = $r->other_description_toxic;
        $ta->save();

        $ab = new AppliedBiological;
        if($r->user_id){
            $ab = AppliedBiological::where('user_id' , $r->user_id)->first();
        }

        $ab->user_id = $u->id;
        $ab->first_date = $r->first_date;
        $ab->second_date = $r->second_date;
        $ab->reforzed_date = $r->reforzed_date;
        $ab->save();

        $ob = new ObgynHistory;
        if($r->user_id){
            $ob = ObgynHistory::where('user_id' , $r->user_id)->first();
        }

        $ob->user_id                      = $u->id;
        $ob->gestas                       = $r->gestas;
        $ob->para                         = $r->para;
        $ob->cesareas                     = $r->cesareas;
        $ob->aborts                       = $r->aborts;
        $ob->living_children              = $r->living_children;
        $ob->dead_children                = $r->dead_children;
        $ob->contraceptive_method         = $r->contraceptive_method;
        $ob->contraceptive_method_time    = $r->contraceptive_method_time;
        $ob->failure_contraceptive_method = $r->failure_contraceptive_method;
        $ob->blood_rh                     = $r->blood_rh;
        $ob->blood_type                   = $r->blood_type;
        $ob->save();

        $oh = new OralHealt;
        if($r->user_id){
            $oh = OralHealt::where('user_id' , $r->user_id)->first();
        }

        $oh->user_id                = $u->id;
        $oh->previous_revition      = $r->previous_revition;
        $oh->caries                 = $r->caries ? 1 : 0;
        $oh->periodontitis          = $r->periodontitis ? 1 : 0;
        $oh->other_oral             = $r->other_oral ? 1 : 0;
        $oh->other_description      = $r->other_description_oral;
        $oh->save();

        foreach ($u->detections as $key => $value) {
            $value->delete();
        }

        foreach ($r->time_detection as $key => $value) {
            $ud = new Detections;
            $ud->user_id           = $u->id;
            $ud->time_detection    = $value;
            $ud->type_detection    =  isset($r->type_detection[$key]) ? $r->type_detection[$key] : 0;
            $ud->date_results      =  isset($r->date_results[$key]) ? $r->date_results[$key] : null;
            $ud->results_detection =  isset($r->results_detection[$key]) ? $r->results_detection[$key] : 0;
            $ud->save();
        }

        return redirect('/admin/control-index')->with('msj' , 'Control pre-natal registrado exitosamente');
    }

    public function controlIndex(){
        $u = User::orderBy('id' , 'desc')->where('role' , 2)->paginate(10);
        return view('admin.control_index' , compact('u'));
    }

    public function controlIndexFilter(Request $r){
        $name_filter             = '';
        $last_name_filter        = '';
        $second_last_name_filter = '';
        $dni_filter              = '';
        $age_from_filter         = null;
        $age_to_filter           = null;

        $u = User::orderBy('id' , 'desc')->where('role' , 2);
        if($r->name_filter){
            $u = $u->where('name' , 'LIKE' , '%'.$r->name_filter.'%');
            $name_filter = $r->name_filter;
        }
        if($r->last_name_filter){
            $u = $u->where('last_name' , $r->last_name_filter);
            $last_name_filter = $r->last_name_filter;
        }
        if($r->second_last_name_filter){
            $u = $u->where('second_last_name' , $r->second_last_name_filter);
            $second_last_name_filter = $r->second_last_name_filter;
        }
        if($r->dni_filter){
            $u = $u->where('dni' , $r->dni_filter);
            $dni_filter = $r->dni_filter;
        }
        if($r->age_from_filter){
            $age_from_filter = $r->age_from_filter;
            if($r->age_to_filter){
                if ($r->age_from_filter < $r->age_to_filter) {
                    return back()->with('error' , 'La edad limite no puede ser menos a la edad minima de la busqueda');
                }else{
                    $u = $u->where('age' , '>=' , $r->age_from_filter)->where('age' , '<=' , $r->age_to_filter);
                }
            }else{
                $u = $u->where('age' , '>=' , $r->age_from_filter);
            }
        }else{
            if($r->age_to_filter){
                $age_to_filter = $r->age_to_filter;
                $u = $u->where('age' , '<=' , $r->age_to_filter);
            }
        }

        $u = $u->paginate(10);
        return view('admin.control_index' , compact('u' , 'name_filter' , 'last_name_filter' , 'second_last_name_filter' , 'dni_filter' , 'age_from_filter' , 'age_to_filter'));
    }

    public function controlEdit($id){
        $cnt = User::find($id);
        return view('admin.control_add' , compact('cnt'));
    }

    public function controlDelete($id){
        $u = User::find($id);

        foreach($u->detections as $det){
            $det->delete();
        }
        $u->familyb->delete();
        $u->patological->delete();
        $u->toxic->delete();
        $u->biological->delete();
        $u->gyb->delete();
        $u->oral->delete();
        $u->delete();
        return redirect('/admin/control-index')->with('msj' , 'Registro eliminado exitosamente');
    }

    public function controlView($id){
        $u = User::find($id);
        $data = [
            'u' => $u
        ];

        $pdf = \PDF::loadView('admin.pdf_user', $data);
        return $pdf->stream('archivo.pdf');
    }

    public function exportStatsPdf(){
        $yValues = [
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '01')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '02')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '03')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '04')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '05')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '06')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '07')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '08')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '09')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '10')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '11')->count(),
            User::whereYear('created_at', date('Y'))->whereMonth('created_at', '12')->count(),
        ];

        $chartConfig = '{
          type: "bar",
          data: {
            labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            datasets: [{
              backgroundColor: ["#a0ced9 ", "#ffc09f","#a0ced9","#fcf5c7","#d6eadf","#809bce", "#b8e0d2","#f0efeb","#fce1e4","#daeaf6","#7ec4cf","#d1cfe2 "],
              data:'.json_encode($yValues).'
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: "Estadisticas de registros año '.date('Y').'"
            }
          }
        }';
        $chartUrl = 'https://quickchart.io/chart?w=800&h=400&c=' . urlencode($chartConfig);
        // $chartUrl = 'https://quickchart.io/chart?w=800&h=400&c=' . urlencode($chartConfig).'&format=pdf';

        $contents = file_get_contents($chartUrl);
        $filename = md5(uniqid()).'.png';
        \Storage::disk('local')->put($filename, $contents);

        $data = [
            'url' => $filename
        ];

        $pdf = \PDF::loadView('admin.pdf_stats', $data);
        $pdf->setOptions(['isRemoteEnabled' => true]);
        return $pdf->stream('estadisticas_control_prenatal.pdf');
    }

    public function exportUsersExcel(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }



    public function backUpDB(){
        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $backup_name        = "respaldo_db_".date('Y-m-d').".sql";
        $tables             = array("users","applied_biologicals","detections","family_backgrounds","obgyn_histories","oral_healts","pathological_p_ersonal_backgrounds","toxic_actives"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach($tables as $table)
        {
         $show_table_query = "SHOW CREATE TABLE " . $table . "";
         $statement = $connect->prepare($show_table_query);
         $statement->execute();
         $show_table_result = $statement->fetchAll();

         foreach($show_table_result as $show_table_row)
         {
          $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
         }
         $select_query = "SELECT * FROM " . $table . "";
         $statement = $connect->prepare($select_query);
         $statement->execute();
         $total_row = $statement->rowCount();

         for($count=0; $count<$total_row; $count++)
         {
          $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
          $table_column_array = array_keys($single_result);
          $table_value_array = array_values($single_result);
          $output .= "\nINSERT INTO $table (";
          $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
          $output .= "'" . implode("','", $table_value_array) . "');\n";
         }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
           header('Pragma: public');
           header('Content-Length: ' . filesize($file_name));
           ob_clean();
           flush();
           readfile($file_name);
           unlink($file_name);
}

    public function backUp(){
        $data = [];

        // $u = User::where('role' , 2)->get();
        // foreach ($u as $key => $value) {
        //     $civil_status = 'Soltero';
        //     if($value->civil_status == 2){
        //         $civil_status = 'Casado';
        //     }elseif($value->civil_status == 3){
        //         $civil_status = 'Viudo';
        //     }

        //     $student = 'Ninguna';
        //     if($value->scholarship == 2){
        //         $student = 'Primaria';
        //     }elseif($value->scholarship == 3){
        //         $student = 'Secundaria';
        //     }elseif($value->scholarship == 4){
        //         $student = 'Tecnico';
        //     }elseif($value->scholarship == 5){
        //         $student = 'Universitaria';
        //     }elseif($value->scholarship == 6){
        //         $student = 'Postgrado';
        //     }
        //     $user_data = [
        //         $value->name,
        //         $value->last_name,
        //         $value->second_last_name,
        //         $value->dni,
        //         $value->secure_history,
        //         $value->secure_code,
        //         $value->born_date,
        //         $value->age,
        //         $civil_status,
        //         $student,
        //         $value->address,
        //         $value->phone,
        //         $value->movil,
        //         $value->email,
        //         $value->weight_bp,
        //         $value->size_bp,
        //         $value->imc,
        //         $value->menst_type == 1 ? 'Se ignora' : $value->last_menst,
        //         $value->possible_birth,
        //         $value->first_eco_date,
        //         $value->months,
        //         $value->days
        //     ];

        //     array_push($data, $user_data);
        // }

        $filename = 'back_up_db_'.date('Y_m_d-h_i_s').'.sql';

        // open csv file for writing
        // $f = fopen($filename, 'w');

        // if ($f === false) {
        //     die('Error opening the file ' . $filename);
        // }

        // write each row at a time to a file
        // foreach ($data as $row) {
        //     fputcsv($f, $row);
        // }

        // close the file
        // fclose($f);
        return response()->download('prenatal.sql' , $filename);
    }

    public function editPerfil(){
        return view('admin.edit_perfil');
    }

    public function postEditPerfil(Request $r){
        $u = Auth::user();
        $u->name = $r->name;
        $u->email = $r->email;
        if($r->password){
            $u->password = bcrypt($r->password);
        }
        $u->save();

        return back()->with('msj' , 'Datos actualizados exitosamente');
    }

    public function migrar(){
        // Schema::create('users', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->string('email' , 191)->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password')->nullable();
        //     $table->integer('role')->nullable();
        //     $table->integer('status')->nullable();
        //     $table->date('born_date')->nullable();
        //     $table->string('phone')->nullable();
        //     $table->integer('pregnancy_date')->nullable();
        //     $table->integer('province')->nullable();
        //     $table->integer('municipality')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('dni')->nullable();
        //     $table->string('historial_code')->nullable();
        //     $table->string('last_name')->nullable();
        //     $table->string('second_last_name')->nullable();
        //     $table->integer('age')->nullable();
        //     $table->integer('civil_status')->nullable();
        //     $table->string('secure_code')->nullable();
        //     $table->integer('scholarship')->nullable();
        //     $table->text('address')->nullable();
        //     $table->string('movil')->nullable();
        //     $table->string('weight_bp')->nullable();
        //     $table->string('size_bp')->nullable();
        //     $table->string('imc')->nullable();
        // });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('secure_history')->nullable();
        // });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->integer('menst_type')->nullable();
        //     $table->date('last_menst')->nullable();
        //     $table->date('possible_birth')->nullable();
        //     $table->date('first_eco_date')->nullable();
        //     $table->integer('months')->nullable();
        //     $table->integer('days')->nullable();
        // });

        // Schema::create('family_backgrounds', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id')->nullable();
        //     $table->integer('no_background')->nullable();
        //     $table->integer('tuberculosis')->nullable();
        //     $table->integer('diabetes')->nullable();
        //     $table->integer('hipertension')->nullable();
        //     $table->integer('hipertension_byp')->nullable();
        //     $table->integer('other_background')->nullable();
        //     $table->text('other_description')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('pathological_p_ersonal_backgrounds', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id')->nullable();
        //     $table->integer('no_background')->nullable();
        //     $table->integer('tuberculosis')->nullable();
        //     $table->integer('diabetes')->nullable();
        //     $table->integer('hipertension')->nullable();
        //     $table->integer('preeclampsia')->nullable();
        //     $table->integer('eclampsia')->nullable();
        //     $table->integer('cardiopatia')->nullable();
        //     $table->integer('nefropatia')->nullable();
        //     $table->integer('gemelar')->nullable();
        //     $table->integer('oncologico')->nullable();
        //     $table->integer('vih')->nullable();
        //     $table->integer('other_background')->nullable();
        //     $table->text('other_description')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('toxic_actives', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id')->nullable();
        //     $table->integer('no_toxic')->nullable();
        //     $table->integer('tobacco')->nullable();
        //     $table->integer('alcohol')->nullable();
        //     $table->integer('drugs')->nullable();
        //     $table->integer('other_toxic')->nullable();
        //     $table->text('other_description')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('applied_biologicals', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id')->nullable();
        //     $table->date('first_date')->nullable();
        //     $table->date('second_date')->nullable();
        //     $table->date('reforzed_date')->nullable();
        //     $table->integer('antiinfluenza')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('obgyn_histories', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id')->nullable();
        //     $table->integer('gestas')->nullable();
        //     $table->integer('para')->nullable();
        //     $table->integer('cesareas')->nullable();
        //     $table->integer('aborts')->nullable();
        //     $table->integer('living_children')->nullable();
        //     $table->integer('dead_children')->nullable();
        //     $table->string('contraceptive_method')->nullable();
        //     $table->string('contraceptive_method_time')->nullable();
        //     $table->integer('failure_contraceptive_method')->nullable();
        //     $table->string('blood_rh')->nullable();
        //     $table->integer('blood_type')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('oral_healts', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id')->nullable();
        //     $table->integer('previous_revition')->nullable();
        //     $table->integer('caries')->nullable();
        //     $table->integer('periodontitis')->nullable();
        //     $table->integer('other_oral')->nullable();
        //     $table->text('other_description')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('detections', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id')->nullable();
        //     $table->integer('time_detection')->nullable();
        //     $table->integer('type_detection')->nullable();
        //     $table->integer('results_detection')->nullable();
        //     $table->date('date_results')->nullable();
        //     $table->text('observations')->nullable();
        //     $table->timestamps();
        // });

        // $u = new User;
        // $u->name = 'Admin admin';
        // $u->email = 'admin@email.com';
        // $u->password = bcrypt('1234567');
        // $u->role = 1;
        // $u->status = 1;
        // $u->save();
    }
}
