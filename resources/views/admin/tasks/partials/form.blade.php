<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
                <label for="date" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.date')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('date', null, ['class' => 'form-control date', "required", "readonly"]) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="description" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.description')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::textarea('description', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('price') ? 'has-error' : ''}}">
                <label for="price" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.price')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::number('price', null, ['class' => 'form-control', "required", "min"=>0, "max"=>999]) !!}
                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('machine_id') ? 'has-error' : ''}}">
                <label for="machine_id" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.machine')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::select('machine_id', @$machine_list, null, ['class' => 'form-control']) !!}
                    {!! $errors->first('machine_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>