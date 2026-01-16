<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function sendCode(Request $request)
    {
        // validate request
        $validate = $request->validate(['id' => 'required']);
        // check email or mobile
        $id = checkEmailOrMobile($request->id); 
        if(!$id)
            return $this->error(401,'مقدار ورودی معتبر نیست',[]);
        // check login or not
        $user = User::where($id,$request->id)->first();
        if(!$user)
            $user = User::create([$id => $request->id , 'password' => Hash::make('009900')]);
        // generate code
        $this->generateOtpCode($user);
        // send code
        return $this->success(201,'کد با موفقیت ارسال شد',[]);
    }
    public function verifyCode(Request $request)
    {
        $validate = $request->validate(['id'=> 'required','code' => 'required|numeric']);
        $id = checkEmailOrMobile($request->id); 
        if(!$id)
            return $this->error(401,'مقدار ورودی معتبر نیست',[]);
        $user = User::where($id,$request->id)->first();
        if(!$user)
            return $this->error(401,'کاربر وجود ندارد',[]);

        if($user->otp->code !== $request->code)
            return $this->error(401,'کد اشتباه است',[]);
        if(!Carbon::now()->lessThan($user->otp->expire_at))
            return $this->error(401,'کد منقضی شده',[]);
        return $this->login($user);
            
    }
    public function loginWithPassword(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required' , 'password' => 'required'
        ]);
        $id = checkEmailOrMobile($request->id); 
        $user = User::where($id,$request->id)->first();
        if(!$user)
            return $this->error(401,'کاربر وجود ندارد',[]);

        if(!Hash::check($user->password,$request->password))
            return $this->error(401, 'پسورد اشتباه است' , []);
        
        $this->login($user);

    }
    public function resendCode(Request $request)
    {
        $validate = $request->validate(['id' => 'required']);
        $id = checkEmailOrMobile($request->id); 
        if(!$id)
            return $this->error(401,'مقدار ورودی معتبر نیست',[]);

        $user = User::where($id,$request->id)->first();
        if(!$user)
            return $this->error(401,'کاربر وجورد ندارد' , []);
        // generate code
        $this->generateOtpCode($user);
        return $this->success(201,'کد با موفقیت ارسال شد',[]);
    }
    public function logout(Request $request)
    {
        $validate = $request->validate(['id' => 'required']);
        $id = checkEmailOrMobile($request->id); 
        if(!$id)
            return $this->error(401,'مقدار ورودی معتبر نیست',[]);
        $user = User::where($id,$request->id)->first();
        if($user)
            return $this->error(401,'کاربر وجود ندارد',[]);
        $user->tokens()->delete();
        return $this->success(201,'کاربر با موفقیت خارج شد',[]);
    }

    private function generateOtpCode(User $user)
    {
        if($user->hasValidOtp())
        return $this->error(401,'کد هنوز معتبر است',[]);
        $code = generateCode();
        
        $user->otp()->create([
            'code' => $code,
            'expire_at' => Carbon::now()->addMinutes(2),
        ]);
    }
    private function login(User $user)
    {
        $token = $user->createToken(env('LOGIN_TOKEN'))->plainTextToken;
        $user->push('token' , $token);
        return $this->success(201,'ورود با موفقیت انجام شد',new UserResource($user));
    }
}
