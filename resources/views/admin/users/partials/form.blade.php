<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.name')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>"Nombre", "required"]) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('last_name') ? 'has-error' : ''}}">
                <label for="last_name" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.last_name')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder'=>"Apellido", "required"]) !!}
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('username') ? 'has-error' : ''}}">
                <label for="username" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.username')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder'=>"Nombre de usuario", "required"]) !!}
                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.email')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::email('email', null, ['class' => 'form-control','required', 'placeholder'=>"Email","required"]) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @if (!isset($items))
                <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                    <label for="password" class="col-md-4 form-control-label text-right">
                        <span class="text-danger">*</span>
                        {{ ucfirst(trans('validation.attributes.password')).':' }}
                    </label>
                    <div class="col-md-7">
                        @if(isset($items))
                            <input type="hidden" name="password" value={{$items->password}}>
                        @else
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>"Password",'required']) !!}
                        @endif
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif                     
        </fieldset>
    </div>
</div>