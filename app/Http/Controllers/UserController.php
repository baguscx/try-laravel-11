<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(){
        // $users = DB::table('users')->get();
        // latest() -> oldest()
        // ->select('title', 'slug')
        // orderBy() -> orderByDesc()
        // return $users;


        $users = User::latest()->get();
        // menggunakan model
            // query()->
            // User::findMany([1,2,3]);
            // User::firstWhere('name', 'John');
        // return $users;
        return view('users.index', compact('users'));
        // return view(users.index, [
        //     'users' => $users
        // ]);
    }

    public function create(){
        return view('users.form', [
            'user' => new User,
            'meta_page' => [
                'title' => 'Create User',
                'method' => 'POST',
                'url' => '/users',
                'button' => 'Create'
            ]
        ]);
    }

    public function store(UserRequest $request){

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        User::create($request->validated());

        // User::create($request->all());
        // return dd($val);
        return redirect()->route('users.index');
    }

    public function show(User $user){

        return view('users.show', compact('user'));
    }

    public function edit(User $user){
        return view('users.form',[
            'user' => $user,
            'meta_page' => [
                'title' => 'Edit User : ' . $user->name,
                'method' => 'PUT',
                'url' => '/users/' . $user->id,
                'button' => 'Update'
            ]
        ]);
    }

    public function update(User $user, UserRequest $request){
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('users.index');
    }
}
