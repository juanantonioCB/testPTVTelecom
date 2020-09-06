<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __invoke(Request $request)
    {

        session_start();
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];

        if(session_status()==PHP_SESSION_ACTIVE ){
            return view('Form',[
                'name'=>$name,
                'email'=>$email
                ]);
        }else{
            echo('Inicia sesión por favor');
        }

        
    }
}
