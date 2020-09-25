<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('statusError'))
  <script type="text/javascript">
  swal("{{session('statusError')}}", "", "error");
  </script>
@endif


<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center" style="padding-top: 10px;">
            <h2>Cadastre os jogadores abaixo</h2>
        </div>
        <div class="col-xl-12">
            <form action="{{url('salvarjogadores')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nome*" name="nome" id="nome" required>
                </div>
                <div class="form-group">
                    <select name="nivel" id="nivel" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="checkbox"  name="goleiro" id="goleiro" value=1>
                    <label for="">Goleiro?</label>
                </div>
                <div class="form-group d-flex align-center justify-content-end">
                    <button type="submit" id="btnEnviar" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <h2 class="text-center">Jogadores já cadastrados</h2>
    <div class="row">
        <div class="table-responsive">
        <form action="{{url('geratime')}}" method="post">
                {{ csrf_field() }}
                <table class="table table-striped table-bordered" id="table">
                    <thead style="background-color: #342E37; color: white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Habilidade</th>
                            <th scope="col">Goleiro</th>
                            <th scope="col">Confirmado</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jogadores as $key => $jogador)
                        <tr>
                            {{-- {{dd($key)}} --}}
                            <div class="form-group">
                            <input type="hidden" name="id_jogadores[{{$key}}]" id="id_jogadores[{{$key}}]" value="{{$jogador->id_jogadores}}">
                                <th scope="row">{{$jogador->id_jogadores}}</th>
                            </div>
                            <div class="form-group">
                            <input type="hidden" name="nome_jogadores[{{$key}}]" id="nome_jogadores[{{$key}}]" value="{{$jogador->nome_jogadores}}">
                                <td>{{$jogador->nome_jogadores}}</td>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="habilidade[{{$key}}]" id="habilidade[{{$key}}]" value="{{$jogador->habilidade}}">
                                <td>{{$jogador->habilidade}}</td>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="goleiro[{{$key}}]" id="goleiro[{{$key}}]" value="{{$jogador->goleiro}}">
                                <td>
                                    @if ($jogador->goleiro === 1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                </td>
                            </div>
                            <div class="form-group">
                                <td>
                                    <input type="checkbox"  name="confirmado[{{$key}}]" id="confirmado[{{$key}}]" value=1>
                                    <label for="">Sim</label>
                                </td>
                            </div>
                        <th>
                            <div class="row">
                                @if ($jogador->excluido == 0)
                                <div class="col-md-4" style="display: flex;justify-content: center;">
                                <a class="btn btn-danger status" style="color: white" href="{{url('exclusao', [$jogador->id_jogadores])}}">
                                        <i class="fa fa-times-circle"></i>
                                    </a>
                                </div>
                                @else
                                <div class="col-md-4" style="display: flex;justify-content: center;">
                                    <a class="btn btn-info status" href="{{url('exclusao', [$jogador->id_jogadores])}}">
                                        <i class="fas fa-trash-restore-alt" style="color: white;"></i>
                                    </a>
                                </div>
                                @endif
                                <div class="col-sm-4">
                                    <a href="{{url('recupera', [$jogador->id_jogadores])}}" class="btn btn-primary edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>
                        </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-right col-xl-12">
                <p style="margin-bottom: 0rem">Quantidade de Jogadores por Time</p>
            </div>
            <div class="form-group d-flex align-center justify-content-end col-xl-12">
                <input type="number" min="2" name="qtde" id="qtde">
            </div>
            <div class="form-group d-flex align-center justify-content-end col-xl-12">
                <button type="submit">Gerar Time</button>
            </div>
        </form>
    </div>
</div>



<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
</style>