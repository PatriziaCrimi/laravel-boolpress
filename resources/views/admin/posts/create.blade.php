@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center text-uppercase">New post</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      {{-- VALIDATION - ERROR MESSAGE in case of errors --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Write your title here" required>
        </div>
        <div class="form-group">
          <label for="subtitle">Subtitle</label>
          <input type="text" class="form-control" name="subtitle" placeholder="Write your subtitle here.">
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select class="form-control" name="category_id">
            <option value="">--select category--</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">
                {{$category->name}}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <p>Select tags:</p>
          @foreach ($tags as $tag)
            <div class="form-check">
              {{-- I need an array "tags[]" to store all the data of a Checkbox --}}
              <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="form-check-input">
              <label class="form-check-label">
                {{$tag->name}}
              </label>
            </div>
          @endforeach
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" name="content" required></textarea>
        </div>
        <div class="form-group">
          <label for="summary">Summary</label>
          <textarea class="form-control" name="summary"></textarea>
        </div>
        <div class="form-group">
          <label for="notes">Notes</label>
          <input type="text" class="form-control" name="notes">
        </div>
        <div class="form-group d-flex justify-content-end">
          <button type="submit" class="btn btn-success text-uppercase">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
