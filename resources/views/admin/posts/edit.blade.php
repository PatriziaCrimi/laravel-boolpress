@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center text-uppercase">Edit post #{{$post->id}}</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" value="{{$post->title}}" class="form-control" name="title" maxlength="200" required>
        </div>
        <div class="form-group">
          <label for="subtitle">Subtitle</label>
          <input type="text" value="{{$post->subtitle}}" class="form-control" name="subtitle" maxlength="150">
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select class="form-control" name="category_id">
            <option value="">--select category--</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}"
                {{$category->id == $post->category_id ? 'selected=selected' : ''}}>
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
              <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="form-check-input"
              {{-- I need to use the function "contains()" because "tags" is an array: it is NOT  a single element --}}
              {{$post->tags->contains($tag) ? 'checked=checked' : ''}}>
              <label class="form-check-label">
                {{$tag->name}}
              </label>
            </div>
          @endforeach
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" name="content" required>{{$post->content}}</textarea>
        </div>
        <div class="form-group">
          <label for="summary">Summary</label>
          <textarea class="form-control" name="summary">{{$post->summary}}</textarea>
        </div>
        <div class="form-group">
          <label for="notes">Notes</label>
          <input type="text" value="{{$post->notes}}" class="form-control" name="notes" maxlength="255">
        </div>
        <div class="form-group d-flex justify-content-end">
          <button type="submit" class="btn btn-success text-uppercase">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
