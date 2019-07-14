@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col text-center">
      <a href="{{url('get10launch')}}" class="btn btn-dark">Top 10 Launches</a>
      <a href="{{url('launches')}}" class="btn btn-dark">All Launches</a>
    </div>
  </div>
</div>
@endsection