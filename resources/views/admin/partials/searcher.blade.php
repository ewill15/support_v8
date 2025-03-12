{!! Form::open([
    'method' => 'GET', 
    'url' => 'https://azsupportw.wuaze.com/admin/webs', 
    'id' => 'paginate', 
    'class' => 'form-horizontal pt-3', 
    'autocomplete' => 'off', 
    'enctype' => 'multipart/form-data']) 
!!}
    <div class="card p-4">
        <div class="row g-3 justify-content-center align-items-center">
            
            <!-- Display Selection -->
            <div class="col-12 col-md-4 d-flex align-items-center gap-2 mb-4">
                {!! Form::label('pagination', 'Display', ['class' => 'form-control-label mr-2']) !!}
                {!! Form::select('pagination', [10 => '10', 20 => '20', 50 => '50', 100 => '100', 500 => '500'], 20, ['class' => 'form-select form-select-sm']) !!}
                {!! Form::label('pagination', 'Records', ['class' => 'form-control-label ml-2']) !!}
            </div>
            
            <!-- Search Input -->
            <div class="col-12 col-md-4 d-flex align-items-center gap-2">
                {!! Form::text('keyword', null, ['class' => 'form-control form-control-sm w-50', 'placeholder' => 'Search...']) !!}
                {!! Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}