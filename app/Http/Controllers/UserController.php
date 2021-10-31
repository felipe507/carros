<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::all();
        $mensagem = $request->session()->get('mensagem');
        return view('user/list',['users'=> $users, 'mensagem'=> $mensagem]);
    }

    public function save(Request $request) {
        $dados['name'] = $request->input('name');
        $dados['email'] = $request->input('email');
        $dados['password'] = Hash::make($request->input('password'));
        if (isset($_POST['id'])) {
            $id = $request->input('id');
            $user = User::find($id);
            $user->update($dados);
            $request->session()->flash(
                'mensagem',
                "Usuário {$dados['name']} atualizado(a) com sucesso "
            );
            return redirect('/user/list');
        } else {
            User::create($dados);
            $request->session()->flash(
                'mensagem',
                "Usuario {$dados['name']} criado(a) com sucesso "
            );
            return redirect('/user/list');
        }
    }

    public function create() {
        return view('user/create');
    }

    public function edit($id) {
        $user = User::where(['id'=> $id])->first();
        return view('user/edit',['user' => $user]);
    }

    public function delete($id, Request $request) {
        $user = User::where('id', $id)->first();
        $user->delete();
        $request->session()->flash(
            'mensagem',
            "Usuario {$user['name']} excluido(a) com sucesso "
        );
        return redirect('/user/list');
    }
}
