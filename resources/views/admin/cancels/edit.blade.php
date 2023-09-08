@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.cancels')) )
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
                        <h5 class="card-header">Modificar registro</h5>
                        <div class="card-body">
                            {!! Form::model($cancel, [
                                'id'=>'form-cancel', 
                                'route' => ['cancels.update', $cancel], 
                                'method' => 'PUT', 
                                'enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal'
                                ]) 
                            !!}
                            @include('admin.cancels.partials.form', ['errors' => $errors])
                            @include('admin.partials.buttons', ['label' => ucfirst(trans('common.update'))])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@endsection




{{-- @extends('layouts.admin.app')
@section('title', ucfirst(trans('common.cancels')))
@section('content')
    <div class="row  border-bottom white-bg dashboard-header">  
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.cancels'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/cancels')}}">{{ucfirst(trans('common.cancels'))}}</a>
                </li>
                <li class="active">
                    <strong>{{ucfirst(trans('common.edit'))}}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        {{ucfirst(trans('common.update'))}} 
                        <small>
                        {{ucfirst(trans('common.edit'))}}
                        </small>
                        
                    </h5>
                </div>
                <div class="ibox-content" id="app">
                    {!! Form::model($cancel, [
                   
                    ]) !!}
                    @include('admin.cancels.partials.form', ['errors' => $errors])
                    @include('admin.partials.buttons', ['label' => 'save'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection --}}
