<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login
    public function showLogin()
    {
        return view('login');//Muestra la pagina login
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $credentials = $request->validate([//Valida los datos de usuario
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {//Comprueba si el usuario es correcto
            return redirect()->route('home')->with('success', 'Login Correcto!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    //Cerrar Sesion
    public function logout()//Cierra la sesion abierta
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Login Correcto!');
    }

    //Mostrar Registro
    public function showRegister()//Muestra la pagina de registro de nuevo usuario
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([//Valida el registro
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([//Crea el usuario en la base de datos con los datos cifrado
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //Cifrar la contraseña
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }
}
