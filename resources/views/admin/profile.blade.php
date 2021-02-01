@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-capitalize">User information</div>
        <div class="card-body">
          <dl class="">
            {{-- "Auth" is a Laravel Class containing all the logged-in user data --}}
            <dt>Name</dt>
            <dd>{{Auth::user()->name}}</dd>
            <dt>E-mail</dt>
            <dd>{{Auth::user()->email}}</dd>
            <dt><span class="text-uppercase">api</span> token</dt>
            {{-- Checking if there is an API token for the user logged-in --}}
            @if (Auth::user()->api_token)
              <dd>{{Auth::user()->api_token}}</dd>
            @else
              <form action="{{route('admin.generate_token')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-dark" name="button">
                  Generate token
                </button>
              </form>
            @endif
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
