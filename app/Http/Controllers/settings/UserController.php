<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUsersRequest;
use App\Http\Requests\User\updateUsersRequest;
use App\Models\Permission;
<<<<<<< HEAD
=======
use App\Models\Role;
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
<<<<<<< HEAD
        $this->Middleware(["auth"]);
        $this->Middleware(["permission:read_users"])->only('index');
        $this->Middleware(["permission:create_users"])->only(['create', 'store']);
        $this->Middleware(["permission:update_users"])->only(['edite', 'update']);
        $this->Middleware(["permission:delete_users"])->only('destroy');
        $this->middleware('status');
=======
        return $this->Middleware('auth');
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3
    }
    public function index()
    {
        $users = User::with('roles:name')->get();
        return view('settings.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Permissions = Permission::all();
        return view('settings.users.create', compact('Permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $request->validated();

        $pre =  $request->Permissions;
        $Permissions = [];
        foreach ($pre as $key => $value) {
            array_push($Permissions, $value);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->AttachPermissions($Permissions);


<<<<<<< HEAD
        session()->flash('yes', "User is created");
=======
        session()->flash('yes',"User is created");
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Permissions = Permission::get();
        $user = User::with("Permissions:id,name")->findOrFail($id);
        return view('settings.users.show', compact('user', 'Permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Permissions = Permission::all();
        $user = User::with("Permissions:id,name")->findOrFail($id);
        return view('settings.users.edite', compact('user', 'Permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'            => 'required|string|max:255|min:1',
            'email'           => 'required|email|max:255|unique:users,email,' . $id . 'min:2',
            'password'        => 'required|string|max:255|min:6|confirmed',
        ]);
        $user->update([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'status'          => $request->status,
        ]);
        $user->syncpermissions($request->Permissions);
=======
    public function update(Request $request,$id)
    {
      $user = User::findOrFail($id);
      $request->validate([
        'name'            => 'required|string|max:255|min:1',
        'email'           => 'required|email|max:255|unique:users,email,'.$id.'min:2',
        'password'        => 'required|string|max:255|min:6|confirmed',
    ]);
    $user->update([
        'name'            => $request->name,
        'email'           => $request->email,
        'password'        => Hash::make($request->password),
        'status'          => $request->status,
    ]);
    $user->syncpermissions($request->Permissions);
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3

        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
<<<<<<< HEAD
        $user = User::where('email', '=', $request->email)->first();
=======
        $user = User::where('email','=',$request->email)->first();
>>>>>>> b185d782da2b94ebd0df9fa5a0eb39a1bb2911a3
        $user->delete();

        return redirect()->route('users.index');
    }
}
