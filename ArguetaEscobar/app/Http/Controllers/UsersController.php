<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('*')
        ->paginate(15);

        return response()->json(['message' => 'success', 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $user->assignRole('Administrator');
        return response()->json(['message'=>'success']);
    }
}
