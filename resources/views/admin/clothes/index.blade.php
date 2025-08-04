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
                        <div class="tab-pane fade active show" id="custom-all" role="tabpanel" aria-labelledby="custom-all-tab">
                               @include('admin.clothes.partials.resume', ['inmoney' => 0,'inqr'=>0,'outmoney' => 0,'outqr'=>0,'clothes'=>0])                        
                        </div>
                        <div class="tab-pane fade" id="custom-home" role="tabpanel" aria-labelledby="custom-home-tab">
                            @include('admin.clothes.partials.resume', ['inmoney' => 0,'inqr'=>0,'outmoney' => 0,'outqr'=>0,'clothes'=>0])
                        </div>
                        <div class="tab-pane fade" id="custom-week" role="tabpanel" aria-labelledby="custom-week-tab">
                            @include('admin.clothes.partials.resume', ['inmoney' => 0,'inqr'=>0,'outmoney' => 0,'outqr'=>0,'clothes'=>0])
                        </div>
                        <div class="tab-pane fade" id="custom-month" role="tabpanel" aria-labelledby="custom-month-tab">
                            @include('admin.clothes.partials.resume', ['inmoney' => 0,'inqr'=>0,'outmoney' => 0,'outqr'=>0,'clothes'=>0])
                        </div>                    
                    </div>
                </div>
                <!-- ============================================================== --> 
            </div>
        </div>
    </section>
@endsection