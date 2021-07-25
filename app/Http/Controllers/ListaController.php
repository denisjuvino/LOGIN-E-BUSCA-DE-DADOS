<?php

namespace App\Http\Controllers;

use App\Models\Carros;

class ListaController extends Controller

{
    public function all() {

        $listas = Carros::all();

        return view('lista', ['listas' => $listas]);
    }

}