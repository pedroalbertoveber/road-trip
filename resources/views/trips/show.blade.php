<x-layout pageTitle='Trip to {{ strtoupper($trip->where_to) }}'>

  <div class="page-header mt-4 mb-4">
    <h1 class='lg-text'>
      <i class="bi bi-globe-americas"></i> 
       RoadTrip to {{ strtoupper($trip->where_to) }}
    </h1>
  </div>

  <section class="trip-details-container">

    <div class="trip-info-container">

      <div class="info-header-container">
        <h4 class="strong lg-text">Main Info</h4>
        <a href="#">
          <i class="bi bi-pencil-fill edit-icon" ></i>
        </a>
      </div>
      
      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-pin-map-fill"></i>
          Where From:
          <strong>{{ strtoupper($trip->where_from) }}</strong>
        </p>
      </div>

      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-pin-map-fill"></i>
          Where To:
          <strong>{{ strtoupper($trip->where_to) }}</strong>
        </p>
      </div>

      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-people-fill"></i>
          Travellers:
          <strong>{{ $trip->travellers }} buddies</strong>
        </p>
      </div>

      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-sign-turn-slight-right"></i>
          Distance to destination:
          <strong>{{ $trip->distance }} km</strong>
        </p>
      </div>

      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-calendar-week"></i>
          You're going to stay <strong>{{ $trip->days_qty }} days</strong> in your destination
        </p>
        <p>
          <strong>{{ date('d/m/Y', strtotime($trip->start_date)) }} | {{ date('d/m/Y', strtotime($trip->end_date)) }}</strong>
        </p>
      </div>

    </div>

    <div class="trip-info-container">

      <div class="info-header-container">
        <h4 class=" strong lg-text">Car Info</h4>
        @if(isset($trip->cars))
          <a href="{{ route('cars.edit', $trip->id) }}">
            <i class="bi bi-pencil-fill edit-icon" ></i>
          </a>
        @else
          <a href="{{ route('cars.create', $trip->id) }}">
            <i class="bi bi-plus-circle-fill add-icon"></i>
          </a>
        @endif
      </div>

      @isset($trip->cars)
      <div class="detailed-trip-info action">
        <p>
          <i class="bi bi-car-front-fill"></i>
           Vehicle:
          <strong>
            {{ $trip->cars->model_year }} - {{ strtoupper($trip->cars->brand) }} {{ strtoupper($trip->cars->model) }}
          </strong>
        </p>
      </div>

      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-fuel-pump-fill"></i>
           Fuel Economy:
          <strong>{{ $trip->cars->fuel_economy }} km/l</strong>
        </p>
      </div>
      @endisset
    </div>


    <div class="trip-info-container">

      <div class="info-header-container">
        <h4 class=" strong lg-text">Hotel Info</h4>
        @if(isset($trip->hotels))
          <a href="#">
            <i class="bi bi-pencil-fill edit-icon" ></i>
          </a>
        @else
          <a href="#">
            <i class="bi bi-plus-circle-fill add-icon"></i>
          </a>
        @endif
      </div>

      @isset($trip->hotels)
      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-car-front-fill"></i>
           Vehicle:
          <strong>
            {{ $trip->cars->model_year }} - {{ strtoupper($trip->cars->brand) }} {{ strtoupper($trip->cars->model) }}
          </strong>
        </p>
      </div>

      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-fuel-pump-fill"></i>
           Fuel Economy:
          <strong>{{ $trip->cars->fuel_economy }} km/l</strong>
        </p>
      </div>
      @endisset

    </div>

  </section>

</x-layout>