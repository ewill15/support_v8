@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.wsp_users')))
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
                            'title'=>ucfirst(trans('common.users')),
                            'breadcrumbs'=>[
                                'text'=>[
                                    ucfirst(trans('common.clothes'))
                                ],
                                'url'=>[
                                    url('/admin/clothes')
                                ]
                            ],
                            'final'=>ucfirst(trans('common.list_wsp_user'))
                        ])
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="#" 
                            data-action="add"
                            data-title-msg="{{ ucwords(trans('common.add_wsp_user')) }}"
                            data-btn-action="{{ ucwords(trans('common.create')) }}"
                            data-btn-cancel="{{ ucfirst(trans('common.cancel')) }}"
                            class="btn btn-outline-primary float-right">
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
                    @include('admin.partials.searcher', ['url' => 'admin/users'])
                <!-- End form searchs --> 
                <!-- ============================================================== -->  
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr>
                                    <th class="actions">ID</th>
                                    <th>{{ ucfirst(trans('common.firstname')) }}</th>
                                    <th>{{ ucfirst(trans('common.lastname')) }}</th>
                                    <th>{{ ucfirst(trans('common.cellphone')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wsp_users as $item)
                                    <tr class="gradeX">
                                        <td>{{ @$item->id }}</td>
                                        <td>{{ @$item->first_name }}</td>
                                        <td>{{ @$item->last_name }}</td>
                                        <td>{{ @$item->cellphone }}</td>
                                        <td>
                                            <a class="dropdown-item" href="admin/wsp_user/{{$item->id}}">
                                                <i class="fas fa-whatsapp"></i> {{ ucfirst(trans('common.add_whatsapp')) }}
                                            </a>       
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.clothes.partials.modal-add')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $wsp_users->appends(request()->except('page'))->links() !!}
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
