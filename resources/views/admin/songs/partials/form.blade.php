<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
                <label for="title" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.title')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('title', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('author') ? 'has-error' : ''}}">
                <label for="author" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.author')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('author', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('author', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('gender') ? 'has-error' : ''}}">
                <label for="gender" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.gender')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('gender', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('lyrics') ? 'has-error' : ''}}">
                <label for="lyrics" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.lyrics')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::textarea('lyrics', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('lyrics', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>