@extends('layouts.admin.app')
@section('title', 'Pasanaku')
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
                            'final'=>ucfirst(trans('common.pasanaku_finished'))
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
                            <style type="text/css">
                                .tg  {border-collapse:collapse;border-spacing:0;}
                                .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                                  overflow:hidden;padding:10px 5px;word-break:normal;}
                                .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                                  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                                .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
                            </style>
                            <table class="tg">
                                <thead>
                                  <tr>
                                    <th class="font-weight-bold">Nombre</th>
                                    <th class="font-weight-bold">Fecha Entrega</th>
                                  </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach ($datas['participant'] as $key=>$usr)
                                        <tr>
                                            <td class="">{{$usr}}</td>
                                            <td class="">{{$datas['delivery'][$key]}}</td>
                                        </tr>      
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
