@extends('layouts.app')

@section('content')
<div class="container">
  <div class="content-login">
    <div class="center-screen">
      <div class="logo-center"><h1><img src="assets/images/postgroup-logo_blue.svg" class="img-fluid"></h1></div>
      <div class="div-form--login">
        <form class="needs-validation" method="POST" action="{{ route('login') }}" novalidate>
            @csrf
          <div class="form-group">
            <label for="inputUsername">User name test1:</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required  autofocus>
            @error('username')
                <div class="invalid-feedback" role="alert">Please put in a valid User name.</div>
            @enderror
            <!--<div class="invalid-feedback">Please put in a valid User name.</div>-->
          </div>
          <div class="form-group">
            <label for="inputPassword">Password:</label>
            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback" role="alert">Please put in a valid Password.</div>
            @enderror
            <!--<div class="invalid-feedback">Please put in a valid Password.</div>-->
          </div>
          <button type="submit" value="send" class="btn btn-submit">{{ __('Login') }}</button>
        </form>
        @if (Route::has('password.request'))
            <div class="box-link--login"><a href="{{ route('password.request') }}" class="link-underline">{{ __('Forgotten your password?') }}</a></div>
        @endif
      </div>
    </div>
  </div>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script>


// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});


</script>
@endsection
