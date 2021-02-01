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
      {{-- VALIDATION - LIST OF ERROR MESSAGES --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      {{-- FORM --}}
      <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Write your title here" value="{{old('title')}}" required>
          {{-- SHOWING ERROR MESSAGE --}}
          @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="subtitle">Subtitle</label>
          <input type="text" class="form-control" name="subtitle" placeholder="Write your subtitle here." value="{{old('subtitle')}}">
          {{-- SHOWING ERROR MESSAGE --}}
          @error('subtitle')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select class="form-control" name="category_id">
            <option value="">--select category--</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected=selected' : ''}}>
                {{$category->name}}
              </option>
            @endforeach
          </select>
          {{-- SHOWING ERROR MESSAGE --}}
          @error('category_id')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <p>Select tags:</p>
          @foreach ($tags as $tag)
            <div class="form-check">
              {{-- I need an array "tags[]" to store all the data of a Checkbox --}}
              <input type="checkbox" name="tags[]" value="{{$tag->id}}"
              {{-- The empty array [] as a parameter is needed for the first time I open the web page --}}
              {{in_array($tag->id, old('tags', [])) ? 'checked=checked' : ''}} class="form-check-input">
              <label class="form-check-label">
                {{$tag->name}}
              </label>
            </div>
          @endforeach
          {{-- SHOWING ERROR MESSAGE --}}
          @error('tags')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" name="content" required>{{old('content')}}</textarea>
          {{-- SHOWING ERROR MESSAGE --}}
          @error('content')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="summary">Summary</label>
          <textarea class="form-control" name="summary">{{old('summary')}}</textarea>
        </div>
        <div class="form-group">
          <label for="notes">Notes</label>
          <input type="text" class="form-control" name="notes" value="{{old('notes')}}">
          {{-- SHOWING ERROR MESSAGE --}}
          @error('notes')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
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
