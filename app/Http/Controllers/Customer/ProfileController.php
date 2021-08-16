<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function choiceCurrency(Request $request, User $user): RedirectResponse
    {
        $cid = $request->validate([
            'cid' => ['required', 'string', Rule::in(config('currency.currencies'))]
        ])['cid'];

        if ($user != auth()->user()){
            return back();
        }

        $user->setSetting('currency', $cid);
        return back();
    }
}
