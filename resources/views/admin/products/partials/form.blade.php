<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <!-- /.card -->
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-product-data-tab" href="#custom-tabs-three-product-data" role="tab" aria-controls="custom-tabs-three-product-data" aria-selected="true">
                                    {{ ucfirst(trans('common.product_data')) }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" id="custom-tabs-three-attribute-data-tab" href="#custom-tabs-three-attribute-data" role="tab" aria-controls="custom-tabs-three-attribute-data" aria-selected="false">
                                    {{ ucfirst(trans('common.product_attributes')) }}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane my-3 fade show active" id="custom-tabs-three-product-data" role="tabpanel" aria-labelledby="custom-tabs-three-product-data-tab">
                                <div class="form-group row {{ $errors->has('productName') ? 'has-error' : ''}}">
                                    <label for="productName" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ucfirst(trans('common.name_product'))}}
                                    </label>
                                    <div class="col-md-8 required-name">
                                        {!! Form::text('productName', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                        {!! $errors->first('productName', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                                    <label for="description" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ucfirst(trans('common.product_description'))}}
                                    </label>
                                    <div class="col-md-8 required-name">
                                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('size') ? 'has-error' : ''}}">
                                    <label for="size" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ucfirst(trans('common.product_size'))}}
                                    </label>
                                    <div class="col-md-8 required-name">
                                        {!! Form::text('size', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                        {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('serial_control') ? 'has-error' : ''}}">
                                    <label for="serial_control" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ucfirst(trans('common.product_control_serie'))}}
                                    </label>
                                    <div class="col-md-8 required-name">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                {!! Form::radio('serial_control', 0, null,  ['id'=>'radioPrimary1','class' => 'form-control-label i-checks']) !!}
                                                {!! Form::label('radioPrimary1', 'No ', ['class' => 'col-md-2', 'for'=>'radioPrimary1']) !!}
                                                {!! $errors->first('serial_control', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                {!! Form::radio('serial_control', 1, null,  ['id'=>'radioPrimary2','class' => 'form-control-label i-checks']) !!}
                                                {!! Form::label('radioPrimary2', 'Si ', ['class' => 'col-md-2', 'for'=>'radioPrimary2']) !!}
                                                {!! $errors->first('serial_control', '<p class="help-block">:message</p>') !!}
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                @if(isset($var_dr))
                                    <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : ''}}">
                                        <label for="state_id" class='col-md-4 form-control-label text-md-right'>
                                            {{ucfirst(trans('common.state'))}}
                                        </label>
                                        <div class="input-group col-md-8">
                                            {!! Form::select('state_id', $states, null, ['class' => 'form-control wide','required' => 'required']) !!}
                                            {!! $errors->first('state_id', '<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                    </div>
                                @endif
                                {{-- button next --}}
                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary bnext-product-step1" type="button">
                                            {{ ucfirst(trans('common.next')) }}
                                        </button>
                                    </div>                                
                                </div>  
                            </div>
                            <div class="tab-pane my-3 fade" id="custom-tabs-three-attribute-data" role="tabpanel" aria-labelledby="custom-tabs-three-attribute-data-tab">
                                <div class="form-group row {{ $errors->has('category_id') ? 'has-error' : ''}}">
                                    <label for="category_id" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        Categoría:
                                    </label>
                                    <div class="input-group col-md-8 required-name">
                                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style'=>'width: 80%;']) !!}
                                        {!! $errors->first('category_id', '<small class="form-text text-danger">:message</small>') !!}  
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('subcategory_id') ? 'has-error' : ''}}">
                                    <label for="subcategory_id" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ ucfirst(trans('common.subcategory')) }}
                                    </label>
                                    <div class="input-group col-md-8 required-name">
                                        {!! Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control select2', 'style'=>'width: 80%;']) !!}
                                        {!! $errors->first('subcategory_id', '<small class="form-text text-danger">:message</small>') !!}  
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('brand_id') ? 'has-error' : ''}}">
                                    <label for="brand_id" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ ucfirst(trans('common.brand')) }}
                                    </label>
                                    <div class="input-group col-md-8 required-name">
                                        {!! Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style'=>'width: 80%;']) !!}
                                        {!! $errors->first('brand_id', '<small class="form-text text-danger">:message</small>') !!}  
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('prototype_id') ? 'has-error' : ''}}">
                                    <label for="prototype_id" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ ucfirst(trans('common.prototype')) }}
                                    </label>
                                    <div class="input-group col-md-8">
                                        {!! Form::select('prototype_id', $prototypes, null, ['class' => 'form-control select2', 'style'=>'width: 80%;']) !!}
                                        {!! $errors->first('prototype_id', '<small class="form-text text-danger">:message</small>') !!}  
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('origin_id') ? 'has-error' : ''}}">
                                    <label for="origin_id" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ ucfirst(trans('common.origin')) }}
                                    </label>
                                    <div class="input-group col-md-8 required-name">
                                        {!! Form::select('origin_id', $origins, null, ['class' => 'form-control select2', 'style'=>'width: 80%;']) !!}
                                        {!! $errors->first('origin_id', '<small class="form-text text-danger">:message</small>') !!}  
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('type_id') ? 'has-error' : ''}}">
                                    <label for="type_id" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ ucfirst(trans('common.product_type')) }}
                                    </label>
                                    <div class="input-group col-md-8 required-name">
                                        {!! Form::select('type_id', $types, null, ['class' => 'form-control select2', 'style'=>'width: 80%;']) !!}                                        
                                        {!! $errors->first('type_id', '<small class="form-text text-danger">:message</small>') !!}  
                                    </div>
                                </div>
                                {{-- SEND FORM --}}
                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-outline-primary bprev-product-step1">
                                            {{ ucfirst(trans('common.previous')) }}
                                        </button>
                                        
                                            @if (str_contains(Request::url(),'edit'))
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                                    {{ ucfirst(trans('common.update')) }}
                                                </button>
                                            @else
                                            <button type="button" class="btn btn-primary btn-send-form" data-btn="product">
                                                {{ ucfirst(trans('common.create')) }}    
                                            </button>
                                            @endif
                                        
                                        <a href="{{ URL::previous() }}" class="btn btn-inverse">{{ ucfirst(trans('common.cancel')) }}</a>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </fieldset>
        </div>
    </div>
</legend>