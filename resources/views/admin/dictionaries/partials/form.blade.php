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
                            <div class="form-group row {{ $errors->has('word') ? 'has-error' : ''}}">
                                <label for="word" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.word')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('word', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('word', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                  
                            <div class="form-group row {{ $errors->has('pronuntiation') ? 'has-error' : ''}}">
                                <label for="pronuntiation" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.pronuntiation')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('pronuntiation', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                                      
                            <div class="form-group row {{ $errors->has('meaning') ? 'has-error' : ''}}">
                                <label for="meaning" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.meaning')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('meaning', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('meaning', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('example') ? 'has-error' : ''}}">
                                <label for="example" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.example')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::text('example', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('example', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('language_id') ? 'has-error' : ''}}">
                                <label for="language_id" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.language')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::select('language_id', $list_langs,null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
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