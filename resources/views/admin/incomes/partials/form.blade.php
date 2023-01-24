<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-income-data-tab" href="#custom-tabs-three-income-data" role="tab" aria-controls="custom-tabs-three-income-data">
                                {{ ucfirst(trans('common.tabs1_income')) }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-product-data-tab" href="#custom-tabs-three-product-data" role="tab" aria-controls="custom-tabs-three-product-data">
                                {{ ucfirst(trans('common.tabs2_income')) }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-observation-data-tab" href="#custom-tabs-three-observation-data" role="tab" aria-controls="custom-tabs-three-observation-data">
                                {{ ucfirst(trans('common.tabs3_income')) }}
                            </a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                        {{-- DATOS Ingreso  --}}
                        <div class="tab-pane fade show active" id="custom-tabs-three-income-data" role="tabpanel" aria-labelledby="custom-tabs-three-income-tab">
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                    <tr>
                                        <div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
                                            <label for="date" class="col-md-4 form-control-label text-md-right">
                                                <span class="text-danger">*</span>
                                                {{ ucfirst(trans('common.dateform')) }}
                                            </label>
                                            <div class="col-md-8 required-name">
                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                    {!! Form::text('date', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#reservationdate']) !!}
                                                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>  
                                    </tr>
                                    <tr>
                                        <div class="form-group row {{ $errors->has('currency_id') ? 'has-error' : ''}}">
                                            {!! Form::label('currency_id', ucfirst(trans('common.type_currency')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                            <div class="input-group col-md-8">
                                                {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control wide']) !!}
                                                {!! $errors->first('currency_id', '<small class="form-text text-danger">:message</small>') !!}
                                            </div>
                                        </div>
                                    </tr>
                                    
                                    </table>
                                </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->                      
                            <div class="form-group row {{ $errors->has('code_voucher') ? 'has-error' : ''}}">
                                <label for="code_voucher" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.code_voucher')) }}: 
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::text('code_voucher', null, ['class' => 'form-control ', 'placeholder' => '...']) !!}
                                    {!! $errors->first('code_voucher', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('voucher_id') ? 'has-error' : ''}}">
                                {!! Form::label('voucher_id', ucfirst(trans('common.type_voucher')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                
                                <div class="input-group col-md-8">
                                    {!! Form::select('voucher_id', $vouchers, null, ['class' => 'form-control wide select2']) !!}
                                    {!! $errors->first('voucher_id', '<small class="form-text text-danger">:message</small>') !!}
                                </div>
                            </div>
                            
                            <div class="form-group row {{ $errors->has('provider') ? 'has-error' : ''}}">
                                {!! Form::label('provider', ucfirst(trans('common.provider')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                
                                <div class="input-group col-md-8">
                                    {!! Form::select('provider_id', $providers, null, ['class' => 'form-control select2', 'style'=>'width: 100%;']) !!}
                                    {!! $errors->first('provider_id', '<small class="form-text text-danger">:message</small>') !!}
                                </div>
                            </div>
                            {{-- button next --}}
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary bnext-income-step1">
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>                                
                            </div>                          
                        </div>
                        {{-- DATOS producto detalle  --}}
                        <div class="tab-pane fade show" id="custom-tabs-three-product-data" role="tabpanel" aria-labelledby="custom-tabs-three-product-tab">
                            <div class="row invoice-info">
                                <div class="col-sm-3 invoice-col">
                                    <h5>{{ucfirst(trans('common.title1'))}}</h5>
                                    <div class="container-fluid">
                                        <label for="brand_id" class="col form-control-label">
                                            <span class="text-danger">*</span>
                                            {{ ucfirst(trans('common.brand')) }}: 
                                        </label>
                                        <div class="col required-name">
                                            {!! Form::select('brand_id', [''=>'Seleccionar...' ,$brands], null, ['id'=>'brand_id','class' => 'form-control select2', 'style'=>'width: 100%;','required']) !!}
                                            {!! $errors->first('brand_id', '<small class="form-text text-danger">:message</small>') !!}
                                        </div>                                        
                                    </div>
                                    <div class="container-fluid pt-3">
                                        <label for="prototype_id" class="col form-control-label">
                                            <span class="text-danger">*</span>
                                            {{ ucfirst(trans('common.prototype')) }}: 
                                        </label>                                        
                                        <div class="col required-name">
                                            {!! Form::select('prototype_id', $prototypes, null, ['id'=>'prototype_id','class' => 'form-control select2', 'style'=>'width: 100%;', 'disabled'=>'disabled']) !!}
                                            {!! $errors->first('prototype_id', '<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div id="img-product" class="container-fluid pt-3" style="display: none">
                                        <input type="hidden" name="aproduct_id" id="aproduct_id"/>
                                        <input type="hidden" name="aproduct" id="aproduct"/>
                                        <img src="" alt="" class="img-fluid img-product-thumb">
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    <h5>{{ucfirst(trans('common.title2'))}}</h5>
                                    <div class="form-group row {{ $errors->has('quantity') ? 'has-error' : ''}}">
                                        <label for="quantity" class="col-md-4 form-control-label text-md-right">
                                            <span class="text-danger">*</span>
                                            {{ ucfirst(trans('common.quantity')) }}: 
                                        </label>
                                        <div class="col-md-8 required-name">
                                            {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => '...','min'=>1, 'pattern' => '^[0-9]+(.[0-9]+)?$','autocomplete'=>'off']) !!}
                                            {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('purchasePrice') ? 'has-error' : ''}}">
                                        <label for="purchasePrice" class="col-md-4 form-control-label text-md-right">
                                            <span class="text-danger">*</span>
                                            {{ ucfirst(trans('common.purchasePrice')) }}: 
                                        </label>
                                        <div class="col-md-8 required-name">
                                            {!! Form::number('purchasePrice', null, ['class' => 'form-control', 'placeholder' => '...','min'=>0.1, 'pattern' => '^[0-9]+(.[0-9]+)?$','autocomplete'=>'off']) !!}
                                            {!! $errors->first('purchasePrice', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('higherPrice') ? 'has-error' : ''}}">
                                        <label for="higherPrice" class="col-md-4 form-control-label text-md-right">
                                            {{ ucfirst(trans('common.higherPrice')) }}: 
                                        </label>
                                        <div class="col-md-8 required-name">
                                            {!! Form::number('higherPrice', null, ['class' => 'form-control', 'placeholder' => '...','min'=>0.1, 'pattern' => '^[0-9]+(.[0-9]+)?$','autocomplete'=>'off']) !!}
                                            {!! $errors->first('higherPrice', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('detailPrice') ? 'has-error' : ''}}">
                                        <label for="detailPrice" class="col-md-4 form-control-label text-md-right">
                                            {{ ucfirst(trans('common.detailPrice')) }}:
                                        </label>
                                        <div class="col-md-8 required-name">
                                            {!! Form::number('detailPrice', null, ['class' => 'form-control', 'placeholder' => '...','min'=>0.1, 'pattern' => '^[0-9]+(.[0-9]+)?$','autocomplete'=>'off']) !!}
                                            {!! $errors->first('detailPrice', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 invoice-col">
                                  <h5>Selecciona ubicación</h5>
                                  <div class="container-fluid">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-on-text="Almacen" data-off-text="Sucursal" data-off-color="info" data-on-color="success">
                                  </div>
                                  <div class="container-fluid mt-3 warehouse-option">
                                    {!! Form::label('warehouse', ucfirst(trans('common.warehouse')).': ', ['class' => 'form-control-label']) !!}  
                                    {!! Form::select('warehouse_id', $warehouses, null, ['class' => 'form-control select2 warehouse', 'style'=>'width: 100%;']) !!}
                                    {!! $errors->first('warehouse_id', '<small class="form-text text-danger">:message</small>') !!}
                                    </div>
                                    <div class="container-fluid mt-3 sucursal-option">
                                        {!! Form::label('sucursal', ucfirst(trans('common.sucursal')).': ', ['class' => 'form-control-label']) !!}  
                                        {!! Form::select('warehouse_id', $sucursals, null, ['class' => 'form-control select2 sucursal', 'style'=>'width: 100%;']) !!}
                                        {!! $errors->first('warehouse_id', '<small class="form-text text-danger">:message</small>') !!}
                                    </div>
                                    <div class="container-fluid pt-3">
                                        <button class="btn btn-sm btn-primary btn-add-item" type="button">
                                            <i class="fas fa-link mr-1"></i>
                                            {{ ucfirst(trans('common.add')) }}
                                        </button>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- Table row -->
                            <div class="row mt-4">
                                <div class="col-12 table-responsive">
                                    <table class="table table-bordered table-striped dataTable dtr-inline tg">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center align-middle w-35">
                                                    {{ucfirst(trans('common.product'))}}
                                                </th>
                                                <th rowspan="2" class="text-center align-middle">
                                                    {{ucfirst(trans('common.quantity'))}}
                                                </th>
                                                <th colspan="3" class="text-center">
                                                    {{ucfirst(trans('common.prices'))}}
                                                </th>
                                                <th rowspan="2" class="text-center align-middle w-15">
                                                    {{ucfirst(trans('common.warehouse'))}}
                                                </th>
                                                <th rowspan="2" class="text-center align-middle">
                                                    {{ucfirst(trans('common.total'))}}
                                                </th>
                                                <th rowspan="2" class="text-center align-middle">
                                                    {{ucfirst(trans('common.acction'))}}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="text-center align-middle w-5">
                                                    {{ucfirst(trans('common.purchase_price'))}}
                                                </th>
                                                <th class="text-center align-top w-5">
                                                    {{ucfirst(trans('common.higher_price'))}}
                                                </th>
                                                <th class="text-center align-top w-5">
                                                    {{ucfirst(trans('common.detail_price'))}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl-add-item">
                                            @php
                                                $detail_total_array = [];
                                            @endphp
                                            @if (isset($income_details))                                                
                                                @foreach (@$income_details as $item)
                                                @php
                                                    array_push($detail_total_array,($item->quantity * number_format($item->purchasePrice,2)));
                                                @endphp
                                                <tr>
                                                    <td class='align-middle'>
                                                        <input type='hidden' name='product_id[]' value='{!! $item->product_id !!}'>
                                                        <div>
                                                            {!! $item->product->brand->name_brand.' '.$item->product->prototype->name_prototype !!}
                                                        </div>                                                        
                                                        <div>
                                                            {!! $item->product->category->name_category.', '.$item->product->subcategory->name_subcategory.', '.$item->product->productName !!}
                                                        </div>                                                        
                                                    </td>
                                                    <td class='text-center align-middle'>
                                                        <input type='hidden' name='quantity[]' value='{!! $item->quantity !!}'>
                                                        {!! $item->quantity !!}
                                                    </td>
                                                    <td class='text-center align-middle'>
                                                        <input type='hidden' name='purchasePrice[]' value='{!! $item->purchasePrice !!}'>
                                                        {!! number_format(floatval($item->purchasePrice),2,'.',',') !!}
                                                    </td>
                                                    <td class='text-center align-middle'>
                                                        <input type='hidden' name='higherPrice[]' value='{!! $item->higherPrice!!}'>
                                                        {!! number_format(floatval($item->higherPrice),2,'.',',')!!}
                                                    </td>
                                                    <td class='text-center align-middle'>
                                                        <input type='hidden' name='detailPrice[]' value='{!! $item->detailPrice !!}'>
                                                        {!! number_format(floatval($item->detailPrice),2,'.',',') !!}
                                                    </td>
                                                    <td class='align-middle'>
                                                        <input type='hidden' name='warehouse_id[]' value='{!! $item->warehouse_id !!}'>
                                                        {!! $item->warehouse->warehouseName!!}
                                                    </td>
                                                    <td class='text-center align-middle product_total'>
                                                        {!! number_format(floatval($item->quantity * number_format($item->purchasePrice,2)),2,'.',',') !!}
                                                    </td>
                                                    <td class='align-middle'>
                                                        <a class='badge bg-danger btn-delete'>
                                                            Remover
                                                        </a>
                                                    </td>
                                                </tr>                                              
                                                @endforeach
                                            @endif                                       
                                            
                                        </tbody>                                        
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6"></div>
                                <!-- /.col -->
                                <div class="col-6">
                                  <p class="lead">{{ ucfirst(trans('common.total')) }}</p>
                
                                  <div class="table-responsive">
                                    <table class="table">
                                      <tr>
                                        <th class="w-50 text-right">{{ ucfirst(trans('common.subtotal')) }}</th>
                                        <td id='subtotal'>
                                            {{ number_format(floatval(array_sum($detail_total_array)),2,'.',',') }}
                                        </td>
                                        <input type="hidden" name="subtotal" id="subtotal" value="{{array_sum($detail_total_array)}}"/>
                                      </tr>
                                      <tr>
                                        <th class="text-right">{{ ucfirst(trans('common.discount')) }}</th>
                                        <td id='discount'>
                                            {!! Form::number('idiscount', null, ['id'=>'idiscount', 'class' => 'form-control', 'placeholder' => '...','min'=>0.1, 'step'=>'0.1','pattern' => '^[0-9]+(.[0-9]+)?$','autocomplete'=>'off']) !!}
                                            {!! $errors->first('idiscount', '<p class="help-block">:message</p>') !!}
                                        </td>
                                      </tr>
                                      <tr>
                                        <th class="text-right">{{ ucfirst(trans('common.total')) }}</th>
                                        <td id='totaltext'>
                                            {{ number_format(floatval(array_sum($detail_total_array)),2,'.',',')}}
                                        </td>
                                        <input type="hidden" name="total" id="total" value="{{array_sum($detail_total_array)}}"/>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->


                            <div id="listas">
                            </div> 
                            {{-- button previous  -  next --}}
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-outline-primary bprev-income-step1">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-left">
                                    <button type="button" class="btn btn-primary bnext-income-step2" {{!@$income_details ? 'disabled':''}}>
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>
                            </div>                         
                        </div>
                        {{-- DATOS producto --}}
                        <div class="tab-pane fade show" id="custom-tabs-three-observation-data" role="tabpanel" aria-labelledby="custom-tabs-three-observation-tab">
                            
                            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                                {!! Form::label('description', ucfirst(trans('common.observation')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8">
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            {{-- SEND FORM --}}
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-primary bprev-income-step2">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                    @if(@$var2)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                        {{ ucfirst(trans('common.edit')) }}
                                    </button>
                                    @include('admin.incomes.partials.modal-edit')
                                    @else
                                    <button type="button" class="btn btn-primary btn-send-form" data-btn="income">
                                        {{ ucfirst(trans('common.create')) }} 
                                    </button>     
                                    @endif
                                    <a href="{{ URL::previous() }}" class="btn btn-default">{{ ucfirst(trans('common.cancel')) }}</a>
                                </div>   
                            </div>
                        </div>
                        
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                
            </fieldset>
        </div>
    </div>
    
</legend>