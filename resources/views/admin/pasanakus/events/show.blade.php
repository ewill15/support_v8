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
                                    url('/admin/final-events')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.show'))
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
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="row">                                    
                                    <label>
                                        {{$final_event->pasanaku->name}}
                                    </label>
                                </div>
                                <div class="row">
                                    <label>
                                        Inicia:
                                        <span>{{$final_event->formatted_start_date}}</span>
                                    </label>
                                </div>
                                <div class="row">
                                    <label>
                                        Finaliza:
                                        <span>{{$final_event->formatted_start_date}}</span>
                                    </label>
                                </div>
                                <div class="row">
                                    <span>
                                        Cuota de {{$final_event->fee}} Bs. por numero para {{$final_event->description}}
                                    </span>
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
