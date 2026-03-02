<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pantoo | Operational Control in One Ecosystem</title>
    <meta name="description" content="Pantoo menggabungkan HRIS dan sistem distribusi dalam satu platform SaaS untuk perusahaan multi-cabang.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f6f8fb;
            --ink: #0e1a2b;
            --subtle: #4f6075;
            --line: #d9e1ea;
            --brand: #0466d6;
            --brand-strong: #024ea5;
            --card: #ffffff;
            --highlight: #e9f3ff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Plus Jakarta Sans", sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 10% 10%, #dcebff 0%, transparent 40%),
                radial-gradient(circle at 90% 85%, #e4f8f7 0%, transparent 36%),
                var(--bg);
            min-height: 100vh;
        }

        .wrap {
            width: min(100%, 1080px);
            margin: 0 auto;
            padding: 28px 20px 56px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 48px;
        }

        .brand {
            font-family: "Space Grotesk", sans-serif;
            font-size: 1.35rem;
            letter-spacing: 0.02em;
        }

        .status {
            padding: 8px 12px;
            border: 1px solid var(--line);
            border-radius: 999px;
            font-size: 0.8rem;
            color: var(--subtle);
            background: #ffffffbf;
        }

        .hero {
            display: grid;
            gap: 18px;
            margin-bottom: 36px;
        }

        .badge {
            display: inline-flex;
            width: fit-content;
            background: var(--highlight);
            color: var(--brand-strong);
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        h1 {
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(2rem, 4.6vw, 3.8rem);
            line-height: 1.06;
            max-width: 850px;
        }

        .lead {
            color: var(--subtle);
            max-width: 760px;
            font-size: clamp(1rem, 1.7vw, 1.15rem);
            line-height: 1.7;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 44px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 18px;
        }

        .card h2 {
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .card p {
            color: var(--subtle);
            line-height: 1.6;
            font-size: 0.94rem;
        }

        .footer {
            border-top: 1px solid var(--line);
            padding-top: 16px;
            color: var(--subtle);
            font-size: 0.88rem;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        @media (max-width: 860px) {
            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main class="wrap">
        <header class="topbar">
            <div class="brand">Pantoo</div>
            <div class="status">Initial Static Landing</div>
        </header>

        <section class="hero">
            <span class="badge">Operational Control in One Ecosystem</span>
            <h1>HRIS + Distribusi dalam satu platform SaaS untuk perusahaan multi-cabang.</h1>
            <p class="lead">
                Pantoo membantu perusahaan distribusi dan logistik menyatukan data SDM, presensi, operasional cabang,
                dan kontrol lapangan dalam satu dashboard yang siap diskalakan.
            </p>
        </section>

        <section class="cards">
            <article class="card">
                <h2>Connected Data</h2>
                <p>Data HR, attendance, operasional, dan cabang saling terhubung tanpa integrasi manual.</p>
            </article>
            <article class="card">
                <h2>Multi-Branch Ready</h2>
                <p>Dirancang untuk organisasi dengan banyak cabang dan ekspansi bertahap lintas wilayah.</p>
            </article>
            <article class="card">
                <h2>Compliance Focus</h2>
                <p>Mendukung presensi anti-manipulasi dengan baseline proses yang dapat dikembangkan berikutnya.</p>
            </article>
        </section>

        <footer class="footer">
            <span>© {{ date('Y') }} Pantoo</span>
            <span>Laravel {{ app()->version() }} · Static first</span>
        </footer>
    </main>
</body>
</html>
