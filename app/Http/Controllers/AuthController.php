<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\POST;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'user') {
                return redirect()->route('user.index');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'npp' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('npp','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == 'admin') {
                    return redirect()->route('admin');
                } elseif ($user->level == 'user') {
                    return redirect()->route('user');
                }
                return redirect()->intended('/');
            }

        return redirect('login')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
    public function registrasi(){
        $posts = Post::all();
        return view('admin.register',compact('posts'));
    }
    public function simpanregistrasi(Request $request ){
        // dd($request->all());

        $register = User::create([
            'name' => $request->name,
            'level' => 'user',
            'npp' => $request->npp,
            'password' => bcrypt($request->password),
        ]);

        if ($register) {
            return redirect()->route('registrasi')
                ->with([
                    'success' => 'Selamat register telah berhasil'
                ]);
        } else {
            return redirect()->route('registrasi')
                ->with([
                    'error' => 'Maaf register gagal coba perikasa'
                ]);
        }
    }
}
