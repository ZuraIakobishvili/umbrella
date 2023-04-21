@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')


<div class="posts-form">
    <form method="POST" action="{{ route('updatePost', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Post Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}">
            @error('name')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>

        <div class="mb-3">
          <label for="postDescription" class="form-label">Post Description</label>
          <input type="text" class="form-control" id="postDescription" name="description" value="{{ $post->description }}">
            @error('description')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="postCategory" class="form-label">Post Category</label>
            <input type="text" class="form-control" id="postCategory" name="category" value="{{ $post->category }}">
            @error('category')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection