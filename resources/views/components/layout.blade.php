<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- BOOTSTRAP ICOS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- FONT IMPORT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/flash.css">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/footer.css">
  <link rel="stylesheet" href="/css/layout.css">
  <link rel="stylesheet" href="/css/form.css">
  <link rel="stylesheet" href="/css/trips-container.css">
  
  <title>RoadTrip - {{ $pageTitle }}</title>
</head>
<body>
  <header class="header pd-v-2 pd-h-4">
    <div class="container">
      <a href="/" class="main-link">
        <img src="/img/road-trip.png" alt="road-trip logo">
      </a>
      <nav class="nav-list">
        <ul>
          <li>
            <a href="{{ route('trips.create') }}">
              <i class="bi bi-car-front-fill"></i> New Trip
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-person-circle"></i> Profile
            </a>
          </li>
          <li>
            <form action="{{ route('auth.logout') }}" method="POST">
              @csrf 
              <button type='submit' class="logout">
                <i class="bi bi-box-arrow-in-left"></i> LogOut
              </button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    @if($errors->any())
    <div class="flash error mt-2">
      <ul>
        @foreach ($errors->all() as $error)
          <li><i class="bi bi-exclamation-circle"></i> {{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endisset
    {{ $slot }}
  </main>

  <footer class="footer">
    <p class="md-text">RoadTrip - &copy; 2023</p>
  </footer>
</body>
</html>