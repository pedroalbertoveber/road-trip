<x-layout pageTitle='New Car'>
  <div class="page-header mt-4 mb-4">
    <h1 class='lg-text'><i class="bi bi-globe-americas"></i> Adding a Car - Trip to {{ strtoupper($trip->where_to)}}</h1>
  </div>
  <form class="form-default" method="POST" action="{{ route('cars.store', $trip->id)}}">
    @csrf

    <div class="separate">
      <div class="form-group">
        <label for="brand">Brand:</label>
        <select name="brand" id="brand">
          <option value="GM">GM</option>
          <option value="Fiat">Fiat</option>
          <option value="Volskwagen">Volskwagen</option>
          <option value="Nissan">Nissan</option>
          <option value="Honda">Honda</option>
          <option value="Mitsubishi">Mitsubishi</option>
          <option value="Subaru">Subaru</option>
          <option value="Ford">Ford</option>
          <option value="Citroen">Citroen</option>
          <option value="Peugeot">Peugeot</option>
          <option value="Renault">Renault</option>
          <option value="Mercedes">Mercedes</option>
          <option value="BMW">BMW</option>
          <option value="Porsche">Porsche</option>
          <option value="Land Rover">Land Rover</option>
          <option value="Audi">Audi</option>
          <option value="Dodge">Dodge</option>
          <option value="Kia">Kia</option>
          <option value="Hyundai">Hyundai</option>
        </select>
      </div>
      <div class="form-group">
        <label for="model">Model:</label>
        <input type="text" name="model" id="model" placeholder="Model" value="{{ old('model')}}">
      </div>
    </div>

    <div class="separate">
      <div class="form-group">
        <label for="fuel_economy">Fuel Economy (km/l):</label>
        <input type="number" name="fuel_economy" id="fuel_economy" placeholder="Fuel Economy (km/l)" value="{{ old('fuel_economy')}}">
      </div>
      <div class="form-group">
        <label for="model_year">Model Year:</label>
        <input type="number" name="model_year" id="model_year" placeholder="Model Year" value="{{ old('model_year')}}">
      </div>
    </div>

    <p class="go-back mb-2">Don't want to add a car? <a href="{{route('trips.index')}}">Click Here</a></p>
    <button class="submit-button primary mt-2 mb-2" type="submit">
      Create
    </button>
  </form>
</x-layout>