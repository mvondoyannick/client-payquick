<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    //
    public function login(){
        return view('clients.login');
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
            return view('clients.index')->with('success', 'Welcome');
        }
    }


    public  function index(){
        return view('clients.index');
    }

    public function profile(){
        return view('clients.profile')->with(['class'=>'active']);
    }

    public function logs(){
        return view('clients.logs');
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
}
