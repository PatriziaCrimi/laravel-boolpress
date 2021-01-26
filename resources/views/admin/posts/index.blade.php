@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1>All posts</h1>
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
                  <a class="btn btn-info" href="#">
                    Details
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
