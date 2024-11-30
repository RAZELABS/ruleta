<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(['id','dni','id_tienda', 'name', 'email', 'created_at', 'updated_at']);

        // Convertir la colección en un array para el componente
        $usersData = $users->map(function ($user) {
            return [$user->id, $user->dni,$user->tienda->nombre, $user->name, $user->email, $user->created_at, $user->updated_at];
        })->toArray();
        //dd($usersData);
        return view('admin.user.index', compact('usersData'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
