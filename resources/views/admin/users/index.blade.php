@extends('layouts.admin.app')
@section('title', 'User')
@section('content')

<!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ ucfirst(trans('common.personals')) }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">
                                            {{ ucfirst(trans('common.home')) }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ ucfirst(trans('common.list_personals')) }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    @if(@$new)
                        <div class="card-body border-top">
                            <a href="{{ url('admin/personals/create') }}" class="btn btn-outline-primary float-right">
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

            <div class="card card-primary card-outline">
                <div class="card-body">
                <!-- ============================================================== -->
                <!-- Form searchs -->   
                    <div class="card">
                        {!! Form::open([
                            'url' => 'admin/personals', 
                            'method' => 'GET', 
                            'enctype' => 'multipart/form-data', 
                            'class' => 'form-horizontal pt-3',
                            'autocomplete'=>'off'
                        ]) !!}
                        <div class="row">
                            <div class="col-md-12 form-group row mt-4">
                                <div class="col-md-6 ml-5">
                                    <span id="date-label-to" class="date-label col-md-4 form-control-label">{{ ucfirst(trans('common.display')) }}</span>
                                    {!! Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'],$paginate,['class'=>'display custom-select custom-select-sm col-md-4 form-control-sm']) !!}
                                    <span id="date-label-to" class="date-label col-md-4 form-control-label"> {{ ucfirst(trans('common.records')) }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 form-group row ml-5">
                                <div class="col">
                                    {!! Form::label('name_lastname', ucfirst(trans('common.name')), ['class' => 'font-normal font_weight']) !!}
                                    {!! Form::text('name_lastname', null, ['class' => 'form-control form-control-sm', 'placeholder' => ucfirst(trans('common.search')).'...']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('username', ucfirst(trans('common.user')), ['class' => 'font-normal font_weight']) !!}
                                    {!! Form::text('username', null, ['class' => 'form-control form-control-sm', 'placeholder' => ucfirst(trans('common.search')).'...']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('email', ucfirst(trans('common.email')), ['class' => 'font-normal font_weight']) !!}
                                    {!! Form::text('email', null, ['class' => 'form-control form-control-sm', 'placeholder' => ucfirst(trans('common.search')).'...']) !!} 
                                </div>
                                <div class="col mt-5">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>                        
                        </div>   
                        {!! Form::close() !!}
                    </div> 
                <!-- End form searchs --> 
                <!-- ============================================================== -->  
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr>
                                    <th class="actions">ID</th>
                                    <th class="actions">{{ ucfirst(trans('common.image')) }}</th>
                                    <th>{{ ucfirst(trans('common.firstname')) }}</th>
                                    <th>{{ ucfirst(trans('common.user')) }}</th>
                                    <th>{{ ucfirst(trans('common.email')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr class="gradeX {{$item->deleted_at?'text-danger':''}}">
                                        <td>{{ @$item->id }}</td>
                                        <td>                                                    
                                            <img src="{{ @$item->image_path }}" alt="" width="100px">
                                        </td>
                                        <td>{{ @$item->name_lastname }}</td>
                                        <td>{{ @$item->username }}</td>
                                        <td>{{ @$item->email }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if ($item->deleted_at)
                                                        @if(@$recycle)
                                                            <a class="dropdown-item" href="#"
                                                                data-action="restore"
                                                                data-url="{{ asset('admin/personals/restore/'.@$item->id)}}"
                                                                data-title-msg="{{ ucfirst(trans('common.restore_personal')) }}"
                                                                data-btn-action="{{ ucwords(trans('common.restore')) }}">
                                                                <i class="fas fa-trash-restore"></i> 
                                                                {{ ucfirst(trans('common.restore')) }}
                                                            </a>
                                                        @endif    
                                                    @else
                                                        @if(@$edit)
                                                            <a href="{{ url('admin/personals/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                                <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                            </a> 
                                                        @endif
                                                        @if(@$account)
                                                            <a class="dropdown-item" data-target="#modal-account-{{@$item->id}}" data-toggle="modal" href="#">
                                                                <i class="far fa-user-circle"></i> {{ ucfirst(trans('common.account')) }}
                                                            </a> 
                                                        @endif
                                                        @if(@$recycle)
                                                            <a class="dropdown-item" href="#"
                                                                data-action="recycle"
                                                                data-name="{{$item->name_lastname}}"
                                                                data-url='{{ asset('admin/personals/soft/'.@$item->id)}}'
                                                                data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}" 
                                                                data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                                data-btn-action="{{ ucwords(trans('common.delete')) }}">
                                                                <i class="fas fa-trash"></i> {{ ucfirst(trans('common.recycle')) }}
                                                            </a>
                                                        @endif
                                                        @if(@$trash)
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#"
                                                                data-action="delete"
                                                                data-name="{{$item->name_lastname}}" 
                                                                data-url="{{ route('personals.destroy', $item->id) }}" 
                                                                data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}" 
                                                                data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                                data-btn-action="{{ ucwords(trans('common.delete')) }}">
                                                                <i class="fas fa-trash-alt"></i> {{ ucfirst(trans('common.delete')) }}
                                                            </a>    
                                                        @endif 
                                                    @endif 
                                                </div>
                                            </div>       
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.users.partials.modal-delete')
                            @include('admin.users.partials.modal-recycle')
                            @include('admin.users.partials.modal-restore')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $users->appends(request()->except('page'))->render() !!}
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
