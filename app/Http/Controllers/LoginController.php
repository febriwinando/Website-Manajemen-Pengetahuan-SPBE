<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller

{

    public function index(){
        return view('mplogin');
    }


    public function registrasi(){
        $artikels = Artikel::orderBy('updated_at', 'desc')->take(8)->get();
        return view('daftarmpadmin', compact('artikels'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=> 'required|max:255',
            'username'=>['required', 'min:3', 'max:255', 'unique:users'],
            'email'=>'required|email:rfc,dns|unique:users',
            'password'=> 'min:5|max:255|required'
        ]);

        // $validate['password'] = bcrypt($bcrypt['password']);
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        // dd('Berhasil');

        // mengirim informasi dengan cara 1
        // $request->session()->flash('success', 'Silahkan Login.');

        // menggunakan with dapat mengirim informasi dengan cara kedua
        return redirect('/daftarmpadmin')->with('success', 'Silahkan Login.');
    }

    // public function authenticate(Request $request): RedirectResponse
    // {
    //     $credentials = $request->validate([
    //         'username' => ['required', 'username'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();


            // Query artikel dari database
            $artikels = Artikel::all();

            // Redirect ke view dengan data artikel
            return redirect()->intended('/artikel')->with('artikels', $artikels);
            // return redirect()->intended('/artikel');
        }

        return back()->with('loginError', 'Coba Lagi.');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/mpadmin');
    }
}
