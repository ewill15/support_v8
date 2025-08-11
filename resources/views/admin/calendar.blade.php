<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempus Dominus Bootstrap 4 Datetimepicker - La Paz, Bolivia</title>
    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Tempus Dominus CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <label for="datetimepicker1" class="form-label">Selecciona Fecha y Hora</label>
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" id="datetimepicker1Input" data-target="#datetimepicker1">
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Obtener la fecha y hora actual en La Paz, Bolivia
            const now = moment().tz('America/La_Paz').format('DD-MM-YYYY');

            // Inicializar Tempus Dominus
            $('#datetimepicker1').datetimepicker({
                defaultDate: moment(now, 'DD-MM-YYYY').toDate(), // Fecha actual en La Paz
                format: 'DD-MM-YYYY', // Formato de fecha y hora
                locale: 'es', // Idioma español
                useCurrent: true, // Usar la fecha actual si no se especifica defaultDate
                stepping: 5, // Incrementos de 5 minutos para la hora
                sideBySide: true, // Mostrar fecha y hora lado a lado
                icons: {
                    time: 'fa fa-clock',
                    date: 'fa fa-calendar',
                    up: 'fa fa-arrow-up',
                    down: 'fa fa-arrow-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-calendar-check',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                },
                // Deshabilitar el selector nativo en móviles
                useStrict: true,
                widgetParent: 'body' // Asegurar que el widget se muestre correctamente en móviles
            });

            // Establecer el valor inicial en el input
            $('#datetimepicker1Input').val(now);

            // Escuchar cambios en el selector
            $('#datetimepicker1').on('change.datetimepicker', function(e) {
                console.log('Fecha seleccionada:', e.date ? e.date.format('DD-MM-YYYY') : null);
            });
        });
    </script>
</body>
</html>