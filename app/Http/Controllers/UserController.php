<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class UserController extends Controller
{
    public function showLogin(){
        return view('clogin.usuario');
    }

    public function showLoginPassword(){
        return view('clogin.password');
    }
    /*
    public function verificalogin(Request $request){
        //return dd($request->all());
        $data=request()->validate([
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'email.required'=>'Ingrese Correo',
            'password.required'=>'Ingrese contraseña',
        ]); 
        /*
        if (Auth::attempt($data)){
            $con='OK';
        } 
        
        $email=$request->get('email');

        $query=User::where('email','=',$email)->get();

        if ($query->count()!=0)
        {
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if (password_verify($password, $hashp))
            {
                return redirect()->route('rutarrr1'); 
            }
            else
            {
                return back()->withErrors(['password'=>'Contraseña no válida'])
                ->withInput(request(['email', 'password']));
            }
        }
        else
        {
            return back()->withErrors(['email'=>'Correo no válido'])
            ->withInput(request(['email']));
        } 
    } 
    */
    
    public function verificalogin(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email',
    ], [
        'email.required' => 'Introduce una dirección de correo o usuario',
    ]);

    $email = $data['email'];
    $usuario = User::whereEmail($email)->first();

    if ($usuario) {
        // Guarda el email en sesión para el siguiente paso
        session(['email' => $email]);
        return redirect()->route('pass');
    }

    return back()->withErrors([
        'email' => 'No se ha podido encontrar tu cuenta de Eduka',
    ])->withInput();
}


public function verificapassword(Request $request)
{
    $request->validate([
        'password' => 'required',
        'g-recaptcha-response' => 'required',
    ], [
        'password.required' => 'Introduce una contraseña',
        'g-recaptcha-response.required' => 'Completa el reCAPTCHA',
    ]);

    // Verificación de reCAPTCHA
    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => config('services.recaptcha.secret_key'),
        'response' => $request->input('g-recaptcha-response'),
        'remoteip' => $request->ip(),
    ]);

    if (! $response->json('success')) {
        return back()->withErrors(['g-recaptcha-response' => 'Falló la verificación de reCAPTCHA.'])->withInput();
    }

    // Recuperar el correo desde sesión (NO MODIFICAR, PUES SE PASAN LOS DATOS DEL USUARIO)
    $email = session('email');

    if (!$email) {
        return redirect()->route('login')->withErrors(['email' => 'Sesión expirada. Inicia nuevamente.']);
    }

    // Intentar autenticación
    if (Auth::attempt(['email' => $email, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->route('rutarrr1'); // o 'rutarrr1' si prefieres
    }

    return back()->withErrors([
        'password' => 'Contraseña incorrecta. Intenta nuevamente o usa "¿Olvidaste tu contraseña?"',
    ])->withInput();
}


    public function salir(){
    Auth::logout();
    return redirect()->route('login');
    }
    
}
