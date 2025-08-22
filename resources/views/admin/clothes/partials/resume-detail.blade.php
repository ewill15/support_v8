<div class="table-responsive">                                
    <table class="table table-register table-striped table-bordered table-hover">                                        
        <thead>
        <tr>
            @if ($time=='week')
                <th>{{ ucfirst(trans('common.week_number')) }}</th>
            @else
                <th>{{ ucfirst(trans('common.date')) }}</th>
            @endif
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
                {{-- <tr class="gradeX">
                    <td>{{ substr(@$item->semana,4) }}</td>
                    <td>{{ @$item->ingreso }}</td>
                    <td>{{ @$item->ingreso_qr }}</td>
                    <td>{{ @$item->gasto }}</td>
                    <td>{{ @$item->gasto_qr }}</td>
                    <td>{{ @$item->total_prendas }}</td>                                                
                    <td>{{ @$item->ingreso - @$item->gasto }}</td>
                    <td>{{ @$item->ingreso_qr -  @$item->gasto_qr}}</td>
                </tr> --}}
        </tbody>
    </table>
</div>