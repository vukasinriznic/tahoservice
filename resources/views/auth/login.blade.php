<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahoservis - Prijava</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
        }

        /* LEFT PANEL */
        .left {
            width: 50%;
            background: linear-gradient(145deg, #1A73E8 0%, #0D47A1 60%, #082d6e 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px 56px;
            position: relative;
            overflow: hidden;
        }

        .left::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 400px; height: 400px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .left::after {
            content: '';
            position: absolute;
            bottom: -120px; left: -60px;
            width: 350px; height: 350px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }

        .left-content { position: relative; z-index: 1; }

        .brand {
            font-size: 26px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 2px;
            margin-bottom: 48px;
            text-decoration: none;
            display: inline-block;
        }

        .brand span { color: #FFD700; }

        .left h2 {
            font-size: 36px;
            font-weight: 800;
            color: #fff;
            line-height: 1.15;
            letter-spacing: -0.8px;
            margin-bottom: 16px;
        }

        .left h2 span { color: #FFD700; }

        .left p {
            font-size: 16px;
            color: rgba(255,255,255,0.75);
            line-height: 1.7;
            margin-bottom: 48px;
            max-width: 360px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #FFD700;
        }

        .feature span {
            font-size: 14px;
            font-weight: 500;
            color: rgba(255,255,255,0.85);
        }

        /* RIGHT PANEL */
        .right {
            width: 50%;
            background: #F0F4FF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            padding: 44px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.1);
        }

        .card-title {
            font-size: 24px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 4px;
            letter-spacing: -0.5px;
        }

        .card-sub {
            font-size: 14px;
            color: #888;
            font-weight: 500;
            margin-bottom: 32px;
        }

        .form-group { margin-bottom: 18px; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            background: #FAFAFA;
            color: #333;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        input:focus {
            border-color: #1A73E8;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(26,115,232,0.1);
        }

        .btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #1A73E8 0%, #0D47A1 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            margin-top: 8px;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(26,115,232,0.35);
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(26,115,232,0.45);
        }

        .error {
            background: #FEF2F2;
            border: 1px solid #fecaca;
            color: #dc2626;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .footer-link {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: #666;
            font-weight: 500;
        }

        .footer-link a {
            color: #1A73E8;
            text-decoration: none;
            font-weight: 700;
        }

        .footer-link a:hover { text-decoration: underline; }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            font-size: 12px;
            color: #aaa;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            body { flex-direction: column; }
            .left { display: none; }
            .right { width: 100%; min-height: 100vh; }
        }
    </style>
</head>
<body>

    <!-- LEFT -->
    <div class="left">
        <div class="left-content">
            <a href="/" class="brand">TAHO<span>SERVIS</span></a>

            <h2>Dobrodošli<br>nazad <span>👋</span></h2>
            <p>Prijavite se i pratite status servisa vašeg tahografa u realnom vremenu.</p>

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <span>Praćenje statusa servisa u realnom vremenu</span>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </div>
                    <span>PDF sertifikat o plombiranju</span>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    </div>
                    <span>Online zakazivanje termina</span>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="card">
            <div class="card-title">Prijavite se</div>
            <div class="card-sub">Unesite vaše podatke za pristup nalogu</div>

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email adresa</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="vas@email.com"
                        required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Lozinka</label>
                    <input type="password" id="password" name="password"
                        placeholder="••••••••"
                        required>
                </div>

                <button type="submit" class="btn">Prijavi se →</button>
            </form>

            <div class="footer-link">
                Nemate nalog? <a href="{{ route('register') }}">Registrujte se</a>
            </div>
        </div>
    </div>

</body>
</html>
