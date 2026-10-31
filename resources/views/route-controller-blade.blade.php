<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Route → Controller → Blade</title>
    <style>
        body { margin:0; font-family:Arial,sans-serif; background:#f5f7f6; color:#17312b; }
        .wrap { width:min(1100px,92%); margin:0 auto; padding:32px 0; }
        h1 { margin:0 0 24px; }
        .grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
        .box { background:#fff; border:1px solid #dbe8e4; border-radius:14px; padding:16px; min-width:0; }
        .box h2 { font-size:1rem; margin:0 0 4px; }
        .box small { color:#0f766e; display:block; margin-bottom:10px; }
        pre { background:#12302b; color:#d9f2ec; padding:12px; border-radius:10px;
              overflow-x:auto; font-size:12.5px; line-height:1.55; margin:0; }
        @media (max-width:900px) { .grid { grid-template-columns:1fr; } }
    </style>
</head>
<body>
<main class="wrap">
    <h1>Route → Controller → Blade</h1>
    <div class="grid">

        <section class="box">
            <h2>1. Route</h2>
            <small>routes/web.php</small>
<pre>&lt;?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');</pre>
        </section>

        <section class="box">
            <h2>2. Controller</h2>
            <small>app/Http/Controllers/HomeController.php</small>
<pre>public function index()
{
    $siteName = 'KursusKu';
    $featured = [ /* data kursus */ ];

    return view('home',
        compact('siteName', 'featured'));
}</pre>
        </section>

        <section class="box">
            <h2>3. Blade</h2>
            <small>resources/views/home.blade.php</small>
@verbatim
<pre>&lt;h1&gt;{{ $siteName }}&lt;/h1&gt;

@foreach ($featured as $course)
  &lt;h3&gt;{{ $course['name'] }}&lt;/h3&gt;
@endforeach</pre>
@endverbatim
        </section>

    </div>
    <p><a href="{{ route('home') }}">Kembali ke Beranda</a></p>
</main>
</body>
</html>