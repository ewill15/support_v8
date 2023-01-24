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
    // function to button previous
    function btn_previous(
        prv_tab,
        prv_content_tab,
        current_tab,
        current_content_tab
    ) {
        $("#custom-tabs-three-" + current_tab + "-tab")
            .addClass("disabled")
            .removeClass("active")
            .attr("aria-selected", "false");
        $("#custom-tabs-three-" + current_content_tab + "-data").removeClass(
            "show active"
        );
        $("#custom-tabs-three-" + prv_tab + "-tab")
            .addClass("active ")
            .removeClass("disabled")
            .attr({ "data-toggle": "pill", "aria-selected": "true" });
        $("#custom-tabs-three-" + prv_content_tab + "-data").addClass(
            "show active"
        );
    }

    // TAB NOMBRE /IMAGENES
    $(".bnext-company-step1").on("click", function () {
        $.validator.setDefaults({
            submitHandler: function () {
                btn_next("name-data", "name", "mision-data", "mision");
            },
        });
        $("#form-company").validate({
            rules: {
                name: {
                    required: true,
                },
                mission: {
                    required: true,
                },
                vission: {
                    required: true,
                },
                address: {
                    required: true,
                },
                about_us: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                cellphone: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                name: {
                    required: "Debe escribir nombre de la compañía",
                },
                mission: {
                    required: "Debe escribir misión",
                },
                vission: {
                    required: "Debe escribir visión",
                },
                address: {
                    required: "Debe escribir una dirección",
                },
                about_us: {
                    required: "Este campo no puede ser vacio",
                },
                phone: {
                    required: "Debe escribir un número de teléfono",
                },
                cellphone: {
                    required: "Debe escribir un número de celular",
                },
                email: {
                    required:
                        "Debe escribir una direccion de correo electrónico",
                    email: "El correo electrónico es invalido",
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".required-name").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    });

    // TAB MISON /VISION
    $(".bnext-company-step2").on("click", function () {
        let validator = $("#form-company").validate();
        if (validator.form()) {
            btn_next("mision-data", "mision", "about-data", "about");
        }
    });
    $(".bprev-company-step1").on("click", function () {
        btn_previous("name-data", "name", "mision-data", "mision");
    });
    // TAB NOSOTROS
    $(".bnext-company-step3").on("click", function () {
        let validator = $("#form-company").validate();
        if (validator.form()) {
            btn_next("about-data", "about", "location-data", "location");
        }
    });
    $(".bprev-company-step2").on("click", function () {
        btn_previous("mision-data", "mision", "about-data", "about");
    });
    //  TAB UBICATION
    $(".bnext-company-step4").on("click", function () {
        let validator = $("#form-company").validate();
        if (validator.form()) {
            btn_next("location-data", "location", "account-data", "account");
        }
    });
    $(".bprev-company-step3").on("click", function () {
        btn_previous("about-data", "about", "location-data", "location");
    });
    // TAB ACCOUNT
    $(".bprev-company-step4").on("click", function () {
        btn_previous("location-data", "location", "account-data", "account");
    });

    // TAB Datos ingreso
    $(".bnext-income-step1").on("click", function () {
        $.validator.setDefaults({
            submitHandler: function () {
                btn_next("income-data", "income", "product-data", "product");
            },
        });
        $("#form-income").validate({
            rules: {
                date: {
                    required: true,
                },
                code_voucher: {
                    required: true,
                },
                brand_id: {
                    required: true,
                },
                prototype_id: {
                    required: true,
                },
                quantity: {
                    required: true,
                    digits: true,
                },
                purchasePrice: {
                    required: true,
                    number: true,
                },
            },
            messages: {
                date: {
                    required: "Se requiere la fecha",
                },
                code_voucher: {
                    required: "Debe escribir el Nro. del comprobante",
                },
                brand_id: {
                    required: "Debe elegir una marca",
                },
                prototype_id: {
                    required: "Debe elegir un modelo",
                },
                quantity: {
                    required: "Se requiere la cantidad",
                    digits: "Debe escribir un numero válido",
                },
                purchasePrice: {
                    required: "Debe escribir el precio de compra",
                    number: "Debe escribir un numero válido",
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".required-name").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    });
    $(".bprev-income-step1").on("click", function () {
        btn_previous("income-data", "income", "product-data", "product");
    });
    // ******************************************************
    // income
    // ******************************************************
    $(".bnext-income-step2").on("click", function () {
        btn_next("product-data", "product", "observation-data", "observation");
    });
    $(".bprev-income-step2").on("click", function () {
        btn_previous(
            "product-data",
            "product",
            "observation-data",
            "observation"
        );
    });

    // ******************************************************
    // product
    // ******************************************************
    $(".bprev-product-step1").on("click", function () {
        btn_previous("product-data", "product", "attribute-data", "attribute");
    });
    $(".bnext-product-step1").on("click", function () {
        let validator = $("#form-product").validate();

        $("#form-product").validate({
            ignore: [],
            rules: {
                productName: {
                    required: true,
                },
                description: {
                    required: true,
                },
                size: {
                    required: true,
                    minlength: 4,
                },
                serial_control: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                subcategory_id: {
                    required: true,
                },
                brand_id: {
                    required: true,
                },
                prototype_id: {
                    required: true,
                },
                origin_id: {
                    required: true,
                },
                type_id: {
                    required: true,
                },
            },
            messages: {
                productName: {
                    required: "Debe escribir nombre de producto",
                },
                description: {
                    required: "Debe escribir una descripcion",
                },
                size: {
                    required: "Debe escribir número de Tamaño/Talla",
                    minlength: "El tamaño debe tener 4 caracteres",
                },
                serial_control: {
                    required: "Debe seleccionar una opcion",
                },
                category_id: {
                    required: "Debe seleccionar una opción",
                },
                subcategory_id: {
                    required: "Debe seleccionar una opción",
                },
                brand_id: {
                    required: "Debe seleccionar una opción",
                },
                prototype_id: {
                    required: "Debe seleccionar una opción",
                },
                origin_id: {
                    required: "Debe seleccionar una opción",
                },
                type_id: {
                    required: "Debe seleccionar una opción",
                },
            },
            errorClass: "form-error",
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".required-name").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });

        if (validator.form()) {
            btn_next("product-data", "product", "attribute-data", "attribute");
        }
    });
    // ******************************************************
    // personal  form step-1
    // ******************************************************
    $(".bnext-personal-step1").on("click", function () {
        $.validator.setDefaults({
            submitHandler: function () {
                btn_next("user-data", "user", "personal-data", "personal");
            },
        });
        $("#form-personal").validate({
            rules: {
                name_lastname: {
                    required: true,
                    minlength: 3,
                },
                address: {
                    required: true,
                    minlength: 4,
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 8,
                },
                username: {
                    required: true,
                    minlength: 4,
                },
                email: {
                    required: true,
                    minlength: 4,
                },
                password: {
                    required: true,
                    minlength: 4,
                },
            },
            messages: {
                name_lastname: {
                    required: "Debe escribir un nombre y apellido",
                    minlength:
                        "El nombre y apellido debe ser de al menos 3 letras",
                },
                mobile: {
                    required: "Debe escribir nro. celular",
                    number: "Debe escribir un numero válido",
                    minlength: "El numero debe ser de al menos 8 dígitos",
                },
                address: {
                    required: "Debe escribir una dirección",
                    minlength: "La dirección debe ser de al menos 4 letras",
                },
                username: {
                    required: "Debe escribir nombre de usuario",
                    minlength:
                        "El nombre de usuario debe ser de al menos 4 dígitos",
                },
                email: {
                    required: "Debe escribir correo electónico",
                    email: "El correo electrónico es invalido",
                },
                password: {
                    required: "Debe escribir password",
                    minlength: "El numero debe ser de al menos 6 dígitos",
                },
            },
            errorClass: "form-error",
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".required-name").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
        $("input[name^='name_']").each(function () {
            $(this).rules("add", {
                required: true,
                messages: {
                    required: "Debe escribir un nombre y apellido",
                    minlength:
                        "El nombre y apellido debe ser de al menos 3 letras",
                },
            });
        });
    });

    // personal form step-2
    $(".bprev-personal-step2").on("click", function () {
        btn_previous("user-data", "user", "personal-data", "personal");
    });
    // personal form step-3
    $(".bprev-personal-step3").on("click", function () {
        btn_previous(
            "personal-data",
            "personal",
            "permission-data",
            "permission"
        );
    });

    $(".bnext-personal-step2").on("click", function () {
        let validator = $("#form-personal").validate();
        if (validator.form()) {
            btn_next(
                "personal-data",
                "personal",
                "permission-data",
                "permission"
            );
        }
    });

    // provider form
    $(".bprev-provider-step2").on("click", function () {
        btn_previous("user-data", "user", "provider-data", "provider");
    });
    $(".bnext-provider").on("click", function () {
        $.validator.setDefaults({
            submitHandler: function () {
                btn_next("user-data", "user", "provider-data", "provider");
            },
        });
        $("#form-provider").validate({
            rules: {
                name_lastname: {
                    required: true,
                    minlength: 3,
                },
                mobile: {
                    required: true,
                    minlength: 8,
                },
                provider_name: {
                    required: true,
                },
                address: {
                    required: true,
                },
                detail: {
                    required: true,
                },
            },
            messages: {
                name_lastname: {
                    required: "Debe escribir un nombre y apellido",
                },
                mobile: {
                    required: "Debe escribir nro. celular",
                    minlength: "El numero debe ser de al menos 8 dígitos ",
                },
                provider_name: {
                    required: "Debe escribir nombre de proveedor",
                },
                address: {
                    required: "Debe escribir una dirección",
                },
                detail: {
                    required: "Debe escribir el motivo de su modificacion",
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".required-name").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    });
    // client form
    $(".bprev-client-step2").on("click", function () {
        btn_previous("user-data", "user", "client-data", "client");
    });
    $(".bnext-client").on("click", function () {
        $.validator.setDefaults({
            submitHandler: function () {
                btn_next("user-data", "user", "client-data", "client");
            },
        });
        $("#form-client").validate({
            rules: {
                name_lastname: {
                    required: true,
                    minlength: 3,
                },
                mobile: {
                    required: true,
                    minlength: 8,
                },
                address: {
                    required: true,
                },
                detail: {
                    required: true,
                },
            },
            messages: {
                name_lastname: {
                    required: "Debe escribir un nombre y apellido",
                },
                mobile: {
                    required: "Debe escribir nro. celular",
                    minlength: "El numero debe ser de al menos 8 dígitos ",
                },
                address: {
                    required: "Debe escribir una dirección",
                },
                detail: {
                    required: "Debe escribir el motivo de su modificacion",
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".required-name").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });
    });

    $(".bsave-company").on("click", function () {
        $("#form-company").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                address: {
                    required: true,
                },
                cellphone: {
                    required: true,
                    minlength: 8,
                },
                mission: {
                    required: true,
                    minlength: 8,
                },
                vission: {
                    required: true,
                    minlength: 8,
                },
                about_us: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Debe escribir nombre",
                    minlength: 3,
                },
                address: {
                    required: "Debe escribir direccion",
                },
                cellphone: {
                    required: "Debe escribir numero de celular",
                    minlength: "El numero debe ser mayor a 8 digitos",
                },
                mission: {
                    required: "La mision no debe ser vacio",
                    minlength: "El numero debe ser mayor a 8 digitos",
                },
                vission: {
                    required: "La vision no debe ser vacio",
                    minlength: "El numero debe ser mayor a 8 digitos",
                },
                about_us: {
                    required: "El campo acerca de no debe ser vacio",
                },
                description: {
                    required: "La descripcion no debe ser vacia",
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".required-name").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
        });

        let validator = $("#form-company").validate();
        if (validator.form()) {
            $("#form-company").get(0).submit();
        }
    });
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
    $("#reservationdate").datetimepicker({
        format: "YYYY-MM-DD",
        locale: "es",
        minDate: moment().subtract(60, "days"),
        defaultDate: moment(),
    });
    /// switch for incomes
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch("state", $(this).prop("checked"));
        $(this).on("switchChange.bootstrapSwitch", function () {
            let check = $(".bootstrap-switch-on");
            if (check.length > 0) {
                //display warehouse option
                $(".warehouse-option").fadeIn("slow");
                $(".sucursal-option").fadeOut("fast");
            } else {
                //display sucursal option
                $(".sucursal-option").fadeIn("slow");
                $(".warehouse-option").fadeOut("fast");
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
    // BRAND
    $("select[name=brand_id]").on("change", function () {
        let brand_id = $(this).val();
        let option = "";
        let ajax_url = domain + "/admin/incomes/prototypes/brand";

        $("select#prototype_id").empty().attr("disabled", "disabled");
        if (brand_id) {
            $.ajax({
                method: "POST",
                url: ajax_url,
                data: { brand: brand_id },
            }).done(function (data) {
                if (data.status) {
                    for (const property in data.list) {
                        option +=
                            "<option value='" +
                            property +
                            "'>" +
                            data.list[property] +
                            "</option>";
                    }
                    if (option.length) {
                        $("select#prototype_id").select2("destroy");
                        $("select#prototype_id")
                            .removeAttr("disabled")
                            .html(option)
                            .prepend(
                                "<option value='' selected>Seleccionar...</option>"
                            );
                        $("select#prototype_id").select2();
                    }
                } else {
                    // setTimeout(function () {
                    //     $("#modal-account-" + user_id).modal("hide");
                    // }, 5000);
                }
            });
        } else {
            $("#img-product").slideUp("5000");
        }
    });
    // PROTOTYPE
    $("select[name=prototype_id]").on("change", function () {
        let brand_id = $("select#brand_id").find(":selected").val();
        let prototype_id = $(this).val();
        let ajax_url = domain + "/admin/incomes/brands/product";

        $.ajax({
            method: "POST",
            url: ajax_url,
            data: {
                prototype: prototype_id,
                brand: brand_id,
            },
        }).done(function (data) {
            if (data.status) {
                $("#img-product>img.img-product-thumb")
                    .attr("src", data.image)
                    .fadeIn("3000");
                $("#img-product").slideDown("5000");
                $("#img-product>#aproduct_id").val([data.product.id]);
                $("#img-product>#aproduct").val([
                    data.category,
                    data.subcategory,
                    data.product.productName,
                ]);
            } else {
                $("#img-product").slideUp("5000");
            }
        });
    });

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
                $("#" + modal_action.modal_id + " .modal-body .text-detail")
                    .empty()
                    .html(
                        modal_action.modal_text +
                            "<strong>" +
                            modal_action.content_name
                            ? modal_action.content_name
                            : "" + "</strong>"
                    );
            }
        }

        $("#" + modal_action.modal_id + " button[type=submit]")
            .empty()
            .html(modal_action.icon_accept + modal_action.btn_accept);

        $("#" + modal_action.modal_id).modal("show");
    }
    // delete
    $("a[data-action=delete-debts]").on("click", function (event) {
        event.preventDefault();

        let modal_object = {
            modal_id: "modal-debts-delete",
            url: $(this).attr("data-url"), //url to send form
            modal_title: $(this).attr("data-title-msg"), //title of modal
            modal_text: $(this).attr("data-text-msg"), //text of modal
            content_name: $(this).attr("data-name"), //name of register
            custom_body: true,
            btn_accept: $(this).attr("data-btn-action"), // text to send form
            icon_accept: "<i class='fas fa-trash-alt' aria-hidden='true'></i>", //icon to accept btn
        };
        // action_modal(modal_object,true,false,false);
        action_modal(modal_object);
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
            icon_accept: "<i class='fas fa-trash-alt' aria-hidden='true'></i>", //icon to accept btn
        };
        // action_modal(modal_object,true,false,false);
        action_modal(modal_object);
    });
    // recycle
    $("a[data-action=recycle]").on("click", function (event) {
        event.preventDefault();

        let modal_object = {
            modal_id: "modalRecycle",
            url: $(this).attr("data-url"), //url to send form
            modal_title: $(this).attr("data-title-msg"), //title of modal
            modal_text: $(this).attr("data-text-msg"), //text of modal
            content_name: $(this).attr("data-name"), //name of register
            btn_accept: $(this).attr("data-btn-action"), // text to send form
            icon_accept: "<i class='fas fa-recycle' aria-hidden='true'></i>", //icon to accept btn
        };

        action_modal(modal_object);
    });
    //restore
    $("a[data-action=restore]").on("click", function (event) {
        event.preventDefault();

        let modal_object = {
            modal_id: "modalRestore",
            url: $(this).attr("data-url"), //url to send form
            modal_title: $(this).attr("data-title-msg"), //title of modal
            content_name: $(this).attr("data-name"), //name of register
            btn_accept: $(this).attr("data-btn-action"), // text to send form
            icon_accept:
                "<i class='fas fa-trash-restore' aria-hidden='true'></i>", //icon to accept btn
        };

        action_modal(modal_object);
    });
    //delete image gallery
    $("a[data-action=delete_gallery]").on("click", function (event) {
        event.preventDefault();

        let modal_object = {
            modal_id: "modalDeleteGallery",
            url: $(this).attr("data-url"), //url to send form
            modal_title: $(this).attr("data-title-msg"), //title of modal
            modal_text: $(this).attr("data-text-msg"), //text of modal
            content_name: $(this).attr("data-name"), //name of register
            btn_accept: $(this).attr("data-btn-action"), // text to send form
            icon_accept:
                "<i class='fas fa-trash-restore' aria-hidden='true'></i>", //icon to accept btn
            input_hidden: $(this).attr("data-image-id"),
        };

        action_modal(modal_object);
    });

    //edit image gallery
    $("a[data-action=edit_gallery]").on("click", function (event) {
        event.preventDefault();

        let modal_object = {
            modal_id: "modalEditGallery",
            url: $(this).attr("data-url"), //url to send form
            modal_title: $(this).attr("data-title-msg"), //title of modal
            modal_text: $(this).attr("data-text-msg"), //text of modal
            content_name: $(this).attr("data-name"), //name of register
            btn_accept: $(this).attr("data-btn-action"), // text to send form
            icon_accept:
                "<i class='fas fa-trash-restore' aria-hidden='true'></i>", //icon to accept btn
            input_hidden: $(this).attr("data-image-id"),
            state: true,
            status: {
                id: $(this).attr("data-state-id"),
                visible: $(this).attr("data-state-visible"),
                hidden: $(this).attr("data-state-hidden"),
            },
        };

        action_modal(modal_object);
    });
});
