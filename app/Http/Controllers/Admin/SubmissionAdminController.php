<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionAdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $r)
    {
        $real = (string) config('app.admin_password');

        if ($real !== '' && hash_equals($real, (string) $r->password)) {
            $r->session()->regenerate();
            session(['is_admin' => true]);
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['password' => 'Galat password.']);
    }

    public function index(Request $r)
    {
        $items = Submission::query()
            ->when($r->status, fn ($q) => $q->where('status', $r->status))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.index', compact('items'));
    }

    public function updateStatus(Request $r, Submission $submission)
    {
        $r->validate([
            'status'     => 'required|in:pending,approved,rejected,posted',
            'admin_note' => 'nullable|string|max:500',
        ]);

        $submission->update($r->only('status', 'admin_note'));

        return back();
    }

    public function logout(Request $r)
    {
        $r->session()->forget('is_admin');
        return redirect()->route('admin.login');
    }
}