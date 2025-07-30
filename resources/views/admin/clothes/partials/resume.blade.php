
<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box resume-card">
        <span class="info-box-icon bg-success elevation-1 p-2">
        <i class="fas fa-users"></i>
        </span>

        <div class="info-box-content">
        <span class="info-box-text">{{ ucfirst(trans('common.money')) }}</span>
        <span class="info-box-number">
        {{$money}}
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
        {{$qr}}
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