<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(Request $request) {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $mensagem = $request->session()->get('mensagem');
        $tipo = $request->session()->get('tipo');        
        return view('login',['mensagem'=> $mensagem, 'tipo' => $tipo]);
    }

    public function authenticate(Request $request) {
        $password = $request->input('password');
        $email = $request->input('email');
        if ( Auth::attempt( ['email' => $email, 'password' => $password] )) {
           return redirect('/');
        } 
        $request->session()->flash('mensagem',"Credencial não autorizada");
        $request->session()->flash('tipo',"alert-danger");
        return redirect('login'); 
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flash('mensagem',"Usuário Deslogado");  
        $request->session()->flash('tipo',"alert-danger");
        return redirect('login');
    }
}
