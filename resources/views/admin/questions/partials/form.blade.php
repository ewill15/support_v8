<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('question') ? 'has-error' : ''}}">
                <label for="question" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.question')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('question', null, ['class' => 'form-control', 'placeholder'=>"Escribe tu pregunta", "required"]) !!}
                    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('answer') ? 'has-error' : ''}}">
                <label for="answer" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.answer')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::textarea('answer', null, ['class' => 'form-control','required', 'placeholder'=>"respuesta..."]) !!}
                    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('section_id') ? 'has-error' : ''}}">
                <label for="section_id" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.section')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('section_id', @$sections, null, ['class' => 'form-control']) !!}
                    {!! $errors->first('section_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>