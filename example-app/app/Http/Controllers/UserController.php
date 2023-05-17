<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function index(): View
    {
        $users =  User::paginate(15);
        return view('user.index', ['users' => $users]);
    }
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }
}
