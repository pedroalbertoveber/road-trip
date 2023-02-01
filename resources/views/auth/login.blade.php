<x-auth title="Login">
  <form class="auth-form">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="E-mail" autofocus>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Password">
    </div>
    <button class="submit-button primary mb-2">
      Sign In
    </button>
    <p class="auth-link">Do you want to create an account? <a href="{{route('auth.register')}}">Click here</a></p>
  </form>
</x-auth>