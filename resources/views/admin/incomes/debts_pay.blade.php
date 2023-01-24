@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.incomes')))
@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ ucfirst(trans('common.incomes')) }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">{{ ucfirst(trans('common.home')) }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/incomes') }}" class="breadcrumb-link">{{ ucfirst(trans('common.list_incomes')) }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(trans('common.debts_pay')) }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @include('admin.partials.messages')
                    @include('admin.partials.errors', ['errors' => $errors])
                    <div class="card">
                        <h5 class="card-header"> {{ ucfirst(trans('common.create')) }}</h5>
                        <div class="card-body">
                            {!! Form::open([ 
                                'route' => 'debts.store', 
                                'method' => 'POST', 
                                'enctype' => 'multipart/form-data', 
                                'class' => 'form-horizontal',
                                'autocomplete'=>'off'
                            ]) !!}
                            @include('admin.incomes.partials.form_debts', ['errors' => $errors])
                            @include('admin.partials.buttons', ['label' => ucfirst(trans('common.create'))])
                            {!! Form::close() !!}
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-body">  
                            <!-- ============================================================== --> 
                            <!-- Table  --> 
                                <div class="ibox-content">
                                    <div class="table-responsive"> 
                                        <table class="table table-register table-striped table-bordered table-hover">                                        
                                            <thead>
                                            <tr>
                                                <th class="actions">ID</th>
                                                <th>{{ ucfirst(trans('common.date')) }}</th>
                                                <th>{{ ucfirst(trans('common.income')) }}</th>
                                                <th>{{ ucfirst(trans('common.payment_type')) }}</th>
                                                <th>{{ ucfirst(trans('common.nro_payment')) }}</th>
                                                <th>{{ ucfirst(trans('common.on_account')) }}</th>
                                                <th>{{ ucfirst(trans('common.description')) }}</th>
                                                <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($debts_to_pay as $item)
                                                <tr class="gradeX {{$item->deleted_at?'text-danger':''}}">
                                                    <td>{{ @$item->id }}</td>
                                                    <td>{{ @$item->date }}</td>
                                                    <td>{{ @$item->income->code_voucher }}</td>
                                                    <td>{{ @$item->payment->name_payment }}</td>
                                                    <td>{{ @$item->nro_payment }}</td>
                                                    <td>{{ @$item->on_account }}</td>
                                                    <td>{{ @$item->description }}</td>
                                                    <td>
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                {{ ucfirst(trans('common.actions')) }}
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                @if ($item->deleted_at)
                                                                    @if(@$recycle)
                                                                    <a class="dropdown-item" href="#"
                                                                        data-action="restore"
                                                                        data-url="{{ asset('admin/debts/restore/'.@$item->id) }}"
                                                                        data-title-msg="{{ ucfirst(trans('common.restore_brand')) }}"
                                                                        data-btn-action="{{ ucwords(trans('common.restore')) }}">
                                                                        <i class="fas fa-trash-restore"></i>
                                                                        {{ ucfirst(trans('common.restore')) }}
                                                                    </a>
                                                                    @endif    
                                                                @else
                                                                    @if(@$edit)
                                                                        <a data-target="#modal-debts-edit-{{@$item->id}}" data-toggle="modal" class="dropdown-item" href="#">
                                                                            <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                                        </a> 
                                                                    @endif
                                                                    @if(@$recycle)
                                                                    <a class="dropdown-item" href="#"
                                                                        data-action="recycle"
                                                                        data-name="{{ $item->name_brand }}"
                                                                        data-url='{{ asset('admin/debts/soft/'.@$item->id) }}'
                                                                        data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}"
                                                                        data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}" 
                                                                        data-btn-action="{{ ucwords(trans('common.delete')) }}">
                                                                            <i class="fas fa-trash"></i>{{ ucfirst(trans('common.recycle')) }}
                                                                        </a>
                                                                    @endif
                                                                    @if(@$trash)
                                                                        <div class="dropdown-divider"></div>
                                                                        <a href="#" class="dropdown-item"  
                                                                        data-action="delete-debts"
                                                                        data-name="{{ @$item->income->code_voucher }}"
                                                                        data-url="{{ route('debts.destroy', $item->id) }}"
                                                                        data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}"
                                                                        data-text-msg="{{ ucfirst(trans('common.msgdelete_debts')) }}"
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
                                            @include('admin.incomes.partials.modal-debts-edit')
                                            @include('admin.incomes.partials.modal-debts-delete')
                                            @include('admin.incomes.partials.modal-debts-recycle')
                                            @include('admin.incomes.partials.modal-debts-restore')                                            
                                            </tbody>
                                        </table>
                                        <div class="float-left">
                                            {{ $text_pagination }}
                                        </div>
                                        <div class="float-right">                                        
                                            <div class="btn-group">
                                              {!! $debts_to_pay->appends(request()->except('page'))->render() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- End table --> 
                            <!-- ============================================================== --> 
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </section>
    
@endsection
