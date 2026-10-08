<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $r)
    {
        // Honeypot: bots ye field bhar dete hain
        if ($r->filled('hp_confirm_x')) {
            return redirect()->route('thanks');
        }
        
        $data = $r->validate([
            'full_name'    => 'required|string|max:120',
            'profession'   => 'required|string|max:120',
            'organization' => 'nullable|string|max:120',
            'city'         => 'required|string|max:80',
            'email'        => 'required|email|unique:submissions,email',
            'phone'        => 'required|string|max:20|unique:submissions,phone',
            'story'        => 'required|string|min:50|max:1500',
            'proof_link'   => 'nullable|url|max:255',
            'photo'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'email.unique' => 'Is email se pehle hi registration ho chuki hai.',
            'phone.unique' => 'Is number se pehle hi registration ho chuki hai.',
            'story.min'    => 'Story kam az kam 50 characters ki honi chahiye.',
        ]);

        $file = $r->file('photo');
        $name = time() . '_' . uniqid() . '.' . $file->extension();
        $file->move(public_path('uploads'), $name);
        $data['photo'] = 'uploads/' . $name;

        Submission::create($data);

        return redirect()->route('thanks');
    }
}