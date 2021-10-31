<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use \Symfony\Component\BrowserKit\HttpBrowser;
use \Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class CarsCotroller extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        return view('car/list', ['cars' => Car::where(['user_id'=>auth()->user()->id])->get()], compact('mensagem'));	
    }

    public function capture(Request $request)
    {
       $search = $request->input('search');
        
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', 'https://www.questmultimarcas.com.br/estoque?termo=' . $search);

        //$dados['user_id'] =  auth()->user()->id;

        $dados = $crawler->filter('article')->each(function($node) {
            return $node->text();
        });
        if(empty($cars)) {	
            $request->session()
            ->flash(
                'mensage',
                "Dados Capturados com com sucesso"
            );
            print_r($dados); 
            exit;
            return redirect()->route('home');
        } else {
            $request->session()
            ->flash(
                'mensage',
                "Nenhum dado encontrado"
            );
            return redirect()->route('home');
        } 
     
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
        $car = Car::create($dados);
        $request->session()->flash(
            'mensagem',
            "Modelo {$car->nome_veiculo} criado(a) com sucesso "
        );
        return redirect('/');
    }

    public function delete($id, Request $request) {
        $car = Car::where('id', $id)->first();
        $car->delete();
        $request->session()->flash(
            'mensagem',
            "Modelo {$car->nome_veiculo} excluido(a) com sucesso "
        );
        return redirect('/');
    }
}
