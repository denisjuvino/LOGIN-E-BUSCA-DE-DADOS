<?php

namespace App\Http\Controllers;

use App\Models\Carros;
use Illuminate\Http\Request;

class CapturaController extends Controller
{
    function index (Request $request) {
    
        $iniciar = curl_init();

        curl_setopt($iniciar, CURLOPT_URL, "https://www.questmultimarcas.com.br/estoque?termo=" . $request->termo);
        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, TRUE);
        $termo=curl_exec($iniciar);

        curl_close($iniciar);

        preg_match_all('/(?<=<article)(.*?)(?=<\/article>)/sim', $termo, $carros);
        
        $mapeado = [];

        foreach ($carros[1] as $carro) {
            $str = str_replace("\r\n", '', $carro);
            $str = str_replace('  ', '', $str);

            preg_match('/(?<=Ano: <\/span><span class="card-list__info">)(.*?)(?=<\/span>)/', $str, $ano);

            preg_match('/(?<=Quilometragem: <\/span><span class="card-list__info">)(.*?)(?=<\/span>)/', $str, $quilometragem);

            preg_match('/(?<=Combustível: <\/span><span class="card-list__info">)(.*?)(?=<\/span>)/', $str, $combustivel);

            preg_match('/(?<=Câmbio: <\/span><span class="card-list__info">)(.*?)(?=<\/span>)/', $str, $cambio);

            preg_match('/(?<=Portas: <\/span><span class="card-list__info">)(.*?)(?=<\/span>)/', $str, $portas);

            preg_match('/(?<=Cor: <\/span><span class="card-list__info">)(.*?)(?=<\/span>)/', $str, $cor);

            preg_match('/(?<=href=")(.*?)(?="><img width=)/', $str, $link);

            $tagLink = str_replace('/', '\/', 'inner"><a href="' . $link[1] . '">');
            preg_match("/(?<=$tagLink)(.*?)(?=<\/a>)/", $str, $nome);

            $mapeado[] = [
                'nome' => $nome[1],
                'ano' => $ano[1],
                'km' => $quilometragem[1],
                'combustivel' => $combustivel[1],
                'cambio' => $cambio[1],
                'portas' => $portas[1],
                'cor' => $cor[1],
                'link' => $link[1]
            ];
        }

        $this->store($mapeado);

        return redirect('/lista');
    }

    function store($mapeado)
    {

        foreach ($mapeado as $item) 
        {
            $carros = new Carros();

            $carros->nome_veiculo = $item['nome'];
            $carros->ano = $item['ano'];
            $carros->quilometragem = $item['km'];
            $carros->combustivel = $item['combustivel'];
            $carros->cambio = $item['cambio'];
            $carros->portas = $item['portas'];
            $carros->cor = $item['cor'];
            $carros->link = $item['link'];
            $carros->user_id = auth()->user()->id;

            $carros->save();
        }
    }

    function delete(Request $request) {
    // id vindo da rota
        $id = $request->id;
        $carro = Carros::find($id);
        $carro->delete();
        return redirect('/lista');
    }
}

