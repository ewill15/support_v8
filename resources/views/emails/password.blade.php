<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <style type="text/css">
		/* RESET */
		* {
			padding: 0;
			margin: 0;
			border: 0;
		}
		body {
			width: 100% !important;
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
			margin: 0;
			padding: 0;
		}
		:link, :visited {
			text-decoration: none
		}
		ul, ol {
			list-style: none
		}
		h1, h2, h3, h4, h5, h6, pre, code {
			font-size: 1em;
		}
		ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, body, html, p, blockquote, fieldset, input {
			margin: 0;
			padding: 0
		}
		a img, :link img, :visited img {
			border: none
		}

        /* End RESET */
        .tbl-pass  {
            border:none;
            border-collapse:collapse;
            border-spacing:0;
        }
        .tbl-pass td{
            border-style:solid;
            border-width:0px;
            font-family:Arial, sans-serif;
            font-size:14px;
            overflow:hidden;
            padding:6px 8px;
            word-break:normal;
        }
        .tbl-pass th{
            border-style:solid;
            border-width:0px;
            font-family:Arial, sans-serif;
            font-size:14px;
            font-weight:normal;
            overflow:hidden;
            padding:6px 8px;
            word-break:normal;
        }
        .tbl-pass .content{
            text-align:left;
            vertical-align:top
        }
        .text-bold{
            font-weight:bold
        }
    </style>
</head>
    <body>
        <table class="tbl-pass">
            <thead>
            <tr>
                <th class="content">
                    <span class="text-bold">Hola</span> {{$user->username}},
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="content">
                    Te enviamos este correo porque olvidastes tu contraseña.<br>
                    <p>
                        Tu nueva contraseña es: {{$password}}
                    </p>
                    Si no realizó la petición por favor ignore este email
                </td>
            </tr>
            <tr>
                <td class="content"style="font-size:8px;font-style:italic">
                    Por favor no responda a este email                    
                </td>
            </tr>
            <tr>
                <td>
                    {{ucfirst(config('app.name'))}}
                </td>
            </tr>
            </tbody>
        </table>
    </body>
</html>