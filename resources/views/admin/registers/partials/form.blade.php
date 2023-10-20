<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                                {{ ucfirst(trans('common.data')) }}
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PERSONALES  --}}                          
                            <div class="form-group row {{ $errors->has('type') ? 'has-error' : ''}}">
                                <label for="type" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.type')) }}
                                </label>    
                                <div class="col-md-4">
                                    {{-- {!! Form::select('type', $type,null, ['class' => 'form-control']) !!} --}}
                                    {!! Form::select('type', $type, null,['class' => 'form-control select2 col-md-10','name'=>'user_id[]', 'autocomplete' => 'off', 'aria-describedby' => 'users']) !!}
                                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>       
                            <div class="form-group row {{ $errors->has('page') ? 'has-error' : ''}}">
                                <label for="page" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.page')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('page', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('page', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                            
                            <div class="form-group row {{ $errors->has('url') ? 'has-error' : ''}}">
                                <label for="url" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ 'URL' }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                                      
                           <div class="form-group row {{ $errors->has('username') ? 'has-error' : ''}}">
                                <label for="username" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.username')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            @if (!Request::is('*/edit'))
                            <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                                <label for="password" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.password')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>    
                            @endif
                            
                            
                             <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.description')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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