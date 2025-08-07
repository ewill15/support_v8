{{-- <div class="row p-5">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="input-group input-daterange">
        <div class="col-md-4">
            <div class="input-group date" id="start_clothes" data-target-input="nearest">
                {!! Form::text('start_clothes', now()->format('d-m-Y'), ['class' => 'form-control datetimepicker-input', 'data-target' => '#start_clothes', 'readonly'=>'readonly']) !!}
                <div class="input-group-append" data-target="#start_clothes" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="input-group-addon px-3">to</div>
        <div class="col-md-4">
            <div class="input-group date" id="end_clothes" data-target-input="nearest">
                {!! Form::text('end_clothes', now()->format('d-m-Y'), ['class' => 'form-control datetimepicker-input', 'data-target' => '#end_clothes', 'readonly'=>'readonly']) !!}
                <div class="input-group-append" data-target="#end_clothes" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div> --}}

<div class="row p-5">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> INCOME</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box resume-card">
                        <span class="info-box-icon bg-success elevation-1 p-2">
                            <i class="fas fa-users"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ ucfirst(trans('common.money')) }}</span>
                            <span class="info-box-number">
                             {{$inmoney}}
                            </span>
                        </div>
                         <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box resume-card">
                        <span class="info-box-icon bg-warning elevation-1 p-2">
                        <i class="fas fa-qrcode"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ strtoupper(trans('common.qr')) }}</span>
                            <span class="info-box-number">
                            {{$inqr}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box resume-card">
                        <span class="info-box-icon bg-info elevation-1 p-2">
                        <i class="fas fa-user-tie"></i>
                        </span>

                        <div class="info-box-content">
                        <span class="info-box-text">{{ ucfirst(trans('common.clothes')) }}</span>
                        <span class="info-box-number">
                        {{$clothes}}
                        </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>                               
            </div>
        <!-- /.card-body -->
        </div>
    <!-- /.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">EXPENSES</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box resume-card">
                    <span class="info-box-icon bg-success elevation-1 p-2">
                    <i class="fas fa-users"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ ucfirst(trans('common.money')) }}</span>
                        <span class="info-box-number">{{$outmoney}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box resume-card">
                    <span class="info-box-icon bg-warning elevation-1 p-2">
                    <i class="fas fa-qrcode"></i>
                    </span>

                    <div class="info-box-content">
                    <span class="info-box-text">{{ strtoupper(trans('common.qr')) }}</span>
                    <span class="info-box-number">
                    {{$outqr}}
                    </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>