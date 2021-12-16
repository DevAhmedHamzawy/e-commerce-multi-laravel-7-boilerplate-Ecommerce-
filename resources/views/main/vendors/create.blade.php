@extends('main.layouts.app')

@section('content')

<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
  
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="{{ url('main/img/header-01.png') }}" id="icon" alt="User Icon" />
      </div>
  
      <!-- Login Form -->
      <form method="POST" action="{{ route('saveStore') }}">
        @csrf

        <input type="hidden" name="type" value="{{ request()->type }}">

        <input type="text" id="name" class="fadeIn second textinput @error('name') is-invalid @enderror" name="name" placeholder="{{ trans('auth.name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="text" id="email" class="fadeIn third textinput @error('email') is-invalid @enderror" name="email" placeholder="{{ trans('auth.email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="number" id="mobile" class="fadeIn third textinput @error('mobile') is-invalid @enderror" name="mobile" placeholder="{{ trans('auth.mobile') }}">
        @error('mobile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="password" id="password" class="fadeIn third textinput @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('auth.password') }}">
        <i class="fa fa-eye-slash" id="togglePassword" style="position: absolute;margin-right: -30px;margin-top:25px;cursor: pointer;"></i>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="password" id="password_confirm" class="fadeIn third textinput" name="password_confirmation" placeholder="{{ trans('auth.password_confirmation') }}">
        <i class="fa fa-eye-slash" id="togglePasswordConfirm"  style="position: absolute;margin-right: -30px;margin-top:25px;cursor: pointer;"></i>
        <input type="submit" class="fadeIn fourth" value="{{ trans('auth.register') }}">
        </form>

  
    </div>
  </div>



  
@endsection



@section('footer')
    <script>

      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');


      togglePassword.addEventListener('click', function (e) {
          // toggle the type attribute
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          // toggle the eye / eye slash icon
          $(this).toggleClass("fa-eye fa-eye-slash");
      });



      const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
      const passwordConfirm = document.querySelector('#password_confirm');


      togglePasswordConfirm.addEventListener('click', function (e) {
          // toggle the type attribute
          const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordConfirm.setAttribute('type', type);
          // toggle the eye / eye slash icon
          $(this).toggleClass("fa-eye fa-eye-slash");
      });

    </script>
@endsection