@extends('layouts.app')

@section('title')Dashboard @endsection

    <h1>Dashboard</h1> @auth <h3 class="auth-name"> Hello , {{auth()->user()->name}} </h3>@endauth
   

@section('content')

<div class="main-header">
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Registration</a>
    @endguest

    @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a id="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
    </form>
    @endauth
</div>

<div class="search-bar">
    <input class="form-control" list="datalistOptions"  placeholder="Type to search...">
    <datalist id="datalistOptions">
        @foreach ($posts as $post)
            <option value="{{ $post->name}}"></option>
        @endforeach
    </datalist>
    <input class="form-control" list="categoryList" placeholder="Type to search...">
    <datalist id="categoryList">
        @foreach ($posts as $post)
            <option value="{{ $post->category}}"></option>
        @endforeach
    </datalist>
</div>


@foreach ($posts as $post)

<div class="post-container">
    <div>
        <h4>{{ $post->name }}</h4>
        <h5>{{ $post->description }}</h5>
        <h5>{{ $post->category }}</h5>
        @auth
        <div class="post-buttons">
            <div>
                <a href="{{ route('update', $post->id) }}" class="btn btn-warning btn-edit">Edit</a>
            </div>
            <div>
                <form action="{{ route('destroyPost', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</div>

    
@endforeach


@auth
<div style="margin-top:50px;">
    <a href="{{ route('posts') }}" class="btn btn-primary add-btn"> Add Post</a>
</div>
@endauth

@endsection

{{-- onclick="event.preventDefault(); this.closest('form').submit();" --}}

