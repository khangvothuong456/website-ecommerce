<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use DB;
use App\User;
use App\InfoUser;

class UserController extends Controller
{
    // thành viên đăng nhập
    function login(Request $req)
    {

        $user = User::where('email',$req->email)->first();
        if($user)
        {
            if($user->is_activated == 1)
            {
                if(Auth::attempt(['email' => $req->email,'password' => $req->password]))
                    return redirect()->route('home');
                else
                    return redirect()->back()->with('errorLogin', 'Sai mật khẩu.');
            }
            else
                return redirect()->back()->with('errorLogin', 'Tài khoản này chưa được kích hoạt.');
        }
        else
            return redirect()->back()->with('errorLogin', 'Tài khoản này không tồn tại');
    }

    // admin đăng nhập
    function getAdminLogin()
    {
        return view('admin.login');
    }
    function postAdminLogin(Request $req)
    {
        if(Auth::attempt(['email' => $req->email,'password' => $req->password]))
            return redirect()->route('dashboard');
        else
            return redirect()->back()->with('errorLogin', 'Sai mật khẩu.');
    }

    // đăng xuất
    function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }    

    // đăng ký thành viên
    function getRegister()
    {
        return view('pages.register');
    }
    function postRegister(Request $req)
    {
        $this->validate($req,[
            'email' => 'unique:users',
            'password' => 'required',
            'confirm_password' => 'same:password',
        ],[
            'email.unique' => 'Email này đã được đăng ký',
            'confirm_password.same' => 'Mật khẩu xác nhận không trùng khớp',
        ]);

        // khởi tạo user
        $user = new User;
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();

        // tạo mã kích hoạt tài khoản cho user
        $token = str_random(32);
        DB::table('user_activation')->insert([
            'id_user' => $user->id,
            'token' => $token,
        ]);

        Mail::send('pages.email_verification', ['user' => $user,'token'=>$token], function($message) use ($user){
            $message->to($user->email)->subject('Đăng ký tài khoản Vô Thượng');
        });

        return redirect()->to('dang-ky')->with('success','Đăng ký tài khoản thành công! Chúng tôi đã gửi mã xác nhận tới email của bạn.');
    }

    // xác nhận email sau khi đăng ký
    function userActivation($token)
    {
        $check = DB::table('user_activation')->where('token',$token)->first();
        if(!is_null($check))
        {
            $user = User::find($check->id_user);
            if($user->is_activated == 1)
                return redirect()->to('dang-ky')->with('success','Tài khoản đã được xác nhận email.');

            // khi tài khoản được kích hoạt thì tạo ra 1 bản ghi trong info_users;
            $info_user = new InfoUser;
            $info_user->id_user = $user->id;
            $info_user->save(); 

            $user->update(['is_activated' => true]); 
            DB::table('user_activation')->where('token',$token)->delete();
            return redirect()->to('dang-ky')->with('success','Xác nhận email thành công.');    
        }
        return redirect()->to('dang-ky')->with('warning','Mã xác nhận không hợp lệ');
    }
}
