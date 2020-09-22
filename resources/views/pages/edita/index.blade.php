@extends('base.index')
@section('content')

    @component('base.componentes.navbar')
    @endcomponent
	<div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2>Edite os jogadores abaixo</h2>
            </div>
            <div class="col-xl-12">
                <form action="{{url('editando')}}" method="post">
                    {{ csrf_field() }}
                    @foreach ($jogadores as $jogador)
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{$jogador->nome_jogadores}}" name="nome" id="nome" required>
                    </div>
                    <div class="form-group">
                        <select name="nivel" id="nivel" class="form-control">
                            <option value="1" {{ ( $jogador->habilidade == 1) ? 'selected' : '' }}>1</option>
                            <option value="2" {{ ( $jogador->habilidade == 2) ? 'selected' : '' }}>2</option>
                            <option value="3" {{ ( $jogador->habilidade == 3) ? 'selected' : '' }}>3</option>
                            <option value="4" {{ ( $jogador->habilidade == 4) ? 'selected' : '' }}>4</option>
                            <option value="5" {{ ( $jogador->habilidade == 5) ? 'selected' : '' }}>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        @if ($jogador->goleiro == 1)
                        <input type="checkbox"  name="goleiro" id="goleiro" value=1 checked>
                        <label for="">Goleiro?</label>
                        @else
                        <input type="checkbox"  name="goleiro" id="goleiro" value=1 >
                        <label for="">Goleiro?</label>
                        @endif
                    </div>
                    @endforeach
                    <div class="form-group d-flex align-center justify-content-end">
                        <button type="submit" id="btnEnviar" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection