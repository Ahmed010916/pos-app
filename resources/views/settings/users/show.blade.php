@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="page-title">User : {{ $user->name }}</h1>
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Form row</strong>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" disabled name="name" value="{{ $user->name }}" class="form-control"
                                id="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" disabled name="email" value="{{ $user->email }}" class="form-control"
                                id="email">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Permissions</label>
                        @foreach ($Permissions as $Permission)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" @foreach ($user->Permissions as $item) @checked($item->id == $Permission->id) @endforeach readonly class="custom-control-input">
                                <label class="custom-control-label">{{ $Permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button disabled class="btn btn-primary">Sign in</button>
                    </form>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->
@endsection
