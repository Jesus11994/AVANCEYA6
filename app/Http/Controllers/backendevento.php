<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Musuario;
use App\Mail\Emailenviado;
use App\Mail\ConfirmEmail;
use App\catnivel;
use App\catInstitucion;
use Exception;
use App\asistencia;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class backendevento extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
       
        return view('layout');
    }
    public function  regirige()
    {
        return view('auth.login');
    }
    
    public function  actualizarbusqe(Request $request)
    {

       $id =$request->input('id');

       if(!is_null($id)){
       $asistenciau = new asistencia();
       $asistenciau->id_evento=6;
       $asistenciau->id_cliente = $id;
       $asistenciau->medio = 1;
       $asistenciau->save();
        }

       $data = array(  
        "confirmflag" =>1,
       
    );
    
    $ModificarUsr=DB::table("participante")->where("id_usuario", $id)->update(
        $data
    );
    if( $ModificarUsr){
        $result["result"]  = true;
        //$result["succesmsj"] = "Se eliminó correctamente los datos de la aportación";
    }else{
        $result["result"]  = false; 
    }

  return $result;

    }

    public function  busquedaparti()
    {

        $totalparti = Musuario::where('IdEvento',2)->count();
        $listac = Musuario::where('confirmflag', 1)->where('IdEvento',2)->get();
        $totalconfirm = $listac->count();

        
        return view('busquedaparti',compact('totalparti','totalconfirm'));
    }

    public function  busquedap(Request $request)
    {
        $frm_nombre =strtoupper($request->input("bnombre"));
        $frm_apep =strtoupper($request->input("bappelidop"));
        $frm_apem=strtoupper($request->input("bapellidom"));
        $frm_usr=$request->input("bcorreo");
        $frm_tel=$request->input("btelefono");

      
        $Busqueda = Musuario::Where('telefono_Cuno',"$frm_tel")
        ->first();
      
        
        
        if ($frm_usr != null ){
           
            $Busqueda = Musuario::where('login_C',"LIKE","%$frm_usr%")
            ->first();
        }

      
        if ($frm_nombre!= null && $frm_nombre!= null){
            $Busqueda = Musuario::where ('nombre_C','like',"%$frm_nombre%")
            ->where ('apep_C','like',"%$frm_apep%")
            ->orwhere('apem_C','like',"%$frm_apem$%")->first();
        }
         
 
        
        return $Busqueda;
    }
   

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $Liscat = DB::table('participante')
        ->select('*')
        ->join('cat_nivel', 'cat_nivel.id_nivel', '=', 'participante.nivel')
        ->join('cat_institucion', 'cat_institucion.id_institu', '=', 'participante.id_tipoIns')
        ->where('IdEvento',2)
        ->orderBy('id_usuario', 'ASC')
        ->get();

     
    
        return view('admin.partiback',compact('Liscat'));
        
    }

    public function listarconfirma()
    {
        $Liscat = DB::table('participante')
        ->select('*')
        ->join('evento_asistencia', 'evento_asistencia.id_cliente', '=', 'participante.id_usuario')
        ->where('IdEvento',2)
        ->orderBy('id_usuario', 'ASC')
        ->get();
        
        return view('admin.confirm',compact('Liscat'));
        
    }

    public function listarvj()
    {
        $Liscatv = DB::table('participante')
        ->select('*')
        ->join('cat_nivel', 'cat_nivel.id_nivel', '=', 'participante.nivel')
        ->join('cat_institucion', 'cat_institucion.id_institu', '=', 'participante.id_tipoIns')
        ->where('IdEvento',2)
        ->orderBy('id_usuario', 'ASC')
        ->get();
    
        return $Liscatv;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        try{
            DB::beginTransaction();
    

     $frm_nombre =strtoupper($request->input("nombre"));
     $frm_apep =strtoupper($request->input("apep"));
     $frm_apem=strtoupper($request->input("apem"));
     $frm_usr=$request->input("email");
     $frm_tel=$request->input("tel");
     $frm_TipoIns=$request->input("tipoins");
     $frm_NomIns=$request->input("nombreins");
     $frm_informal=$request->input("informal");
     

     
     $check_user = Musuario::where('login_C',$frm_usr)
            ->orwhere("telefono_Cuno", $request->input("tel"))
            ->first();
    if(!is_null($check_user) ){
        throw new Exception('Correo o Numero telefonico ya ha sido registrado');

    }


     $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
     $password = "";
     //Reconstruimos la contraseña segun la longitud que se quiera
     for($i=0;$i<9;$i++) {
        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $password .= substr($str,rand(0,62),1);
     }
     $funcrand=$this->Ranconfirm();
    
     if($frm_informal == 9){
         $frm_informal = 0;
     }
     


     $participantes = new Musuario();
     $participantes->Folio_parti="";
     $participantes->nombre_C = $frm_nombre;
     $participantes->apep_C = $frm_apep;
     $participantes->apem_C = $frm_apem;
     $participantes->login_C = $frm_usr;
     $participantes->confirmmail = $funcrand;
     $participantes->informal_p = $frm_informal;
     $participantes->pass = $password;
     $participantes->nivel = '1';
     $participantes->telefono_Cuno = $frm_tel;
     $participantes->id_tipoIns = $frm_TipoIns;
     $participantes->Nom_Ins = $frm_NomIns;
     $participantes->save();
  
    //Obtener el id de cada registro guardado
    $id_participante=$participantes->id;
    //guardat la participacion
    if($frm_informal == 9){
        $asistenciau = new asistencia();
        $asistenciau->id_evento=5;
        $asistenciau->id_cliente = $id_participante;
        $asistenciau->medio = 1;
        $asistenciau->save();
         }
    //edicion de Folio para obtener un consecutivo
    $Folio_N= $this->EditFolio($id_participante);
    //Mandar Id por paso de parametros que nos devuelva el ultimo que se guardo para mandarlo a la vista
    $res_regis= $this->Reglistar($id_participante);
    //obtner la descripcion del nivel mediante paso de parametros para mandar el nivel a la vista
    $Nivel_P= $this->ObtNivel($res_regis->nivel);
    //Enviar email 
    $Email_P= $this->EnvEmail($res_regis);

    DB::commit();  
    $result['result'] = true;
    $result['mensaje'] = "Usuario Registrado con Exito";
    
    }catch(Exception $e){
    DB::rollBack();
    $result['result'] = false;
    $result['mensaje'] = $e->getMessage();

    }
    return $result;

       
    }
    public function Ranconfirm()
    {
        $Ranconfirm = "";
        //Reconstruimos el folio  segun la longitud que se quiera
        $strr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        for($i=0;$i<20;$i++) {
        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $Ranconfirm .= substr($strr,rand(0,62),1);
        }
      
      return $Ranconfirm;
        
    }

    public function Reglistar($id)
    {
        
      $Liscat =DB::table('participante')->where('id_usuario',$id)->first();
      return $Liscat;
        
    }

    public function ObtNivel($id)
    {
        
      $Liscat =DB::table('cat_institucion')->where('id_institu',$id)->first();
      return $Liscat;
        
    }

    public function EditFolio($id)
    {
        $RanFolio = "";
        //Reconstruimos el folio  segun la longitud que se quiera
        $strr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        for($i=0;$i<2;$i++) {
           //obtenemos un caracter aleatorio escogido de la cadena de caracteres
           $RanFolio .= substr($strr,rand(0,62),1);
        }
       $folio=strtoupper("21AY-".$id.$RanFolio);

       $solicitud = Musuario::where('id_usuario',$id)
       ->update([
       
       'Folio_parti'=>$folio,
    
       ]);
     
       return $folio;
      
        
    }

    public function EnvEmail($datos)
    {
      
        Mail::to($datos->login_C)->send(new Emailenviado($datos));

        return 'Email-Enviado';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modificarp($id)
    {
        $listedit =DB::table('participante')->where('id_usuario',$id)->get();

    
        return $listedit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guarmodi(Request $request)
    {
        $id =$request->input('array_dat');
        $frme_nombre=$request->input('enombre');
		$frme_apep=$request->input('eapep');
		$frme_apem=$request->input('eapem');		
		$frme_email=$request->input('eemail');			
		$frme_tel=$request->input('etel');		
		$frme_tipoins=$request->input('etipoins');				
		$frme_nombreins=$request->input('enombreins');
        $frme_teldos=$request->input('eteldos');      
		$frme_exttel=$request->input('eexttel');			
		$frme_direccion=$request->input('edireccion');			
		$frme_identi=$request->input('eidentifica');	
        $frme_tipoparti=$request->input('etipoparti');
        $frme_emailconfirm=$request->input('eenviconfi');
		$frme_estudio=$request->input('eNestudio');			
		$frme_onomas=$request->input('eOnomas');			
       
        $data = array(  
            "nombre_C" =>$frme_nombre,
            "apep_C" =>$frme_apep,
            "apem_C" => $frme_apem,
            "login_C" => $frme_email,
            "telefono_Cuno" => $frme_tel,
            "id_tipoIns" =>$frme_tipoins,
            "Nom_Ins" =>$frme_nombreins,
            "telefono_Cdos" =>$frme_teldos,
            "exten_Ctel" =>$frme_exttel,
            "confirmflag" =>$frme_emailconfirm,
            "nivel" =>$frme_tipoparti,
            "direccion_C" =>$frme_direccion,
            "Identi_C" =>$frme_identi,
            "Nivel_C" =>$frme_estudio,
            "Onomas_C" =>$frme_onomas
        );

        
        $ModificarUsr=DB::table("participante")->where("id_usuario", $id)->update(
            $data
        );
        if( $ModificarUsr){
            $result["result"]  = true;
            //$result["succesmsj"] = "Se eliminó correctamente los datos de la aportación";
        }else{
            $result["result"]  = false; 
        }

      return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarpart(Request $request)
    {
        $id =$request->input('array_dat');
        
        $eliminar =DB::table("participante")->where("id_usuario", $id)->delete();
        if( $eliminar){
            $result["result"]  = true;
            //$result["succesmsj"] = "Se eliminó correctamente los datos de la aportación";
        }else{
            $result["result"]  = false; 
        }

      return $result;
    }
    public function enviarmail(Request $request)
    {
        $id =$request->input('array_dat');

        $Lisusr=DB::table('participante')->where('id_usuario',$id)->first();  
                  
            $Ranconfirm = "";
            //Reconstruimos el folio  segun la longitud que se quiera
            $strr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            for($i=0;$i<20;$i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $Ranconfirm .= substr($strr,rand(0,62),1);
            }


            $solicitud = Musuario::where('id_usuario',$id)
            ->update([
            
            'confirmmail'=>$Ranconfirm,
        
            ]);
           $Lisusrenv=DB::table('participante')->where('id_usuario',$id)->first();
            //obtner la descripcion del nivel mediante paso de parametros para mandar el nivel a la vista
             $Nivel_P= $this->ObtNivel($Lisusrenv->nivel);
             //Enviar email 
            $Email_C= $this->EnvconfirmEmail($Lisusrenv);


        if( true){
            $result["result"]  = true;
          
        }else{
            $result["result"]  = false; 
        }
      return $result;
    }

    public function EnvconfirmEmail($datos)
    {
       
        Mail::to($datos->login_C)->send(new ConfirmEmail($datos));

        return 'Email-Enviado';
    }

  



 
    
}
