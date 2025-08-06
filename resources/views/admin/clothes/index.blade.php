@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.clothes')))
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
                            'title'=>ucfirst(trans('common.clothes')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.clothes'))
                                ],
                                'url'=>[
                                    url('/admin/clothes')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.summary'))
                        ])
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="{{ url('admin/clothes/create') }}" class="btn btn-outline-primary float-right">
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

            <div class="card card-primary card-outline  card-outline-tabs">
            <!-- ============================================================== -->
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-list-tab" data-toggle="pill" href="#custom-list" role="tab" aria-controls="custom-list" aria-selected="true">{{ ucfirst(trans('common.list')) }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-all-tab" data-toggle="pill" href="#custom-all" role="tab" aria-controls="custom-all" aria-selected="true">{{ ucfirst(trans('common.all')) }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-home-tab" data-toggle="pill" href="#custom-home" role="tab" aria-controls="custom-home" aria-selected="false">{{ ucfirst(trans('common.today')) }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-week-tab" data-toggle="pill" href="#custom-week" role="tab" aria-controls="custom-week" aria-selected="false">{{ ucfirst(trans('common.week')) }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-month-tab" data-toggle="pill" href="#custom-month" role="tab" aria-controls="custom-month" aria-selected="false">{{ ucfirst(trans('common.month')) }}</a>
                        </li>                        
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade active show" id="custom-list" role="tabpanel" aria-labelledby="custom-list-tab">
                               <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr>
                                    <th>{{ ucfirst(trans('common.date_sale')) }}</th>
                                    <th>{{ ucfirst(trans('common.type')) }}</th>
                                    <th>{{ ucfirst(trans('common.description')) }}</th>
                                    <th>{{ ucfirst(trans('common.price')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clothes as $item)
                                    <tr class="gradeX">
                                        <td class="w-150p">{{ @$item->dateSaleFormat }}</td>
                                        <td>{{ @$item->income }}</td>
                                        <td>{{ @$item->description }}</td>
                                        <td>{{ @$item->payment }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    {{ ucfirst(trans('common.actions')) }}
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a href="{{ url('admin/clothes/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                            <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"
                                                            data-action="delete"
                                                            data-name="improve" 
                                                            data-url="{{ route('clothes.destroy', $item->id) }}" 
                                                            data-title-msg="{{ ucfirst(trans('common.delete')) }}" 
                                                            data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.delete')) }}"
                                                            data-btn-cancel="{{ ucfirst(trans('common.cancel')) }}"
                                                        >
                                                            <i class="fas fa-trash-alt"></i> {{ ucfirst(trans('common.delete')) }}
                                                        </a>
                                                </div>
                                            </div>       
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.clothes.partials.modal-delete')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $clothes->appends(request()->except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="custom-all" role="tabpanel" aria-labelledby="custom-all-tab">
                               @include('admin.clothes.partials.resume', ['inmoney' => $registros_full['income']['total'],'inqr'=>$registros_full['iqr']['total'],'outmoney' => $registros_full['expenses']['total'],'outqr'=>$registros_full['eqr']['total'],'clothes'=>$registros_full['clothes']])                        
                        </div>
                        <div class="tab-pane fade" id="custom-home" role="tabpanel" aria-labelledby="custom-home-tab">
                            @include('admin.clothes.partials.resume', ['inmoney' => $registros_today['income']['total'],'inqr'=>$registros_today['iqr']['total'],'outmoney' => $registros_today['expenses']['total'],'outqr'=>$registros_today['eqr']['total'],'clothes'=>$registros_today['clothes']['prendas']])
                        </div>
                        <div class="tab-pane fade" id="custom-week" role="tabpanel" aria-labelledby="custom-week-tab">
                            @include('admin.clothes.partials.resume', ['inmoney' =>  $registros_weekly['income']['total'],'inqr'=>$registros_weekly['iqr']['total'],'outmoney' => $registros_weekly['expenses']['total'],'outqr'=>$registros_weekly['eqr']['total'],'clothes'=>$registros_weekly['clothes']['prendas']])
                        </div>
                        <div class="tab-pane fade" id="custom-month" role="tabpanel" aria-labelledby="custom-month-tab">
                            @include('admin.clothes.partials.resume', ['inmoney' => $registros_monthly['income']['total'],'inqr'=>$registros_monthly['iqr']['total'],'outmoney' => $registros_monthly['expenses']['total'],'outqr'=> $registros_monthly['eqr']['total'],'clothes'=>$registros_monthly['clothes']])
                        </div>                    
                    </div>
                </div>
                <!-- ============================================================== --> 
            </div>
        </div>
    </section>
@endsection