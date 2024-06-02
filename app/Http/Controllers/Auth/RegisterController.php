<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\ContactMail;
use App\Models\EmailContent;
use Mail;
use App\Mail\RegistrationMail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'hiddenid' => 'required',
            'password' => ['required','min:6'],
            'confirm_password' => 'required|same:password',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     protected function create(array $data)
    {

        if (empty($data['hiddenid'])) {
            return $data;
        } else {
            $msg = EmailContent::where('title','=','user_registration_mail')->first()->description;
            $adminmail = ContactMail::where('id', 1)->first()->email;
            $contactmail = $data['email'];

                $array['contactmail'] = $contactmail;
                $array['name'] = $data['name'];
                $array['email'] = $data['email'];
                $array['message'] = $msg;
                $array['subject'] = "Welcome to Aidme";
                $array['from'] = 'do-not-reply@aidmeuk.com';
                $email = $data['email'];
                $a = Mail::to($contactmail)
                    ->send(new RegistrationMail($array));
                
            if ($a) {

                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'sur_name' => $data['name'],
                    'clientid' => time(),
                    'password' => Hash::make($data['password']),
                ]);
                
            } else {
                return "Error";
            }
        }
        

        
        
    }




    protected function newcreate(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'sur_name' => $data['name'],
            'clientid' => time(),
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function uregister(Request $request)
    {


        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'password' => ['required','min:6'],
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Name field required.',
            'email.unique' => 'The email has already been taken.',
            'email.required' => 'Email field required.',
            'phone.required' => 'Phone field required.',
            'password.required' => 'Password field required.',
            'confirm_password.same' => 'Password not matched.',
        ]);

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        $msg = EmailContent::where('title','=','user_registration_mail')->first()->description;
        $adminmail = ContactMail::where('id', 1)->first()->email;
        $contactmail = $email;

            $array['contactmail'] = $contactmail;
            $array['name'] = $name;
            $array['email'] = $email;
            $array['message'] = $msg;
            $array['subject'] = "Welcome to Aidme";
            $array['from'] = 'do-not-reply@aidmeuk.com';
            
            $a = Mail::to($contactmail)
                ->cc($adminmail)
                ->send(new RegistrationMail($array));
            
        if ($a) {
           
            // $user = User::create([
            //     'name' => $name,
            //     'email' => $email,
            //     'phone' => $phone,
            //     'sur_name' => $name,
            //     'clientid' => time(),
            //     'password' => Hash::make($request->password),
            // ]);
            // return $user;


            $data = $request->all();
            $check = $this->newcreate($data);
            

        } else {
            return "Error";
        }
        
    }

    
}
