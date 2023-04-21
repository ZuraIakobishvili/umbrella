@extends('layouts.app')

@section('title') Login @endsection

@section('content') 
<div class="next">
    <a class="back" href="{{ route('dashboard') }}">&larr; Back</a>
    <a class="back" href="{{ route('register') }}">Registration</a>
</div>

<h2>Login</h2>

<div class="container">
    <div>
        <form action="{{ route('storeLogin') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@umbrella.com" value="{{ old('email') }}">
              @error('email')
                <span class="text-danger"> {{ $message }} </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="******">
              @error('password')
                <span class="text-danger"> {{ $message }} </span>
              @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remeber me</label>
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection