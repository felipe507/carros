<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user/list',['users'=> $users]);
    }

    public function save(Request $request) {
        $dados['name'] = $request->input('name');
        $dados['email'] = $request->input('email');
        $dados['password'] = Hash::make($request->input('password'));
        if (isset($_POST['id'])) {
            $id = $request->input('id');
            $user = User::find($id);
            $user->update($dados);
            return redirect('/');
        } else {
            User::create($dados);
            return redirect('/');
        }
    }

    public function create() {
        return view('user/create');
    }

    public function edit($id) {
        $user = User::where(['id'=> $id])->first();
        return view('user/edit',['user' => $user]);
    }

    public function delete($id) {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('/');
    }
}
