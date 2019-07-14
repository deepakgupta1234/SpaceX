@extends('layouts.app')

@section('content')
    
    <div class="row">
      <div class="col-sm-12">
        <a href="" class="btn btn-dark pull-right"><i class="fa fa-refresh"></i> Refresh</a>
      </div>
    </div>
    <div class="row">
    @foreach($top10Launch as $item)
      <div class="col-sm-12">
        <div class="card mt-10">
          <div class="card-body">
            <h5 class="card-title">{{$item->mission_name}} [ {{$item->flight_number}} ] {{implode($item->mission_id)}}</h5>
            <p class="text-justify">{{$item->details}}</p>
            <p> {{\Carbon\Carbon::Parse($item->launch_date_local)->toCookieString()}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
@endsection
