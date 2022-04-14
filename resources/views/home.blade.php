@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="page-title">{{__('site.dashboead')}}</h1>
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
      <!-- info small box -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card shadow">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                 <a href="{{route('offers.index')}}"> <img src="{{asset('image/cpabuild.png')}}" alt="" style="width: 300px;"></a>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end section -->
@endsection
