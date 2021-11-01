<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function login(Request $request) {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $mensagem = $request->session()->get('mensagem');
        return view('login',['mensagem'=> $mensagem]);
    }

    public function authenticate(Request $request) {
        validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
        $password = $request->input('password');
        $email = $request->input('email');
        if ( Auth::attempt( ['email' => $email, 'password' => $password] )) {
           return redirect('/');
        } else {
            $request->session()->flash(
                'mensagem',
                "Credenciais não autorizada "
            );
            return redirect('login');
        }
    }

    public function sair(Request $request) {
       Auth::logout();
       $request->session()->flash(
        'mensagem',
        "Usuário Deslogado"
        );  
       return redirect('login');
    }
}
