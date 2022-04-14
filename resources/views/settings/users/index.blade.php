@extends('layouts.master')
@section('content')
    <div class="row justify-content-center"
    x-data="{
        name :'name',
        email:'email',
        btn: true,
    }"

    >
        <div class="col-12">
            <h1 class="page-title">{{__('site.users')}}</h1>
        </div> <!-- .col-12 -->
        <!-- Bordered table -->
        <div class="my-4 col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="toolbar row mb-3">
                        <div class="col">
                            <form class="form-inline">
                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <h5 class="card-title">{{__('site.all_users')}}</h5>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                                    @permission('create_users')
                                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right ml-3"
                                        type="button"
                                        @click="btn = false"
                                        x-show="btn"
                                        >{{__('site.add_user')}} +</a>
                                    @endpermission
                                    <div x-show="!btn" class="spinner-border mr-3 text-primary" role="status"><span class="sr-only">Loading...</span></div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('site.name')}}</th>
                                <th>{{__('site.email')}}</th>
                                <th>{{__('site.status')}}</th>
                                <th>{{__('site.permissions')}}</th>
                                <th>{{__('site.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="badge badge-pill badge-primary">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($user->Permissions as $Permission)
                                           <span class="badge badge-pill badge-primary">{{ str_replace("_"," ",$Permission->name) }}</span>
                                        @endforeach
                                    </td>
                                    <td class="cc"><button class="btn btn-sm dropdown-toggle more-horizontal"
                                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @permission('read_users')<a class="dropdown-item" href="{{ route('users.show', $user->id) }}">{{__('site.show')}}</a>@endpermission
                                            @permission('update_users')<a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">{{__('site.edite')}}</a>@endpermission
                                            @permission('delete_users')<a class="dropdown-item"  x-on:click="name = '{{$user->name}}',email =  '{{$user->email}}'"  data-toggle="modal" data-target="#deleteModal"style="color: black;">{{__('site.delete')}}</a>@endpermission
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- Bordered table -->
         {{-- start modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="varyModalLabel">{{__('site.delete_user')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" x-data="{btn:true}">
              <form @submit="btn = false" action="{{route('users.destroy'," ")}}" method="POST">
                  @csrf
                  @method('delete')
                <div class="row d-flex" style="justify-content: space-evenly !important;">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" readonly x-model="email"  id="recipient-name">
                      </div>
                      <div class="form-group">
                          <input type="text" name="name" class="form-control" readonly x-model="name" id="recipient-name">
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">{{__('site.close')}}</button>
                    <button  x-show="btn" type="submit" class="btn mb-2 btn-primary">{{__('site.delete_user')}}</button>
                    <div x-show="!btn" class="spinner-border mr-3 text-primary" role="status"><span class="sr-only">Loading...</span></div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    {{-- End modal --}}
    </div> <!-- .row -->
@endsection
