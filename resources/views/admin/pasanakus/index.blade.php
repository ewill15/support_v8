@extends('layouts.admin.app')
@section('title', 'Pasanakus')
@section('content')

<!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        @include('admin.partials.breadcrumb',[
                            'title'=>ucfirst(trans('common.pasanakus')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.pasanakus'))
                                ],
                                'url'=>[
                                    url('/admin/pasanakus')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.list'))
                        ])
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="{{ url('admin/pasanakus/create') }}" class="btn btn-outline-primary float-right">
                            <i class="fas fa-plus-circle"></i>
                            {{ ucfirst(trans('common.create')) }}
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->

      </section>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <section class="content">
        <div class="container-fluid">
            @include('admin.partials.messages')
            @include('admin.partials.errors', ['errors' => $errors])

            <div class="card card-primary card-outline">
                <div class="card-body">
                <!-- ============================================================== -->
                <!-- Form searchs -->
                    @include('admin.partials.searcher', ['url' => 'admin/pasanakus'])
                <!-- End form searchs --> 
                <!-- ============================================================== -->  
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr class="text-center">
                                    <th class="w-15">{{ ucfirst(trans('common.name')) }}</th>
                                    <th>{{ ucfirst(trans('common.datestart')) }}</th>
                                    <th>{{ ucfirst(trans('common.dateend')) }}</th>
                                    <th>{{ ucfirst(trans('common.datenext')) }}</th>
                                    <th>{{ ucfirst(trans('common.participant')) }}</th>
                                    <th class="w-15">{{ ucfirst(trans('common.amount')) }}</th>
                                    <th>{{ ucfirst(trans('common.status')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pasanakus as $item)
                                    <tr class="gradeX text-center {{@$item->status?'':'text-muted'}}">
                                        <td>{{ @$item->name }}</td>
                                        <td>{{ $item->formatted_start_date }}</td>
                                        <td>{{ \Carbon\Carbon::parse(@$item->date_end)->format('d-M-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse(@$item->date_next)->format('d-M-Y') }}</td>
                                        <td>{{ @$item->participant_total }}</td>
                                        <td>{{ @$item->amount_total }}</td>
                                        {{-- <td class="{{$item->has_participants?$item->status_pasanaku:'text-warning'}}">
                                            {{$item->has_participants?@$item->status&&\Carbon\Carbon::parse(@$item->date_end)->diffInDays(\Carbon\Carbon::now())?'ACTIVE':'INACTIVE':'NO PARTICIPANTS'}}
                                        </td> --}}
                                        <td class="{{$item->message_status["color"]}}">
                                            {{@$item->message_status["message"]}}
                                        </td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if ($item->status)
                                                        <a href="{{ url('admin/pasanakus/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                            <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                        </a>
                                                        
                                                        @if ($item->has_participants)
                                                            <a href="{{ url('admin/pasanakus/' . @$item->id . '/view_fee_pasanaku') }}" class="dropdown-item">
                                                                <i class="fas fa-search-dollar"></i> {{ ucfirst(trans('common.view_fee_pasanaku')) }}
                                                            </a>
                                                            <a href="{{ url('admin/pasanakus/' . @$item->id . '/fee_pasanaku') }}" class="dropdown-item">
                                                                <i class="fas fa-money-bill-wave"></i> {{ ucfirst(trans('common.fee_pasanaku')) }}
                                                            </a>                                                        
                                                            <a href="{{ url('admin/pasanakus/' . @$item->id . '/penalty') }}" class="dropdown-item">
                                                                <i class="fas fa-ban"></i> {{ ucfirst(trans('common.penalty')) }}
                                                            </a>
                                                            <a href="{{ url('admin/pasanakus/' . @$item->id) }}" class="dropdown-item">
                                                                <i class="fas fa-info-circle"></i> 
                                                                {{ ucfirst(trans('common.detail')) }}
                                                            </a>
                                                            <a class="dropdown-item" href="#"
                                                                data-action="next"
                                                                data-next-delivery="{{$item->id}}::{{$item->date_next}}"
                                                                data-text="data-text"
                                                                data-title-msg="{{ ucfirst(trans('common.next_delivery')) }}" 
                                                                data-text-msg="{{ ucfirst(trans('common.msgdelivery')) }}"
                                                                data-btn-action="{{ ucfirst(trans('common.ok')) }}"
                                                                data-btn-cancel="{{ ucfirst(trans('common.cancel')) }}">
                                                                    <i class="fas fa-arrow-circle-right"></i> 
                                                                    {{ ucfirst(trans('common.next')) }}
                                                            </a>
                                                            @php
                                                                $current_week = date("W");                                                                
                                                            @endphp                                                            
                                                            @if ($item->week_final-$current_week <= 4)
                                                                <div class="dropdown-divider"></div>
                                                                <a href="{{ url('admin/pasanakus/' . @$item->id.'/final_event') }}" class="dropdown-item">
                                                                    <i class="fas fa-award"></i>
                                                                    {{ ucfirst(trans('common.final_event')) }} 
                                                                </a>
                                                            @endif
                                                        @else 
                                                            <a href="{{ url('admin/pasanakus/' . @$item->id . '/add_participant') }}" class="dropdown-item">
                                                                <i class="fas fa-user"></i> {{ ucfirst(trans('common.add_participant')) }}
                                                            </a>
                                                        @endif                                                        
                                                    @else
                                                        <a href="{{ url('admin/pasanakus/' . @$item->id.'/delivery_dates') }}" class="dropdown-item">
                                                            <i class="fas fa-money-check-alt"></i>
                                                            {{ ucfirst(trans('common.delivered_date')) }}
                                                        </a>
                                                    @endif        

                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"
                                                            data-action="delete"
                                                            data-name="{{$item->name}}" 
                                                            data-url="{{ route('pasanakus.destroy', $item->id) }}" 
                                                            data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}" 
                                                            data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.delete')) }}"
                                                            data-btn-cancel="{{ ucfirst(trans('common.cancel')) }}">
                                                            <i class="fas fa-trash-alt"></i> {{ ucfirst(trans('common.delete')) }}
                                                        </a>
                                                </div>
                                            </div>       
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.pasanakus.partials.modal-delete')
                            @include('admin.pasanakus.partials.modal-show-next')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $pasanakus->appends(request()->except('page'))->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End table --> 
                <!-- ============================================================== --> 
                </div>
            </div>
        </div>
    </section>
@endsection
