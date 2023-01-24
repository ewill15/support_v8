@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.origins')))
@section('content')
<!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ ucfirst(trans('common.origins')) }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">{{ ucfirst(trans('common.home')) }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/origins') }}" class="breadcrumb-link">{{ ucfirst(trans('common.list_origins')) }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(trans('common.edit_origins')) }}</li>
                                </ol>
                            </nav>
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
                        <h5 class="card-header"> {{ ucfirst(trans('common.modregister')) }}</h5>
                        <div class="card-body">
                            {!! Form::model($origin, [ 'route' => ['origins.update', $origin], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                            @include('admin.origins.partials.form', ['errors' => $errors])
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-10 text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                            {{ ucfirst(trans('common.update')) }}
                                        </button>
                                        <a href="{{ URL::previous() }}" class="btn btn-inverse">{{ ucfirst(trans('common.cancel')) }}</a>
                                    </div>
                                </div>
                            </div>
                            @include('admin.origins.partials.modal-edit')
                         {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
