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

  <!-- CSS -->
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/auth.css">

  <title>Road Trips - {{ $title }}</title>
</head>
<body>
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