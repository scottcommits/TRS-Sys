@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <h1>Your <span class="hl">story</span> deserves to be <span class="hl">told.</span></h1>
        <p>Register karein. Hamari team aapka kaam verify karegi, aur agar aap valid hue to aapki story TRS ke platforms par feature hogi.</p>
        <a href="#register" class="btn">Register Now</a>
    </div>
</div>

<section>
    <div class="container">
        <h2>Kaise kaam karta hai?</h2>
        <div class="steps">
            <div class="card"><b>01</b><h3>Register</h3><p>Form mein apni details, kaam aur photo upload karein.</p></div>
            <div class="card"><b>02</b><h3>Verification</h3><p>TRS team aapke proof aur kaam ko check karti hai.</p></div>
            <div class="card"><b>03</b><h3>Post</h3><p>Approve hone par aapki story Facebook, Instagram aur YouTube par aati hai.</p></div>
        </div>
    </div>
</section>

<section class="sample">
    <div class="container">
        <h2 style="text-align:center">Aisi hogi aapki <span class="hl">post</span></h2>
        <img src="{{ asset('images/sample-post.png') }}" alt="TRS sample post">
    </div>
</section>

<section id="register">
    <div class="container">
        <div class="box">
            <h2>Registration Form</h2>

            @if ($errors->any())
                <div class="err" style="margin-bottom:10px">Form mein kuch ghaltiyan hain, neeche dekhein.</div>
            @endif

            <form method="POST" action="{{ route('submit') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="hp_confirm_x" class="hp" tabindex="-1" autocomplete="off">

                <div class="row">
                    <div>
                        <label>Full Name *</label>
                        <input name="full_name" value="{{ old('full_name') }}" required>
                        @error('full_name')<div class="err">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label>Profession *</label>
                        <input name="profession" value="{{ old('profession') }}" placeholder="e.g. Software Engineer" required>
                        @error('profession')<div class="err">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row">
                    <div>
                        <label>Organization / Company</label>
                        <input name="organization" value="{{ old('organization') }}">
                        @error('organization')<div class="err">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label>City *</label>
                        <input name="city" value="{{ old('city') }}" required>
                        @error('city')<div class="err">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row">
                    <div>
                        <label>Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')<div class="err">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label>Phone / WhatsApp *</label>
                        <input name="phone" value="{{ old('phone') }}" placeholder="03XXXXXXXXX" required>
                        @error('phone')<div class="err">{{ $message }}</div>@enderror
                    </div>
                </div>

                <label>Aapki Story / Achievements * (kam az kam 50 characters)</label>
                <textarea name="story" required>{{ old('story') }}</textarea>
                @error('story')<div class="err">{{ $message }}</div>@enderror

                <label>Proof Link (LinkedIn, portfolio, news, etc.)</label>
                <input type="url" name="proof_link" value="{{ old('proof_link') }}" placeholder="https://">
                @error('proof_link')<div class="err">{{ $message }}</div>@enderror

                <label>Aapki Photo * (max 2MB, JPG/PNG/WEBP)</label>
                <input type="file" name="photo" accept="image/*" required>
                @error('photo')<div class="err">{{ $message }}</div>@enderror

                <br><br>
                <button class="btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection