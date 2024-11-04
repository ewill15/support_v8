<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                {{-- participant list --}}
                <div class="col-lg-12">
                    <fieldset>
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" i="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                                        @if (isset($pasanaku))
                                            Evento Final de Pasanaco {{$pasanaku->name}} del {{ $pasanaku->formatted_start_date }} al {{$pasanaku->formatted_end_date}}        
                                        @else
                                            Evento Final de Pasanaco {{$event->pasanaku->name}} del {{ $event->pasanaku->formatted_start_date }} al {{$event->pasanaku->formatted_end_date}}        
                                        @endif
                                    
                                    </a>
                                </li> 
                            </ul>                  
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="form-group row">
                                        @php
                                            $counter = 1;    
                                        @endphp
                                        
                                        @foreach ($participants as $key => $participant_list)
                                            <label class="col-md-2 form-control-label font-weight-bold mr-2 {{$participant_icon[$key]?'text-success':''}}">
                                                {{$counter++}}::
                                                <span class="font-weight-normal">
                                                    {{ $participant_list->user->full_name }}
                                                    
                                                    @if ($participant_icon[$key] )
                                                        <i class="fas fa-hand-holding-usd text-success"></i>    
                                                    @endif
                                                    
                                                    @if ($participant_list->comment)
                                                        <span class="comment-user-pasanaku">
                                                            ({{$participant_list->comment}})
                                                        </span> 
                                                    @endif
                                                </span>
                                            </label>
                                        @endforeach                                    
                                    </div>
                                    @php
                                        $current_week = date("W");
                                    @endphp

                                    @if ($event)
                                    
                                        @if ($current_week >= $pasanaku->week_start_date && $current_week <= $pasanaku->week_end_date)
                                            <div class="form-group row">
                                                <a href="{{Request::root().'/admin/pasanakus/'.$pasanaku->id.'/fee_pasanaku'}}" class="btn btn-purple">
                                                    Fee
                                                </a>
                                            </div>
                                        @endif                                        
                                    @endif
                                        
                                    
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>    
                    </fieldset>
                </div>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                              Datos Evento
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="form-group row">                                
                            <label class="col-md-6 form-control-label font-weight-bold text-center">
                                Pasanaco: {{$event?$event->pasanaku->name : $pasanaku->name}}
                            </label>

                            <label class="col-md-6 form-control-label font-weight-bold">
                                Finaliza: {{$event?$event->pasanaku->formatted_end_date : $pasanaku->formatted_end_date}}
                            </label>
                        </div>
                          {{-- Registrar pago  --}}
                            <div class="form-group row {{ $errors->has('fee') ? 'has-error' : ''}}">
                                <label for="fee" class="col-md-4 form-control-label text-md-right">
                                    Fee (Bs.)
                                </label>    
                                <div class="col-md-2">
                                    @if (!$event)
                                        {!! Form::number('fee', null, ['class' => 'form-control', 'placeholder' => '...','min'=>1]) !!}
                                    @else    
                                        <span> {{$event->fee}} </span>                                    
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="col-md-4 form-control-label text-md-right">
                                    Description
                                </label>    
                                <div class="col-md-2">
                                    @if (!$event)
                                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    @else
                                        <span>{!! $event->description !!}</span>    
                                    @endif
                                    
                                </div>
                            </div>
                            
                            @if ($event)
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 form-control-label text-md-right">
                                        Participante:
                                    </label>
                                    <div class="col-md-2">
                                        {!! Form::select('user_id', $usr_list, null,['class' => 'form-control select2 col-md-10','name'=>'user_id', 'autocomplete' => 'off', 'aria-describedby' => 'users']) !!}
                                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>    
                            @endif
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>    
            </fieldset>
        </div>
    </div>
</legend>