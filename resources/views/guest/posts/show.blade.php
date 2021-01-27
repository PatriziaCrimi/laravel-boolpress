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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
