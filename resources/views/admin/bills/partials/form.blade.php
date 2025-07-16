<div class="row">
    <div class="col-lg-12 mb-20">
        <p>Campos con  (
            <span class="text-danger">*</span>
            ) son obligatorios
        </p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
                <label for="date" class="col-md-4 form-control-label text-md-right">
                    {{ ucfirst(trans('validation.attributes.date')) }}
                </label>    
                <div class="col-md-4 required-name">
                    <div class="input-group date" id="date" data-target-input="nearest">
                        {!! Form::text('date', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#date']) !!}
                        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                        <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row {{ $errors->has('control_code') ? 'has-error' : ''}}">
                <label for="control_code" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.control_code')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('control_code', null, ['class' => 'form-control', 'maxlength'=>"14"]) !!}
                    {!! $errors->first('control_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('invoice_number') ? 'has-error' : ''}}">
                <label for="invoice_number" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.invoice_number')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('invoice_number', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('invoice_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="description" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.description')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::textarea('description', null, ['class' => 'form-control','required', 'placeholder'=>"Description...","required"]) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('price') ? 'has-error' : ''}}">
                <label for="price" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.price')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('price', null, ['class' => 'form-control',"placeholder"=>"0","required","min"=>0,"step"=>0.1]) !!}
                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('company_id') ? 'has-error' : ''}}">
                <label for="price" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.company')).':' }}
                </label>
                <div class="col-md-7">                    
                    {!! Form::select('company_id', @$companies, null, ['class' => 'form-control','required' => 'required']) !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>
<!-- 123-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
<script>
    var path = "{{ route('autocomplete') }}";
    
    $('input.typeahead').typeahead({

        source: function(query, process){

            return $.get(path, {query:query}, function(data){

                return process(data);

            });

        }

    });
</script>