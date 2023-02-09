<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Musuario;
use App\Mail\Emailenviado;
use App\catnivel;
use App\catInstitucion;
use App\folio_fisi_sistem;
use Exception;


use Illuminate\Support\Facades\DB;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;


class registrocontroller extends Controller

{
    public function mostrarcons()
    {
        return view('validaconstan');
    }

    public function validacons($codigo,$ideve)
    {
        
        $Busqueda = Musuario::Where('pass',"$codigo")
        ->Where('IdEvento',$ideve)
        ->first();

        
        
        if(is_null($Busqueda) ){
           
           return "Esta constancia no es valida porfavor comuniquese con el equipo de AVANCEYA";
        }
        
        $banderas= $Busqueda->IdEvento;

            switch ($banderas) {
                case (1):
                    return view('validaqr',compact('Busqueda'));
                case (2):
                return view('validaqr2023',compact('Busqueda'));
            }
        

    }

    

    public function constancipdf(Request $request)
    {

        
        $request->validate([
            
            'txtfolio'=> 'required|max:11',
            'txtTelefono'=> 'required|max:10',
         ]);
        
         $frm_usr=$request->input("txtfolio");
         $frm_tel=$request->input("txtTelefono");

         $Busqueda = Musuario::Where('telefono_Cuno',"$frm_tel")
         ->where('Folio_parti',$frm_usr)
         ->first();

       

         if(is_null($Busqueda) ){
             $mensaje="Favor de verificar su Folio de participación y el número telefónico con el que se registro en dado caso que usted haya participado y no pueda imprimir su constancia comuniquese a este correo : congresonacional@avanceya.com";
            return view('validaconstan',compact('mensaje'));
         }
         
         
         $evento = $Busqueda->IdEvento;
        $clave = $Busqueda->pass;
        $nombre= mb_strtoupper($Busqueda->nombre_C, 'UTF-8');
        
        $Apellidop= mb_strtoupper($Busqueda->apep_C, 'UTF-8');
        $ApellidoM= mb_strtoupper($Busqueda->apem_C, 'UTF-8');
        $Nomb = $nombre." ".$Apellidop." ".$ApellidoM;
      
      
        $contadornom =strlen($Nomb); 
        if($contadornom >= 23){
            /*
            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
            $Nomcoms = str_replace($no_permitidas, $permitidas ,$Nomb);
          
            */
            $Nombcompleto = $Nomb;
        }else{
            /*
            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
            $Nomcoms = str_replace($no_permitidas, $permitidas ,$Nomb);
            */
            $Nombcompleto = $Nomb;

        }
      
       
        $url="http://sistema.avanceya.com/Evento/public/ValidarConstanciaQr/".$clave."/".$evento;
        
        
        //$pdf = PDF::loadView('admin.constparti',compact('codiqr'));

           // $header = view("constancia.header");
           
           if($evento == 1){
            $codiqr= QrCode::size(150)->generate($url);
            $body = view("constancia.body",compact('codiqr','Nombcompleto'));
            
           }else{
            $codiqr= QrCode::size(150)->generate($url);
            $body = view("constancia.bodydos",compact('codiqr','Nombcompleto'));
            
           }

            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
               
                'margin_top' => 0,
                'margin_left' => 0,
                'margin_right'=>0,
                'margin_bottom'=>0,
                'format' => [201,260],
                'orientation' => 'L'

            ]);
           // $img_base64_encoded = 'data:image/png;base64,' . base64_encode($codiqr);
           // $img = '<img src="@' . preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded) . '">';
            
          
           $stylesheet = file_get_contents(public_path() .'/css/ensimado.css');
           $mpdf->WriteHTML($stylesheet, 1);

            $mpdf->SetTitle("".$Nombcompleto."".date("Y-m-d").date("H:i:s"));
           // $mpdf->SetHTMLHeader($header);
            $mpdf->WriteHTML($body);
            //$mpdf->writeHTML($img, true, false, true, false, '');
            $mpdf->Output();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catinsti = catInstitucion::All();
        return view('index',compact('catinsti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        
      /*                                    
    //Lista participantes y envia a la vista
      $Liscat = Musuario::all();
    //Obtener el Nivel
    dd($Liscat);
    die();

    $Nivel_P= $this->ObtNivel($Liscat->nivel);
    dd($Nivel_P);
    die();
*/
    $Liscat = DB::table('participante')
    ->select('*')
    ->join('cat_nivel', 'cat_nivel.id_nivel', '=', 'participante.nivel')
    ->join('cat_institucion', 'cat_institucion.id_institu', '=', 'participante.id_tipoIns')
    ->get();

   
        return view('listaP',compact('Liscat'));
        
    }
    public function recupera()
    {
        
        return view('recuperaru');
        
    }
    public function rec(Request $request)
    {
       
        
        $request->validate([
            
            'txtemail'=> 'required|email',
            'txtTelefono'=> 'required|max:10',
         ]);

         $frm_usr=$request->input("txtemail");
         $frm_tel=$request->input("txtTelefono");

         $check_user = Musuario::where('login_C',$frm_usr)
            ->where("telefono_Cuno", $request->input("txtTelefono"))
            ->first();
        
        
        if(!is_null($check_user) ){
            $id_participante=$check_user->id_usuario;
            $res_regis= $this->Reglistar($id_participante);
            //Editar Codigo email
            $funcrand=$this->Ranconfirm();
            $solicitud = Musuario::where('id_usuario',$check_user->id_usuario)
                    ->update([
                    
                    'confirmmail'=>$funcrand,
                    
                    ]);
            //Enviar email
            $Lisrec=DB::table('participante')->where('id_usuario',$check_user->id_usuario)->first();
            
            $Email_P= $this->EnvEmail($Lisrec);
            $mensaje = "Correo o Numero telefonico ya ha sido registrado se enviara un correo con sus datos";
            return view('recuperaru',compact('mensaje'));

        }else{
            $mensaje = "Usuario no encontrado correo o número telefonico no son identicos a los datos de registro";
            return view('recuperaru',compact('mensaje'));
        }

       
        
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtnombre'=> 'required',
            'txtApeP'=> 'required',
            'txtApemat'=> 'required',
            'txtemail'=> 'required|email',
            'txtTelefono'=> 'required|max:10',
            'txtNomins'=> 'required'
         ]);
        try{
            DB::beginTransaction();

    
     $frm_folio =$request->input("txtfolio");
     $frm_nombre =mb_strtoupper($request->input("txtnombre"),'UTF-8');
     $frm_apep =mb_strtoupper($request->input("txtApeP"),'UTF-8');
     $frm_apem=mb_strtoupper($request->input("txtApemat"),'UTF-8');
     $frm_usr=$request->input("txtemail");
     $frm_tel=$request->input("txtTelefono");
     $frm_TipoIns=$request->input("txttipoIns");
     $frm_NomIns=$request->input("txtNomins");
     $frm_IdEven=2;
     
     


     $check_user = Musuario::where('login_C',$frm_usr)
            ->where("telefono_Cuno", $request->input("txtTelefono"))
            ->where("IdEvento", 2)
            ->first();
    if(!is_null($check_user) ){
        throw new Exception('Correo o Numero telefonico ya ha sido registrado');

    }
   

    if($frm_folio > 0){  
        $check_folio = folio_fisi_sistem::where('folio_fisico',$frm_folio)
        ->first();
        if(!is_null($check_folio) ){
            throw new Exception('Numero de folio ya registrado');
        }
    }

    

     $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
     $password = "";
     //Reconstruimos la contraseña segun la longitud que se quiera
     for($i=0;$i<9;$i++) {
        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $password .= substr($str,rand(0,62),1);
     }
     $funcrand=$this->Ranconfirm();
    
     $participantes = new Musuario();
     $participantes->Folio_parti="";
     $participantes->nombre_C = $frm_nombre;
     $participantes->apep_C = $frm_apep;
     $participantes->apem_C = $frm_apem;
     $participantes->login_C = $frm_usr;
     $participantes->confirmmail = $funcrand;
     $participantes->pass = $password;
     $participantes->nivel = '1';
     $participantes->telefono_Cuno = $frm_tel;
     $participantes->id_tipoIns = $frm_TipoIns;
     $participantes->Nom_Ins = $frm_NomIns;
     $participantes->IdEvento = $frm_IdEven;
     
     $participantes->save();

   
  
    //Obtener el id de cada registro guardado
    $id_participante=$participantes->id;

    //edicion de Folio para obtener un consecutivo
    $Folio_N= $this->EditFolio($id_participante);

    

    //Mandar Id por paso de parametros que nos devuelva el ultimo que se guardo para mandarlo a la vista
    $res_regis= $this->Reglistar($id_participante);
    
    //obtner la descripcion del nivel mediante paso de parametros para mandar el nivel a la vista
    $Nivel_P= $this->ObtNivel($res_regis->id_tipoIns);
    if(!is_null($frm_folio)){
    //Guardar en la tabla folio Participante
    $Foliofisico = new folio_fisi_sistem();
    $Foliofisico->id_evento_eya ="6";
    $Foliofisico->id_folio_sistema = $res_regis->Folio_parti;
    $Foliofisico->folio_fisico = $frm_folio;
    $Foliofisico->save();
    }

   
    //Enviar email 
    $Email_P= $this->EnvEmail($res_regis);

    
    

    DB::commit();
    return view('confirmacion',compact('res_regis','Nivel_P'));
    
    }catch(Exception $e){
    DB::rollBack();
        $mensaje =$e->getMessage();
        $catinsti = catInstitucion::All();
       // return  Redirect::route('index.inicio')->with('mensaje', $mensaje);
        return view('index',compact('mensaje','catinsti'));
    }
     
       
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

    
    public function confirmemail($code)
    {

        if($code == 'ipslIZqztsumutq'){

            $listarweb =DB::table('web')->where('id',1)->first();
            
            $inicial=$listarweb->contadorbd;
            
            if($inicial<=0) {
                $afinador =DB::table('web')->where('id',1)
                ->update([
                
                'contadorbd'=>1,
            
                ]);
                
            }else{
                
                $contador=$inicial+1;
                
                $afinador =DB::table('web')->where('id',1)
                ->update([
                
                'contadorbd'=>$contador,
            
                ]);
                
            }

         
            return view('envivo');
        }

        $listedit =DB::table('participante')->where('confirmmail',$code)->first();

        

        if(!is_null($listedit)){


           
            $solicitud = Musuario::where('confirmmail',$code)
            ->update([
            
            'confirmflag'=>'1',
        
            ]);
            return view('confirmacionemail');
        //return view('auth.login'); 
        }

        $mensaje='Lo invitamos a registrarse en el siguiente formulario';
        return view('index',compact('mensaje')); 

        
    }
    

  
}
