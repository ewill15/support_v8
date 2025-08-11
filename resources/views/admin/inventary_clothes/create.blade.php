@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.inventary_clothes')))
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
                            'title'=>ucfirst(trans('common.inventary_clothes')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.inventary_clothes'))
                                ],
                                'url'=>[
                                    url('/admin/inventary_clothes')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.new'))
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
                        <h5 class="card-header">{{ ucfirst(trans('common.inventary_clothes')) }}</h5>
                        <div class="card-body">
                            {!! Form::open([
                                'id'=>'form-inventary-clothes',
                                'route' => 'inventary_clothes.store', 
                                'method' => 'POST', 
                                'enctype' => 'multipart/form-data', 
                                'class' => 'form-horizontal',
                                'autocomplete'=>'off'
                            ]) !!}
                            @include('admin.inventary_clothes.partials.form', ['errors' => $errors])
                            @include('admin.partials.buttons')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
