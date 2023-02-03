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
          <a href="#" class="more-info">
            <i class="bi bi-box-arrow-in-up-right"></i>
          </a>
        </div>

        <div class="trip-info">
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
            <span>{{ $trip->travellers }}</span>
          </p>

          <p>
            <strong>
              <i class="bi bi-sign-turn-right"></i>
               Distance:
            </strong>
            <span>{{ $trip->distance }}km</span>
          </p>
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