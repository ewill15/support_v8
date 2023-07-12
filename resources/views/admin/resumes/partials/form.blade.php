<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="first_name" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.name')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder'=>"Nombre", "required"]) !!}
                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
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
            <div class="form-group row {{ $errors->has('facebook_url') ? 'has-error' : ''}}">
                <label for="facebook_url" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.facebook_url')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('facebook_url', null, ['class' => 'form-control','required', 'placeholder'=>"","required"]) !!}
                    {!! $errors->first('facebook_url', '<p class="help-block">:message</p>') !!}
                </div>
            </div> 
            <div class="form-group row {{ $errors->has('instagram_url') ? 'has-error' : ''}}">
                <label for="instagram_url" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.instagram_url')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('instagram_url', null, ['class' => 'form-control','required', 'placeholder'=>"","required"]) !!}
                    {!! $errors->first('instagram_url', '<p class="help-block">:message</p>') !!}
                </div>
            </div> 
            <div class="form-group row {{ $errors->has('linkedin_url') ? 'has-error' : ''}}">
                <label for="linkedin_url" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.linkedin_url')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('linkedin_url', null, ['class' => 'form-control','required', 'placeholder'=>"","required"]) !!}
                    {!! $errors->first('linkedin_url', '<p class="help-block">:message</p>') !!}
                </div>
            </div>               
        </fieldset>
    </div>
</div>