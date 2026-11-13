<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
 // 1. Mostrar formulario de Login
 public function showLogin()
 {
 if (Auth::check()) {
 return redirect()->route('medicamentos.index');
 }
 return view('auth.login');
 }
 // 2. Procesar Login con regeneración de sesión anti-fijación
 public function login(Request $request)
 {
 $credentials = $request->validate([
 'email' => 'required|email',
 'password' => 'required',
 ]);
 if (Auth::attempt($credentials)) {
 $request->session()->regenerate();
 return redirect()->intended(route('medicamentos.index'))
  ->with('success', '¡Bienvenido al sistema, ' . Auth::user()->name . '!');
 }
 return back()->withErrors([
 'email' => 'Las credenciales ingresadas no coinciden con nuestros registr
os.',
 ])->onlyInput('email');
 }
 // 3. Mostrar formulario de Registro
 public function showRegister()
 {
 if (Auth::check()) {
 return redirect()->route('medicamentos.index');
 }
 return view('auth.register');
 }
 // 4. Procesar el Registro de nuevo empleado
 public function register(Request $request)
 {
 $request->validate([
 'name' => 'required|string|max:255',
 'email' => 'required|string|email|max:255|unique:users',
 'password' => 'required|string|min:6|confirmed',
 ]);
 $user = User::create([
 'name' => $request->name,
 'email' => $request->email,
 'password' => Hash::make($request->password),
 ]);
 Auth::login($user);
 return redirect()->route('medicamentos.index')
 ->with('success', '¡Cuenta creada con éxito! Bienvenido a Fe
rretería La Bendición.');
 }
 // 5. Cerrar Sesión de forma segura
 public function logout(Request $request)
 {
 Auth::logout();
 $request->session()->invalidate();
 $request->session()->regenerateToken();
 return redirect()->route('login')
 ->with('success', 'Has cerrado sesión correctamente.');
 }
}
