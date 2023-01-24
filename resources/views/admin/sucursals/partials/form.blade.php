<legend>
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <fieldset>
                <div class="form-group row {{ $errors->has('name_sucursal') ? 'has-error' : ''}}">
                    {!! Form::label('name_sucursal', ucfirst(trans('common.name_sucursal')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::text('warehouseName', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('warehouseName', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
                    {!! Form::label('address', ucfirst(trans('common.address')).': ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                    {!! Form::label('description', ucfirst(trans('common.description_sucursal')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                @if(isset($var_dr))
                    <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : ''}}">
                        {!! Form::label('description', ucfirst(trans('common.state_sucursal')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                        <div class="input-group col-md-8">
                            {!! Form::select('state_id', $states, null, ['class' => 'form-control wide','required' => 'required']) !!}
                            {!! $errors->first('state_id', '<small class="form-text text-danger">:message</small>') !!}
                        </div>
                    </div>
                @endif
                @include('admin.partials.map')
            </fieldset>
        </div>
    </div>
</legend>