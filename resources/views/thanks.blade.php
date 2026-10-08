@extends('layouts.app')

@section('content')
<section>
    <div class="container" style="text-align:center">
        <h1>Shukriya! <span class="hl">Received</span></h1>
        <p style="margin:20px 0 30px">Aapki registration mil gayi hai. Verification ke baad hamari team aap se contact karegi.</p>
        <a class="btn" href="{{ route('home') }}">Home</a>
    </div>
</section>
@endsection