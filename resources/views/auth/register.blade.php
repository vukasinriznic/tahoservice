<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahoservis - Registracija</title>
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
            width: 44%;
            background: linear-gradient(145deg, #1A73E8 0%, #0D47A1 60%, #082d6e 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 52px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .left-pattern {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0.18;
        }

        .left-content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .brand {
            font-size: 32px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 3px;
            margin-bottom: 16px;
            text-decoration: none;
            display: inline-block;
        }

        .brand span { color: #FFD700; }

        .left-tagline {
            font-size: 15px;
            color: rgba(255,255,255,0.7);
            font-weight: 500;
            letter-spacing: 0.5px;
            max-width: 240px;
            line-height: 1.6;
        }

        .left-divider {
            width: 40px;
            height: 3px;
            background: #FFD700;
            border-radius: 2px;
            margin: 20px auto;
        }

        /* RIGHT PANEL */
        .right {
            width: 56%;
            background: #F0F4FF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            padding: 40px 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.1);
        }

        .card-title {
            font-size: 22px;
            font-weight: 800;
            color: #1A73E8;
            margin-bottom: 4px;
            letter-spacing: -0.5px;
        }

        .card-sub {
            font-size: 14px;
            color: #888;
            font-weight: 500;
            margin-bottom: 28px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-group { margin-bottom: 16px; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 11px 14px;
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

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #E8F0FE;
            color: #1A73E8;
            border: 1.5px solid #c5d8fb;
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 4px;
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
            margin-top: 20px;
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

        @media (max-width: 768px) {
            body { flex-direction: column; }
            .left { display: none; }
            .right { width: 100%; min-height: 100vh; }
            .row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- LEFT -->
    <div class="left">
        <svg class="left-pattern" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <defs>
                <pattern id="hex" x="0" y="0" width="56" height="100" patternUnits="userSpaceOnUse">
                    <polygon points="28,2 54,17 54,47 28,62 2,47 2,17" fill="none" stroke="white" stroke-width="1"/>
                    <polygon points="28,52 54,67 54,97 28,112 2,97 2,67" fill="none" stroke="white" stroke-width="1"/>
                    <polygon points="0,27 -26,42 -26,72 0,87 26,72 26,42" fill="none" stroke="white" stroke-width="1"/>
                    <polygon points="56,27 30,42 30,72 56,87 82,72 82,42" fill="none" stroke="white" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hex)"/>
        </svg>
        <div class="left-content">
            <a href="/" class="brand">TAHO<span>SERVIS</span></a>
            <div class="left-divider"></div>
            <div class="left-tagline">Profesionalni servis i kalibracija tahografa</div>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <div class="card">
            <div class="card-title">Kreirajte nalog</div>
            <div class="card-sub">Registracija novog klijenta — besplatno</div>

            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row">
                    <div class="form-group">
                        <label for="name">Ime</label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name') }}"
                            placeholder="Vaše ime"
                            required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="surname">Prezime</label>
                        <input type="text" id="surname" name="surname"
                            value="{{ old('surname') }}"
                            placeholder="Vaše prezime"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email adresa</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="vas@email.com"
                        required>
                </div>

                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" id="phone" name="phone"
                        value="{{ old('phone') }}"
                        placeholder="+381 60 000 0000">
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="password">Lozinka</label>
                        <input type="password" id="password" name="password"
                            placeholder="Min. 8 karaktera"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Potvrda</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Ponovite lozinku"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Uloga</label>
                    <div class="role-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Klijent
                    </div>
                </div>

                <button type="submit" class="btn">Registruj se →</button>
            </form>

            <div class="footer-link">
                Već imate nalog? <a href="{{ route('login') }}">Prijavite se</a>
            </div>
        </div>
    </div>

</body>
</html>
