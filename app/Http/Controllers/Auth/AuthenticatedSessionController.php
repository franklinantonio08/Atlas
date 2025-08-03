<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Models\ActiveDirectory\User as LdapRecordUser;
use App\Models\LdapUser;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(LoginRequest $request)
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    public function store(LoginRequest $request)
        {
            $tipoUsuario = $request->input('tipo_usuario');
            $username = $request->input('username');
            $password = $request->input('password');
        
            if ($tipoUsuario === 'ad') {
                // Autenticación AD
                $ldapUser = LdapUser::where('samaccountname', $username)->first();
                
                if (!$ldapUser) {
                    return back()->withErrors(['username' => 'Usuario de Active Directory no encontrado.']);
                }
                
                try {
                    $auth = $ldapUser->getConnection()->auth();
                    if ($auth->attempt($ldapUser->getDn(), $password)) {
                        $ldapUser->getConnection()->disconnect();
                        
                        $user = User::firstOrNew(['username' => $username]);
                        $ldapUser->syncWithEloquent($user);
                        
                        if (empty($user->rolId)) {
                            $user->rolId = 11;
                        }
                        
                        $user->save();
                        
                        Auth::guard('web')->login($user);
                        $request->session()->regenerate();
                        
                        return redirect()->intended(RouteServiceProvider::HOME);
                    }
                } catch (\Exception $e) {
                    \Log::error('Error LDAP: ' . $e->getMessage());
                    return back()->withErrors(['username' => 'Error al conectar con Active Directory.']);
                }
                
                return back()->withErrors(['username' => 'Credenciales AD inválidas.']);
            } else {
                // Autenticación local por email (usando el campo username como email)
                if (Auth::attempt(['email' => $username, 'password' => $password])) {
                    $request->session()->regenerate();
                    return redirect()->intended(RouteServiceProvider::HOME);
                }
                
                return back()->withErrors([
                    'username' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
                ]);
            }
        }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
