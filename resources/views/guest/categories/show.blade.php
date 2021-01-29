@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
          <h1 class="text-center">
            Category:
            <span>{{$category->name}}</span>
          </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
          <p>List of posts containing this category:</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <ul>
          {{-- Ciclo la COLLECTION di oggetti "$post" a cui accedo tramite la relazione "posts()" creata nel Model "Category" --}}
          @foreach ($category->posts as $post)
            <li>
              <a href="{{route('posts.show', ['slug'=> $post->slug])}}">
                {{$post->title}}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
          <p>Click on the post to see its details.</p>
      </div>
    </div>
  </div>
@endsection
