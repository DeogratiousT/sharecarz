<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\UsersLaratables;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(User::class, UsersLaratables::class);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('id', [1])->get();

        return view('users.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        // $request->validate([
        //     'first_name' => 'required',
        //     'other_names' => 'required',
        //     'email' => 'required|email',
        //     'organisation' => 'required',
        //     'phone_number' => 'required',
        //     'role_id' => 'required|exist:roles,id',
        // ]);

        $user->name = $request->first_name.' '.$request->other_names;
        $user->email = $request->email;
        $user->organisation = $request->organisation;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make('Password1234');
        $user->role_id = $request->role_id;
        $user->email_verified_at = now();

        $user->save();

        return redirect()->route('users.index')->with('success','User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit',['user'=>$user, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'role_id' => 'required|exists:roles,id',
        // ]);

        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt('Password2021'),
        //     'role_id' => $request->role_id,
        // ]);

        // return redirect()->route('users.index')->with('success','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->active_account == false) {

            $user->active_account = true;

            $user->save();

            return redirect()->route('users.index')->with('success', $user->name.' Enabled');

        }else{

            $user->active_account = false;

            $user->save();

            return redirect()->route('users.index')->with('success',$user->name.' Disabled');
        }
    }
}
