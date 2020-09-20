<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jogadores;

class JogadoresController extends Controller
{
    public function index() {
        $jogadores = Jogadores::where('excluido', 0)->get();

        return view('pages.jogadores')->with(['jogadores' => $jogadores]);
    }
    
    public function save(Request $req){
        
    }

    public function recover(Request $req) {
        $jogadores = Jogadores::where('excluido', 0)->where('id_jogadores', $req->id)->get();

        return view('pages.jogadores')->with(['jogadores' => $jogadores]);
    }

    public function selecionaTime(Request $req) {
        $jogadores = Jogadores::where('excluido', 0)->where('id_jogadores', $req->id)->orderby(rand())->get();

        for ($i = 0; $i < $req->qtde/2; $i++) { 
            $time1[] = $jogadores[i];
        }

        for ($j = 0; $j < $req->qtde ; $j++) { 
            $time2[] = $jogadores[i];
            $i++;
        }


    }
}
