@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.dictionaries')) )
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
                            'title'=>ucfirst(trans('common.dictionaries')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.dictionaries'))
                                ],
                                'url'=>[
                                    url('/admin/dictionaries')
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
                        <h5 class="card-header">{{ ucfirst(trans('common.update_data')) }}</h5>
                        <div class="card-body">
                            {!! Form::model($dictionarie, [
                                'id'=>'form-dictionarie', 
                                'route' => ['dictionaries.update', $dictionarie], 
                                'method' => 'PUT', 
                                'enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal'
                                ]) 
                            !!}
                            @include('admin.dictionaries.partials.form', ['errors' => $errors])
                            @include('admin.partials.buttons', ['label' => ucfirst(trans('common.update'))])
                            {{-- @include('admin.dictionaries.partials.modal-edit') --}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
