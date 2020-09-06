<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function __invoke(Request $request)
    {
        session_start();
        $name=$request->get('name');
        $email=$request->get('email');
        $image=$_SESSION['image'];
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pdf',[
            'name'=> $name,
            'email'=>$email,
            'image'=>$image]));
            $dompdf->render();
            $dompdf->stream();

           DB::table('signs')->insert([
               'name'=>$name,
               'email'=>$email,
               'image'=>$image
           ]);

    }
}
