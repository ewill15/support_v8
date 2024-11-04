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
                            'final'=>ucfirst(trans('common.edit'))
                        ])
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
                        <div class="card-body">
                            {!! Form::model($event, [
                                'id'=>'form-event', 
                                'url'=>url("admin/final-event/$event->id"),
                                'method' => 'PUT', 
                                'enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal'
                                ]) 
                            !!}
                            @include('admin.pasanakus.events.partials.form_event', ['errors' => $errors,'pasanaku'=>$pasanaku])
                            @if ($event)
                                @include('admin.partials.buttons', ['label' => ucfirst(trans('common.update'))])
                            @else
                                @include('admin.partials.buttons', ['label' => ucfirst(trans('common.pay'))])    
                            @endif
                            
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
