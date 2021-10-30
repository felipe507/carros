<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function login() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $password = $request->input('password');
        $login = $request->input('email');
        if ( Auth::attempt( ['email' => $login, 'password' => $password] )) {
           return redirect('/');
        } else {
            return redirect('login');
        }
    }

    public function sair() {
       Auth::logout();
       return redirect('login');
    }
}
