<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                {{-- participant list --}}
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" i="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                            Cuotas en {{$pasanaku->name}}
                            </a>
                        </li>
                    </ul>                  
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="form-group row"> 
                                @foreach ($types as $key=>$legend_type)                                    
                                    <label class="col-md-4 form-control-label">
                                        <span class="legend-color bg-{{str_contains($legend_type->color, 'bg-')?explode('bg-',$legend_type->color)[1]:''}}"></span>
                                        <span class="{{!str_contains($legend_type->color, 'bg-')?$legend_type->color.' font-weight-normal':''}}">{{$legend_type->name}}</span>
                                    </label>
                                @endforeach 
                            </div>

                            <div class="form-group row">
                                @foreach ($participants as $key=>$participant_list)
                                    <label class="col-md-2 form-control-label font-weight-bold mr-2 {{(strlen($participant_color[$key][$participant_list->id])>2) || ($participant->turn==($key+1))?$participant_color[$key][$participant_list->id]:''}}" title="{{$participant_list->formatted_delivery}}">
                                        {{++$key}}::
                                        <span class="font-weight-normal {{$key++ == $participant->turn?'participant-bold':''}}">
                                            {{ $participant_list->user->full_name }}
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
                            @if (($pasanaku->week_final - $current_week) < 3 )
                                <a href="{{Request::root().'/admin/pasanakus/'.$pasanaku->id.'/final_event'}}" class="btn btn-purple">
                                    {{ ucfirst(trans('common.final_event')) }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card -->
                </div>    
                {{-- register fee --}}
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                              Registrar cuota en {{$pasanaku->name}}
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="form-group row">                                
                            <label class="col-md-3 form-control-label font-weight-bold">
                                Entrega en fecha: {{$pasanaku->formatted_next_date}}
                            </label>

                            <label class="col-md-3 form-control-label font-weight-bold">
                                Participante: {{$participant->turn}} >>{{$participant->user->full_name}}
                                @if ($participant->comment  )
                                    <span class="comment-user-pasanaku">
                                        ({{$participant->comment}})
                                    </span>     
                                @endif
                                
                            </label>

                            <label class="col-md-3 form-control-label font-weight-bold">
                                <span>Cuotas Registradas: {{$total_registered}}</span>         
                            </label>
                            <label class="col-md-3 form-control-label font-weight-bold">
                                <span title="sdfsfdsf">Cuotas Restantes: {{$pasanaku->participant_total - $total_registered}}</span>                                
                            </label>
                        </div>
                          {{-- DATOS PASANAKU  --}}
                            <div class="form-group row">                                
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    Pasanaku:
                                </label>    
                                <div class="col-md-2">
                                    {!! Form::hidden('pasanaku_id', $pasanaku->id, ['class' => 'form-control']) !!}
                                    {!! Form::text('name', $pasanaku->name, ['class' => 'form-control','disabled'=>'disabled']) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>   
                            </div>

                            <div class="form-group row">                                
                                <label for="round" class="col-md-4 form-control-label text-md-right">
                                    Ronda:
                                </label>    
                                <div class="col-md-2">
                                    {!! Form::number('round', $participant->turn, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                    {!! Form::hidden('round', $participant->turn, ['class' => 'form-control']) !!}
                                    {!! $errors->first('round', '<p class="help-block">:message</p>') !!}
                                </div>   
                            </div>
                            <div class="form-group row">                                
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    Fecha:
                                </label>    
                                <div class="col-md-2">                                    
                                    {{date('d-m-Y')}}
                                </div>   
                            </div>
                            <div class="form-group row">                                
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    Monto (Bs.):
                                </label>    
                                <div class="col-md-2">                                    
                                    {{$pasanaku->amount_total}}
                                </div>   
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    Participante:
                                </label>
                                <div class="col-md-2">
                                    {!! Form::select('user_id', $usr_list, null,['class' => 'form-control select2 col-md-10','name'=>'user_id', 'autocomplete' => 'off', 'aria-describedby' => 'users']) !!}
                                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 form-control-label text-md-right">
                                    Pago Cuota:
                                </label>
                                <div class="col-md-2">
                                    {!! Form::select('type', $type_list, null,['class' => 'form-control select2 col-md-10','name'=>'type', 'autocomplete' => 'off', 'aria-describedby' => 'users']) !!}
                                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
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