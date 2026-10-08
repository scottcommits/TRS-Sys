<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TRS | The Real Stories')</title>
    <link rel="icon" href="{{ asset('images/trs-fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,600;1,800&display=swap" rel="stylesheet">
    <style>
        :root { --ink:#1f2029; --blue:#2339f5; --bg:#f6f7fb; --white:#fff; }
        * { box-sizing:border-box; margin:0; padding:0; }
        body { font-family:'Poppins',sans-serif; color:var(--ink); background:var(--bg); line-height:1.6; }
        a { color:inherit; }
        .container { max-width:1000px; margin:0 auto; padding:0 20px; }
        header { background:var(--ink); color:#fff; padding:14px 0; border-bottom:4px solid var(--blue); }
        header .container { display:flex; align-items:center; gap:12px; }
        header img { height:44px; background:#fff; border-radius:50%; padding:4px; }
        header small { display:block; opacity:.8; font-size:12px; }
        h1,h2 { font-style:italic; font-weight:800; line-height:1.2; }
        h1 { font-size:clamp(30px,5vw,52px); }
        h2 { font-size:clamp(24px,3.5vw,34px); margin-bottom:16px; }
        .hl { background:var(--blue); color:#fff; padding:0 .3em; }
        .btn { display:inline-block; background:var(--blue); color:#fff; border:0; padding:14px 28px;
               font:600 16px 'Poppins',sans-serif; cursor:pointer; text-decoration:none; }
        .btn:hover { background:#1a2cd0; }
        .btn-dark { background:var(--ink); }
        section { padding:56px 0; }
        .hero { background:var(--ink); color:#fff; text-align:center; padding:80px 0; }
        .hero p { max-width:620px; margin:18px auto 30px; opacity:.9; }
        .steps { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px; }
        .card { background:#fff; padding:24px; border-left:5px solid var(--blue); box-shadow:0 2px 10px rgba(0,0,0,.05); }
        .card b { color:var(--blue); font-size:28px; }
        .sample img { width:100%; max-width:480px; display:block; margin:0 auto; box-shadow:0 8px 30px rgba(0,0,0,.2); }
        form .row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
        @media(max-width:640px){ form .row { grid-template-columns:1fr; } }
        label { font-weight:600; font-size:14px; display:block; margin:14px 0 6px; }
        input, textarea { width:100%; padding:12px; border:2px solid #d5d8e5; font:inherit; background:#fff; }
        input:focus, textarea:focus { outline:0; border-color:var(--blue); }
        textarea { min-height:140px; resize:vertical; }
        .err { color:#c62828; font-size:13px; margin-top:4px; }
        .hp { position:absolute; left:-9999px; }
        .box { background:#fff; padding:30px; box-shadow:0 2px 14px rgba(0,0,0,.07); }
        footer { background:var(--ink); color:#aaa; text-align:center; padding:26px 0; font-size:14px; }
        table { width:100%; border-collapse:collapse; background:#fff; }
        th, td { padding:10px; border-bottom:1px solid #e3e5ee; text-align:left; font-size:14px; vertical-align:top; }
        th { background:var(--ink); color:#fff; }
        .tag { padding:2px 8px; font-size:12px; font-weight:600; color:#fff; }
        .pending{background:#f59e0b}.approved{background:#16a34a}.rejected{background:#dc2626}.posted{background:var(--blue)}
    </style>
</head>
<body>
    <header>
        <div class="container">
            <img src="{{ asset('images/trs-logo.png') }}" alt="TRS">
            <div><strong>The Real Stories</strong><small>Recognizing Talent</small></div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">&copy; {{ date('Y') }} TRS - The Real Stories | Karachi</div>
    </footer>
</body>
</html>