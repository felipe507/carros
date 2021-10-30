<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use \Symfony\Component\BrowserKit\HttpBrowser;
use \Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Facades\Hash;

class CarsCotroller extends Controller
{
    public function index()
    {
        return view('car/list', ['cars' => Car::all()]);	
        $browser = new HttpBrowser(HttpClient::create());
        $a = $browser->request('GET', 'https://www.questmultimarcas.com.br/estoque/');

        $html = $a->html();
        $text = $a->filterXPath('//h1[@class="firstHeading"]')->text();
    }

    public function create() {
        return view('car/create');
    }

    public function save(Request $request) {
        $dados['user_id'] =  auth()->user()->id;
        $dados['nome_veiculo'] = $request->input('nome_veiculo');
        $dados['link'] = $request->input('link');
        $dados['ano'] = $request->input('ano');
        $dados['combustivel'] = $request->input('combustivel');
        $dados['portas'] = $request->input('portas');
        $dados['quilometragem'] = $request->input('quilometragem');
        $dados['cambio'] = $request->input('cambio');
        $dados['cor'] = $request->input('cor');
        Car::create($dados);
        return redirect('/');
    }

    public function delete($id) {
        $user = Car::where('id', $id)->first();
        $user->delete();
        return redirect('/');
    }
}
