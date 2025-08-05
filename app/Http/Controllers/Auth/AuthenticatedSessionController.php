<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Models\ActiveDirectory\User as LdapRecordUser;
use LdapRecord\Laravel\Facades\Ldap;
use App\Models\UserLdap;
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

                try {
                    Ldap::getConnection()->connect(); // <--- ESTO ES CLAVE
                } catch (\Exception $e) {
                    \Log::error('Error conectando a LDAP: ' . $e->getMessage());
                    return back()->withErrors(['username' => 'No se pudo establecer conexión con el servidor LDAP.']);
                }
                
                // Autenticación AD
                $ldap = UserLdap::where('samaccountname', $username)->first();
                
                if (!$ldap) {
                    return back()->withErrors(['username' => 'Usuario de Active Directory no encontrado.']);
                }
                
                try {
                    
                    $auth = $ldap->getConnection()->auth();
                    if ($auth->attempt($ldap->getDn(), $password)) {
                        $ldap->getConnection()->disconnect();
                        
                        $user = User::firstOrNew(['username' => $username]);
                        $ldap->syncWithEloquent($user);
                        
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

    protected function findLdapUser($username)
    {
        // Primero intentamos por sAMAccountName
        $ldapUser = UserLdap::where('samaccountname', $username)->first();
        
        // Si no se encuentra, intentamos por email
        if (!$ldapUser && filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $ldapUser = UserLdap::where('mail', $username)->first();
        }
        
        // Si aún no se encuentra, intentamos con ANR (Ambiguous Name Resolution)
        if (!$ldapUser) {
            $ldapUser = UserLdap::findByAnr($username)->first();
        }
        
        return $ldapUser;
    }

    protected function syncLdapUser($ldapUser)
    {
        // Usamos el sAMAccountName como username único
        $user = User::firstOrNew(['username' => $ldapUser->getFirstAttribute('samaccountname')]);
        
        $ldapUser->syncWithEloquent($user);
        
        // Establecer rol por defecto si no está asignado
        if (empty($user->rolId)) {
            $user->rolId = 11; // Rol por defecto
        }
        
        $user->save();
        
        return $user;
    }
}
