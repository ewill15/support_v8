@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.cancels')))
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
                            'action'=>'simple',
                            'title'=>ucfirst(trans('common.cancels')), 
                            'breadcrumb_text'=>ucfirst(trans('common.cancels')),
                            'breadcrumb_url'=>url('/admin/cancels'),
                            'item_breadcrumb'=>ucfirst(trans('common.new'))
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
                        <h5 class="card-header">Nuevo registro</h5>
                        <div class="card-body">
                            {!! Form::open([
                                'id'=>'form-cancel',
                                'route' => 'cancels.store', 
                                'method' => 'POST', 
                                'enctype' => 'multipart/form-data', 
                                'class' => 'form-horizontal',
                                'autocomplete'=>'off'
                            ]) !!}
                            @include('admin.cancels.partials.form', ['errors' => $errors])
                            @include('admin.partials.buttons')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection



{{-- @section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-lg-10">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/cancels')}}">{{}}</a>
                </li>
                <li class="active">
                    <strong>{{ucfirst(trans('common.create'))}}</strong>
                </li>
            </ol>
        </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            {{ucfirst(trans('common.form'))}}
                            <small>{{ucfirst(trans('common.cancels'))}}</small>
                        </h5>
                        <div class="ibox-tools">                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12" id="app">
                                @include('admin.partials.errors', ['errors' => $errors])
                                {!! Form::open([
                                    'url' => 'admin/cancels',
                                    'class' => 'form-horizontal',
                                    'files'=>true,
                                    'autocomplete'=>'off'
                                ]) !!}
                                @include('admin.cancels.partials.form', ['errors' => $errors])
                                @include('admin.partials.buttons', ['label' => 'create'])
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection --}}
