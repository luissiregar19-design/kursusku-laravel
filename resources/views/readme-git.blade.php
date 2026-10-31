<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>README + Git Evidence</title>
    <style>
        body { margin:0; font-family: Arial, sans-serif; background:#f5f7f6; color:#17312b; }
        .wrap { width:min(1100px, 92%); margin:0 auto; padding:32px 0; }
        h1 { margin:0 0 24px; }
        .grid { display:grid; grid-template-columns:1fr 1fr; gap:32px; align-items:start; }
        .box { background:#fff; border:1px solid #dbe8e4; border-radius:14px; padding:20px; }
        .box h2 { margin-top:0; font-size:1.1rem; }
        .box p { margin:0 0 10px; }
        code.inline { color:#0f766e; }
        pre { background:#12302b; color:#d9f2ec; padding:16px; border-radius:12px;
              overflow-x:auto; font-size:14px; line-height:1.6; margin:0; }
        @media (max-width:760px) { .grid { grid-template-columns:1fr; } }
    </style>
</head>
<body>
<main class="wrap">
    <h1>README + Git Evidence</h1>

    <div class="grid">
        <section class="box">
            <h2>README milestone 7</h2>
            <p><b>Requirement:</b> PHP 8.3+, Composer, Laravel, Laragon.</p>
            <p><b>Fitur:</b> named route <code class="inline">home</code>,
               <code class="inline">HomeController@index</code>, Blade landing page,
               data controller, CSS + image.</p>
            <p><b>Batas:</b> belum ada database, CRUD, authentication, atau relasi data.</p>
        </section>

        <section>
            <h2>git log --oneline -5</h2>
<pre>e22e399 docs: complete portfolio through meeting 7
8e08a13 feat: preserve milestones 2-6 and source checks
ee8611c feat: migrate KursusKu to Laravel MVC milestone 7</pre>
        </section>
    </div>

    <p><a href="{{ route('home') }}">Kembali ke Beranda</a></p>
</main>
</body>
</html>