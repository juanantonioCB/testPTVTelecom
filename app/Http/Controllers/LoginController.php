<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \GuzzleHttp\Client;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = $request->get('user');
        $dni = $request->get('dni');
        $client = new Client();
        try {
            $response = $client->get('http://212.225.255.130:8010/ws/accesotec/' . $user . '/' . $dni);
            $body = $response->getBody();
            $xml = simplexml_load_string($body);
            if (isset($xml->Registro)) {
                $name = trim((string) $xml->Registro[0]->attributes()->Nombre);
                $email = trim((string) $xml->Registro[0]->attributes()->Email);
                session_start();
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;


                return redirect()->route('form');
            }
        } catch (Exception $e) {
            echo ('errorrrrr');
        }
    }
}
