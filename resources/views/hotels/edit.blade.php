<x-layout pageTitle='Edit Hotel'>
  <div class="page-header mt-4 mb-4">
    <h1 class='lg-text'><i class="bi bi-globe-americas"></i> Edit Hotel - Trip to {{ strtoupper($trip->where_to)}}</h1>
  </div>
  <form class="form-default" method="POST" action="{{ route('hotels.update', $trip->id )}}">
    @csrf
    @method('PUT')
    
    <div class="separate">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Hotel's name" value="{{ strtoupper($trip->hotels->name) }}">
      </div>
      <div class="form-group">
        <label for="price">Price per night (R$):</label>
        <input type="number" name="price" id="price" placeholder="Hotel's price per night" value="{{ $trip->hotels->price }}">
      </div>
    </div>

  <input type="hidden" name="hotel_id" id="hotel_id" value="{{ $trip->hotels->id }}" />

    <div class="separate">
      <div class="form-group">
        <label for="days_qty">How many days will you stay at this hotel?</label>
        <input 
          type="text" 
          name="days_qty" 
          id="days_qty" 
          value="{{ $trip->days_qty }} Nights - {{ date('d/m/Y', strtotime($trip->start_date)) }} | {{ date('d/m/Y', strtotime($trip->end_date)) }}" 
          readonly 
          disabled
        >
      </div>
      <div class="form-group">
      </div>
    </div>

    <p class="go-back mb-2">Don't want to edit the hotel? <a href="{{route('trips.index')}}">Click Here</a></p>
    <button class="submit-button primary mt-2 mb-2" type="submit">
      Edit
    </button>
  </form>
</x-layout>