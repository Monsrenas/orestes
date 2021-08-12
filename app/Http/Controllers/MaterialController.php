<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;

class MaterialController extends Controller
{
    //

     public function __construct()
    {
        //$this->middleware('auth');
    }

    public function training_list(Request $request)
    {
    	$lng=session('lang');
    	if ($lng=='') {$lng='en'; session(['lang' => 'en']);} 
        $lista=array_merge(glob("Material/annualtraining/".$lng."/*.ppt"));
        
        return View('annual_training')->with('info', $lista);
    }

    public function AddJob(Request $request)
    {
        return View('application.trabajo')->with('i', $request->indice);   
    }


     public function Vista(Request $request){    
            $view = View::make($request->url);

            if($request->ajax()){
                return $view->with('info',$request); 
            }else return $view->with('info',$request);
    }


    public function ModalView(Request $request){    
            
            $func=$request->url;
            return $this->$func();
    }

    public function seccionCliente($email=null)
   {
       
        if(!isset($_SESSION)){
                         session_start();
                       }  
       if ($email) { $_SESSION['cliente']=$email;} 
       else {unset($_SESSION['cliente']);}
       return redirect('/');
   }
/*
    public function application($ini, $fin, $vis)
    {
        for ($i=$ini; $i<$fin+1 ; $i++) { 
            $dts[$i]=$this->Cargar('.pag'.$i);
        }

        return  view($vis)->with('dts', $dts);
        return  view('application.Aplication1')->with('dts', $dts);
    }
*/
    public function forms($ini, $fin, $vis)
    {
        for ($i=$ini; $i<$fin+1 ; $i++) { 
            $dts[$i]=$this->Cargar('.pag'.$i);
        }
        $dts["frm"]=$this->Cargar('.frm');
        return  view($vis)->with('dts', $dts);
    }

    public function Exam()
    {  
        $dts=$this->Cargar('.exam');

        $lng=session('lang');
        if ($lng=='') {$lng='en'; session(['lang' => 'en']);} 
        $jsonString = file_get_contents(base_path('public/Material/exams/Exam_'.$lng.'.json'));
        $data = json_decode($jsonString, true);

        return view('exam.Exam')->with("data", $data)->with('exa', $dts);
    }    

   public function Guardar(Request $request)
   {
    if(!isset($_SESSION)){  session_start();  }

    if (isset($request->pag)) { $form=$request->pag;}
    else { $form=$request->all(); }

    $newJsonString = json_encode($form, JSON_PRETTY_PRINT);
    $nombre=$_SESSION['cliente'].".".$request->ext ??"tmp";
    $this->SalvaFichero($nombre, $newJsonString);
   }

   public function Cargar($ext=null)
   {
    if(!isset($_SESSION)){
                         session_start();
                       } 
    $nombre=$_SESSION['cliente']??"";
    $nombre=$nombre.$ext;
    
    if (\Storage::exists('/DB/'.$nombre))
        {   
            $jsonString = \Storage::get('/DB/'.$nombre);
            $data = json_decode($jsonString, true);
            return $data;
        }
      return null;  
   }

   public function SalvaFichero($nombre, $info)
   {
    \Storage::put("/DB/".$nombre, $info);
   }

  public function delFiles($ext)
  { 
    if(!isset($_SESSION)){  session_start();  }    
    
    $fichero=$_SESSION['cliente'].$ext;
    \Storage::delete("/DB/".$fichero);
  }

 public function upload(Request $request)
    {

      $image_parts = explode(";base64,", $request->signed);
      
      //$image_parts=base64_encode($image_parts); 
      //$image_parts=base64_encode($image_parts[1]); 
      if(!isset($_SESSION)){
                         session_start();
                       } 
        $nombre=$_SESSION['cliente']??"";
        $nombre=$nombre.".frm";
        $newJsonString ='{"firma":"'.$image_parts[1].'"}';
        

        \Storage::put("/DB/".$nombre, $newJsonString);

      return back()->with('success', 'success');
    }

  public function guardaFirma(Request $request)
    {      
           //obtenemos el campo file definido en el formulario
           $file = $request->file('ImgsTL');
                
           //crear nombre de firma decliente
           if(!isset($_SESSION)){
                         session_start();
                       } 
           $nombre=$_SESSION['cliente']??"";
           $nombre=$nombre.".frm";
            
           //indicamos que queremos guardar un nuevo archivo en el disco local
          $this->SalvaFichero($nombre, \File::get($file));


           $contenidoBinario = \Storage::get('/DB/'.$nombre);
           $imagenComoBase64 = base64_encode($contenidoBinario);

           $newJsonString = '{"firma":"'.$imagenComoBase64.'"}';
      
           $this->SalvaFichero($nombre, $newJsonString);
         return $imagenComoBase64;
    } 

 
   public function createExamPDF() {
      // retreive all records from db
    
      
      $dts=$this->Cargar('.exam');
      
      if (isset($dts["first"]))
      {
          $user=$dts["first"]." ".$dts["last"];  
      } else $user="";

        $lng=session('lang');
        if ($lng=='') {$lng='en'; session(['lang' => 'en']);}
         
      $jsonString = file_get_contents(base_path('public/Material/exams/Exam_'.$lng.'.json'));
        $data = json_decode($jsonString, true);

      $d=["exa"=>$dts,
          "data"=>$data];

      // share data to view
      view()->share('exam.ExamPDF',$d);

      $pdf = PDF::loadView('exam.ExamPDF', $d);
      $pdf->setPaper('letter');

      $this->CorreoExamen($pdf, $user);
      
      $this->delFiles('.exam');
  
      // download PDF file with download method
      return $pdf->download('Application_Packet.pdf');
    }

    // Generate PDF
    public function createPDF() {
      // retreive all records from db
      $d=[];
      for ($i=1; $i<5 ; $i++) { 
            $d["d".$i]=$this->Cargar('.pag'.$i);
      }
      $d["frm"]=$this->Cargar('.frm');
      $user=$d["d1"]["first"]." ".$d["d1"]["last"];
 
      // share data to view
      
      view()->share('application.applicationPDF',$d);

      $pdf = PDF::loadView('application.applicationPDF', $d);
      $pdf->setPaper('letter');
      $this->correo($pdf, $user);

      // download PDF file with download method
      return $pdf->download('Application_Packet.pdf');
    }


   public function PDF($doc=null, $vista=null) {
      // retreive all records from db
      $d=[];

      $d1=$this->Cargar('.pag1');
      $d["d"]=$this->Cargar('.pag'.$doc);
      $d["frm"]=$this->Cargar('.frm');
      $d["p"]="imprimir";
      $user=($d1["first"]??"")." ".($d1["last"]??"");
 
      // share data to view
      if (in_array($doc,["1","2","4"]) ) $vista=$vista."PDF";
      
      view()->share($vista, $d);

      $pdf = PDF::loadView($vista, $d);
      $pdf->setPaper('letter');
      $this->correo($pdf, $user);

      // download PDF file with download method
      return $pdf->download('form'.$doc.'.pdf');
    }

     public function correo($Contenido, $user)
     {
         if(!isset($_SESSION)){
                         session_start();
                       } 
         $nombre=$_SESSION['cliente']??"";
      
        Mail::send("Correo" , [], function ($mail) use ($Contenido, $nombre, $user) {
            $mail->subject('Application Pakect '.$user);
            $mail->from('nhhs.users@gmail.com', 'Neighborhood Home Health Services, Inc.');
            $mail->to($nombre);
            $mail->to('ajf@mynhhs.com');
            $mail->to('nhhshr@mynhhs.com');
            $mail->attachData($Contenido->output(), $nombre.'_application.pdf');
        });
    }

    public function CorreoExamen($Contenido, $user)
     {
         if(!isset($_SESSION)){
                         session_start();
                       } 
         $nombre=$_SESSION['cliente']??"";
        
        Mail::send("Correo_Examen" , [], function ($mail) use ($Contenido, $nombre, $user) {
            $mail->subject('Examen '.$user);
            $mail->from('nhhs.users@gmail.com', 'Neighborhood Home Health Services, Inc.');
            $mail->to($nombre);
            $mail->to('ajf@mynhhs.com');
            $mail->to('nhhshr@mynhhs.com');
            $mail->attachData($Contenido->output(), $nombre.'_Exam.pdf');
        });
    }


    public function CorreoContacto(Request $request)
     {
        $data=['mensaje'=>$request->message ?? "", 'zip'=>$request->zipcode ?? "", 'tel'=>$request->phone ?? "",'email'=>$request->email,'name'=>$request->name];
        Mail::send("CorreoContacto" , $data, function ($mail) use ($request) {
            $mail->subject('NHHS web '.$request->name);
            $mail->from('nhhs.users@gmail.com', 'Neighborhood Home Health Services, Inc.');
            $mail->to('ajf@mynhhs.com');
            $mail->to('nhhshr@mynhhs.com');
        });

        return view('contact');
    }

}