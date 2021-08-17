<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\testimonio;

class ClientController extends Controller
{
    //
    public function RegistraTestimonio(Request $request)
		{	 
			//dd($request);
			$todo=testimonio::create($request->all());
			$todo=testimonio::orderBy('created_at', 'DESC')->get();
		  
			return redirect('/')->with('lista',$todo);
			
		}

	public function List()	
		{
			$todo=testimonio::orderBy('created_at', 'DESC')->get();
 			return View('index')->with('lista',$todo);
		}		
}
