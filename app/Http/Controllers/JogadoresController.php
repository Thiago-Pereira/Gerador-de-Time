<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Jogadores;

class JogadoresController extends Controller
{
    public function index() {
        $jogadores = Jogadores::select('id_jogadores', 'nome_jogadores', 'goleiro', 'habilidade', 'excluido')->get();

        return view('pages.home.jogadores')->with(['jogadores' => $jogadores]);
    }
    
    public function salvar(Request $req){
        $jogador = new Jogadores;
        $jogador->nome_jogadores = $req->nome;
        $jogador->habilidade = $req->nivel;
        if (empty($req->goleiro)) {
            $jogador->goleiro = 0;
        } else {
            $jogador->goleiro = $req->goleiro;
        }
        $jogador->save();

        return Redirect::back();
    }

    public function recover($id) {
        $jogadores = Jogadores::where('excluido', 0)->where('id_jogadores', $id)->get();

        return view('pages.edita.index')->with(['jogadores' => $jogadores]);
    }

    public function selecionaTime(Request $req) {
        dd($req->jogadores);
        $jogadores = Jogadores::where('excluido', 0)->where('id_jogadores', $req->id)->orderby(rand())->get();

        for ($i = 0; $i < $req->qtde/2; $i++) { 
            $time1[] = $jogadores[i];
        }

        for ($j = 0; $j < $req->qtde ; $j++) { 
            $time2[] = $jogadores[i];
            $i++;
        }


    }

    public function delete($id) {
        // dd($id);
        $jogador = Jogadores::findOrFail($id);
        if ($jogador->excluido == 0) {
            $jogador->excluido = 1;
        } else {
            $jogador->excluido = 0;
        }

        $jogador->save();

        return redirect()->route('home'); 
    }


    public function alterar(Request $req) {
        $jogador = Jogador::findOrFail($req->id_jogadores);
        $jogador->nome_jogadores = $req->nome;
        $jogador->habilidade = $req->nivel;
        if (empty($req->goleiro)) {
            $jogador->goleiro = 0;
        } else {
            $jogador->goleiro = $req->goleiro;
        }
        $jogador->save();

        return redirect('/');
    }
}
