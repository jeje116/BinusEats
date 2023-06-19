<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ForgotpassController extends Controller
{
    public function showForgotPass() {
        return view('forgotpass_verif.forgot', ['page_title' => 'Reset Password | BinusEats']);
    }

    public function showChangePassword(Request $request) {
        $user_id = $request->query('user_id');
        $token = $request->query('token');
        $email = $request->query('email');

        return view('forgotpass_verif.inputnp', [
            'user_id' => $user_id,
            'token' => $token,
            'email' => $email,
            'page_title' => 'Change Password | BinusEats'
        ]);
    }

    public function getEmail(Request $request) {
        $validation = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);
        DB::table('password_reset')->insert(
            ['email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()]
        );

        $user = User::where('email', $validation['email'])->get();

        $link = route('change.password', ['token' => $token, 'email' => $request->email, 'user_id' => $user[0]->id]);
        $body = "Please click the link below to reset your password";

        Mail::send('forgotpass_verif.email_forgot',['action_link' => $link, 'body'=>$body], function($message) use ($request) {
            $message->from('binuseats@gmail.com', 'BinusEats');
            $message->to($request->email)->subject('Reset Password');
        });

        return view('forgotpass_verif.verification', [
            'action_link' => $link,
            'body' => $body,
            'user_id' => $user[0]->id,
            'email' => $request->email,
            'page_title' => 'Reset Password | BinusEats',
            'success' => null
        ]);
    }
    
    public function sendEmail() {

        return view('forgotpass_verif.verification', [
            'action_link' => $request->action_link,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'email' => $request->email,
            'page_title' => 'Reset Password | BinusEats',
            'success' => 'Email has been send'
        ]);
    }
    
    public function changePassword() {

    }
}
