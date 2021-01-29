@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                  Category:
                  <span>{{$category->name}}</span>
                </h1>
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
    </div>
@endsection
