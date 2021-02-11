<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    public function verified($id)
    {
        $user = User::findOrFail($id);
        $user->update(["email_verified_at" => now()]);
        $user->save();

        return view('verified');
    }

    public function manualVerification(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update(["email_verified_at" => now()]);
        $user->save();

        return view('verified');
    }
}
