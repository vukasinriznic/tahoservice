<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TahoServis — Servis i kalibracija tahografa</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=2">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: #F0F4FF;
            color: #1a1a2e;
        }

        /* NAV */
        nav {
            background: linear-gradient(135deg, #1A73E8 0%, #0D47A1 100%);
            padding: 0 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            box-shadow: 0 4px 20px rgba(26,115,232,0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-brand {
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 2px;
            text-decoration: none;
        }

        .nav-brand span { color: #FFD700; }

        .nav-actions { display: flex; gap: 10px; align-items: center; }

        .btn-outline {
            padding: 8px 20px;
            border: 1.5px solid rgba(255,255,255,0.6);
            color: #fff;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            background: rgba(255,255,255,0.15);
            border-color: #fff;
        }

        .btn-white {
            padding: 8px 20px;
            background: #fff;
            color: #1A73E8;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-white:hover {
            background: #E8F0FE;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1A73E8 0%, #0D47A1 100%);
            padding: 90px 36px 100px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 300px; height: 300px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -40px;
            width: 250px; height: 250px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255,215,0,0.2);
            color: #FFD700;
            border: 1px solid rgba(255,215,0,0.4);
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 24px;
            letter-spacing: 0.5px;
        }

        .hero h1 {
            font-size: 54px;
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
            letter-spacing: -1.5px;
            margin-bottom: 20px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero h1 span { color: #FFD700; }

        .hero p {
            font-size: 18px;
            color: rgba(255,255,255,0.82);
            max-width: 540px;
            margin: 0 auto 40px;
            line-height: 1.7;
            font-weight: 400;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            padding: 14px 32px;
            background: #FFD700;
            color: #0D47A1;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 4px 20px rgba(255,215,0,0.4);
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255,215,0,0.5);
        }

        .btn-hero-secondary {
            padding: 14px 32px;
            background: rgba(255,255,255,0.15);
            color: #fff;
            border: 1.5px solid rgba(255,255,255,0.4);
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-hero-secondary:hover {
            background: rgba(255,255,255,0.25);
            border-color: rgba(255,255,255,0.7);
        }

        /* STATS BAR */
        .stats-bar {
            background: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 0 36px;
        }

        .stats-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            divide: true;
        }

        .stat-item {
            padding: 28px 24px;
            text-align: center;
            border-right: 1px solid #f0f0f0;
        }

        .stat-item:last-child { border-right: none; }

        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: #1A73E8;
            line-height: 1;
        }

        .stat-label {
            font-size: 13px;
            color: #888;
            font-weight: 500;
            margin-top: 6px;
        }

        /* SERVICES */
        .section {
            padding: 80px 36px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 52px;
        }

        .section-tag {
            display: inline-block;
            background: #E8F0FE;
            color: #1A73E8;
            border-radius: 20px;
            padding: 5px 14px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 14px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 800;
            color: #1a1a2e;
            letter-spacing: -0.8px;
            margin-bottom: 14px;
        }

        .section-sub {
            font-size: 16px;
            color: #666;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        .service-card {
            background: #fff;
            border-radius: 16px;
            padding: 32px 28px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1A73E8, #4FC3F7);
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.12);
        }

        .service-icon {
            width: 52px;
            height: 52px;
            background: #E8F0FE;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #1A73E8;
        }

        .service-card h3 {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 10px;
        }

        .service-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        /* HOW IT WORKS */
        .how-section {
            background: #fff;
            padding: 80px 36px;
        }

        .how-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 32px;
            margin-top: 52px;
            position: relative;
        }

        .step {
            text-align: center;
        }

        .step-number {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #1A73E8, #0D47A1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            margin: 0 auto 18px;
            box-shadow: 0 4px 16px rgba(26,115,232,0.35);
        }

        .step h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .step p {
            font-size: 14px;
            color: #888;
            line-height: 1.6;
        }

        /* CTA */
        .cta-section {
            padding: 80px 36px;
            text-align: center;
            background: linear-gradient(135deg, #1A73E8 0%, #0D47A1 100%);
        }

        .cta-section h2 {
            font-size: 38px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 16px;
            letter-spacing: -0.8px;
        }

        .cta-section p {
            font-size: 16px;
            color: rgba(255,255,255,0.8);
            margin-bottom: 36px;
        }

        .cta-buttons {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* FOOTER */
        footer {
            background: #0D47A1;
            color: rgba(255,255,255,0.7);
            padding: 40px 36px 24px;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 32px;
        }

        .footer-brand {
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .footer-brand span { color: #FFD700; }

        .footer-desc {
            font-size: 14px;
            line-height: 1.7;
            max-width: 260px;
        }

        .footer-col h4 {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #FFD700;
            margin-bottom: 16px;
        }

        .footer-col a, .footer-col div {
            display: block;
            font-size: 14px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            margin-bottom: 10px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .footer-col a:hover { color: #fff; }

        .footer-bottom {
            max-width: 1100px;
            margin: 0 auto;
            border-top: 1px solid rgba(255,255,255,0.15);
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 36px; }
            .hero { padding: 60px 24px 70px; }
            .stats-inner { grid-template-columns: 1fr; }
            .stat-item { border-right: none; border-bottom: 1px solid #f0f0f0; }
            .stat-item:last-child { border-bottom: none; }
            .footer-inner { grid-template-columns: 1fr; gap: 24px; }
            .section { padding: 60px 24px; }
            nav { padding: 0 20px; }
            .nav-actions .btn-outline { display: none; }
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="nav-brand">TAHO<span>SERVIS</span></a>
    <div class="nav-actions">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn-white">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn-outline">Prijava</a>
            <a href="{{ route('register') }}" class="btn-white">Registracija</a>
        @endauth
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-badge">✦ Profesionalni servis tahografa</div>
    <h1>Kalibracija i servis<br><span>tahografa</span> na jednom mestu</h1>
    <p>Brzo zakazivanje, praćenje statusa servisa u realnom vremenu i automatsko generisanje sertifikata o plombiranju.</p>
    <div class="hero-buttons">
        <a href="{{ route('register') }}" class="btn-hero-primary">Zakaži servis →</a>
        <a href="{{ route('login') }}" class="btn-hero-secondary">Prijavi se</a>
    </div>
</section>

<!-- STATS -->
<div class="stats-bar">
    <div class="stats-inner">
        <div class="stat-item">
            <div class="stat-number">500+</div>
            <div class="stat-label">Servisiranih tahografa</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">98%</div>
            <div class="stat-label">Zadovoljnih klijenata</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">24h</div>
            <div class="stat-label">Prosečno vreme servisa</div>
        </div>
    </div>
</div>

<!-- SERVICES -->
<div style="background: #F0F4FF;">
    <div class="section">
        <div class="section-header">
            <div class="section-tag">Naše usluge</div>
            <h2 class="section-title">Sve što vam treba<br>na jednom mestu</h2>
            <p class="section-sub">Od kalibracije do popravke — pratite svaki korak servisa vašeg tahografa.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                </div>
                <h3>Kalibracija tahografa</h3>
                <p>Precizna kalibracija digitalnih i analognih tahografa u skladu sa zakonskim propisima.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <h3>Popravka i dijagnostika</h3>
                <p>Stručna dijagnostika kvarova i popravka svih vrsta tahografa uz originalnu opremu.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Plombiranje</h3>
                <p>Zvanično plombiranje tahografa sa automatskim generisanjem sertifikata u PDF formatu.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <h3>Online zakazivanje</h3>
                <p>Zakažite servis u par klikova i pratite status u realnom vremenu kroz klijentski portal.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                </div>
                <h3>Sertifikati i izveštaji</h3>
                <p>Automatsko generisanje PDF sertifikata i kompletna istorija servisa dostupna u svakom trenutku.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <h3>Digitalni i analogni</h3>
                <p>Servisiramo sve vrste tahografa — digitalne, smart kartice i starije analogne sisteme.</p>
            </div>
        </div>
    </div>
</div>

<!-- HOW IT WORKS -->
<div class="how-section">
    <div class="how-inner">
        <div class="section-header">
            <div class="section-tag">Kako funkcioniše</div>
            <h2 class="section-title">Servis u 4 jednostavna koraka</h2>
            <p class="section-sub">Od zakazivanja do preuzimanja sertifikata — sve na jednom mestu.</p>
        </div>
        <div class="steps-grid">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Registracija</h3>
                <p>Kreirajte besplatan nalog i dodajte svoja vozila.</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Zakazivanje</h3>
                <p>Zakažite servisni pregled u željenom terminu.</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Servis</h3>
                <p>Naš tim obavlja dijagnostiku i popravku. Pratite status u realnom vremenu.</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3>Sertifikat</h3>
                <p>Po završetku preuzmite PDF sertifikat o plombiranju.</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<section class="cta-section">
    <h2>Spremni da zakažete servis?</h2>
    <p>Registrujte se besplatno i zakažite pregled za vaš tahograf.</p>
    <div class="cta-buttons">
        <a href="{{ route('register') }}" class="btn-hero-primary">Kreiraj nalog →</a>
        <a href="{{ route('login') }}" class="btn-hero-secondary">Već imam nalog</a>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <div>
            <div class="footer-brand">TAHO<span>SERVIS</span></div>
            <div class="footer-desc">Profesionalni servis za kalibraciju, popravku i plombiranje tahografa. Brzo, pouzdano i stručno.</div>
        </div>
        <div class="footer-col">
            <h4>Usluge</h4>
            <div>Kalibracija tahografa</div>
            <div>Popravka i dijagnostika</div>
            <div>Plombiranje</div>
            <div>Sertifikati</div>
        </div>
        <div class="footer-col">
            <h4>Kontakt</h4>
            <div>📍 Bulevar Oslobođenja 12, Beograd</div>
            <div>📞 +381 11 123 4567</div>
            <div>✉️ info@tahoservis.rs</div>
            <div>🕐 Pon–Pet: 08:00–16:00</div>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© {{ date('Y') }} TahoServis. Sva prava zadržana.</span>
        <span>Verzija 1.0.0</span>
    </div>
</footer>

</body>
</html>
