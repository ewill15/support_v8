@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.companies')))
@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ ucfirst(trans('common.companies')) }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">{{ ucfirst(trans('common.home')) }}</a></li>
                                    <li class="breadcrumb-item active">{{ ucfirst(trans('common.company')) }}</li>
                                </ol>
                            </nav>
                        </div>
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
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">{{ucfirst(trans('common.companies'))}}</h5>
                        <div class="card-body">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ ucfirst(trans('common.name')) }}</th>
                                                <th>{{ ucfirst(trans('common.image')) }}</th>
                                                <th>{{ ucfirst(trans('common.description')) }}</th>
                                                <th>{{ ucfirst(trans('common.logo')) }}</th>
                                                <th>{{ ucfirst(trans('common.actions')) }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($companies as $item)
                                            <tr class="gradeX">
                                                <td>{{ @$item->id }}</td>
                                                <td>{{ @$item->name}}</td>
                                                <td> 
                                                    <img src="{{ @$item->getShowPictureAttribute() }}" alt="image" width="75px">
                                                </td>
                                                <td>{!! @$item->description !!}</td>
                                                <td> 
                                                    <img src="{{ @$item->getShowLogoAttribute() }}" alt="image" width="75px">
                                                </td>
                                                <td>
                                                    @if(@$edit)
                                                    <a href="{{ url('admin/companies/' . @$item->id . '/edit') }}" class="btn btn-primary btn-sm"  data-toggle-tip="tooltip" data-placement="top" title="Editar">                                            
                                                        <i class="fas fa-edit"></i>                                                        
                                                    </a> 
                                                @endif     
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>        
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>
        </div>
        
    </section>    
@endsection