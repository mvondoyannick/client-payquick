<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    //
    public function login(Request $request){
        if ( $request->session()->exists('authentication_token')){
            return redirect()->action('ClientController@index');
        }else {
            return view('clients.login');
        }
        //return view('clients.login');
    }

    public function auth(Request $request){
        $client = new Client();
        $query = $client->post("http://localhost:3000/api/v1/customer/auth/signin", [
            'form_params' => [
                'phone'     => $request->phone,
                'password'  => $request->password
            ]
        ]);
        $data = $query->getBody()->getContents();
        $fylo = json_decode($data);
        if ($fylo->status == true){
            session(['phone'=>$fylo->message->phone]);
            return view('clients.login_step_two')->with('success', 'mot de passe recu par SMS');
        }else{
            return view('clients.login')->with('error', 'Utilisateur inconnu');
        }

    }

    public function auth_code_sms(Request $request){
        $client = new Client();
        $query  = $client->post("http://localhost:3000/api/v1/customer/auth/signin/validate", [
            'form_params' => [
                'code'  => $request->code,
                'phone' => $request->phone
            ]
        ]);
        $data = $query->getBody()->getContents();
        $content = json_decode($data);
        if ($content->status == true){
            session(['name'=>$content->message->name]);
            session(['second_name'=>$content->message->second_name]);
            session(['phone'=>$content->message->phone]);
            session(['email'=>$content->message->email]);
            session(['authentication_token'=>$content->message->authentication_token]);
            //return view('clients.index')->with('success', 'Welcome');
            return redirect()->action('ClientController@index', ['token'=>$content->message->authentication_token]);
        }
    }


    public  function index(Request $request){
        if ($request->session()->exists('authentication_token')){
            return view('clients.index');
        }else {
            return redirect()->action('ClientController@login');
        }

    }

    public function profile(){
        return view('clients.profile')->with(['class'=>'active']);
    }

    public function logs(Request $request){
        $client = new Client();
        $query = $client->get('http://localhost:3000/api/v1/client/logs/'.session('authentication_token'), [
            'form_params'=> [
                'token' => session('authentication_token')
            ]
        ]);
        $data = $query->getBody()->getContents();
        $content = json_decode($data);
        //on cherche a verifier le contenu de $content
        if ($content->status == true){
            $store = $content->message;
            return view('clients.logs')->with('data', $store);
        }

    }

    //get history transaction
    public function get_logs(Request $request){

    }

    public function security(){
        return view('clients.security');
    }

    public function maps(){
        return view('clients.maps');
    }

    public function parameters(){
        return view('clients.parameters');
    }

    public function logout(Request $request){
        //on detruit toute les sessions
        $request->session()->flush();
        return redirect()->action('ClientController@login');
    }
}
