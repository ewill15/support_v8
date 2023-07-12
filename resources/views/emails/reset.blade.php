<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
</head>
<body>
  <h4>{{env('APP_NAME')}}</h4>
  <p>
    hola {{ $user->username }}
      <p>
        Tu nueva contraseña es: <span style="font-weight:900">{{ $password }}</span>
      </p>
  </p>
</body>
</html>