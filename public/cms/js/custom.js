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

    // provider form button  send form
    // client form button  send form
    // personal form button  send form
    // company form button  send form
    $(".btn-send-form").on("click", function () {
        let btn_send_name = $(this).attr("data-btn");

        switch (btn_send_name) {
            case "provider":
                $("#form-provider").get(0).submit();
                break;
            case "personal":
                let numberOfChecked = $("input:checkbox:checked").length;
                if (numberOfChecked) {
                    $("#table-permission-msg")
                        .removeClass("d-block")
                        .addClass("d-none");
                    $("#form-personal").get(0).submit();
                } else {
                    $("#table-permission-msg")
                        .removeClass("d-none")
                        .addClass("d-block");
                }
                break;
            case "company":
                $("#form-company").get(0).submit();
                break;
            case "client":
                $("#form-client").get(0).submit();
                break;
            case "income":
                $("#form-income").get(0).submit();
                break;
            case "product":
                let validator = $("#form-product").validate();
                if (validator.form()) {
                    $("#form-product").get(0).submit();
                }
                break;
            default:
                //form does not exists
                alert("formulario no encontrado");
                break;
        }
    });

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
    $("#dob,#date,#date_start").datetimepicker({
        format: "DD-MM-YYYY",
        locale: "es",
        minDate: moment().subtract(60, "days"),
        defaultDate: moment(),
    });
    /// switch for president
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch("state", $(this).prop("checked"));
        $(this).on("switchChange.bootstrapSwitch", function () {
            let check = $(".bootstrap-switch-on");
            if (check.length > 0) {
                //display president option
                $("#manager").fadeIn();
            } else {
                //hide president option
                $("#manager").fadeOut();
            }
        });
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

    //image for banners
    $("form#form-banners input#image").on("change", function () {
        readURL(this, "preview");
    });

    //image for company
    $("form#form-company input#image").on("change", function () {
        readURL(this, "preview");
    });
    $("form#form-company input#logo").on("change", function () {
        readURL(this, "previewLogo");
    });
    //image for provider
    $("form#form-provider input#image").on("change", function () {
        readURL(this, "preview");
    });
    //image for storage_image
    $("form#storage_image input#image").on("change", function () {
        readURL(this, "preview");
    });

    //display image more bigger in product detail

    $(".product-image-thumb img").on("click", function () {
        let img_src;
        img_src = $(this).attr("src");
        $(".full-image img").attr("src", img_src);
        $(".product-image-thumb")
            .removeClass("no-overlay-product-detail")
            .addClass("overlay-product-detail");
        if ($(this).parent().hasClass("overlay-product-detail")) {
            $(this)
                .parent()
                .removeClass("overlay-product-detail")
                .addClass("no-overlay-product-detail");
        }
    });
    // ******************************************************
    // income register  form step-2
    // ******************************************************
    let max_item = 3;
    let count_item = 1;
    let array_total = [];
    let subtotal = 0;

    function sumTotal(total_values) {
        return total_values.reduce(function (
            valorAnterior,
            valorActual,
            indice,
            vector
        ) {
            return parseFloat(valorAnterior) + parseFloat(valorActual);
        });
    }
    $(".btn-add-item").on("click", function () {
        let validator = $("#form-income").validate();
        if (validator.form()) {
            let brand_txt = $("select[name=brand_id] option:selected").text();
            let prototype_txt;
            let quantity = $("input[name=quantity]").val();
            let product_id = $("input[name=aproduct_id]").val();
            let product = $("input[name=aproduct]").val();

            let tmp_purchasePrice = $("input[name=purchasePrice]").val();
            let tmp_higherPrice = $("input[name=higherPrice]").val();
            let tmp_detailPrice = $("input[name=detailPrice]").val();

            let purchasePrice = tmp_purchasePrice
                ? parseFloat(tmp_purchasePrice).toFixed(2)
                : 0;
            let higherPrice = tmp_higherPrice
                ? parseFloat(tmp_higherPrice).toFixed(2)
                : 0;
            let detailPrice = tmp_detailPrice
                ? parseFloat(tmp_detailPrice).toFixed(2)
                : 0;

            let warehouse_sucursal_val;
            let warehouse_sucursal_txt;

            if ($(".warehouse-option").is(":visible")) {
                warehouse_sucursal_val = $("select.warehouse :selected").val();
                warehouse_sucursal_txt = $("select.warehouse :selected").text();
            } else {
                warehouse_sucursal_val = $("select.sucursal :selected").val();
                warehouse_sucursal_txt = $("select.sucursal :selected").text();
            }

            let price_total = (
                parseFloat(purchasePrice) * parseFloat(quantity)
            ).toFixed(2);

            let action_button =
                "<a class='badge bg-danger btn-delete'>Remover</a>";
            if (count_item <= max_item) {
                prototype_txt = $(
                    "select[name=prototype_id] option:selected"
                ).text();
                
                // agregar fila en la tabla
                $("#tbl-add-item").append(
                    $("<tr>").append(
                        "<td class='align-middle'><input type='hidden' name='product_id[]' value='" +
                        product_id +
                        "'>" +
                        "<div>" +
                        brand_txt +
                        " " +
                        prototype_txt +
                        "</div><div> " +
                        product +
                        "</div></td>" +
                        "<td class='text-center align-middle'><input type='hidden' name='quantity[]' value='" +
                        quantity +
                        "'>" +
                        quantity +
                        "</td>" +
                        "<td class='text-center align-middle'><input type='hidden' name='purchasePrice[]' value='" +
                        purchasePrice +
                        "'>" +
                        purchasePrice +
                        "</td>" +
                        "<td class='text-center align-middle'><input type='hidden' name='higherPrice[]' value='" +
                        higherPrice +
                        "'>" +
                        higherPrice +
                        "</td>" +
                        "<td class='text-center align-middle'><input type='hidden' name='detailPrice[]' value='" +
                        detailPrice +
                        "'>" +
                        detailPrice +
                        "</td>" +
                        "<td class='align-middle'><input type='hidden' name='warehouse_id[]' value='" +
                        warehouse_sucursal_val +
                        "'>" +
                        warehouse_sucursal_txt +
                        "</td>" +
                        "<td class='text-center align-middle product_total'>" +
                        price_total +
                        "</td>" +
                        "<td class='align-middle'>" +
                        action_button +
                        "</td>"
                    )
                );
                // borrar input de precios
                $('#form-income input[name=quantity]').val('')
                $('#form-income input[name=purchasePrice]').val('');
                //reset select marca
                $("select#brand_id").val(""); // Select the option with a value of '1'
                $("select#brand_id").trigger("change"); // Notify any JS components that the value changed
                // habilitar - deshabilitar boton si existe o no  alguna fila en la tabla
                if ($("#tbl-add-item tr").length > 0)
                    $(".bnext-income-step2").removeAttr("disabled");
                else $(".bnext-income-step2").addAttr("disabled");
                // add total price to  array
                $("#tbl-add-item .product_total").each(function () {
                    let totalProduct = $(this).text();
                    array_total.push(totalProduct);
                });

                // sum each value of array
                subtotal = array_total.reduce(function (
                    valorAnterior,
                    valorActual
                ) {
                    return parseFloat(valorAnterior) + parseFloat(valorActual);
                });
                array_total = [];
                $(".table #subtotal").empty().text(subtotal);
                $("input[name=subtotal]").val(subtotal);
                $(".table #totaltext").empty().text(subtotal);
                $("input[name=total]").val(subtotal);

                count_item++;
            } else {
                alert("se alcanzó la maxima cantidad de registros");
            }
        }
    });

    $("#tbl-add-item").on("click", ".btn-delete", function (e) {
        e.preventDefault();

        let total = $(".table input[name=subtotal]").val();
        let total_deleted = $(this).parent().siblings("td").last().text();
        let new_subtotal = parseFloat(total) - parseFloat(total_deleted);

        $(this).parent().parent().remove();
        $(".table #subtotal").empty().text(new_subtotal);
        $("input[name=subtotal]").val(new_subtotal);
        $(".table #totaltext").empty().text(new_subtotal);
        $("input[name=total]").val(new_subtotal);
        count_item--;

        // habilitar / deshabilitar boton siguiente
        if ($("#tbl-add-item tr").length > 0)
            $(".bnext-income-step2").removeAttr("disabled");
        else {
            $(".bnext-income-step2").attr("disabled", "disabled");
            $(".table #subtotal").text("0");
            $("input[name=subtotal]").val(0);
            $(".table #totaltext").text("0");
            array_total = [];
            $(".invoice-info input").val("");
            $("select#brand_id").val(""); // Select the option with a value of '1'
            $("select#brand_id").trigger("change"); // Notify any JS components that the value changed
        }
    });

    //recalcular al cambiar el monto de descuento con los controles
    $("input#idiscount").on("change", function () {
        let subtotal_to_discount = $(".table #subtotal").text();
        let discount_price = 0;

        discount_price = $(this).val();
        discount_price =
            parseFloat(subtotal_to_discount) - parseFloat(discount_price);

        $(".table #totaltext").empty().text(discount_price.toFixed(2));
        $("input[name=total]").val(discount_price.toFixed(2));
    });
    $('input#idiscount').on("keyup", function (evt) {
        let number_pressed = evt.which;

        if((number_pressed>95 && number_pressed<=105) || (number_pressed>47 && number_pressed<=57)){
            let subtotal = parseFloat($('td#subtotal').text());
            let total = parseFloat($('td#totaltext').text());
            if ($(this).val()){
                let discount = parseFloat($(this).val());
                if(discount>0){
                    total =  subtotal-discount;
                    if(total > 0){
                        $('td#totaltext').text(total.toFixed(2));
                        $('input[name=total]').val(total.toFixed(2));
                    }
                }
            }
        }
    });
    //tooltip
    $('[data-toggle-tip="tooltip"]').tooltip();
    //Initialize Select2 Elements
    $(".select2").select2();

    /** ***********************************************************************************
     * dependat select for income
     *************************************************************************************** */
    // // BRAND
    // $("select[name=brand_id]").on("change", function () {
    //     let brand_id = $(this).val();
    //     let option = "";
    //     let ajax_url = domain + "/admin/incomes/prototypes/brand";

    //     $("select#prototype_id").empty().attr("disabled", "disabled");
    //     if (brand_id) {
    //         $.ajax({
    //             method: "POST",
    //             url: ajax_url,
    //             data: { brand: brand_id },
    //         }).done(function (data) {
    //             if (data.status) {
    //                 for (const property in data.list) {
    //                     option +=
    //                         "<option value='" +
    //                         property +
    //                         "'>" +
    //                         data.list[property] +
    //                         "</option>";
    //                 }
    //                 if (option.length) {
    //                     $("select#prototype_id").select2("destroy");
    //                     $("select#prototype_id")
    //                         .removeAttr("disabled")
    //                         .html(option)
    //                         .prepend(
    //                             "<option value='' selected>Seleccionar...</option>"
    //                         );
    //                     $("select#prototype_id").select2();
    //                 }
    //             } else {
    //                 // setTimeout(function () {
    //                 //     $("#modal-account-" + user_id).modal("hide");
    //                 // }, 5000);
    //             }
    //         });
    //     } else {
    //         $("#img-product").slideUp("5000");
    //     }
    // });
    // // PROTOTYPE
    // $("select[name=prototype_id]").on("change", function () {
    //     let brand_id = $("select#brand_id").find(":selected").val();
    //     let prototype_id = $(this).val();
    //     let ajax_url = domain + "/admin/incomes/brands/product";

    //     $.ajax({
    //         method: "POST",
    //         url: ajax_url,
    //         data: {
    //             prototype: prototype_id,
    //             brand: brand_id,
    //         },
    //     }).done(function (data) {
    //         if (data.status) {
    //             $("#img-product>img.img-product-thumb")
    //                 .attr("src", data.image)
    //                 .fadeIn("3000");
    //             $("#img-product").slideDown("5000");
    //             $("#img-product>#aproduct_id").val([data.product.id]);
    //             $("#img-product>#aproduct").val([
    //                 data.category,
    //                 data.subcategory,
    //                 data.product.productName,
    //             ]);
    //         } else {
    //             $("#img-product").slideUp("5000");
    //         }
    //     });
    // });

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
                    const texting = modal_action.modal_text+"<strong>"+modal_action.content_name+"</strong>";
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
    // next
    $("a[data-action=next]").on("click", function (event) {
        event.preventDefault();        

        var id_date = $(this).attr("data-next-delivery").split("::");
        var data = {
            id: id_date[0],
            date: id_date[1]
        };
        $.ajax({
            method: "POST",
            url: window.location.origin+'/admin/get_next_delivery',
            data: data,
        }).done(function (data) {
            let modal_object = {
                modal_id: "modalShow",
                modal_title: $("a[data-action=next]").attr("data-title-msg"), //title of modal
                modal_text: $("a[data-action=next]").attr("data-text-msg"), //text of modal
                content_name: $("a[data-action=next]").attr("data-name"), //name of register
                btn_accept: $("a[data-action=next]").attr("data-btn-action"), // text to send form
                btn_cancel: $("a[data-action=next]").attr("data-btn-cancel"), // text to cancel form
                icon_accept: "<i class='fas fa-trash-alt' aria-hidden='true'></i>", //icon to accept btn
                icon_cancel: "<i class='fas fa-ban' aria-hidden='true'></i>", //icon to cancel btn
                participant: JSON.parse(data).name,//participant name
                participant_turn: JSON.parse(data).turn//participant turn
            };
            
            action_modal(modal_object);
        }) .fail(function(xhr, status, error) {
            alert( error );
          });
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
        console.log(JSON.stringify(modal_object));
        // action_modal(modal_object,true,false,false);
        action_modal(modal_object);
    });
});
