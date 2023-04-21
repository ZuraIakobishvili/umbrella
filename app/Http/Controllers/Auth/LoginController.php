<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;






class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        
       $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required|min:6',
        ]);

        if(! Auth::attempt($credentials, $request->boolean('remember'))) // -> Remember user 
        {
            
            //! Both option work

            throw ValidationException::withMessages([
                'email'=> trans('auth.failed'),
                 'password' => 'Incorrect Password'
            ]);
            
            // return back()
            //     ->withInput()
            //     ->withErrors([
            //         'email'=>'Incorrect Email Address',
            //         'password' => 'Incorrect Password'
            // ]);
        }
        $request->session()->regenerate(); // 

        return redirect()->intended(RouteServiceProvider::HOME); 
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/dashboard');
    }
}
