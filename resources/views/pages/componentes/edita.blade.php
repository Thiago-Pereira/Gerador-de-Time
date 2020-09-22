<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
            <h2>Edite o jogador abaixo</h2>
        </div>
        <div class="col-xl-12">
            <form action="{{url('edita')}}" method="post">
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