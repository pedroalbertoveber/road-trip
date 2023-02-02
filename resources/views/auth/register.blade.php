<x-auth title="Register">
  <form class="auth-form" method="POST" action="{{route('auth.signUp')}}">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Full name" value="{{ old('name')}}" autofocus>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="E-mail" value="{{ old('email')}}">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password">
    </div>
    <button class="submit-button primary mb-2">
      Sign Up
    </button>
    <p class="auth-link">Do you already have an account? <a href="{{ route('auth.login')}}">Click here</a></p>
  </form>
</x-auth>