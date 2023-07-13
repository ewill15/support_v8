@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.users')) )
@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ ucfirst(trans('common.users')) }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                                            {{ ucfirst(trans('common.home')) }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('/admin/users') }}" class="breadcrumb-link">
                                            {{ ucfirst(trans('common.users')) }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ ucfirst(trans('common.edit')) }}
                                    </li>
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
                        <h5 class="card-header">{{ ucfirst(trans('common.update_data')) }}</h5>
                        <div class="card-body">
                            {!! Form::model($user, [
                                'id'=>'form-user', 
                                'route' => ['users.update', $user], 
                                'method' => 'PUT', 
                                'enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal'
                                ]) 
                            !!}
                            @include('admin.users.partials.form', ['errors' => $errors])
                            @include('admin.partials.buttons', ['label' => ucfirst(trans('common.update'))])
                            {{-- @include('admin.users.partials.modal-edit') --}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
