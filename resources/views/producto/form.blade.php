<form action="{{url('/producto')}}" method="post">
    @csrf
    <div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:''}}">
    </div>

    <div class="form-group">
    <label>Cantidad</label>
    <input type="text" class="form-control" name="Cantidad" id="Cantidad" value="{{  isset($producto->Cantidad)?$producto->Cantidad:''}}">
    </div>

    <div class="form-group">
    <label>PrecioCosto</label>
    <input type="text" class="form-control" name="PrecioCosto" id="PrecioCosto" value="{{  isset($producto->PrecioCosto)?$producto->PrecioCosto:''}}">
    </div>

    <div class="form-group">
    <label>Tipo</label>
    <input type="text" class="form-control" name="Tipo" id="Tipo" value="{{  isset($producto->Tipo)?$producto->Tipo:''}}">
    </div>

    <div class="form-group">

     <br>
    <input type="submit" value="Guardar" class="btn btn-success">
    <a class="btn btn-primary" href="{{ url('producto/') }}">Volver</a>
    </div>

</form>
