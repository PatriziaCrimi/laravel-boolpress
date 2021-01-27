@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">NEW POST</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Write your title here" maxlength="200" required>
        </div>
        <div class="form-group">
          <label for="subtitle">Write your subtitle here</label>
          <input type="text" class="form-control" name="subtitle" placeholder="Enter subtitle" maxlength="150">
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
          <label for="content">Content</label>
          <textarea class="form-control" name="content" required></textarea>
        </div>
        <div class="form-group">
          <label for="summary">Summary</label>
          <textarea class="form-control" name="summary"></textarea>
        </div>
        <div class="form-group">
          <label for="notes">Notes</label>
          <input type="text" class="form-control" name="notes" maxlength="255">
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
