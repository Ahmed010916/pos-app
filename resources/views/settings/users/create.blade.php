    @extends('layouts.master')
    @section('content')
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="page-title">Create User</h1>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
        <div class="row"x-data="{btn:true}">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form row</strong>
                    </div>
                    <div class="card-body">
                        <form @submit="btn = false" action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        id="name">
                                    @error('name')
                                        <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        id="email">
                                    @error('email')
                                        <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control" id="password">
                                    @error('password')
                                        <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Password Confirm</label>
                                    <input type="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" class="form-control"
                                        id="password_confirmation">
                                    @error('password_confirmation')
                                        <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="Permissions">Permissions</label>
                                @foreach ($Permissions as $Permission)
                                    <div class="custom-control custom-checkbox">
                                        <input name="Permissions[]" value="{{ $Permission->id }}" type="checkbox"
                                            class="custom-control-input" id="{{ $Permission->name }}">
                                        <label class="custom-control-label"
                                            for="{{ $Permission->name }}">{{ str_replace("_"," ",$Permission->name) }}</label>
                                    </div>
                                @endforeach
                                @error('Permissions')
                                    <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <button x-show="btn" type="submit" class="btn btn-primary">{{__('site.create_account')}}</button>
                                <div x-show="!btn" class="spinner-border mr-3 text-primary" role="status"><span class="sr-only">Loading...</span></div>
                        </form>
                    </div> <!-- /. card-body -->
                </div> <!-- /. card -->
            </div> <!-- /. col -->
        </div> <!-- /. end-section -->
    @endsection
