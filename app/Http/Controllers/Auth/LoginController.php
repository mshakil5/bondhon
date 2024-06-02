<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
  
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
  
    use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
 
    public function login(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $chksts = User::where('email', $input['email'])->first();
        if ($chksts) {
            if ($chksts->status == 1) {
                

                if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                    {
                        
                // dd($chksts);
                        if (auth()->user()->is_type == '1') {
                            return redirect()->route('admin.dashboard');
                        }else if (auth()->user()->is_type == '2') {
                            return redirect()->route('charity.profile');
                        }else if (auth()->user()->is_type == '0') {
                            return redirect()->route('user.profile');
                        }else{
                            return redirect()->route('home');
                        }
                    }else{
                        return view('auth.login')
                            ->with('message','Email-Address And Password Are Wrong.');
                    }
                }else{
                    return view('auth.login')
                    ->with('message','Your Account is Deactive.');
                }
            }else {
                return view('auth.login')
                    ->with('message','Credential Error. You are not authenticate user.');
            }
          
    }

    public function loginToDonate(Request $request)
    {   
        $input = $request->all();
        // dd($input);
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            // return redirect()->intended();
            if (isset($request->conid)) {
                return redirect()->route('frontend.campaignDetails',$request->campaignid);
            } elseif (isset($request->charityid)) {
                return redirect()->route('frontend.charityDonate',$request->charityid);
            } elseif (isset($request->eventid)) {
                return redirect()->route('frontend.eventDetails',$request->eventid);
            } else {
                return redirect()->route('frontend.campaignDonate',$request->campaignid);
            }
            
        }else{

            if (isset($request->campaignid)) {
                return redirect()->route('frontend.campaignDetails',$request->campaignid)
                ->with('error','Email-Address And Password Are Wrong.')->with('error_code', 5);
            } elseif (isset($request->charityid)) {
                return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.')->with('error_code', 5);
            } elseif (isset($request->eventid)) {
                return redirect()->route('frontend.eventDetails',$request->eventid)
                ->with('error','Email-Address And Password Are Wrong.')->with('error_code', 5);
            } else {
                return redirect()->route('homepage');
            }

            
        }
          
    }
}