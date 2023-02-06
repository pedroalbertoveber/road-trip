<x-layout pageTitle='My Trips'>

  <div class="page-header mt-4 mb-4">
    <h1 class="xl-text">My RoadTrips:</h1>
  </div>

  @if(count($trips) > 0)
    <div class="trips-container">  
      @foreach($trips as $trip)

      <div class="trip">

        <div class="trip-header">
          <h4>
            {{ strtoupper($trip->where_from)}}
             <i class="bi bi-arrow-right"></i>
            {{ strtoupper($trip->where_to)}}  
          </h4>
          <a href="{{ route('trips.show', $trip->id) }}" class="more-info">
            <i class="bi bi-box-arrow-in-up-right"></i>
          </a>
        </div>

        <div class="trip-info">
          <div>
            <p>
              <strong>
                <i class="bi bi-calendar-week"></i>
              </strong>
              <span>{{ date('d/m/Y', strtotime($trip->start_date)) }} | {{ date('d/m/Y', strtotime($trip->end_date)) }}</span>
            </p>
            <p>
              <strong>
              <i class="bi bi-people-fill"></i>
            </strong>
            <span>{{ $trip->travellers }} Partners</span>
          </p>
          
          <p>
            <strong>
              <i class="bi bi-sign-turn-right"></i>
              Distance:
            </strong>
            <span>{{ $trip->distance }}km</span>
          </p>
        </div>

        <div>
          <p>
            <strong>
              <i class="bi bi-car-front-fill"></i>
            </strong>
            @if(isset($trip->cars))
            {{ strtoupper($trip->cars->brand) }} - {{ strtoupper($trip->cars->model) }}
            @else
            <a href="{{ route('cars.create', $trip->id)}}" class="add-icon">
              <i class="bi bi-plus-circle-fill"></i>
            </a>
            @endif
          </p>

          <p>
            <strong>
              <i class="bi bi-buildings"></i>
            </strong>
            @if(isset($trip->hotels))
            {{ strtoupper($trip->hotels->name) }}
            @else
            <a href="{{ route('hotels.create', $trip->id)}}" class="add-icon">
              <i class="bi bi-plus-circle-fill"></i>
            </a>
            @endif
          </p>
        </div>
      </div>
        
        <div class="actions">
          <a href="{{ route('trips.edit', $trip->id) }}">
            <i class="bi bi-pencil-fill"></i>
          </a>

          <form method="POST" action="{{route('trips.destroy', $trip->id)}}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn">
              <i class="bi bi-trash3-fill"></i>
            </button>
          </form>
        </div>

      </div>

      @endforeach
    </div>
  @else
    <div class="create-new-trip">
      <p class="go-back">It seems that you don't have any trip scheduled already, <a href="{{ route('trips.create')}}"> Click here</a> to create a new trip!</p>
    </div>
  @endif 
</x-layout>