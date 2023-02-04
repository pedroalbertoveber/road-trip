<x-layout pageTitle='New Hotel'>
  <div class="page-header mt-4 mb-4">
    <h1 class='lg-text'><i class="bi bi-globe-americas"></i> Adding a Hotel - Trip to {{ strtoupper($trip->where_to)}}</h1>
  </div>
  <form class="form-default" method="POST" action="{{ route('hotels.store', $trip->id) }}">
    @csrf

    <div class="separate">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Hotel's name" value="{{ old('name') }}">
      </div>
      <div class="form-group">
        <label for="price">Price per night (R$):</label>
        <input type="number" name="price" id="price" placeholder="Hotel's price per night" value="{{ old('price')}}">
      </div>
    </div>

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

    <p class="go-back mb-2">Don't want to add a hotel? <a href="{{route('trips.index')}}">Click Here</a></p>
    <button class="submit-button primary mt-2 mb-2" type="submit">
      Create
    </button>
  </form>
</x-layout>