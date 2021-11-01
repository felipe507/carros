<?php

namespace App\Http\Controllers;

use App\Models\Car;
use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;
use \Symfony\Component\BrowserKit\HttpBrowser;
use \Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class CarsCotroller extends Controller
{
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $tipo = $request->session()->get('tipo');
        return view('car/list', ['cars' => Car::where(['user_id'=>auth()->user()->id])->get()], compact('mensagem','tipo'));	
    }

    public function capture(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $tipo = $request->session()->get('tipo');
        return view('car/capture', compact('mensagem','tipo'));
    }

    public function capturar(Request $request)
    {
        $search = $request->input('search');
        if(!$search){
            $request->session()->flash('mensagem', 'Preencha o campo de captura!');
            $request->session()->flash('tipo',"alert-danger");
            return redirect()->route('capturar-dados');
        }
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', 'https://www.questmultimarcas.com.br/estoque?termo=' . $search);
        $dados = $crawler->filter('article')->each(function($node) {
            $node->filter('li')->each(function($informacoes) {
              return $informacoes->text(); 
            });

            return $node->html();
        });
        if(!empty($dados)) {	
            foreach ($dados as $key) {
                $filtro = new Crawler($key);
                $li = $filtro->filter('li')->each(function($node) {
                    preg_match_all('/[^\:]+/', $node->text() , $palavracortada);
                    return $palavracortada[0];
                });
                for ($i=0; $i < count($li); $i++) { 
                    $car[strtolower($this->retirarAcento($li[$i][0]))] = $li[$i][1];
                }
                $car['link'] = $filtro->filter('a')->attr('href');
                $car['nome_veiculo'] = $filtro->filter('h2 > a')->text();
                $car['user_id'] = auth()->user()->id;
                Car::create($car);
                $request->session()->flash('mensagem',"Veículos encontrados cadastrados");
                $request->session()->flash('tipo',"alert-success");
                return redirect()->route('home');
            } 
        } else {
            $request->session()->flash('mensagem',"Nenhum dado encontrado");
            $request->session()->flash('tipo',"alert-danger");
            return redirect()->route('capturar-dados');
        }
        
    }

    public function create() {
        return view('car/create');
    }

    public function search(Request $request) {
        $mensagem = $request->session()->get('mensagem');
        $tipo = $request->session()->get('tipo');
        $search = $request->input('search');
        if(!$search){
            $request->session()->flash('mensagem', 'Preencha o campo de busca!');
            $request->session()->flash('tipo',"alert-danger");
            return redirect()->route('home');
        }
        $cars = Car::where(['user_id'=>auth()->user()->id])->where('nome_veiculo', 'like', '%' . $search . '%')->get();
        if(empty($search)) {
            $request->session()->flash('mensagem',"Nenhum dado encontrado");
            $request->session()->flash('tipo',"alert-danger");
            return redirect()->route('home');
        }

        $request->session()->flash('mensagem',"Busca realizada com sucesso");
        $request->session()->flash('tipo',"alert-success");
    
        return view('car/list', ['cars' => $cars, 'mensagem' => $mensagem, 'tipo' => $tipo]);
        
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
        $request->session()->flash('mensagem',"Modelo {$car->nome_veiculo} criado(a) com sucesso ");
        $request->session()->flash('tipo',"alert-success");
        return redirect('/');
    }

    public function delete($id, Request $request) {
        $car = Car::where('id', $id)->first();
        $car->delete();
        $request->session()->flash('mensagem',"Modelo {$car->nome_veiculo} excluido(a) com sucesso");
        $request->session()->flash('tipo',"alert-success");
        return redirect('/');
    }

    public function retirarAcento($texto)
    {
        return $texto = str_replace( array(' ', 'à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('_', 'a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $texto);
    }
}
