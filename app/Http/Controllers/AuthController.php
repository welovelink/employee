<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\AuthServices;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        $params = [];
        return view('auth.login', $params);
    }

    public function login(Request $request){
        $authService = new AuthServices();
        $return = $authService->login($request);
        if($return->response->status === 'error'){
            return redirect(url('/'));
        }
        return redirect(url('/dashboard'));
    }

    public function logout(){
        auth()->logout();
        return redirect(url('/'));
    }
}
