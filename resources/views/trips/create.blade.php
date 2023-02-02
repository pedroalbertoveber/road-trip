<x-layout pageTitle='New Trip'>
  <div class="page-header mt-4 mb-4">
    <h1 class='xl-text'><i class="bi bi-globe-americas"></i> Creating a New Trip</h1>
  </div>
  <form class="form-default" method="POST" action="{{ route('trips.store') }}">
    @csrf

    <div class="separate">
      <div class="form-group">
        <label for="where_from">Where from:</label>
        <input type="text" name="where_from" id="where_from" placeholder="Where from?">
      </div>
      <div class="form-group">
        <label for="where_to">Where to:</label>
        <input type="text" name="where_to" id="where_to" placeholder="Where to?">
      </div>
    </div>

    <div class="form-group">
      <label for="distance">Distance:</label>
      <input type="number" name="distance" id="distance" placeholder="Distance (km)" class="half">
    </div>

    <span class="label-title">Dates:</span>
    <div class="separate">
      <div class="form-group">
        <input type="date" name="start_date" id="start_date">
      </div>

      <div class="form-group">
        <input type="date" name="end_date" id="wherend_datee_to">
      </div>
    </div>

    <p class="go-back mb-2">Don't want to create a trip? <a href="{{route('trips.index')}}">Click Here</a></p>
    <button class="submit-button primary mt-2 mb-2" type="submit">
      Create
    </button>
  </form>
</x-layout>