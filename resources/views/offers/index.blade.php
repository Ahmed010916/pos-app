@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="page-title">@lang('site.offers')</h1>
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
    <div class="row">
        @foreach ($res as $item)
            <a href="{{$item->url}}" target="_blank" class="card m-3 " style="width: 10rem;">
                <img src="{{$item->network_icon}}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">{{$item->name}}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
