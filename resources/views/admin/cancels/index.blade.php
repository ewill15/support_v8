@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.cancels')))
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
                            'title'=>ucfirst(trans('common.cancels')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.cancels'))
                                ],
                                'url'=>[
                                    url('/admin/cancels')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.list'))
                        ])
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="{{ url('admin/cancels/create') }}" class="btn btn-outline-primary float-right">
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
                    @include('admin.partials.searcher', ['url' => 'admin/cancels'])
                <!-- End form searchs --> 
                <!-- ============================================================== -->  
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr>
                                    <th>ID</th>                                
                                    <th>{{ucfirst(trans('common.service'))}}</th>
                                    <th>{{ucfirst(trans('common.period'))}}</th>
                                    <th>{{ucfirst(trans('common.amount'))}}</th>
                                    <th>{{ucfirst(trans('common.actions'))}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cancels as $item)
                                    <tr class="gradeX">
                                        <td>{{ @$item->id }}</td>
                                        <td>{{ @$item->service->name }}</td>
                                        <td>{{ @$item->period }}</td>
                                        <td>{{ @$item->amount }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ url('admin/cancels/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                        <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                    </a>                                                   
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#"
                                                        data-action="delete"
                                                        data-name="{{$item->service->name}}/{{ @$item->period }}" 
                                                        data-url="{{ route('cancels.destroy', $item->id) }}" 
                                                        data-title-msg="{{ ucfirst(trans('common.delete')) }}" 
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
                            @include('admin.cancels.partials.modal-delete')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $cancels->appends(request()->except('page'))->links() !!}
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