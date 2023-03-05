<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('pages.admin.user.index', compact('users'));
    }

    public function create(): View
    {
        return view('pages.admin.user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $attr = $request->validate([
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'fname' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'username' => $attr['username'],
            'fname' => $attr['fname'],
            'surname' => $attr['surname'],
            'email' => $attr['email'],
            'password' => Hash::make($attr['password']),
        ]);

        return redirect(route('admin.user.index'));
    }

    public function edit(User $user): View
    {
        return view('pages.admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $attr = $request->validate([
            'username' => ['required', 'string', 'max:20', Rule::unique('users')->ignore($user->id)],
            'fname' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'password' => ['string', 'min:8', 'confirmed', 'nullable'],
        ]);

        if ($attr['password']) {
            $user->update([
                'username' => $attr['username'],
                'fname' => $attr['fname'],
                'surname' => $attr['surname'],
                'password' => Hash::make($attr['password']),
            ]);
        } else {
            $user->update([
                'username' => $attr['username'],
                'fname' => $attr['fname'],
                'surname' => $attr['surname'],
            ]);
        }

        return redirect(route('admin.user.index'));
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return redirect(route('admin.user.index'));
    }

    public function toggle(Request $request, User $user): int
    {
        $validator = Validator::make($request->all(), [
            'value' => ['required', Rule::in(['true', 'false'])],
        ]);

        if ($validator->failed()) {
            return 0;
        }

        $user->update([
            'is_active' => $request->input('value') == 'true',
        ]);

        return 1;
    }
}
