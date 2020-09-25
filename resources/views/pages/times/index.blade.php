@extends('base.index')
@section('content')

    @component('base.componentes.navbar')
    @endcomponent

    <div class="container">
        <h2 class="text-center" style="padding-top: 10px;">Time 1</h2>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table1">
                    <thead style="background-color: #342E37; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Habilidade</th>
                            <th scope="col">Goleiro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($time1 as $key => $jogador)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$jogador->nome_jogadores}}</td>
                            <td>{{$jogador->habilidade}}</td>
                            <td>
                                @if ($jogador->goleiro == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center" style="padding-top: 10px;">Time 2</h2>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table2">
                    <thead style="background-color: #342E37; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Habilidade</th>
                            <th scope="col">Goleiro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($time2 as $key => $jogador)
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$jogador->nome_jogadores}}</td>
                            <td>{{$jogador->habilidade}}</td>
                            <td>
                                @if ($jogador->goleiro == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection