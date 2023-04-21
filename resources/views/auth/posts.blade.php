@extends('layouts.app')

@section('title') Posts @endsection

@section('content') 

<div class="posts-form">
    <form method="POST" action="{{ route('store') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Post Name</label>
          <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>

        <div class="mb-3">
          <label for="postDescription" class="form-label">Post Description</label>
          <input type="text" class="form-control" id="postDescription" name="description">
            @error('description')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="postCategory" class="form-label">Post Category</label>
            <input type="text" class="form-control" id="postCategory" name="category">
            @error('category')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
          </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
</div>


@endsection