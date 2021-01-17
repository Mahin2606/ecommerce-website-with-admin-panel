@extends('layouts.admin-template')

@section('content')

    <!-- Validation Errors -->
    <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
          <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
        </div>

        <div class="form-group">
          <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
          <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required autocomplete="new-password">
        </div>

        <div class="form-group">
          <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Enter your password again" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info btn-block mg-t-10">Sign Up</button>
        </div>

        <div class="mg-t-20 tx-center">
            <a href="{{ route('login') }}" class="tx-info">Already registered?</a>
        </div>
    </form>

@endsection