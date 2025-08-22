@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.clothes')))
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
                            'title'=>ucfirst(trans('common.clothes')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.clothes'))
                                ],
                                'url'=>[
                                    url('/admin/clothes')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.report'))
                        ])
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

            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-all-tab" data-toggle="pill" href="#custom-all" role="tab" aria-controls="custom-all" aria-selected="true">
                                {{ ucfirst(trans('common.report_daily')) }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-list-week-tab" data-toggle="pill" href="#custom-list-week" role="tab" aria-controls="custom-list-week" aria-selected="false">
                                {{ ucfirst(trans('common.report_week')) }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-list-month-tab" data-toggle="pill" href="#custom-list-month" role="tab" aria-controls="custom-list-month" aria-selected="false">
                                {{ ucfirst(trans('common.report_month')) }}
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="custom-list-graph-tab" data-toggle="pill" href="#custom-list-graph" role="tab" aria-controls="custom-list-graph" aria-selected="false">
                                {{ ucfirst(trans('common.report_graph')) }}
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-----------------DAY------------------------->
                        <div class="tab-pane fade active show" id="custom-all" role="tabpanel" aria-labelledby="custom-all-tab">                                                            
                            <div class="row mb-3">                                
                                <div class="col">
                                    {{-- <button id="btn-detail" class="btn btn-outline-primary disabled">
                                        {{ ucfirst(trans('common.sales_detail')) }}
                                    </button>
                                
                                    <button id="btn-resume" class="btn btn-outline-secondary">
                                        {{ ucfirst(trans('common.sales_resume')) }}
                                    </button> --}}
                                </div>
                            </div>
                            
                            <div id="daily">
                                <div class="table-responsive">                                
                                    <table class="table table-register table-striped table-bordered table-hover">                                        
                                        <thead>
                                            <tr>
                                                <th>{{ ucfirst(trans('common.date_sale')) }}</th>
                                                <th>{{ ucfirst(trans('common.type')) }}</th>
                                                <th>{{ ucfirst(trans('common.description')) }}</th>
                                                <th>{{ ucfirst(trans('common.transaction_type')) }}</th>
                                                <th>{{ ucfirst(trans('common.quantity')) }}</th>
                                                <th>{{ ucfirst(trans('common.price')) }}</th>
                                                @if (auth()->user()->role == 'admin')
                                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                                @endif
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($clothes as $item)
                                                <tr class="gradeX {{ $item->type == 1 ? '' : 'text-danger' }}">
                                                    <td class="w-150p">{{ @$item->dateSaleFormat }}</td>
                                                    <td>{{ @$item->income }}</td>
                                                    <td>{{ @$item->description }}</td>
                                                    <td>{{ @$item->paymentText }}</td>
                                                    <td>{{ @$item->quantity }}</td>
                                                    <td>{{ @$item->price }}</td>
                                                    @if (auth()->user()->role == 'admin')
                                                        <td>
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                {{ ucfirst(trans('common.actions')) }}
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                    <a href="{{ url('admin/clothes/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                                        <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-action="delete"
                                                                        data-name="{{ $item->description }}" 
                                                                        data-url="{{ route('clothes.destroy', $item->id) }}" 
                                                                        data-title-msg="{{ ucfirst(trans('common.delete')) }}" 
                                                                        data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                                        data-btn-action="{{ ucwords(trans('common.delete')) }}"
                                                                        data-btn-cancel="{{ ucfirst(trans('common.cancel')) }}"
                                                                    >
                                                                        <i class="fas fa-trash-alt"></i> {{ ucfirst(trans('common.delete')) }}
                                                                    </a>
                                                            </div>
                                                        </div>       
                                                    </td>
                                                    @endif                                                
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @include('admin.clothes.partials.modal-delete')
                                    <div class="float-left">
                                        {{ $text_pagination }}
                                    </div>
                                    <div class="float-right">                                        
                                        <div class="btn-group">
                                        {!! $clothes->appends(request()->except('page'))->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="resume" style="display:none">
                                <div class="form-group row {{ $errors->has('date_resume') ? 'has-error' : ''}}">
                                    <label for="date_resume" class="col-md-4 form-control-label text-md-right">
                                        {{ ucfirst(trans('validation.attributes.date')) }}
                                    </label>    
                                    <div class="col-md-4">
                                        <div class="input-group date" id="date_resume" data-target-input="nearest">
                                            {!! Form::text('date_resume', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#date_resume']) !!}
                                            {!! $errors->first('date_resume', '<p class="help-block">:message</p>') !!}
                                            <div class="input-group-append" data-target="#date_resume" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <button id="calc_resume" class="btn btn-outline-success mt-3">
                                            {{ ucfirst(trans('common.calculate')) }}
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-register table-striped table-bordered table-hover">                                        
                                        <thead>
                                            <tr>
                                                <th>{{ ucfirst(trans('common.date_sale')) }}</th>
                                                <th>{{ ucfirst(trans('common.income')) }}</th>
                                                <th>{{ ucfirst(trans('common.income_qr')) }}</th>
                                                <th>{{ ucfirst(trans('common.expenses')) }}</th>
                                                <th>{{ ucfirst(trans('common.expenses_qr')) }}</th>
                                                <th>{{ ucfirst(trans('common.total_income')) }}</th>
                                                <th>{{ ucfirst(trans('common.total_expenses')) }}</th>
                                                <th>{{ ucfirst(trans('common.total')) }}</th>
                                                <th>{{ ucfirst(trans('common.total_clothes')) }}</th>                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeX">
                                                <td class="date w-150p"></td>
                                                <td class="income"></td>
                                                <td class="income_qr"></td>
                                                <td class="expenses"></td>
                                                <td class="expenses_qr"></td>
                                                <td class="total_income"></td>
                                                <td class="total_expenses"></td>
                                                <td class="total"></td>
                                                <td class="total_clothes"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                        <!-----------------WEEK------------------------->
                        <div class="tab-pane fade" id="custom-list-week" role="tabpanel" aria-labelledby="custom-list-week-tab">                                                       
                            <div class="table-responsive">                                
                                <table class="table table-register table-striped table-bordered table-hover">                                        
                                    <thead>
                                    <tr>
                                        <th>{{ ucfirst(trans('common.week_number')) }}</th>
                                        <th>{{ ucfirst(trans('common.income')) }}</th>
                                        <th>{{ ucfirst(trans('common.inqr')) }}</th>
                                        <th>{{ ucfirst(trans('common.expenses')) }}</th>
                                        <th>{{ ucfirst(trans('common.eqr')) }}</th>
                                        <th>{{ ucfirst(trans('common.clothes')) }}</th>                                        
                                        <th>{{ ucfirst(trans('common.total')) }}</th>
                                        <th>{{ ucfirst(trans('common.totalqr')) }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($summariesByWeek as $item)
                                            <tr class="gradeX">
                                                <td>{{ substr(@$item->semana,4) }}</td>
                                                <td>{{ @$item->ingreso }}</td>
                                                <td>{{ @$item->ingreso_qr }}</td>
                                                <td>{{ @$item->gasto }}</td>
                                                <td>{{ @$item->gasto_qr }}</td>
                                                <td>{{ @$item->total_prendas }}</td>                                                
                                                <td>{{ @$item->ingreso - @$item->gasto }}</td>
                                                <td>{{ @$item->ingreso_qr -  @$item->gasto_qr}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-----------------MONTH------------------------->
                        <div class="tab-pane fade show active" id="custom-week" role="tabpanel">
                            @include('admin.clothes.partials.resume-detail', ['time'=>'week']) 
                        </div>
                        <div class="tab-pane fade" id="custom-month" role="tabpanel">
                            @include('admin.clothes.partials.resume-detail', ['time'=>'month'])
                        </div>

                        <div class="tab-pane fade" id="custom-list-month" role="tabpanel" aria-labelledby="custom-list-month-tab">                            
                            <div class="table-responsive">
                                <table class="table table-register table-striped table-bordered table-hover">                                        
                                    <thead>
                                    <tr>
                                        <th>{{ ucfirst(trans('common.date')) }}</th>
                                        <th>{{ ucfirst(trans('common.income')) }}</th>
                                        <th>{{ ucfirst(trans('common.inqr')) }}</th>
                                        <th>{{ ucfirst(trans('common.expenses')) }}</th>
                                        <th>{{ ucfirst(trans('common.eqr')) }}</th>
                                        <th>{{ ucfirst(trans('common.clothes')) }}</th>                                        
                                        <th>{{ ucfirst(trans('common.total')) }}</th>
                                        <th>{{ ucfirst(trans('common.totalqr')) }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($summariesByMonth as $item)
                                            <tr class="gradeX">
                                                <td>{{ @$item->mes }}</td>
                                                <td>{{ @$item->ingreso }}</td>
                                                <td>{{ @$item->ingreso_qr }}</td>
                                                <td>{{ @$item->gasto }}</td>
                                                <td>{{ @$item->gasto_qr }}</td>
                                                <td>{{ @$item->total_prendas }}</td>                                                
                                                <td>{{ @$item->ingreso - @$item->gasto }}</td>
                                                <td>{{ @$item->ingreso_qr -  @$item->gasto_qr}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-----------------GRAPH------------------------->
                        <div class="tab-pane fade" id="custom-list-graph" role="tabpanel" aria-labelledby="custom-list-graph-tab">
                            <span>under contruction</span>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
$(document).ready(function () {
  const fileMap = {
    '#custom-all': 'clothes/report/daily',
    '#custom-week': 'clothes/report/weekly',
    '#custom-month': 'clothes/report/monthly'
  };

  function loadContent(tabId) {
    const url = fileMap[tabId];
    if (url) {
      $(tabId).html('<p>Cargando...</p>');
      $.ajax({
        url: url,
        method: 'GET',
        success: function (data) {
            console.log(data)
        //     $.each(data,function(index,value){
        //         result = "<tr class='gradeX'>";
        //         result += "<td> semana.substr(4, 2) </td> <td> ingreso </td> <td> ingreso_qr </td> <td> gasto </td> <td> gasto_qr </td>";
        //         result += "<td> total_prendas </td> <td> ingreso - gasto </td> <td> ingreso_qr -  gasto_qr</td> </tr>"

        //     })
        //   $(tabId).html(data);
        },
        error: function () {
          $(tabId).html('<p>Error al cargar el contenido.</p>');
        }
      });
    }
  }

  // Cargar la pestaña activa por defecto
//   loadContent('#custom-all');

  // Al hacer clic en una pestaña
   // Al hacer clic en pestañas
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        let tabId = $(e.target).attr('href');
        console.log(tabId);
    });
});
</script>    
@endsection


