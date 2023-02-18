<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;//Библиотека для кодирования паролей

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=array('admin','moderator','user');
        $users = User::orderBy('name','asc')->get();
        return view('users.index', compact('users','roles'));
    }

    //------------list users by role
    public function userByrole(Request $request)
    {
        $roles=array('admin','moderator','user');
        $data = $request->all();//данные, переданы формой
        $selectRole=$data['role'];
        if($data['role']=="0") {
            return redirect('/users');//возврат на полный список users
        } else {
            $users = User::where('role', 'LIKE', $data['role']) ->get();
            return view('users.index', compact('users', 'roles', 'selectRole'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::orderBy('name', 'asc')->get();
        $roles=array('admin','moderator','user');
        return view('users.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        //---------------запрос на добавление пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$users = User::orderBy('name', 'asc')->get();
        $roles=array('admin', 'moderator', 'user');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        if(!isset($request->role)) $request->role=Auth::user()->role;
        if($request->password) {//если пароль меняют
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
            ]);
            $user->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        } else {//пароль НЕ меняют
            $user -> update([
                'name' => $request -> name,
                'role' => $request -> role,
            ]);
        }
            return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function register() {
        return view('users.register');
    }

    public function userStore(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        //---------------запрос на добавление пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
 
        ]);
        return view('users/regSuccess');
    }

}
