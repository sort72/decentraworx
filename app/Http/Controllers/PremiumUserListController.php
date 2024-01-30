<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PremiumUserListController extends Controller
{
    public function index()
    {
        return view('pages.premium-users.index');
    }
    public function show(Request $request, User $user)
    {
        return view('pages.premium-users.show', compact('user'));
    }
}
