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
                            'final'=>ucfirst(trans('common.list'))
                        ])
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="{{ url('admin/pasanakus/create') }}" class="btn btn-outline-primary float-right">
                            <i class="fas fa-plus-circle"></i>
                            {{ ucfirst(trans('common.create')) }}
                        </a>
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

            <div class="card card-primary card-outline">
                <div class="card-body">
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">                        
                        <div class="table-responsive"> 
                            <p>
                                <h4>{{$fee_pas[0]->pasanaku->name}}</h4>
                            </p>
                            <p>
                                Monto por participante: {{$fee_pas[0]->pasanaku->amount_total}}
                            </p>
                            <p>
                                Monto por ronda: {{$fee_pas[0]->pasanaku->amount_total*$fee_pas[0]->pasanaku->participant_total}}
                            </p>
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>{{ ucfirst(trans('common.name')) }}</th>
                                    <th>{{ ucfirst(trans('common.round')) }}</th>
                                    <th>{{ ucfirst(trans('common.fee_type')) }}</th>
                                    <th>{{ ucfirst(trans('common.registered_date')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fee_pas as $key=>$item)
                                    <tr class="gradeX text-center">
                                        <td>{{ ++$key }}</td>
                                        <td class="col-mwidth-150">
                                            {{ @$item->user->full_name }}
                                        </td>
                                        <td class="col-mwidth-150">{{ $item->round }}</td>
                                        <td class="col-mwidth-150">{{ $item->typeLegend->name }}</td>
                                        <td class="col-mwidth-150">{{ $item->formatted_date }}</td>                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- End table --> 
                <!-- ============================================================== --> 
                </div>
            </div>
        </div>
    </section>
@endsection
