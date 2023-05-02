<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

   /* public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $email_check = User::where('email', $email)->first();
        if($email_check)
        {
            return redirect('password/reset')->with('status', 'böyle bi mail vardır');
        }
        else
        {
            return redirect('/')->with('status', 'böyle bi mail yoktur');
        }


    }*/
}
