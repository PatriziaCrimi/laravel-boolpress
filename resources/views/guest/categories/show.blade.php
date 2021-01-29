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
    </div>
@endsection
