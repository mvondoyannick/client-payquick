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
        $client = "";

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
