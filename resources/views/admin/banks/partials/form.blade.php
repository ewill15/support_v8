<div class="row">
    <div class="col-lg-12 mb-20">
        <p>Campos con  (
            <span class="text-danger">*</span>
            ) son obligatorios
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
            <div class="form-group row {{ $errors->has('city') ? 'has-error' : ''}}">
                <label for="city" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.city')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
                <label for="address" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.address')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('phone') ? 'has-error' : ''}}">
                <label for="phone" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.phone')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('observation') ? 'has-error' : ''}}">
                <label for="observation" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.observation')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::textarea('observation', null, ['class' => 'form-control',"placeholder"=>"..."]) !!}
                    {!! $errors->first('observation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>