<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                                {{ ucfirst(trans('validation.common.datas')) }}
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PAGOS --}}
                            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('validation.attributes.service')) }}
                                </label>
                                <div class="col-md-3">
                                    {!! Form::select('name', $list_services,null, ['class' => 'form-control', "required"]) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('year') ? 'has-error' : ''}}">
                                <label for="year" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('validation.attributes.year')) }}
                                </label>
                                <div class="col-md-3">
                                    {!! Form::number('year', date('Y'), ['class' => 'form-control', "required",'min'=>'2020','max'=>date('Y')]) !!}
                                    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('month') ? 'has-error' : ''}}">
                                <label for="month" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('validation.attributes.month')) }}
                                </label>
                                <div class="col-md-3">
                                    {!! Form::select('month', $months,null, ['class' => 'form-control', "required"]) !!}
                                    {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('short_name') ? 'has-error' : ''}}">
                                <label for="short_name" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('validation.attributes.amount')) }}
                                </label>
                                <div class="col-md-3">
                                    {!! Form::text('amount', null, ['class' => 'form-control', "required"]) !!}
                                    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
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