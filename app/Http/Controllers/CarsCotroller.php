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
        return view('car/list', ['cars' => Car::where(['user_id'=>auth()->user()->id])->get()], compact('mensagem'));	
    }

    public function capture(Request $request)
    {
       $search = $request->input('search');
        
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', 'https://www.questmultimarcas.com.br/estoque?termo=' . $search);

        //$dados['user_id'] =  auth()->user()->id;

        $dados = $crawler->filter('article')->each(function($node) {
            $node->filter('li')->each(function($informacoes) {
              return $informacoes->text(); 
            });

            return $node->html();
        });

        if(!empty($dados)) {	
            $request->session()
            ->flash(
                'mensagem',
                "Dados Capturados com com sucesso"
            );
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
                // $car[$li[1][0]] = $li[1][1];
                // $car[$li[2][0]] = $li[2][1];
                // $car[$li[3][0]] = $li[3][1];
                // $car[$li[4][0]] = $li[4][1];
                // $car[$li[5][0]] = $li[5][1];
                // $car['portas'] = $filtro->filter('div .card-list__info')->text();
                // $car['quilometragem'] = $filtro->filter('div .card-list__info')->text();
                // $car['cambio'] = $filtro->filter('div .card-list__info')->text();
                // $car['cor'] = $filtro->filter('div .card-list__info')->text();
                // $car['user_id'] = auth()->user()->id;
                Car::create($car);
            } 
        } else {
            $request->session()->flash(
                'mensagem',
                "Nenhum dado encontrado "
            );
        }
        return redirect()->route('home');
    }

    public function retirarAcento($texto)
    {
        return $texto = str_replace( array(' ', 'à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('_', 'a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $texto);
    }

    public function create() {
        return view('car/create');
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $cars = Car::where(['user_id'=>auth()->user()->id])->where('nome_veiculo', 'like', '%' . $search . '%')->get();
        return view('car/list', ['cars' => $cars]);
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
