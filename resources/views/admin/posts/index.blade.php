@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="row">
    <div class="col-12">
      <div class="flex-wrapper d-flex justify-content-between">
        <h1 class="text-left">All posts</h1>
        <a class="btn btn-success text-uppercase font-weight-bold" href="{{route('admin.posts.create')}}">
          New post
        </a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>
                  <a class="btn btn-info text-uppercase" href="{{route('admin.posts.show', ['post' => $post->id])}}">
                    Details
                  </a>
                  <a class="btn btn-info text-uppercase" href="#">
                    Edit
                  </a>
                  <a class="btn btn-info text-uppercase" href="#">
                    Delete
                  </a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
