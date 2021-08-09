<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() : View
    {
        $users = User::all();
        return view('pages.admin.user.index', compact('users'));
    }

    public function create() : View
    {
        return view('pages.admin.user.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $attr = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $attr['name'],
            'email' => $attr['email'],
            'password' => Hash::make($attr['password']),
        ]);

        return redirect(route('admin.user.index'));
    }

    public function edit(User $user) : View
    {
        return view('pages.admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user) : RedirectResponse
    {
        $attr = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed', 'nullable'],
        ]);

        if ($attr['password']) {
            $user->update([
                'name' => $attr['name'],
                'password' => Hash::make($attr['password']),
            ]);
        }else{
            $user->update([
                'name' => $attr['name'],
            ]);
        }


        return redirect(route('admin.user.index'));
    }
}
