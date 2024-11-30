<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client; // Import the Twilio Client class

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    public function login_with_otp(){
        return view('auth.login_with_otp');
    }
    public function create(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|max:15',
        ]);
    
        $mobile = $request->input('mobile');
        $mobile='+91'. $mobile;
         // Logic to generate OTP and send it to the user's mobile number
        $otp = rand(100000, 999999); // Example OTP generation logic
        
        try {
            $twilioSid = config('services.twilio.sid');
            $twilioAuthToken = config('services.twilio.token');
            $twilioPhoneNumber = config('services.twilio.from');
            
            $client = new Client($twilioSid, $twilioAuthToken);
            $client->setHttpClient(new \Twilio\Http\CurlClient([
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
            ]));
            $message = $client->messages->create(
                $mobile, // User's mobile number
                [
                    'from' => $twilioPhoneNumber,
                    'body' => "Your OTP is: $otp"
                ]
            );
            Log::info('Attempting to send OTP', [
                'mobile' => $mobile,
                'otp' => $otp,
                'twilio_phone' => $twilioPhoneNumber,
            ]);
    
            return response()->json(['message' => 'OTP generated and sent successfully', 'otp' => $otp]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send OTP', 'error' => $e->getMessage()], 500);
        }
    }
    


    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
    
        // Prepare user data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile,
            'password' => Hash::make($request->password)
        ];
    
        // Create a new user
        User::create($data);
    
        // Attempt to log in the user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Store user data in the session
            $user = Auth::user();
            $request->session()->put('user_data', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile_number' => $user->mobile_number
            ]);
    
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully registered & logged in!');
        }
    
        // If authentication fails, redirect back with error message
        return redirect()->back()->withErrors(['email' => 'Authentication failed.']);
    }
    

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt authentication
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();
    
            // Get the authenticated user
            $user = Auth::user();
    
            // Put the user data into the session
            $request->session()->put('user_data', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile_number' => $user->mobile_number, // Assuming mobile_number exists in the user table
            ]);
    
            // Redirect to dashboard with success message
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }
    
        // Authentication failed
        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }
    
    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }    

}