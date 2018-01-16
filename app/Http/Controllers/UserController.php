<?php

namespace Teek\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Teek\Notify;
use Teek\services\Uploads;
use Teek\User;

class UserController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public static function numHash()
    {
        return (((0x0000FFFF & Auth::id()) << 16) + ((0xFFFF0000 & Auth::id()) >> 16));
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:32',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'user'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();

        if (Auth::attempt([ 'email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard');
        }

        Session::flash('message', 'Invalid details!');
        return redirect()->back();
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'sometimes|required',
        ]);

        if (Auth::attempt([ 'email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'user'){
                return redirect()->route('user.dashboard');
            }
            else {
                return redirect()->route('assistant.dashboard');

            }
        }

        Session::flash('message', 'Invalid details!');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if ($request->has('avatar')) {

            $upload = new Uploads();
            $upload->upload($request->avatar);

            Auth::user()->update([
                'avatar' => $upload->getName()
            ]);
            return response()->json($upload->getName());
        }

        if ($request->password != null) {
            if ($request->password != $request->confirm) {
                Session::flash('error', 'Incorrect confirm password!');
                return redirect()->back();
            }
            Auth::user()->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'name' => $request->input('name'),
                'password' => bcrypt($request->input('password')),
                'bio' => $request->bio
            ]);
        }
        else {
            Auth::user()->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'name' => $request->input('name'),
                'bio' => $request->bio
            ]);
        }


        return response()->json(Auth::user());
        // Session::flash('message', 'Profile Updated!');
        // return \redirect()->route('user.profile', strtolower(urlencode(Auth::user()->name)));
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();
        }
        catch (\Exception $exception){
            return redirect()->route('get.login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect()->route('user.dashboard');

    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'avatar' => $user->avatar_original,
            'provider' => $provider,
            'provider_id' => $user->id,
            'role' => 'user',
        ]);
    }

    public function index()
    {
        return view('user.dashboard');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function calendar()
    {
        return view('user.calendar')->with([
            'tasks' => Auth::user()->task,
        ]);
    }

    public static function checkNotification()
    {
        $notify = Notify::where([
            ['for', Auth::id()],
            ['read', 'false']
        ])->get();
        return count($notify);
    }

    public static function notifications()
    {
        return Notify::where([
            ['for', Auth::id()],
            ['read', 'false']
        ])->get();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->guest(route('welcome'));
    }

    /*remove welcome*/
}
