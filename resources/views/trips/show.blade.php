<x-layout pageTitle='Trip to {{ strtoupper($trip->where_to) }}'>

  <div class="page-header mt-4 mb-4">
    <h1 class='lg-text'>
      <i class="bi bi-globe-americas"></i> 
       RoadTrip to {{ strtoupper($trip->where_to) }}
    </h1>
  </div>

  <section class="trip-details-container">

    <figure class="thumbnail">
      <img 
        @if ($trip->image_path)
          src="{{ asset('storage/' . $trip->image_path) }}" 
        @else 
          src="/img/trips/trip-image-default.jpg"
        @endif 
        alt="trip to {{ $trip->where_to }}"
        >
    </figure>

    <div class="trip-info-container">

      <div class="info-header-container">
        <h4 class="strong lg-text">Trip Info</h4>
        <a href="{{ route('trips.edit', $trip->id) }}">
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
          <a href="{{ route('hotels.edit', $trip->id) }}">
            <i class="bi bi-pencil-fill edit-icon" ></i>
          </a>
        @else
          <a href="{{ route('hotels.create', $trip->id) }}">
            <i class="bi bi-plus-circle-fill add-icon"></i>
          </a>
        @endif
      </div>

      @isset($trip->hotels)
      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-buildings"></i>
           Name
          <strong>
            {{ strtoupper($trip->hotels->name) }}
          </strong>
        </p>
      </div>

      <div class="detailed-trip-info">
        <p>
          <i class="bi bi-cash-coin"></i>
           Price:
          <strong>R$ {{ $trip->hotels->price }},00 / night</strong>
        </p>
      </div>
      @endisset

    </div>

    @isset($trip->cars) 
      @isset($trip->hotels)

        <div class="trip-info-container">
          <div class="info-header-container">
            <h4 class="strong lg-text">Amount</h4>
          </div>
          <p>
            <i class="bi bi-currency-dollar"></i>
            Hotel Price:
            <strong> R$ {{ $trip->days_qty * $trip->hotels->price }},00</strong>
          </p>

          <p>
            <i class="bi bi-fuel-pump-fill"></i>
            Fuel:
            <strong> {{ round(($trip->distance / $trip->cars->fuel_economy * 2), 2)  }} L</strong>
          </p>
        </div>

      @endisset
    @endisset

  </section>
  <p class="go-back mt-4 mb-4">Do you want to go back to main menu? <a href="{{ route('trips.index') }}">Click here</a></p>
</x-layout>