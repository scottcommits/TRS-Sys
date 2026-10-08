@extends('layouts.app')

@section('content')
<section>
    <div class="container" style="max-width:420px">
        <div class="box">
            <h2>Admin Login</h2>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <label>Password</label>
                <input type="password" name="password" required autofocus>
                @error('password')<div class="err">{{ $message }}</div>@enderror
                <br><br>
                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>
</section>
@endsection