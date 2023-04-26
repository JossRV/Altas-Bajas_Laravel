<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authControllers extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest'])->only('index');
    }
    public function index()
    {
        $titulo = 'Login';
        return view('modules/login/index', compact('titulo'));
    }
    public function logeo(Request $request)
    {
        $credenciales = $request->only("name", "password");
        if (Auth::attempt($credenciales)) {
            if(auth()->user()->rol == 'cliente'){
                return redirect()->route('inicio');
            }
        } else {
            return back()->withInput($credenciales);
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
    public function registro()
    {
        $titulo = 'Registro';
        return view('modules/login/registro', compact('titulo'));
    }
    public function nuevoRegistro(Request $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->password = Hash::make($request->password);
        $item->rol = 'cliente';
        $item->save();
        return redirect()->route('login');
    }
}
