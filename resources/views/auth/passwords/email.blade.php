@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="content-forgot">
        <div class="center-screen">
            <div class="logo-center">
                <h1><a href="/login"><img src="<?= url('/') ?>/assets/images/postgroup-logo_blue.svg" class="img-fluid"></a></h1>
            </div>
            <div class="text-forgot">
                <p><strong>Have you forgotten your password?</strong></p>
                <p>Don't worries, just type in your e-mail or username below. And we will send you a new password.</p>
            </div>
            <div class="div-form--forgot">
                <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input id="staticEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>
                    @if (session('status'))
                    <div role="alert" style="color:green;">
                        {{ session('status') }}
                    </div>
                    @endif @error('email')
                    <div role="alert" style="color:red;">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <button type="submit" value="send" class="btn btn-submit">submit</button>
                </form>
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