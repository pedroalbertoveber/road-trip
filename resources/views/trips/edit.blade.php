<x-layout pageTitle='Edit Trip'>
  <div class="page-header mt-4 mb-4">
    <h1 class='xl-text'>
      <i class="bi bi-globe-americas"></i> 
       Edit trip to {{ strtoupper($trip->where_to) }}
    </h1>
  </div>
  <form class="form-default" method="POST" action="{{ route('trips.update') }}">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" id="id" value="{{ $trip->id }}">

    <div class="separate">
      <div class="form-group">
        <label for="where_from">Where from:</label>
        <input 
        type="text" 
        name="where_from" 
        id="where_from" 
        placeholder="Where from?"
        value="{{ strtoupper($trip->where_from)}}"
        >
      </div>
      <div class="form-group">
        <label for="where_to">Where to:</label>
        <input 
        type="text" 
        name="where_to" 
        id="where_to" 
        placeholder="Where to?"
        value="{{ strtoupper($trip->where_to)}}"
        >
      </div>
    </div>

    <div class="separate">
      <div class="form-group">
        <label for="distance">Distance (km):</label>
        <input 
        type="number" 
        name="distance" 
        id="distance" 
        placeholder="Distance (km)" 
        value="{{ $trip->distance }}"
        >
      </div>

      <div class="form-group">
        <label for="travellers">Travellers:</label>
        <input 
        type="number" 
        name="travellers" 
        id="travellers" 
        placeholder="People qnt."
        value="{{ $trip->travellers }}"
        >
      </div>
    </div>

    <span class="label-title">Dates:</span>
    <div class="separate">
      <div class="form-group">
        <input 
        type="date" 
        name="start_date" 
        id="start_date"
        value="{{ $trip->start_date->format('Y-m-d') }}"
        >
      </div>

      <div class="form-group">
        <input 
        type="date" 
        name="end_date" 
        id="end_date"
        value="{{ $trip->end_date->format('Y-m-d') }}"
        >
      </div>
    </div>

    @if(@isset($trip->cars))
      <p class="go-back mb-2"><i class="bi bi-car-front-fill"></i> Do you want to edit the car? <a href="{{ route('cars.edit', $trip->id) }}">Click here</a></p>
    @endif
    
    @if(@isset($trip->hotels))
      <p class="go-back mb-2"><i class="bi bi-buildings"></i> Do you want to edit the hotel? <a href="{{ route('hotels.edit', $trip->id) }}">Click here</a></p>
    @endif
    
    <p class="go-back mb-2">Don't want to edit a trip? <a href="{{route('trips.index')}}">Click Here</a></p>
    <button class="submit-button primary mt-2 mb-2" type="submit">
      Edit
    </button>
  </form>
</x-layout>