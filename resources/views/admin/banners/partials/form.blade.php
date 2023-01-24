<legend>
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <fieldset>
                {{---------- Imagen --}}
                <div class="form-group row">
                    {!! Form::label('label_act', ucfirst(trans('common.previewact')), ['class' => 'col-md-4
                    form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        <img src="{{ @$banner?$banner->getImagePathAttribute():'' }}" width="40%" class="img-fluid" />
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
                    {!! Form::label('label_insert', ucfirst(trans('common.image')), ['class' => 'col-md-4
                    form-control-label text-md-right']) !!}
                    <div class="col-md-6 fileContainer">
                        {!! Form::file('image', ['class' => 'col-md-6', 'id' =>
                        'image','accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                        {!! $errors->first('image_error', '<p class="help-block">:message</p>') !!}
                        <span class="btn btn-success width">
                            <i class="fas fa-images"></i>
                            {{ucfirst(trans('common.imageselect'))}}
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('result_preview', ucfirst(trans('common.preview')), ['class' => 'col-md-4
                    form-control-label text-md-right']) !!}
                    <img src="" alt="" id="preview" class="img-fluid prev-img">
                </div>
                {{------ end imagen ---------}}
                <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                    {!! Form::label('description', ucfirst(trans('common.description_banner')), ['class' => 'col-md-4
                    form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...',
                        'required']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                @if(isset($var_dr))
                <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : ''}}">
                    {!! Form::label('description', ucfirst(trans('common.state_banner')), ['class' => 'col-md-4
                    form-control-label text-md-right']) !!}
                    <div class="input-group col-md-8">
                        {!! Form::select('state_id', $states, null, ['class' => 'form-control wide','required' =>
                        'required']) !!}
                        {!! $errors->first('state_id', '<small class="form-text text-danger">:message</small>') !!}
                    </div>
                </div>
                @endif

            </fieldset>
        </div>
    </div>
</legend>