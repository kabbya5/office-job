<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\Profile;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        $countries = Country::orderBy('name')->get();
        $ip = $request->ip();
        if ($ip === '127.0.0.1' || $ip === '::1') {
            $ip = '58.65.221.129'; 
        }
        $location = Location::get($ip);
        $select_country =  '';

        if($location){
            $country_code = $location->countryCode;
            $select_country = Country::where('code', $country_code)->first();
        }

        if($request->ref){
            session()->put('ref', $request->ref);
            return redirect()->route('register');
        }

        return view('auth.register',compact('ip','select_country', 'countries'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone_number' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    protected function create(array $data)
    {
        $ref_code = session('ref');
        $ip = $data['ip'];
        unset($data['ip']);
        if($ref_code){
            $reffer = User::where('reffer_code', $ref_code)->first();
            $data['reffer_id'] =  $reffer->id;
        }
        $data['reffer_code'] = trx_code('User',12,'reffer_code');
        $data['user_name'] = substr($data['phone_number'],1);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Wallet::create(['user_id' => $user->id]);
        Profile::create(['user_id' => $user->id, 'ip' => $ip]);
        return $user;
    }
}

