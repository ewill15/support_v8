<!-- Mainly scripts -->
<script src="{!! asset('cms/js/jquery-3.1.1.min.js') !!}"></script>
<script src="{!! asset('cms/js/popper.min.js') !!}"></script>
<script src="{!! asset('cms/js/bootstrap.js') !!}"></script>
<script src="{!! asset('cms/js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
<script src="{!! asset('cms/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>

<!-- Custom and plugin javascript -->
<script src="{!! asset('cms/js/inspinia.js') !!}"></script>
<script src="{!! asset('cms/js/plugins/pace/pace.min.js') !!}"></script>
<script src="{!! asset('cms/js/plugins/datapicker/bootstrap-datepicker.js') !!}"></script>
<script>
    $(document).ready( function () {
        $('select.display').on('change',function(){
            $("form#paginate").submit();
        });
        $('.date').datepicker({
            startDate: new Date(),
            format: 'dd-mm-yyyy',
            autoclose:true
        });
    });
</script>