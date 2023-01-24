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
                                    <li class="breadcrumb-item active">{{ ucfirst(trans('common.list_incomes')) }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    @if(@$new)
                        <div class="card-body border-top">
                            <a href="{{ url('admin/incomes/create') }}" class="btn btn-outline-primary float-right">
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
                            'url' => 'admin/incomes', 
                            'method' => 'GET', 
                            'enctype' => 'multipart/form-data', 
                            'class' => 'form-horizontal pt-3',
                            'autocomplete'=>'off'
                        ]) !!}
                        @if (@$provider_date)
                        <div class="row offset-md-5">
                            <p class="col-md-3 text-right">{{ucfirst(trans('common.range'))}}</p>
                            <div class="input-group col-md-6">                                
                                <input type="text" name="date_range" class="form-control float-right" id="reservation">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-3 ml-2">
                            <div class="col-md-5 form-group row ">
                                <div class="col text-right">
                                    <span id="date-label-to" class="date-label form-control-label">
                                        {{ ucfirst(trans('common.display')) }}
                                    </span>
                                </div>
                                <div class="col">
                                    {!! Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100'],$paginate,['class'=>'display
                                        custom-select custom-select-sm  form-control-sm']) !!}
                                </div>
                                <div class="col">
                                    <span id="date-label-to" class="date-label form-control-label"> 
                                        {{ucfirst(trans('common.records')) }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12 ml-5">
                                <div class="form-group row ml-3">
                                    <div class="col">
                                        {!! Form::label('provider_name', ucfirst(trans('common.provider_name')), ['class' => 'font-normal font_weight']) !!}
                                        {!! Form::select('provider', [''=>ucfirst(trans('common.text_search')),$providers], null, ['class' => 'form-control form-control-sm select2']) !!}
                                    </div>
                                    <div class="col">
                                        {!! Form::label('code_voucher', ucfirst(trans('common.code_voucher')).':', ['class' => 'font-normal font_weight']) !!}
                                        {!! Form::text('code_voucher', null, ['class' => 'form-control form-control-sm', 'placeholder' => ucfirst(trans('common.search')).'...']) !!}
                                    </div>
                                    <div class="col">
                                        {!! Form::label('state_id', ucfirst(trans('common.state')).':', ['class' => 'font-normal font_weight']) !!}
                                        {!! Form::select('state', $states, null, ['class' => 'form-control form-control-sm select2','required' => 'required']) !!}
                                    </div>
                                    <div class="col mt-4">
                                        <button type="submit" class="btn btn-primary btn-sm pull-right col-md-4 mb-1">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>                                    
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
                                    <th>{{ ucfirst(trans('common.date')) }}</th>
                                    <th>{{ ucfirst(trans('common.provider_name')) }}</th>
                                    <th>{{ ucfirst(trans('common.code_voucher')) }}</th>
                                    <th>{{ ucfirst(trans('common.total')) }}</th>
                                    <th>{{ ucfirst(trans('common.saldo')) }}</th>
                                    <th>{{ ucfirst(trans('common.state')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($incomes as $item)
                                    <tr class="gradeX {{$item->deleted_at?'text-danger':''}}">
                                        <td>{{ @$item->id }}</td>
                                        <td>{{ @$item->date }}</td>
                                        <td>{{ @$item->provider->provider_name }}</td>
                                        <td>{{ @$item->code_voucher }}</td>
                                        <td>{{ @$item->total }}</td>
                                        <td>{{ @$item->saldo }}</td>
                                        <td>{{ @$item->state->name_state }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    {{ ucfirst(trans('common.actions')) }}
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if(@$edit)
                                                    <a href="{{ url('admin/incomes/' . @$item->id . '/edit') }}" class="dropdown-item">                                            
                                                        <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                    </a> 
                                                    @endif
                                                    @if(@$debts)
                                                        <a href="{{ url('admin/incomes/' . @$item->id . '/debts') }}" class="dropdown-item">                                            
                                                            <i class="fas fa-edit"></i> {{ ucfirst(trans('common.debts')) }}
                                                        </a> 
                                                    @endif
                                                    @if(@$trash)
                                                        <div class="dropdown-divider"></div>
                                                        <a data-target="#modal-delete-{{$item->id}}" data-toggle="modal" class="dropdown-item" href="#">
                                                            <i class="fas fa-trash-alt"></i> {{ ucfirst(trans('common.delete')) }}
                                                        </a>    
                                                    @endif
                                                </div>
                                              </div>       
                                        </td>
                                    </tr>
                                    @include('admin.incomes.partials.modal-delete')
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $incomes->appends(request()->except('page'))->render() !!}
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
