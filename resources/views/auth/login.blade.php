@extends('layouts.admin-template')

@section('content')

    <!-- Session Status -->
    <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->

    <!-- Validation Errors -->
    <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your username" value="{{ old('email') }}" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required autocomplete="current-password">
        </div>

        <!-- Remember Me -->
        <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> -->

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        @endif

        <button type="submit" class="btn btn-info btn-block mg-t-10">Sign In</button>

        <div class="mg-t-20 tx-center">
            Not yet a member?
            <a href="{{ route('register') }}" class="tx-info">Sign Up</a>
        </div>
    </form>

@endsection