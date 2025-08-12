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
                            <a class="nav-link active" id="custom-all-tab" data-toggle="pill" href="#custom-all" role="tab" aria-controls="custom-all" aria-selected="true">{{ ucfirst(trans('common.all')) }}</a>
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
                        <div class="tab-pane fade active show" id="custom-home" role="tabpanel" aria-labelledby="custom-home-tab">
                            <div class="col-sm-5 col-md-6 mx-auto">
                                <div class="color-palette-set">
                                    <div class="bg-info color-palette">
                                        <span class="ml-3">{{now()->format('d-m-Y')}}</span>                                  

                                    </div>                                
                                </div>
                            </div>
                            @include('admin.clothes.partials.resume', ['type_date'=>'today','inmoney' => $registros_today['income']['total'],'inqr'=>$registros_today['iqr']['total'],'outmoney' => $registros_today['expenses']['total'],'outqr'=>$registros_today['eqr'],'clothes'=>$registros_today['clothes']])
                        </div>
                        <div class="tab-pane fade" id="custom-week" role="tabpanel" aria-labelledby="custom-week-tab">
                            <div class="col-sm-5 col-md-6 mx-auto">
                                <div class="color-palette-set">
                                    <div class="bg-info color-palette">
                                        <span class="ml-3">{{now()->startOfWeek()->format('d-m-Y')}}</span>
                                        <span class="mx-3">hasta</span>
                                        <span>{{now()->endOfWeek()->format('d-m-Y')}}</span>                                       

                                    </div>                                
                                </div>
                            </div>
                            @include('admin.clothes.partials.resume', ['type_date'=>'week','inmoney' =>  $registros_weekly['income']['total'],'inqr'=>$registros_weekly['iqr']['total'],'outmoney' => $registros_weekly['expenses']['total'],'outqr'=>$registros_weekly['eqr'],'clothes'=>$registros_weekly['clothes']])
                        </div>

                        <div class="tab-pane fade" id="custom-month" role="tabpanel" aria-labelledby="custom-month-tab">
                            <div class="col-sm-4 col-md-2 mx-auto">
                                <div class="color-palette-set">
                                    <div class="bg-info color-palette">
                                        <span class="ml-3">{{now()->format('F')}}</span>
                                    </div>                                
                                </div>
                            </div>
                            @include('admin.clothes.partials.resume', ['type_date'=>'month','inmoney' => $registros_monthly['income']['total'],'inqr'=>$registros_monthly['iqr']['total'],'outmoney' => $registros_monthly['expenses']['total'],'outqr'=> $registros_monthly['eqr'],'clothes'=>$registros_monthly['clothes']])
                        </div> 
                        <div class="tab-pane fade" id="custom-all" role="tabpanel" aria-labelledby="custom-all-tab">
                               @include('admin.clothes.partials.resume', ['type_date'=>'full','inmoney' => $registros_full['income']['total'],'inqr'=>$registros_full['iqr']['total'],'outmoney' => $registros_full['expenses']['total'],'outqr'=>$registros_full['eqr'],'clothes'=>$registros_full['clothes']])                        
                        </div>                   
                    </div>
                </div>
            <!-- ============================================================== --> 
            </div>
        </div>
    </section>
@endsection