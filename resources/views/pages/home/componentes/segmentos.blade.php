<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
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
                        @foreach ($jogadores as $jogador)
                        <tr>
                        <th scope="row">{{$jogador->id_jogadores}}</th>
                        <td>{{$jogador->nome_jogadores}}</td>
                        <td>{{$jogador->habilidade}}</td>
                        <td>
                            @if ($jogador->goleiro === 1)
                            Sim
                            @else
                            Não
                            @endif
                        </td>
                        <td>
                            <input type="checkbox"  name="confirmado" id="confirmado" value=1>
                            <label for="">Sim</label>
                        </td>
                        <th>
                            <div class="row">
                                @if ($jogador->excluido == 0)
                                <div class="col-md-6" style="display: flex;justify-content: center;">
                                <a class="btn btn-danger status" style="color: white" href="{{url('exclusao', [$jogador->id_jogadores])}}">
                                        <i class="fa fa-times-circle"></i>
                                    </a>
                                </div>
                                @else
                                <div class="col-md-6" style="display: flex;justify-content: center;">
                                    <a class="btn btn-info status" href="{{url('exclusao', [$jogador->id_jogadores])}}">
                                        <i class="fas fa-trash-restore-alt" style="color: white;"></i>
                                    </a>
                                </div>
                                @endif
                                <div class="col-sm-6">
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
                <button type="submit">Gerar Time</button>
            </form>
        </div>
    </div>
</div>