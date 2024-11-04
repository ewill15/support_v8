@extends('layouts.admin.app')
@section('title', 'Pasanakus')
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
                        <h5 class="card-header">Multas</h5>
                        <div class="card-body">
                            <legend>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <div class="card card-primary card-outline card-tabs">
                                                <div class="card-header p-0 pt-1 border-bottom-0">
                                                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                                                          Multa Pasanaku
                                                        </a>
                                                    </li>
                                                  </ul>                  
                                                </div>
                                                <div class="card-body">
                                                  <div class="tab-content" id="custom-tabs-three-tabContent">
                                                    {{-- DATOS PASANAKU  --}}
                                                    @if ($penalty_pas->isNotEmpty())
                                                        @foreach ($penalty_pas as $item)
                                                            <div class="row">
                                                                <label class="col-md-4 form-control-label text-md-right text-bold">
                                                                    Participante:
                                                                </label>    
                                                                <div class="col-md-8">
                                                                    <label></label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-md-4 form-control-label text-md-right text-bold">
                                                                    Multa:
                                                                </label>    
                                                                <div class="col-md-8">
                                                                    <label>{{$item->penalty_amount}}</label>
                                                                </div>
                                                            </div>                          
                                                            <div class="row">
                                                                <label class="col-md-4 form-control-label text-md-right text-bold">
                                                                    Descripción:
                                                                </label>    
                                                                <div class="col-md-8">
                                                                    <label>{{$item->penalty_description}}</label>
                                                                </div>
                                                            </div>
                                                            @if (count($penalty_pas)>1)
                                                                <hr>    
                                                            @endif                                                        
                                                        @endforeach          
                                                    @else
                                                        <h2 class="text-center">No se cobraron multas</h2>
                                                    @endif
                                                                                                      
                                                  </div>
                                                </div>
                                                <!-- /.card -->
                                              </div>    
                                        </fieldset>
                                    </div>
                                </div>
                            </legend>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
