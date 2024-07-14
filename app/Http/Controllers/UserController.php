<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    // Existing methods...

    public function show($id)
    {
        $user = User::with('categories')->findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function createProduct(User $user)
    {
        return view('sales.create', compact('user'));
    }
}
