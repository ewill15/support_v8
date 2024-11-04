@extends('layouts.admin.app')
@section('title', 'Fee Pasanaku')
@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="page-breadcrumb">
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
                            {!! Form::open([
                                'id'=>'form-fee-pasanaku', 
                                'method' => 'POST',
                                'class' => 'form-horizontal',
                                'autocomplete'=>'off'
                            ]) !!}
                            @include('admin.pasanakus.partials.form_fee_pasanaku', ['errors' => $errors])                            
                            @include('admin.partials.buttons')
                            {!! Form::close() !!}

                            <div class="col-md-offset-4 col-md-10 text-center mt-3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-purple" data-toggle="modal" data-target="#feeForward">
                                    {{ ucfirst(trans('common.fee_forward')) }}
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="feeForward" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ ucfirst(trans('common.fee_forward')) }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            {!! Form::open([
                                                'id'=>'form-fee-forward', 
                                                'method' => 'POST',
                                                'url'=>url("admin/pasanakus/$pasanaku->id/fee_forward"),
                                                'class' => 'form-horizontal',
                                                'autocomplete'=>'off'
                                            ]) !!}
                                            {!! Form::hidden('pasanaku_id', $pasanaku->id, ['class' => 'form-control']) !!}
                                            {!! Form::hidden('round', $participant->turn, ['class' => 'form-control']) !!}
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="round" class="col-md-4 form-control-label text-md-right">
                                                        Desde ronda:
                                                    </label>
                                                    <div class="col-md-2">                            
                                                        {!! Form::number('round', $participant->turn, ['class' => 'form-control', 'min'=>1, 'max'=>$pasanaku->participant_total]) !!}
                                                        {!! $errors->first('round', '<p class="help-block">:message</p>') !!}
                                                    </div>                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label for="counter" class="col-md-4 form-control-label text-md-right">
                                                        Cuotas:
                                                    </label>
                                                    <div class="col-md-2">                            
                                                        {!! Form::number('counter', null, ['class' => 'form-control', 'min'=>2]) !!}
                                                        {!! $errors->first('counter', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 form-control-label text-md-right">
                                                        Participante:
                                                    </label>
                                                    <div class="col-md-2">
                                                        {!! Form::select('user_id', $usr_list, null,['class' => 'form-control select2 col-md-10','name'=>'user_id', 'autocomplete' => 'off', 'aria-describedby' => 'users']) !!}
                                                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>                    
                                            </div>
                                            <div class="modal-footer">
                                                {{$pasanaku->participant_total}} 
                                                {{$total_registered}}
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ ucfirst(trans('common.cancel')) }}</button>
                                                <button type="submit" class="btn btn-primary">{{ ucfirst(trans('common.create')) }}</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>  
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
