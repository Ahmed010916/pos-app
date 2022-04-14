@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="page-title">Create New User</h1>
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Form row</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
                                @error('name')
                                    <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    id="email">
                                @error('email')
                                    <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" value="" class="form-control" id="password">
                                @error('password')
                                    <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Password Confirm</label>
                                <input type="password" name="password_confirmation" value="" class="form-control"
                                    id="password_confirmation">
                                @error('password_confirmation')
                                    <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-6">
                            <label for="Status">Status</label>
                            <select class="custom-select" name="status" id="Status">
                                <option disabled>Choose...</option>
                                <option value="0"  @selected($user->status == 0)>disabled</option>
                                <option value="1"  @selected($user->status == 1)>Active</option>
                              </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="Permissions">Permissions</label>
                            @foreach ($Permissions as $Permission)
                                <div class="custom-control custom-checkbox">
                                    <input name="Permissions[]" @foreach($user->permissions as $perm) @checked($perm->id == $Permission->id) @endforeach value="{{ $Permission->id }}" type="checkbox"
                                        class="custom-control-input" id="{{ $Permission->name }}">
                                    <label class="custom-control-label"
                                        for="{{ $Permission->name }}">{{ $Permission->name }}</label>
                                </div>
                            @endforeach
                            @error('Permissions')
                                <div style="color: red;display: flex; margin-top: 2px;">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div> <!-- /. card-body -->
            </div> <!-- /. card -->
        </div> <!-- /. col -->
    </div> <!-- /. end-section -->
@endsection
