@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.bills')))
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
                            'title'=>ucfirst(trans('common.bills')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.bills'))
                                ],
                                'url'=>[
                                    url('/admin/bills')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.list'))
                        ])
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="{{ url('admin/bills/create') }}" class="btn btn-outline-primary float-right">
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
                <!-- Form searchs -->   
                    @include('admin.partials.searcher', ['url' => 'admin/bills'])
                <!-- End form searchs --> 
                <!-- ============================================================== -->  
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr>
                                    <th>{{ ucfirst(trans('common.date')) }}</th>
                                    <th>{{ ucfirst(trans('common.company')) }}</th>
                                    <th>{{ ucfirst(trans('common.description')) }}</th>
                                    <th>{{ ucfirst(trans('common.price')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bills as $item)
                                    <tr class="gradeX">
                                        <td class="w-150p">{{ @$item->formatted_date }}</td>
                                        <td>{{ @$item->company->name }}</td>
                                        <td>{{ @$item->description }}</td>
                                        <td>{{ @$item->price }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    {{ ucfirst(trans('common.actions')) }}
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a href="{{ url('admin/bills/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                            <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"
                                                            data-action="delete"
                                                            data-name="{{$item->date}} in {{$item->company->name}}" 
                                                            data-url="{{ route('bills.destroy', $item->id) }}" 
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
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.bills.partials.modal-delete')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $bills->appends(request()->except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End table --> 
                <!-- ============================================================== --> 
                </div>
            </div>
        </div>
    </section>
@endsection
