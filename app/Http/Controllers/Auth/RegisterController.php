<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('register');
    }
    protected function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required|min:3|max:255',
            'age' => 'required|numeric',
            'phone' => 'required|numeric',
            'address' => 'required',
            'password' => 'required|confirmed|string|min:15|max:25'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        DB::beginTransaction();

        try {
            $data = $request->only(['email', 'password']);
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            $profile = $request->only([
                'name',
                'age',
                'gender',
                'phone',
                'address'
            ]);
            $user->profile()->create($profile);
            DB::commit();
            // all good
            return response()->json(['success' => $user], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
}
