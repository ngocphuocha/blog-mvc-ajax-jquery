<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function forgotPass()
    {
        return view('users.forgot-password');
    }

    public function sendEmailResetPass(Request $request)
    {
        $user = User::where('email', $request->only('email'))->select('id', 'email', 'name')->get();
        if (count($user)) {
            $id = $user[0]->id;
            $data = [];
            // Generate new link for reset password
            $link = URL::temporarySignedRoute('users.reset-pass', now()->addMinute(3), ['id' => $id]);
            $data['id'] = $id;
            $data['name'] = $user[0]->name;
            $data['email'] = $user[0]->email;
            $data['link'] = $link;
            Mail::send('mails.reset-pass', $data, function ($message) use ($data) {
                $message->to($data['email'], 'Admin Phuoc Tran')->subject('Change your new password');
                $message->from('testfaifoo@gmail.com', 'Admin');
            });

            // if success
            return response()->json(['email' => $data['email']]);
        } else {
            return response()->json(['error' => 'This mail was not found in application system, please try again!', 'email' => $request->input('email')], 404);
        }
    }

    public function resetPass($id)
    {
        return view('users.reset-password', compact('id'));
    }

    public function changePass($id, Request $request)
    {
        $password = $request->input('password');
        User::where('id', $id)->update(['password' => $password]);

        return view('success.reset-pass');
    }
}
