<?php

namespace  App\Http\Controllers\RolesPermissions;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view user', ['only' => ['index']]);
    //     $this->middleware('permission:create user', ['only' => ['create','store']]);
    //     $this->middleware('permission:update user', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete user', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $users = User::get();
        //dd($users);
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tienda' => 'required',
            'dni' => 'required|string|max:8',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'id_tienda' => $request->id_tienda,
            'dni' => $request->dni,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

$user->syncRoles($request->roles);

return redirect('/users')->with('status','User created successfully with roles');
}

public function edit(User $user)
{
$roles = Role::pluck('name','name')->all();
$userRoles = $user->roles->pluck('name','name')->all();
//dd($user);
return view('role-permission.user.edit', [
'user' => $user,
'roles' => $roles,
'userRoles' => $userRoles
]);
}

public function update(Request $request, User $user)
{
    //dd($request);
    $request->validate([
        'dni' => 'required|string|max:8',
        'id_tienda' => 'required|integer',
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:8|max:20',
        'roles' => 'required'
    ]);

    $data = [
        'dni' => $request->dni,
        'id_tienda' => $request->id_tienda,
        'name' => $request->name,
        'email' => $request->email,
    ];

    if(!empty($request->password)){
        $data += [
            'password' => Hash::make($request->password),
        ];
    }

    $user->update($data);
    $user->syncRoles($request->roles);

    return redirect('/users')->with('status','User Updated Successfully with roles');
}

public function destroy($userId)
{
    $user = User::findOrFail($userId);
    $user->delete();

    return redirect('/users')->with('status','User Delete Successfully');
}
}
