<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('type') ? 'has-error' : ''}}">
                <label for="type" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.type')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('type', null, ['class' => 'form-control', 'placeholder'=>"Cuenta", "required"]) !!}
                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('page') ? 'has-error' : ''}}">
                <label for="page" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.page')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('page', null, ['class' => 'form-control', 'placeholder'=>"URL", "required"]) !!}
                    {!! $errors->first('page', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('username') ? 'has-error' : ''}}">
                <label for="username" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.username')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder'=>"Nombre de usuario","required"]) !!}
                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                <label for="password" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.password')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('password', null, ['class' => 'form-control','required', 'placeholder'=>"password"]) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('status') ? 'has-error' : ''}}">
                <label for="last_name" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.last_name')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder'=>"Apellido", "required"]) !!}
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
                <label for="date" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.date')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('date', isset($register)?$register->registerDate():null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="email" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.description')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder'=>"description"]) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>                     
        </fieldset>
    </div>
</div>