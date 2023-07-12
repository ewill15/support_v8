jQuery(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   //execute after change quantity to display for filter
    $('select.display').on('change',function(){
        $("form#paginate").submit();
    });
    //editor text
    $('.summernote').summernote({
        height: 300,
        toolbar: [
            ['Insert', ['style']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['Insert', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['picture', ['picture']],
            ['height', ['height']],
            ['Insert', ['link','table','fullscreen','codeview']]
        ]
    });  
    
    /***************************************************************************************** 
     * LOGIN ACTION
     *****************************************************************************************/
    $('form#frm-login').on('submit',function(evt){      
        const url = $(this).attr('action');
        const formData = $(this).serialize();
        console.log('URL::'+url);
        console.log('data::'+formData)
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data);
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    }); 
});