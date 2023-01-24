<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <!-- /.card -->
                <input type="hidden" name="product_id" value = {{ $product->id }}>
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
                    <div class="col-md-8">
                        <hr>
                        <img src="" alt="" id="preview" class="img-fluid prev-img">
                    </div>                    
                </div>
                <!-- /.card -->
            </fieldset>
        </div>
    </div>
</legend>
