<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function forgotPass()
    {
        return view('users.forgot-password');
    }

    public function sendEmailResetPass(Request $request)
    {
        $email = $request->input('email'); // Get emaill field
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                function ($attribute, $value, $fail) use ($email) {
                    $value = User::where('email', $email)->select('email')->get();
                    if (count($value) === 0) {
                        $fail('The ' . $attribute . ' is not found in resources. Please try again!');
                    }
                }
            ]
        ]);
        if ($validator->fails()) {
            return response()->json([$validator->errors()], 400);
        } else {
            $user = User::where('email', $request->input('email'))->select('id', 'email', 'name')->get();
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
        }
    }

    public function resetPass($id)
    {
        return view('users.reset-password', compact('id'));
    }

    public function changePass($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:15|max:25'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $password = $request->input('password');
            $password = bcrypt($password);
            $user = User::where('id', $id)->update(['password' => $password]);
            return response()->json($user, 200);
        }
    }
}
