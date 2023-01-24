<div class="form-group row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <h6 class="help-block">Su ubicación en el mapa es importante, mueva el marker a su dirección</h6>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div id="mapa" style="height: 400px;width:600px"></div>
    </div>    
</div>

<div class="form-group row">
    <div class="col-lg-12 text-right">
        {!! Form::hidden('lat', null, ['class' => 'form-control', 'id' => 'lat1', 'required']) !!}
        {!! Form::hidden('lng', null, ['class' => 'form-control', 'id' => 'lng1', 'required']) !!}
        {!! $errors->first('lng', '<h4 class="help-block">Su ubicacion en el mapa es importante, mueva el marker a su dirección</h4>') !!}
    </div>                            
</div>