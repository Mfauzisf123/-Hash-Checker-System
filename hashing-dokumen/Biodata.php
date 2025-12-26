<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata - Muhammad Fauzi SF</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating particles */
        body::before {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            pointer-events: none;
            z-index: 1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }

        /* Main Container */
        .biodata-container {
            max-width: 900px;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(30px);
            border-radius: 30px;
            box-shadow: 
                0 30px 90px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.3) inset;
            position: relative;
            z-index: 2;
            animation: containerEntrance 1s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
        }

        @keyframes containerEntrance {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Header dengan gradient */
        .biodata-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 40px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .biodata-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: headerShine 8s linear infinite;
        }

        @keyframes headerShine {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Profile Photo dengan efek 3D */
        .profile-photo-wrapper {
            width: 200px;
            height: 200px;
            margin: 0 auto 30px;
            position: relative;
            z-index: 3;
            animation: photoEntrance 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s backwards;
        }

        @keyframes photoEntrance {
            from {
                opacity: 0;
                transform: scale(0) rotate(-180deg);
            }
            to {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        .profile-photo-wrapper::before {
            content: '';
            position: absolute;
            inset: -8px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #ffeaa7, #dfe6e9);
            background-size: 300% 300%;
            border-radius: 50%;
            animation: borderRotate 4s linear infinite;
            z-index: -1;
        }

        @keyframes borderRotate {
            0% { background-position: 0% 50%; transform: rotate(0deg); }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; transform: rotate(360deg); }
        }

        .profile-photo {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid white;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.4),
                0 0 40px rgba(255, 255, 255, 0.2) inset;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: pointer;
        }

        .profile-photo:hover {
            transform: scale(1.08) rotate(5deg);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.5);
        }

        /* Placeholder jika foto belum ada */
        .profile-photo-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 6px solid white;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            color: white;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        }

        .name-title {
            font-size: 42px;
            font-weight: 900;
            color: white;
            margin-bottom: 10px;
            text-shadow: 
                0 4px 10px rgba(0, 0, 0, 0.3),
                0 0 30px rgba(255, 255, 255, 0.3);
            letter-spacing: -1px;
            animation: textGlow 3s ease-in-out infinite;
        }

        @keyframes textGlow {
            0%, 100% { text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3), 0 0 30px rgba(255, 255, 255, 0.3); }
            50% { text-shadow: 0 4px 15px rgba(0, 0, 0, 0.4), 0 0 50px rgba(255, 255, 255, 0.5); }
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.95);
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Body Content dengan card style */
        .biodata-body {
            padding: 50px 40px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .info-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px;
            border-radius: 20px;
            border: 2px solid rgba(102, 126, 234, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            animation: cardFadeIn 0.8s ease backwards;
            position: relative;
            overflow: hidden;
        }

        .info-card:nth-child(1) { animation-delay: 0.4s; }
        .info-card:nth-child(2) { animation-delay: 0.5s; }
        .info-card:nth-child(3) { animation-delay: 0.6s; }

        @keyframes cardFadeIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 50px rgba(102, 126, 234, 0.3);
            border-color: #667eea;
        }

        .info-card:hover::before {
            opacity: 1;
        }

        .info-icon {
            font-size: 50px;
            margin-bottom: 15px;
            display: block;
            animation: iconBounce 2s ease-in-out infinite;
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .info-label {
            font-size: 14px;
            color: #667eea;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .info-value {
            font-size: 22px;
            color: #2c3e50;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: buttonsFadeIn 1s ease 0.7s backwards;
        }

        @keyframes buttonsFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn {
            padding: 18px 40px;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(245, 87, 108, 0.4);
        }

        /* Footer */
        .biodata-footer {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #666;
            font-size: 14px;
            border-top: 2px solid rgba(102, 126, 234, 0.1);
        }

        .biodata-footer strong {
            color: #667eea;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .biodata-header {
                padding: 40px 20px 30px;
            }

            .profile-photo-wrapper {
                width: 150px;
                height: 150px;
            }

            .name-title {
                font-size: 32px;
            }

            .subtitle {
                font-size: 14px;
            }

            .biodata-body {
                padding: 30px 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Decorative elements */
        .deco-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: floatCircle 6s ease-in-out infinite;
        }

        .deco-circle-1 {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .deco-circle-2 {
            width: 150px;
            height: 150px;
            bottom: 10%;
            right: 5%;
            animation-delay: 2s;
        }

        .deco-circle-3 {
            width: 80px;
            height: 80px;
            top: 50%;
            right: 10%;
            animation-delay: 4s;
        }

        @keyframes floatCircle {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
            50% { transform: translateY(-30px) scale(1.1); opacity: 0.6; }
        }
    </style>
</head>
<body>

    <div class="biodata-container">
        <!-- Decorative circles -->
        <div class="deco-circle deco-circle-1"></div>
        <div class="deco-circle deco-circle-2"></div>
        <div class="deco-circle deco-circle-3"></div>

        <!-- Header Section -->
        <div class="biodata-header">
            <div class="profile-photo-wrapper">
                <!-- GANTI 'foto-profil.jpg' dengan path foto Anda -->
                <!-- Jika belum ada foto, akan muncul placeholder -->
                <img src="foto-profil.jpg" alt="Muhammad Fauzi SF" class="profile-photo" 
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="profile-photo-placeholder" style="display: none;">
                    👤
                </div>
            </div>
            <h1 class="name-title">Muhammad Fauzi SF</h1>
            <p class="subtitle">Mahasiswa Teknik Infotmatika</p>
        </div>

        <!-- Body Section -->
        <div class="biodata-body">
            <div class="info-grid">
                <!-- Card 1: Nama -->
                <div class="info-card">
                    <span class="info-icon">👤</span>
                    <div class="info-label">Nama Lengkap</div>
                    <div class="info-value">Muhammad Fauzi SF</div>
                </div>

                <!-- Card 2: Kelas -->
                <div class="info-card">
                    <span class="info-icon">🎓</span>
                    <div class="info-label">Kelas</div>
                    <div class="info-value">TI23H</div>
                </div>

                <!-- Card 3: NIM -->
                <div class="info-card">
                    <span class="info-icon">🆔</span>
                    <div class="info-label">NIM</div>
                    <div class="info-value">20230040319</div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="upload.php" class="btn btn-primary">
                    📝 Upload Dokumen
                </a>
                <a href="verify.php" class="btn btn-secondary">
                    🔍 Verifikasi Dokumen
                </a>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="biodata-footer">
            <p><strong>Sistem Anti Pemalsuan Dokumen</strong></p>
            <p>Praktikum Blockchain • Sistem Informasi Terdesentralisasi</p>
            <p style="margin-top: 10px; font-size: 12px; opacity: 0.7;">
                © 2025 Muhammad Fauzi SF
            </p>
        </div>
    </div>

</body>
</html>
