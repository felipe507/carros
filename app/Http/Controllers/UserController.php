<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::all();
        $tipo = $request->session()->get('tipo');
        $mensagem = $request->session()->get('mensagem');
        return view('user/list',['users'=> $users, 'mensagem'=> $mensagem, 'tipo' => $tipo]);
    }

    public function save(Request $request) {
        $dados['name'] = $request->input('name');
        $dados['email'] = $request->input('email');
        $dados['password'] = Hash::make($request->input('password'));
        if (isset($_POST['id'])) {
            $id = $request->input('id');
            $user = User::find($id);
            $user->update($dados);
            $request->session()->flash('mensagem',"Usuário {$dados['name']} atualizado(a) com sucesso");   
            $request->session()->flash('tipo',"alert-success"); 
            return redirect('/user/list');
        } else {
            $checkEmail = User::where(['email' => $dados['email']])->first();
            if(!empty($checkEmail)) {
                $request->session()->flash('mensagem',"Erro email já cadastrado");   
                $request->session()->flash('tipo',"alert-danger"); 
                return redirect('/user/create');
            } else {
                $user = User::create($dados);
                $request->session()->flash('mensagem',"Usuário {$dados['name']} cadastrado(a) com sucesso");   
                $request->session()->flash('tipo',"alert-success"); 
                return redirect('/user/list');
            }
            User::create($dados);
            $request->session()->flash('mensagem',"Usuário {$dados['name']} criado(a) com sucesso ");
            $request->session()->flash('tipo',"alert-success");         
            return redirect('/user/list');
        }
    }

    public function create(Request $request) {
        $mensagem = $request->session()->get('mensagem');
        $tipo = $request->session()->get('tipo');
        return view('user/create', ['mensagem'=> $mensagem, 'tipo' => $tipo]);
    }

    public function edit($id) {
        $user = User::where(['id'=> $id])->first();
        return view('user/edit',['user' => $user]);
    }

    public function delete($id = null, Request $request) {
        if ($id != null) {
            $user = User::where('id', $id)->first();
            $user->delete();
            $request->session()->flash('mensagem',"Usuario {$user['name']} excluido(a) com sucesso ");
            $request->session()->flash('tipo',"alert-success"); 
            return redirect('/user/list');
        } else {
            $request->session()->flash('mensagem',"Usuario não encontrado ");
            $request->session()->flash('tipo',"alert-danger"); 
            return redirect('/user/list');
        }
    }
}
