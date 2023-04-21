@extends('layouts.app')

@section('title') Registration @endsection

@section('content') 
<div class="next">
    <a class="back" href="{{ route('dashboard') }}">&larr; Back</a>
</div>
<h2>Registration</h2>
<div class="container">
    <div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="username" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
              </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@umbrella.com" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="******" value="{{ old('password') }}">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <a style="text-decoration:none;font-weight:bold;" href="{{ route('login') }}">Already have an account ?</a>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection