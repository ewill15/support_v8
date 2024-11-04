@extends('layouts.admin.app')
@section('title', 'events')
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
                            'title'=>ucfirst(trans('common.final_event')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.final_event'))
                                ],
                                'url'=>[
                                    url('/admin/events')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.list'))
                        ])
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
                    @include('admin.partials.searcher', ['url' => 'admin/events'])
                <!-- End form searchs --> 
                <!-- ============================================================== -->  
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr class="text-center">
                                    <th>{{ ucfirst(trans('common.name')) }}</th>
                                    <th>{{ ucfirst(trans('common.datestart')) }}</th>
                                    <th>{{ ucfirst(trans('common.dateend')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $item)
                                    <tr class="gradeX text-center">
                                        <td>{{ @$item->pasanaku->name }}</td>
                                        <td class="col-mwidth-150">{{ $item->formatted_start_date }}</td>
                                        <td class="col-mwidth-150">{{ $item->formatted_end_date }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu">                                                    
                                                    <a href="{{ url('admin/final-events/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                        <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                    </a>
                                                    <a href="{{ url('admin/final-events/' . @$item->id) }}" class="dropdown-item">
                                                        <i class="fas fa-search-dollar"></i> {{ ucfirst(trans('common.view_fee_event')) }}
                                                    </a>
                                                    
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"
                                                            data-action="delete"
                                                            data-name="{{$item->name}}" 
                                                            data-url="{{ route('final-events.destroy', $item->id) }}" 
                                                            data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}" 
                                                            data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.delete')) }}"
                                                            data-btn-cancel="{{ ucfirst(trans('common.cancel')) }}">
                                                            <i class="fas fa-trash-alt"></i> {{ ucfirst(trans('common.delete')) }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>       
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.pasanakus.events.partials.modal-delete')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $events->appends(request()->except('page'))->render() !!}
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
