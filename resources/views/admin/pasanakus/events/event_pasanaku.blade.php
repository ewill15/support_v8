@extends('layouts.admin.app')
@section('title', 'Fee Pasanaku')
@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="page-breadcrumb">
                            @include('admin.partials.breadcrumb',[
                                'title'=>ucfirst(trans('common.pasanakus')),
                                'breadcrumbs'=>[
                                    'text'=>[
                                        ucfirst(trans('common.pasanakus'))
                                    ],
                                    'url'=>[
                                        url('/admin/pasanakus')
                                    ]
                                ],
                                'final'=>ucfirst(trans('common.new'))
                            ])
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
                        <div class="card-body">
                            {!! Form::open([
                                'id'=>'form-fee-pasanaku', 
                                'method' => 'POST',
                                'class' => 'form-horizontal',
                                'autocomplete'=>'off'
                            ]) !!}
                            @include('admin.pasanakus.events.partials.form_event', ['errors' => $errors])                            
                            @include('admin.partials.buttons',['label' => ucfirst(trans('common.pay'))])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
