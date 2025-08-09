<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{{ucfirst(trans('common.field'))}}  (
            <span class="text-danger">*</span>
            ) {{ucfirst(trans('common.required'))}}
        </p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.name')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('name', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
                <label for="address" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.address')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('address', null, ['class' => 'form-control', 'maxlength'=>"14"]) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('type') ? 'has-error' : ''}}">
                <label for="type" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.type')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('type', ['casa matriz'=>'Casa Matriz','sucursal'=>'Sucursal'],null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('nit') ? 'has-error' : ''}}">
                <label for="nit" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.nit')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('nit', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('nit', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('phone') ? 'has-error' : ''}}">
                <label for="phone" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.phone')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('phone', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('area') ? 'has-error' : ''}}">
                <label for="area" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.area')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('area', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('area', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>