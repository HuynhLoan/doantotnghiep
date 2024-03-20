<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Models\UserModel;
use App\Models\PasswordResetModel;
use Illuminate\Support\Facades\Hash;


class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forget-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with(['status' => __($status)])
        //     : back()->withErrors(['email' => __($status)]);
        if ($status === Password::RESET_LINK_SENT) {
            return back()->withInput()->with('message', 'Đã gửi yêu cầu đặt lại mật khẩu tới mail của bạn');
        } else {
            return back()->withInput()->with(['msgError' => 'Chưa có tài khoản nào với email này']);
        }    
    }

    public function showResetForm(Request $request)
    {
        $email = $request->query('email');
        $token = $request->route('token');

        return view('auth.forget-password-link', [
            'email' => $email,
            'token' => $token,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $passwordReset = PasswordResetModel::where('email', $request->email)
            ->first();
    
        if (!$passwordReset) {
            logger()->info('Update not found for email: ' . $request->email . ', token: ' . $request->token);
            return back()->withInput()->with('error', 'Invalid token!');
        }
    
        $user = UserModel::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
    
        logger()->info('Update result: password updated for email: ' . $request->email);
    
        $passwordReset->delete();
    
        return back()->withInput()->with('message', 'Cập nhật mật khẩu mới thành công');
        // return redirect('/customer')->with('message', 'Your password has been successfully changed!');
    }

}