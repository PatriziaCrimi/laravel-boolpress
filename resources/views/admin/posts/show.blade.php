@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">POST #{{$post->id}}</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card-wrapper d-flex justify-content-center">
        <div class="card" style="width: 100%">
          <div class="card-body">
            <h5 class="card-title text-center font-weight-bold">
              {{$post->title}}
            </h5>
            @if ($post->subtitle)
              <h6 class="card-title text-center font-weight-bold">
                {{$post->subtitle}}
              </h6>
            @endif
            <p class="card-text text-justify">
              {{$post->content}}
            </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <span class="font-weight-bold">Category.</span>
              {{$post->category ? $post->category->name : 'n/a'}}
            </li>
            <li class="list-group-item">
              <span class="font-weight-bold">Tags:</span>
              {{-- Looping "tags" COLLECTION --}}
              @forelse ($post->tags as $tag)
                <span>
                  {{$tag->name}}{{!$loop->last ? ',' : '.'}}
                </span>
              @empty
                <span>n\a</span>
              @endforelse
            </li>
            <li class="list-group-item">
              Publication date:
              {{ date('Y-m-d', strtotime($post->publication_date))}}
            </li>
            @if ($post->summary)
              <li class="list-group-item text-justify">
                <span class="font-weight-bold">Summary.</span>
                {{$post->summary}}
              </li>
            @endif
            @if ($post->notes)
              <li class="list-group-item">
                <span class="font-weight-bold">Notes.</span>
                {{$post->notes}}
              </li>
            @endif
          </ul>
          <div class="card-body d-flex justify-content-between">
            <a class="btn btn-warning text-uppercase" href="{{route('admin.posts.edit', ['post' => $post->id])}}">
              Edit
            </a>
            <form action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger text-uppercase" href="#">
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
