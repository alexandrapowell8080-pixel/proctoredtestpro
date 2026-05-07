<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Mail\AdminOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:admins,email']);

        $admin = Admin::where('email', $request->email)->first();
        $admin->otp = rand(100000, 999999);
        $admin->otp_expires_at = now()->addMinutes(15);
        $admin->save();

        Mail::to($admin->email)->send(new AdminOtpMail($admin->otp));

        session(['auth_email' => $admin->email]);

        return redirect()->route('admin.otp.form')->with('success', 'OTP sent to your email.');
    }

    public function showOtpForm()
    {
        if (!session('auth_email')) {
            return redirect()->route('admin.login');
        }
        return view('admin.auth.otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);
        $email = session('auth_email');

        $admin = Admin::where('email', $email)
            ->where('otp', $request->otp)
            ->where('otp_expires_at', '>', now())
            ->first();

        if ($admin) {
            $admin->update(['otp' => null, 'otp_expires_at' => null]);
            Auth::guard('admin')->login($admin, true);
            $request->session()->regenerate();
            session()->forget('auth_email');
            
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}