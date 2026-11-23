<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EntityRegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'entity_name' => ['required', 'string', 'max:255'],
            'entity_type' => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone'       => ['required', 'string', 'max:50'],
            'website'     => ['required', 'url', 'max:255'],
            'bio'         => ['required', 'string', 'max:1000'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name'        => $validated['entity_name'],
            'entity_name' => $validated['entity_name'],
            'entity_type' => $validated['entity_type'],
            'email'       => $validated['email'],
            'phone'       => $validated['phone'],
            'website'     => $validated['website'],
            'bio'         => $validated['bio'],
            'password'    => Hash::make($validated['password']),
            'role'        => 'entity',
            'is_approved' => false,
        ]);

        return redirect()
            ->route('login')
            ->with('status', 'تم إرسال طلب تسجيل الجهة بنجاح، وسيتم تفعيل الحساب بعد مراجعة الإدارة.');
    }
}