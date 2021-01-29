@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">All tags</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p>Click on the tag name to see the list of posts with this tag.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <ul>
          @foreach ($tags as $tag)
            <li>
              <a href="{{route('tags.show', ['tag_slug' => $tag->slug]) }}">
                {{ $tag->name }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
