<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
      .tg  {border-collapse:collapse;border-spacing:0;}
      .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        overflow:hidden;padding:10px 5px;word-break:normal;}
      .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
      .tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
      .tg .tg-0lax{text-align:left;vertical-align:top}
      </style>  
</head>
<body>
  <h4>{{env('APP_NAME')}}</h4>
  <p>
    hola {{ $admin }}
      <p>
        Nuevo pasanaku creado
      </p>
  </p>
  
    <table class="tg">
      <thead>
        <tr>
          <th class="tg-1wig">Nombre Pasanaku:</th>
          <th class="tg-0lax">{{ $pasanaku->name }}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="tg-1wig">Fecha Inicio:</td>
          <td class="tg-0lax">{{ \Carbon\Carbon::parse($pasanaku->date_start)->format('d-F-Y') }}</td>
        </tr>
        <tr>
          <td class="tg-1wig">Fecha Fin</td>
          <td class="tg-0lax">{{ \Carbon\Carbon::parse($pasanaku->date_end)->format('d-F-Y') }}</td>
        </tr>
        <tr>
          <td class="tg-1wig">Participantes:</td>
          <td class="tg-0lax">{{ $pasanaku->participant_total }}</td>
        </tr>
        <tr>
          <td class="tg-1wig">Ronda:</td>
          <td class="tg-0lax">{{ $pasanaku->round }}</td>
        </tr>
      </tbody>
    </table>
</body>
</html>