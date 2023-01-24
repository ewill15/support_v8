<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                              Datos Personales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-personal-data-tab" href="#custom-tabs-three-personal-data" role="tab" aria-controls="custom-tabs-three-personal-data" aria-selected="false">
                                Datos Usuario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-permission-data-tab" href="#custom-tabs-three-permission-data" role="tab" aria-controls="custom-tabs-three-permission" aria-selected="false">
                                Permisos
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PERSONALES  --}}
                        <div class="tab-pane fade show active" id="custom-tabs-three-user-data" role="tabpanel" aria-labelledby="custom-tabs-three-user-data-tab">
                            <div class="form-group row {{ $errors->has('name_lastname') ? 'has-error' : ''}}">
                                <label for="name_lastname" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Nombre y Apellido:
                                </label>    
                                <div class="col-md-8 required-name">
                                    {!! Form::text('name_lastname', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('name_lastname', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>      
                            <div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
                                <label for="address" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Dirección:
                                </label>    
                                <div class="col-md-8 required-name">
                                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                      
                            <div class="form-group row {{ $errors->has('mobile') ? 'has-error' : ''}}">
                                <label for="mobile" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Nro. Celular:
                                </label>    
                                <div class="col-md-8 required-name">
                                    {!! Form::number('mobile', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('phone') ? 'has-error' : ''}}">
                                <label for="mobile" class="col-md-4 form-control-label text-md-right">
                                    Teléfono Fijo:
                                </label>
                                <div class="col-md-8">
                                    {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('dni') ? 'has-error' : ''}}">
                                <label for="dni" class="col-md-4 form-control-label text-md-right">
                                    DNI:
                                </label>
                                <div class="col-md-8">
                                    {!! Form::text('dni', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            {{-- button next --}}
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary bnext-personal-step1">
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>                                
                            </div>
                        </div>
                        {{-- DATOS USUARIO --}}
                        <div class="tab-pane fade" id="custom-tabs-three-personal-data" role="tabpanel" aria-labelledby="custom-tabs-three-personal-data-tab">
                                                        
                            <div class="form-group row">
                                {!! Form::label('preview_img', 'Imagen Actual: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8">
                                    <img src="{{@$personal->image_path}}" alt="" id="preview_img" class="imagePreview img-fluid">
                                </div>
                            </div>
                
                            <div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
                                {!! Form::label('image', 'Imagen: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8 fileContainer" style="padding-bottom: 4%;">
                                    {!! Form::file('image', ['class' => 'form-control', 'id' => 'image','accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                                    <span class="btn btn-success w-300">
                                        <i class="fas fa-images"></i> 
                                        Seleccionar Imagen
                                    </span> 
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('image', 'Vista Previa: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <img src="" alt="" id="preview" class="img-fluid">
                            </div>


                            <div class="form-group row {{ $errors->has('username') ? 'has-error' : ''}}">
                                <label for="username" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Nombre de usuario:
                                </label>    
                                <div class="col-md-8 required-name">
                                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            @if (!@$personal->email)
                                <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                                    <label for="username" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        Correo Electrónico:
                                    </label>    
                                    <div class="col-md-8 required-name">
                                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label for="password" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        Contraseña:
                                    </label>    
                                    <div class="col-md-8 required-name">
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            @endif
                            
                            {{-- button previous  -  next --}}
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-outline-primary bprev-personal-step2">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-left">
                                    <button type="button" class="btn btn-primary bnext-personal-step2">
                                        {{ ucfirst(trans('common.next')) }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- PERMISOS --}}
                        <div class="tab-pane fade" id="custom-tabs-three-permission-data" role="tabpanel" aria-labelledby="custom-tabs-three-permission-tab">
                            <div class="form-group row">
                                <table class="permission-table">
                                    <thead>
                                      <tr>
                                        <th class="content"></th>                                        
                                        @foreach ($options as $option)
                                            <th class="option">{{$option}}</th>    
                                        @endforeach                                    
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $idmen=>$menu)
                                            <tr>
                                                <td class="title">{{$menu}}</td>
                                                @if ($menu == 'Datos de la empresa')
                                                    @foreach ($options as $idopt=>$option)
                                                    @php
                                                        $uid = uniqid();
                                                    @endphp
                                                        @if ($idopt < 5)
                                                            <td class="content">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" id="{{$uid}}" name= "menu_{{$idmen}}[]" value="{{$idopt}}">
                                                                    <label for="{{$uid}}">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        @else
                                                            <td class="content"></td>
                                                        @endif
                                                    @endforeach 
                                                @else
                                                    @foreach ($options as $idopt=>$option)  
                                                        @php
                                                            $uid = uniqid();
                                                        @endphp                                              
                                                        <td class="content">
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" id="{{$uid}}" name= "menu_{{$idmen}}[]" value="{{$idopt}}">
                                                                <label for="{{$uid}}">
                                                                </label>
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group row">
                                <p id="table-permission-msg" class="text-danger d-none">Debes seleccionar al menos una opción</p>
                            </div>
                            {{-- SEND FORM --}}
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-primary bprev-personal-step3">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>                                    
                                        @if (str_contains(Request::url(),'edit'))
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                                {{ ucfirst(trans('common.update')) }}
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-primary btn-send-form" data-btn="personal">
                                                {{ ucfirst(trans('common.create')) }}
                                            </button>
                                        @endif                                    
                                    <a href="{{ URL::previous() }}" class="btn btn-inverse">{{ ucfirst(trans('common.cancel')) }}</a>
                                </div>                                
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                
                @if(isset($var_dr))
                    <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : ''}}">
                        <label for="state_id" class="col-md-4 form-control-label text-md-right">
                            Estado:
                        </label>
                        <div class="input-group col-md-8">
                            {!! Form::select('state_id', $states, null, ['class' => 'form-control wide','required' => 'required']) !!}
                            {!! $errors->first('state_id', '<small class="form-text text-danger">:message</small>') !!}
                        </div>
                    </div>
                @endif
    
            </fieldset>
        </div>
    </div>
</legend>