<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // دالة تفحص الإيميل وكلمة المرور
    public function login(Request $request)
    {
        // 1. التأكد أن المستخدم كتب إيميل وكلمة مرور
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'يرجى إدخال البريد الإلكتروني.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صحيح.',
            'password.required' => 'يرجى إدخال كلمة المرور.',
        ]);

        // 2. محاولة تسجيل الدخول والتحقق من قاعدة البيانات
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // توجيه المستخدم حسب دوره (طالب، جهة، أو أدمن)
            $user = Auth::user();
            $role = $user->role ?? 'student';

            if ($role === 'admin') {
                return redirect('/admin/dashboard');
            }

            if ($role === 'entity') {
                if (!(bool) ($user->is_approved ?? false)) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return redirect()->route('login')->withErrors([
                        'email' => 'حساب الجهة قيد المراجعة ولم يتم اعتماده بعد من قِبل الإدارة.',
                    ])->onlyInput('email');
                }

                return redirect()->route('entity.dashboard');
            }

            return redirect()->route('student.dashboard');
        }

        // 3. لو البيانات غلط، نرجعه للصفحة مع رسالة خطأ
        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'university' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'university' => $validated['university'],
            'major' => $validated['major'],
            'level' => $validated['level'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('student.dashboard');
    }
}