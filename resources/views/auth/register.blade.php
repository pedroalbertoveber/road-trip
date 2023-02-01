<x-auth title="Register">
  <form class="auth-form">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="email" id="name" name="name" placeholder="Full name" autofocus>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="E-mail" autofocus>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password" placeholder="Password">
    </div>
    <button class="submit-button primary mb-2">
      Sign Up
    </button>
    <p class="auth-link">Do you already have an account? <a href="{{ route('auth.login')}}">Click here</a></p>
  </form>
</x-auth>