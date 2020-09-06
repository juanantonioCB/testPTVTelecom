<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use NahidulHasan\Html2pdf\Facades\Pdf;

class PdfController extends Controller
{
    public function __invoke(Request $request)
    {
        session_start();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pdf',[
            'name'=> $request->get('name'),
            'email'=>$request->get('email'),
            'image'=>$_SESSION['image']]));
            $dompdf->render();
            $dompdf->stream();

           

    }
}
