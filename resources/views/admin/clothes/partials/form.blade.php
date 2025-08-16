<div class="row">
    <div class="col-lg-12 mb-20">
        <p>Campos con  (
            <span class="text-danger">*</span>
            ) son obligatorios
        </p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('date_sale') ? 'has-error' : ''}}">
                <label for="date_sale" class="col-md-4 form-control-label text-md-right">
                    {{ ucfirst(trans('validation.attributes.date')) }}
                </label>    
                <div class="col-md-4 required-name">
                    <div class="input-group date" id="date_sale" data-target-input="nearest">
                        {!! Form::text('date_sale', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#date_sale']) !!}
                        {!! $errors->first('date_sale', '<p class="help-block">:message</p>') !!}
                        <div class="input-group-append" data-target="#date_sale" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="description" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.description')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::textarea('description', null, ['class' => 'form-control','required', 'placeholder'=>"","required","rows"=>3]) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('quantity') ? 'has-error' : ''}}">
                <label for="quantity" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.quantity')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('quantity', null, ['id' => 'quantity','class' => 'form-control',"placeholder"=>"1","required","min"=>1,]) !!}
                    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('price') ? 'has-error' : ''}}">
                <label for="price" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.price')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('price', null, ['id' => 'price','class' => 'form-control',"placeholder"=>"0","required","min"=>0,"step"=>0.1,"max"=>999.9]) !!}
                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('type') ? 'has-error' : ''}}">
                <label for="type" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.type')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('type', [1=>'Ingreso',0=>'Gasto'], null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('pay_type') ? 'has-error' : ''}}">
                <label for="pay_type" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.pay_type')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('pay_type', [1=>'Efectivo',0=>'QR',2=>'transferencia',3=>'deposito'], null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('pay_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>

@section('js')
<script>
    $(document).ready(function () {
        function updateTotal() {
            let quantity = parseFloat($('#quantity').val()) || 0;
            let price = parseFloat($('#price').val()) || 0;
            let total = quantity * price;
            $('#total').val(total.toFixed(2));
        }

        // Al cambiar los valores
        $('#quantity, #price').on('input', updateTotal);

        // Al cargar la página (modo edición)
        updateTotal();
    });
</script>
@endsection