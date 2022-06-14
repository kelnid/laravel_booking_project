<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserActivationEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResendEmailForActivateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ActivationResendController extends Controller
{
    public function showResendForm()
    {
        return view('auth.activate.resend');
    }
    public function resend(ResendEmailForActivateRequest $request)
    {
//        $this->validateResendRequest($request);

        $user = User::where('email', $request->email)->first();

        event(new userActivationEmail($user));

        return redirect()->route('login')->withSuccess('Письмо для активации отправлено');
    }
}
