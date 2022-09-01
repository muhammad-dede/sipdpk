<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('id', '!=', 1)->orderBy('name', 'asc')->get();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_role = \Spatie\Permission\Models\Role::all();
        return view('user.create', compact('data_role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:users,email|max:255',
            'password' => 'required|min:8|string',
            'role' => 'required|string',
        ]);

        $user = User::create([
            'name' => ucwords($request->name),
            'email' => strtolower($request->email),
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('success', __('Berhasil disimpan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        if (!$user) {
            return abort('404');
        }
        $data_role = \Spatie\Permission\Models\Role::all();
        $user_role = $user->roles->pluck('name', 'name')->first();

        return view('user.edit', compact('user', 'data_role', 'user_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email,' . $uuid . ',uuid',
            'password' => 'nullable|min:8|string',
            'role' => 'required|string',
        ]);

        $user = User::where('uuid', $uuid)->first();

        if (!$user) {
            return abort('404');
        }

        $user->update([
            'name' => ucwords($request->name),
            'email' => strtolower($request->email),
            'email_verified_at' => now(),
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('user.index')->with('success', __('Berhasil disimpan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        if (!$user) {
            return abort('404');
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', __('Berhasil dihapus'));
    }
}
