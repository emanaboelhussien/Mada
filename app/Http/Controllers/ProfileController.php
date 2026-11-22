<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('student-profile', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'university' => ['nullable', 'string', 'max:255'],
            'major' => ['nullable', 'string', 'max:255'],
            'level' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'portfolio' => ['nullable', 'url', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'phone' => ['nullable', 'string', 'max:50'],
        ]);

        // الـ checkbox يرسل قيمة فقط إذا كان مفعّلاً، وإلا لا يُرسل في الطلب
        $validated['is_visible'] = $request->has('is_visible');

        $user->update($validated);

        return redirect()
            ->route('student.profile')
            ->with('status', 'تم حفظ التغييرات بنجاح.');
    }
}