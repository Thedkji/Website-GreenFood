<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(5);
        return view('admins.users.list-users',compact('users'));
    }
}
