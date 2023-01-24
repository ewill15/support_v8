<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                     <ul class="nav nav-tabs" id="tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-name-data-tab" data-toggle="pill" href="#custom-tabs-three-name" role="tab" aria-controls="name" aria-selected="true">
                                {{ucfirst(trans('common.tab1_company'))}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-mision-data-tab" href="#custom-tabs-three-mision" role="tab" aria-controls="mision">
                                {{ucfirst(trans('common.tab2_company'))}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-about-data-tab" href="#custom-tabs-three-about" role="tab" aria-controls="about">
                                {{ucfirst(trans('common.tab3_company'))}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-location-data-tab" href="#custom-tabs-three-location" role="tab" aria-controls="location">
                                {{ucfirst(trans('common.tab4_company'))}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-account-data-tab" href="#custom-tabs-three-account" role="tab" aria-controls="account">
                                {{ucfirst(trans('common.tab5_company'))}}
                            </a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="tabContent">
                          {{-- nombre/imagenes --}}
                        <div class="tab-pane fade show active" id="custom-tabs-three-name-data" role="tabpanel" aria-labelledby="custom-tabs-three-name-tab">
                            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ucfirst(trans('common.name'))}}:
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                {{---------- Imagen --}}
                                <div class="form-group row">
                                    {!! Form::label('label_act', ucfirst(trans('common.previewact')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                    <div class="col-md-8">
                                        <img src="{{ @$company?$company->show_picture:'' }}" width="40%" class="img-fluid"/>
                                    </div>
                                </div> 
                                <div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
                                    {!! Form::label('label_insert',  ucfirst(trans('common.image')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                    <div class="col-md-6 fileContainer" >
                                        {!! Form::file('image', ['class' => 'col-md-6', 'id' => 'image','accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                                        {!! $errors->first('image_error', '<p class="help-block">:message</p>') !!}
                                        <span class="btn btn-success width">
                                            <i class="fas fa-images"></i> 
                                            {{ucfirst(trans('common.imageselect'))}}
                                        </span> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('result_preview',  ucfirst(trans('common.preview')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                    <img src="" alt="" id="preview" class="img-fluid">
                                </div>
                                {{------    end imagen ---------}}  
                                </div>
                                <div class="col-md-6">
                                    {{---------- Imagen logo --}}
                                <div class="form-group row">
                                    {!! Form::label('label_act', ucfirst(trans('common.preview_logo')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                    <div class="col-md-8">
                                        <img src="{{ @$company?$company->show_logo:'' }}" width="40%" class="img-fluid"/>
                                    </div>
                                </div> 
                                <div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
                                    {!! Form::label('label_insert',  ucfirst(trans('common.image')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                    <div class="col-md-6 fileContainer">
                                        {!! Form::file('logo', ['class' => 'col-md-6', 'id' => 'logo','accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                                        {!! $errors->first('image_error', '<p class="help-block">:message</p>') !!}
                                        <span class="btn btn-success width">
                                            <i class="fas fa-images"></i> 
                                            {{ucfirst(trans('common.imageselect'))}}
                                        </span> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('result_preview',  ucfirst(trans('common.preview')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                    <img src="" alt="" id="previewLogo" class="img-fluid">
                                </div>
                                {{------    end imagen ---------}}
                                </div>
                            </div>
                            {{-- button next --}}
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary bnext-company-step1">
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>                                
                            </div>   
                        </div>
                        {{-- mision/vision --}}
                        <div class="tab-pane fade show" id="custom-tabs-three-mision-data" role="tabpanel" aria-labelledby="custom-tabs-three-mision-tab">
                            <div class="form-group row {{ $errors->has('mission') ? 'has-error' : ''}}">
                                <label for="mision" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ucfirst(trans('common.mision'))}}:
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::textarea('mission', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('mission', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('vission') ? 'has-error' : ''}}">
                                <label for="vission" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ucfirst(trans('common.vision'))}}:
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::textarea('vission', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('vission', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            {{-- button previous  -  next --}}
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-outline-primary bprev-company-step1">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-left">
                                    <button type="button" class="btn btn-primary bnext-company-step2">
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- nosotros --}}
                        <div class="tab-pane fade show" id="custom-tabs-three-about-data" role="tabpanel" aria-labelledby="custom-tabs-three-about-tab">
                            <div class="form-group row {{ $errors->has('about_us') ? 'has-error' : ''}}">
                                <label for="about_us" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.about_us')) }}:
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::textarea('about_us', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('about_us', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.description_company')) }}
                                </label>
                                <div class="col-md-8">
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            {{-- button previous  -  next --}}
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-outline-primary bprev-company-step2">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-left">
                                    <button type="button" class="btn btn-primary bnext-company-step3">
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>
                            </div>                        
                        </div>
                        {{-- ubicacion --}}
                        <div class="tab-pane fade show" id="custom-tabs-three-location-data" role="tabpanel" aria-labelledby="custom-tabs-three-location-tab">
                            <div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
                                <label for="address" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.address')) }}:
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            @include('admin.partials.map')
                            {{-- button previous  -  next --}}
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-outline-primary bprev-company-step3">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-left">
                                    <button type="button" class="btn btn-primary bnext-company-step4">
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>
                            </div>                           
                        </div>
                        {{-- cuentas --}}
                        <div class="tab-pane fade show" id="custom-tabs-three-account-data" role="tabpanel" aria-labelledby="custom-tabs-three-account-tab">
                            <div class="form-group row {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <label for="phone" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.nro_phone')) }}
                                </label>
                                <div class="col-md-8 required-name input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('cellphone') ? 'has-error' : ''}}">
                                <label for="cellphone" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.nro_mobile')) }}
                                </label>
                                <div class="col-md-8 required-name input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                    </div>
                                    {!! Form::text('cellphone', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('cellphone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                                {!! Form::label('email', ucfirst(trans('common.email')).': ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8 input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('facebook') ? 'has-error' : ''}}">
                                {!! Form::label('facebook', ucfirst(trans('common.fb_company')).': ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8 input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                    </div>
                                    {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('instagram') ? 'has-error' : ''}}">
                                {!! Form::label('instagram', ucfirst(trans('common.in_company')).': ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8 input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('instagram', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('whatsapp') ? 'has-error' : ''}}">
                                {!! Form::label('whatsapp', ucfirst(trans('common.ws_company')).': ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8 input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                    </div>
                                    {!! Form::text('whatsapp', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('whatsapp', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            {{-- SEND FORM --}}
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-primary bprev-company-step4">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                        {{ ucfirst(trans('common.edit')) }}
                                    </button>
                                    <a href="{{ URL::previous() }}" class="btn btn-inverse">{{ ucfirst(trans('common.cancel')) }}</a>
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
