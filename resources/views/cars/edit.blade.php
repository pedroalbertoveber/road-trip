<x-layout pageTitle='Edit Car'>
  <div class="page-header mt-4 mb-4">
    <h1 class='lg-text'><i class="bi bi-globe-americas"></i> Edit a Car - Trip to {{ strtoupper($trip->where_to)}}</h1>
  </div>
  <form class="form-default" method="POST" action="{{ route('cars.update', $trip->id) }}">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" id="id" value="{{ $trip->cars->id }}" />

    <div class="separate">
      <div class="form-group">
        <label for="brand">Brand:</label>
        <select name="brand" id="brand" value={{ $trip->cars->brand }}>
          <option value="GM" @if (strtoupper($trip->cars->brand) === 'GM') selected @endif>GM</option>
          <option value="Fiat" @if (strtoupper($trip->cars->brand) === 'FIAT') selected @endif>Fiat</option>
          <option value="Volskwagen" @if (strtoupper($trip->cars->brand) === 'VOLKSWAGEN') selected @endif>Volskwagen</option>
          <option value="Nissan" @if (strtoupper($trip->cars->brand) === 'NISSAN') selected @endif>Nissan</option>
          <option value="Honda" @if (strtoupper($trip->cars->brand) === 'HONDA') selected @endif>Honda</option>
          <option value="Mitsubishi" @if (strtoupper($trip->cars->brand) === 'MITSUBISHI') selected @endif>Mitsubishi</option>
          <option value="Subaru" @if (strtoupper($trip->cars->brand) === 'SUBARU') selected @endif>Subaru</option>
          <option value="Ford" @if (strtoupper($trip->cars->brand) === 'FORD') selected @endif>Ford</option>
          <option value="Citroen" @if (strtoupper($trip->cars->brand) === 'CITROEN') selected @endif>Citroen</option>
          <option value="Peugeot" @if (strtoupper($trip->cars->brand) === 'PEUGEOT') selected @endif>Peugeot</option>
          <option value="Renault" @if (strtoupper($trip->cars->brand) === 'RENAULT') selected @endif>Renault</option>
          <option value="Mercedes" @if (strtoupper($trip->cars->brand) === 'MERCEDES') selected @endif>Mercedes</option>
          <option value="BMW" @if (strtoupper($trip->cars->brand) === 'BMW') selected @endif>BMW</option>
          <option value="Porsche" @if (strtoupper($trip->cars->brand) === 'PORSCHE') selected @endif>Porsche</option>
          <option value="Land Rover" @if (strtoupper($trip->cars->brand) === 'LAND ROVER') selected @endif>Land Rover</option>
          <option value="Audi" @if (strtoupper($trip->cars->brand) === 'AUDI') selected @endif>Audi</option>
          <option value="Dodge" @if (strtoupper($trip->cars->brand) === 'DODGE') selected @endif>Dodge</option>
          <option value="Kia" @if (strtoupper($trip->cars->brand) === 'KIA') selected @endif>Kia</option>
          <option value="Hyundai" @if (strtoupper($trip->cars->brand) === 'HIUNDAY') selected @endif>Hyundai</option>
        </select>
      </div>
      <div class="form-group">
        <label for="model">Model:</label>
        <input 
          type="text" 
          name="model" 
          id="model" 
          placeholder="Model" 
          value="{{ strtoupper($trip->cars->model) }}">
      </div>
    </div>

    <div class="separate">
      <div class="form-group">
        <label for="fuel_economy">Fuel Economy (km/l):</label>
        <input type="number" name="fuel_economy" id="fuel_economy" placeholder="Fuel Economy (km/l)" value="{{ $trip->cars->fuel_economy }}">
      </div>
      <div class="form-group">
        <label for="model_year">Model Year:</label>
        <input type="number" name="model_year" id="model_year" placeholder="Model Year" value="{{ $trip->cars->model_year }}">
      </div>
    </div>

    <p class="go-back mb-2">Don't want to add a car? <a href="{{route('trips.index')}}">Click Here</a></p>
    <button class="submit-button primary mt-2 mb-2" type="submit">
      Edit
    </button>
  </form>
</x-layout>