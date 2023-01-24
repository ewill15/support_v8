@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.prototypes')))
@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ ucfirst(trans('common.prototypes')) }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">{{ ucfirst(trans('common.home')) }}</a></li>
                                    <li class="breadcrumb-item active">{{ ucfirst(trans('common.list_prototypes')) }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    @if(@$new)
                        <div class="card-body border-top">
                            <a href="{{ url('admin/prototypes/create') }}" class="btn btn-outline-primary float-right">
                                <i class="fas fa-plus-circle"></i>
                                {{ ucfirst(trans('common.create')) }}
                            </a>
                        </div>
                    @endif
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
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">{{ucfirst(trans('common.prototypes'))}}</h5>
                        <div class="card-body">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <form  id="paginate" action="{{ url('admin/prototypes') }}">
                                        <div class="row">
                                            
                                        </div>
                                    </form>

                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ ucfirst(trans('common.brand')) }}</th>
                                            <th>{{ ucfirst(trans('common.prototype')) }}</th>
                                            <th>{{ ucfirst(trans('common.description')) }}</th>
                                            <th>{{ ucfirst(trans('common.state')) }}</th>
                                            <th>{{ ucfirst(trans('common.actions')) }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($prototypes as $item)
                                            <tr class="gradeX {{$item->deleted_at?'text-danger':''}}">
                                                <td>{{ @$item->id }}</td>
                                                <td>{{ @$item->brand->name_brand }}</td>
                                                <td>{{ @$item->name_prototype }}</td>
                                                <td>{!! @$item->description !!}</td>
                                                <td>{!! @$item->state->name_state !!}</td>
                                                <td>
                                                    @if ($item->deleted_at)
                                                        @if(@$recycle)
                                                            <a class="btn btn-info btn-sm btn-restore" href="#"
                                                                data-toggle-tip="tooltip" data-placement="top" 
                                                                title="{{ ucfirst(trans('common.restore')) }}"
                                                                data-action="restore"
                                                                data-url="{{ asset('admin/prototypes/restore/'.@$item->id)}}"
                                                                data-title-msg="{{ ucfirst(trans('common.restore_brand')) }}"
                                                                data-btn-action="{{ ucwords(trans('common.restore')) }}">
                                                                <i class="fas fa-trash-restore"></i>
                                                                {{ ucfirst(trans('common.restore')) }}
                                                            </a>
                                                        @endif    
                                                    @else
                                                        @if(@$edit)
                                                            <a href="{{ url('admin/prototypes/' . @$item->id . '/edit') }}" class="btn btn-primary btn-sm" data-toggle-tip="tooltip" data-placement="top" title="{{ ucfirst(trans('common.update')) }}">                                            
                                                                <i class="fas fa-edit"></i>
                                                                    {{-- {{ ucfirst(trans('common.update')) }} --}}
                                                            </a> 
                                                        @endif
                                                        @if(@$recycle)
                                                            <a class="btn btn-warning btn-sm btn-recycle" 
                                                                data-toggle-tip="tooltip" data-placement="top" 
                                                                title="{{ ucfirst(trans('common.recycle')) }}"
                                                                data-action="recycle"                                                    
                                                                data-url='{{ asset('admin/prototypes/soft/'.@$item->id)}}'
                                                                data-name="{{ $item->name_prototype }}"
                                                                data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}" 
                                                                data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                                data-btn-action="{{ ucwords(trans('common.recycle')) }}">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        @endif
                                                        @if(@$trash)
                                                        <a href="#" class="btn btn-danger btn-sm" 
                                                            data-toggle-tip="tooltip" data-placement="top" 
                                                            title="{{ ucfirst(trans('common.delete')) }}"
                                                            data-action="delete"
                                                            data-name="{{ $item->name_prototype }}"
                                                            data-url="{{ route('prototypes.destroy', $item->id) }}"
                                                            data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}"
                                                            data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.delete')) }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>    
                                                    @endif 
                                                    @endif        
                                                </td>
                                            </tr>                                            
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @include('admin.prototypes.partials.modal-delete')
                                    @include('admin.prototypes.partials.modal-recycle')
                                    @include('admin.prototypes.partials.modal-restore')
                                    <div class="float-left">
                                        {{ $text_pagination }}
                                    </div>
                                    <div class="float-right">                                        
                                        <div class="btn-group">
                                          {!! $prototypes->appends(request()->except('page'))->render() !!}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>        
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>
        </div>
        
    </section>    
@endsection