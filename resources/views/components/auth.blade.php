<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- FONT IMPORT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit" rel="stylesheet">

  <!-- BOOTSTRAP ICOS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- CSS -->
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/auth.css">
  <link rel="stylesheet" href="/css/flash.css">

  <title>Road Trips - {{ $title }}</title>
</head>
<body>
  @if($errors->any())
  <div class="flash error mt-2">
    <ul>
      @foreach ($errors->all() as $error)
        <li><i class="bi bi-exclamation-circle"></i> {{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endisset
  <main class="container-auth">
    <div class="auth-title">
      <h1>Welcome to RoadTrip</h1>
    </div>
    <div class="auth-form-container">
      {{ $slot }}
    </div>
  </main>
</body>
</html>