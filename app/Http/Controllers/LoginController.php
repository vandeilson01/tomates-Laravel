<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{


    public function __invoke()
    {
        # code...
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        
        // dd($request->all());
        // $credentials = $request->getCredentials();
 
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        

        if(empty($user)){

            echo "Email invalido!";

        }else{
        
            if(password_verify($request->input('password'), $user->password) == true){

                Auth::login($user);
                echo 'location';
            
            }else{

                echo 'Senha incorreta!';

            }
        }
       
       
    }

    public function register(Request $request)
    {
        
        // dd($email.' '.$password);

        // dd($request->all());
        $validated = $request->validate([
            'names' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();
 
        if(empty($user)){


            if(strlen($request->input('password')) < 8){

                echo 'Tem que ter pelo menos 8 caracteres!';
                
            }else{

                if($request->input('password') == $request->input('password_confirmation')){

                    $users = User::create([
                        'name' => $request->input('names'),
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password'))
                    ]);

                    Auth::login($users);
                    echo 'location';

                }else{

                    echo "As senhas são diferentes";
            
                }
            }
           

        }else{
            echo 'Email já registrado!';
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}