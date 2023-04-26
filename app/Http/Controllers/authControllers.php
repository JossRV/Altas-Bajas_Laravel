<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class authControllers extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest'])->only('index');
    }
    public function index()
    {
        $icono = 'img/usuario.png';
        $titulo = 'Login';
        // toast('Your Post as been submited!','success');
        return view('modules/login/index', compact('titulo','icono'));
    }
    public function logeo(Request $request)
    {
        $credenciales = $request->only("name", "password");
        if (Auth::attempt($credenciales)) {
            if(auth()->user()->rol == 'cliente'){
                Alert::success('Credenciales correctas!', 'Ah ingresado a la plataforma');
                return redirect()->route('inicio');
            }
        } else {
            Alert::error('Credenciales incorrectas!', 'Verifique sus datos');
            return back()->withInput($credenciales);
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        Alert::success('Salio!', 'Ah cerrado sesion en la plataforma');
        return redirect()->route('login');
    }
    public function registro()
    {
        $icono = 'img/agregar-usuario.png';
        $titulo = 'Registro';
        return view('modules/login/registro', compact('titulo','icono'));
    }
    public function nuevoRegistro(Request $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->password = Hash::make($request->password);
        $item->rol = 'cliente';
        $item->save();
        Alert::success('Registrado!', 'Se ha registrado correctamente');
        return redirect()->route('login');
    }
}
