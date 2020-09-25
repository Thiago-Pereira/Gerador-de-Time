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
        $aux = 0;
        for ($a = 0; $a < count($req->id_jogadores); $a++) {
            if ($req->goleiro[$a] == 1 && !empty($req->confirmado[$a])){
                $aux++;
            }
        }
        if (count($req->confirmado) >= ($req->qtde * 2)  && $aux == 2) {
            do {
                $jogadores = array();
                for ($key = 0; $key < count($req->id_jogadores); $key++) {
                    if (!empty($req->confirmado[$key])) {
                        $jogador = new Jogadores();
                        $jogador->nome_jogadores = $req->nome_jogadores[$key];
                        $jogador->habilidade = $req->habilidade[$key];
                        $jogador->goleiro = $req->goleiro[$key];
        
                        array_push($jogadores, $jogador);
                    }
                }
        
                $tamanho = $req->qtde;
                shuffle($jogadores);
                
                $goleiro = true;
                $time1 = array();
                $time2 = array();
        
                foreach($jogadores as $i => $jog) {
                    if ($jog->goleiro == 1){
                        $goleiro1 = $i;
                        break;
        
                    }
                }
        
                $time1[] = $jogadores[$goleiro1];
                array_splice($jogadores, $goleiro1, 1);
                for ($i = 0; $i < $tamanho/2; $i++) { 
                    if($jogadores[$i]->goleiro == 0 && $goleiro == true ) {
                        $time1[] = $jogadores[$i];
                        // echo 'aqui';
                        array_splice($jogadores, $i, 1);
                    } 
                }
        
        
                foreach($jogadores as $i => $jog) {
                    if ($jog->goleiro == 1){
                        $goleiro2 = $i;
                        break;
        
                    }
                }
                $time2[] = $jogadores[$goleiro2];
                array_splice($jogadores, $goleiro2, 1);
                
        
                for ($j = 0; $j < $tamanho/2 ; $j++) { 
                    if($jogadores[$j]->goleiro == 0 && $goleiro == true ) {
                        $time2[] = $jogadores[$j];
                    }
                }
        
                $media_time1 = array();
                $media_time2 = array();
                foreach ($time1 as $time) {
                    $media_time1[] = $time->habilidade;
                }
                foreach ($time2 as $time) {
                    $media_time2[] = $time->habilidade;
                }
        
        
                $m1 = array_sum($media_time1)/count($media_time1);
                $m2 = array_sum($media_time2)/count($media_time2);
                // dd('aqui');
            } while($m1 <= 1.5 && $m1 >= 4.8 && $m2 <= 1.5 && $m2 >= 4.8);
            // dd($time1);
            return view('pages.times.index')->with(['time1' => $time1, 'time2' => $time2]);

        } else {
            return Redirect::back()->with('statusError', 'Número de jogadores confirmados insulficiente e/ou numéro de goleiros insulficiente');
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
        $jogador = Jogadores::findOrFail($req->id_jogadores);
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
