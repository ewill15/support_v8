<div class="form-group row">
    <h4 class="help-block">Su ubicación en el mapa es importante, mueva el marker a su dirección</h4>
    <div id="mapa" style="height: 400px;"></div>    
</div>

<div class="form-group row">
    <div class="col-lg-12 text-right">
        {!! Form::hidden('lat', null, ['class' => 'form-control', 'id' => 'lat1', 'required']) !!}
        {!! Form::hidden('lng', null, ['class' => 'form-control', 'id' => 'lng1', 'required']) !!}
        {!! $errors->first('lng', '<h4 class="help-block">Su ubicacion en el mapa es importante, mueva el marker a su dirección</h4>') !!}
    </div>                            
</div>