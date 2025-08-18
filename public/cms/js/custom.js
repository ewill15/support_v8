jQuery(function () {
    // domain
    let domain = $('meta[name="domain"]').attr("content");
    //to ajax request
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // hide sucursal by default and show warehouse in INCOMES
    $("form#form-income .sucursal-option").hide();

    // function to button next
    function btn_next(prv_tab, prv_content_tab, nxt_tab, nxt_content_tab) {
        $("#custom-tabs-three-" + prv_tab + "-tab")
            .addClass("disabled")
            .removeClass("active")
            .attr("aria-selected", "false");
        $("#custom-tabs-three-" + prv_content_tab + "-data").removeClass(
            "show active"
        );
        $("#custom-tabs-three-" + nxt_tab + "-tab")
            .addClass("active")
            .attr({ "data-toggle": "pill", "aria-selected": "true" });
        $("#custom-tabs-three-" + nxt_content_tab + "-data").addClass(
            "show active"
        );
    }

    // update email
    $(".change-email").on("click", function () {
        let user_id = $(this).attr("data-id");
        $("#upd-email-" + user_id).fadeToggle("slow");
    });
    //new password
    $(".change-pwd").on("click", function () {
        let user_id = $(this).attr("data-id");

        $.ajax({
            method: "POST",
            url: "personals/change_pwd",
            data: { id: user_id },
        }).done(function (data) {
            if (data.status) $(".info-msg").fadeIn("slow");
            setTimeout(function () {
                $("#modal-account-" + user_id).modal("hide");
            }, 5000);
        });
    });
    /* select y daterange picker for incomes */

    //Date range picker
    $("#reservation").daterangepicker({
        locale: {
            format: "YYYY-MM-DD",
            separator: " ",
            applyLabel: "Aplicar",
            cancelLabel: "Cancelar",
            fromLabel: "Desde",
            toLabel: "Hasta",
            customRangeLabel: "Custom",
            weekLabel: "W",
            daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            monthNames: [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre",
            ],
            firstDay: 1,
        },
    });

    //Date range picker incomes
    $("#date_in").datetimepicker({
        format: "DD-MM-YYYY",
        minDate: moment().subtract(1, "days"),
        maxDate: moment().add(760, "days"),
        autoclose:true,
        defaultDate: moment().format('MM-DD-YYYY')
    });

    //Date range picker incomes
    $("#date_sale").datetimepicker({
        format: "DD-MM-YYYY",
        locale: "es",
        minDate: moment().subtract(1, "days"),
        maxDate: moment().add(760, "days"),
        autoclose:true,
        defaultDate: moment().format('MM-DD-YYYY')
    });
    //Date birthday
    $("#dob").datetimepicker({
        format: "DD-MM-YYYY",
        locale: "es",
        minDate: moment().subtract(40, "years"),
        maxDate: moment(),
        defaultDate: moment().format('MM-DD-YYYY')
    });

    //sale clothes calendar
    $('.start_clothes, .end_clothes').datetimepicker({
        format: "DD-MM-YYYY",
        locale: "es",
        minDate: moment().subtract(1, "years"),
        defaultDate: moment().format("MM-DD-YYYY")
    });
    //function to preview before to upload image
    function readURL(input, preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#" + preview).attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            alert("select a file to see preview");
            $("#" + preview).attr("src", "");
        }
    }

    //image for personal
    $("form#form-personal input#image").on("change", function (e) {
        readURL(this, "preview");
    });
    //tooltip
    $('[data-toggle-tip="tooltip"]').tooltip();
    //Initialize Select2 Elements
    $(".select2").select2();

    
    /**********************************************************************************************
     *  MODALS
     **********************************************************************************************/
    function action_modal(modal_action) {
        $("#" + modal_action.modal_id + " form").attr(
            "action",
            modal_action.url
        );
        $("#" + modal_action.modal_id + " .modal-title")
            .empty()
            .text(modal_action.modal_title);

        if (modal_action.input_hidden) {
            //check if exist an input hiden in modal
            if (modal_action.state) {
                //for image gallery EDIT
                let status_img;
                if (modal_action.status.id == 1) {
                    $("#radioPrimary1").prop("checked", false); //NO
                    $("#radioPrimary2").prop("checked", true); //SI
                    status_img = modal_action.status.visible;
                } else {
                    $("#radioPrimary1").prop("checked", true); //NO
                    $("#radioPrimary2").prop("checked", false); //SI
                    status_img = modal_action.status.hidden;
                }
                $("#" + modal_action.modal_id + " .modal-body .text-detail")
                    .empty()
                    .html(
                        "Estado de la imagen <strong>" +
                        status_img +
                        "</strong>"
                    );
            } else {
                // image gallery DELETE
                $("#" + modal_action.modal_id + " .modal-body .text-detail")
                    .empty()
                    .text(modal_action.modal_text);
            }
            $("#" + modal_action.modal_id + " .modal-body input[name=id]")
                .empty()
                .val(modal_action.input_hidden);
        } else {  
            if (modal_action.custom_body) {
                //content for body in modal
                $("#" + modal_action.modal_id + " .modal-body")
                    .empty()
                    .html(
                        modal_action.modal_text + " "+
                        "<strong>" +
                        modal_action.content_name +
                        "</strong>"
                    );
            } else {                
                if(modal_action.participant){                    
                    var texting = "Nombre: <strong>"+modal_action.participant+"</strong>";
                    texting += "<span class='d-block'>Turno:<strong>"+modal_action.participant_turn+"</strong></span>";
                    $("#" + modal_action.modal_id + " .modal-body .text-detail")
                        .empty()
                        .html(texting);
                }else{
                    const texting = modal_action.modal_text+" <strong>"+modal_action.content_name+"</strong>";
                    $("#" + modal_action.modal_id + " .modal-body .text-detail")
                        .empty()
                        .html(texting);
                }                
            }
        }

        $("#" + modal_action.modal_id + " button[type=submit]")
            .empty()
            .html(modal_action.icon_accept + modal_action.btn_accept);
        $("#" + modal_action.modal_id + " .modal-footer button[type=button]")
            .empty()
            .html(modal_action.icon_cancel + modal_action.btn_cancel);
            
        if(!modal_action.url){
            $("#" + modal_action.modal_id + " button[type=submit]").on("click",function(evt){
                evt.preventDefault();
                $("#" + modal_action.modal_id).modal("hide");    
            });
        }

        $("#" + modal_action.modal_id).modal("show");
    }
    // add
    $("a[data-action=add]").on("click", function (event){
        event.preventDefault();

        let modal_object = {
            modal_id: "modalAdd",
            modal_title: $(this).attr("data-title-msg"), //title of modal
            btn_accept: $(this).attr("data-btn-action"), // text to send form
            btn_cancel: $(this).attr("data-btn-cancel"), // text to send form
            icon_accept: "<i class='fas fa-address-book' aria-hidden='true'></i>", //icon to accept btn
            icon_cancel: "<i class='fas fa-ban' aria-hidden='true'></i>", //icon to cancel btn
        };
        //agregar url a modal
        $("#" + modal_object.modal_id + " form").attr(
            "action",
            modal_object.url
        );
        //agregar titulo al modal
        $("#" + modal_object.modal_id + " .modal-title")
            .empty()
            .text(modal_object.modal_title);
        //agregar icono y texto a los botones
        $("#" + modal_object.modal_id + " button[type=submit]")
            .empty()
            .html(modal_object.icon_accept + modal_object.btn_accept);
        $("#" + modal_object.modal_id + " .modal-footer button[type=button]")
            .empty()
            .html(modal_object.icon_cancel + modal_object.btn_cancel);

        //mostrar modal
        $("#" + modal_object.modal_id).modal("show");

        //envio de peticion ajax
        if(!modal_object.url){
            $("#" + modal_object.modal_id + " button[type=submit]").on("click",function(evt){
                evt.preventDefault();
                const data = $("#" + modal_object.modal_id +" form").serialize();
                $.ajax({
                    method: "POST",
                    url: window.location.origin+'/admin/add_wsp_user',
                    data: data,
                }).done(function (data) {
                    console.log(data);
                }) .fail(function(xhr, status, error) {
                    alert( error );
                });

                $("#" + modal_object.modal_id).modal("hide");
                location.reload();  
            });
        }
    });
    // delete
    $("a[data-action=delete]").on("click", function (event) {
        event.preventDefault();

        let modal_object = {
            modal_id: "modalDelete",
            url: $(this).attr("data-url"), //url to send form
            modal_title: $(this).attr("data-title-msg"), //title of modal
            modal_text: $(this).attr("data-text-msg"), //text of modal
            content_name: $(this).attr("data-name"), //name of register
            btn_accept: $(this).attr("data-btn-action"), // text to send form
            btn_cancel: $(this).attr("data-btn-cancel"), // text to send form
            icon_accept: "<i class='fas fa-trash-alt' aria-hidden='true'></i>", //icon to accept btn
            icon_cancel: "<i class='fas fa-ban' aria-hidden='true'></i>", //icon to cancel btn
        };
        // action_modal(modal_object,true,false,false);
        action_modal(modal_object);
    });
    /**********************************************************************************************
     *  HASH PASSWORD
     **********************************************************************************************/
    $("a#hash").on("click", function (evt) {
        evt.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            method: "POST",
            url: url
        }).done(function (data) {
            $(".text-detail").removeClass('danger').removeClass('success');
            if (data.status){
                $(".text-detail").addClass("text-success").text(data.msg);
            }else{
                $(".text-detail").addClass("text-danger").text(data.msg);
            }

            $("#modalInfo").modal("show");

            setTimeout(function () {
                $("#modalInfo").modal("hide");
                location.reload();
            }, 3000);
        });
    });
});
