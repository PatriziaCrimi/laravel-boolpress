@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">All posts</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <p>Click on the title to see the post details.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <ul>
          @foreach ($posts as $post)
            <li>
              <a href="{{route('posts.show', ['slug' => $post->slug]) }}">
                {{ $post->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
