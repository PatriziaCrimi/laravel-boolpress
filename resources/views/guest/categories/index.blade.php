@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">All categories</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p>Click on the category name to see the list of posts with this category.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <ul>
          @foreach ($categories as $category)
            <li>
              <a href="{{route('categories.show', ['category_slug' => $category->slug]) }}">
                {{ $category->name }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
