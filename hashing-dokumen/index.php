<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash Checker System - Muhammad Fauzi SF</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            padding: 20px;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 50px;
            animation: fadeInDown 0.8s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-size: 48px;
            font-weight: 800;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .header p {
            font-size: 18px;
            opacity: 0.95;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .menu-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: block;
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .menu-card:hover::before {
            left: 100%;
        }

        .menu-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.4);
        }

        .menu-card.biodata {
            animation: slideInLeft 0.6s ease;
        }

        .menu-card.upload {
            animation: slideInUp 0.6s ease 0.2s backwards;
        }

        .menu-card.verify {
            animation: slideInRight 0.6s ease 0.4s backwards;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .menu-icon {
            font-size: 80px;
            margin-bottom: 20px;
            display: inline-block;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .menu-card:hover .menu-icon {
            animation: spin 0.6s ease;
        }

        @keyframes spin {
            from { transform: rotate(0deg) scale(1); }
            to { transform: rotate(360deg) scale(1.2); }
        }

        .menu-title {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .menu-description {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .menu-badge {
            display: inline-block;
            padding: 8px 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
            animation: fadeIn 0.8s ease 0.6s backwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

         .info-section h2 {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .feature-item {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px;
            border-radius: 16px;
            border: 2px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .feature-icon {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .feature-title {
            font-size: 18px;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 8px;
        }

        .feature-desc {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .student-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 24px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease 0.8s backwards;
        }

        .student-info h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .student-details {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .student-detail-item {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        footer {
            text-align: center;
            color: rgba(255, 255, 255, 0.95);
            padding: 30px 0;
            font-size: 14px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 36px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .info-section {
                padding: 25px;
            }

            .student-details {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔐 Hash Checker System</h1>
            <p>Sistem Verifikasi Integritas File dengan Hash Algorithm</p>
        </div>

        <div class="menu-grid">
            <a href="Biodata.php" class="menu-card biodata">
                <div class="menu-icon">👤</div>
                <h2 class="menu-title">Biodata</h2>
                <p class="menu-description">Lihat informasi lengkap profil mahasiswa dan identitas pembuat sistem</p>
                <span class="menu-badge">Profil</span>
            </a>

            <a href="upload.php" class="menu-card upload">
                <div class="menu-icon">📤</div>
                <h2 class="menu-title">Upload File</h2>
                <p class="menu-description">Upload file untuk menghasilkan hash MD5, SHA-1, dan SHA-256 secara otomatis</p>
                <span class="menu-badge">Generate Hash</span>
            </a>

            <a href="verify.php" class="menu-card verify">
                <div class="menu-icon">✅</div>
                <h2 class="menu-title">Verify Hash</h2>
                <p class="menu-description">Verifikasi integritas file dengan membandingkan hash yang telah tersimpan</p>
                <span class="menu-badge">Validasi</span>
            </a>
        </div>

        <div class="info-section">
            <h2>🚀 Fitur Unggulan</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-title">Keamanan Tinggi</div>
                    <div class="feature-desc">Menggunakan algoritma hash kriptografi standar industri</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">⚡</div>
                    <div class="feature-title">Proses Cepat</div>
                    <div class="feature-desc">Perhitungan hash yang efisien untuk file berukuran besar</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">📊</div>
                    <div class="feature-title">Multi Algorithm</div>
                    <div class="feature-desc">Mendukung MD5, SHA-1, dan SHA-256 secara bersamaan</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">💾</div>
                    <div class="feature-title">Penyimpanan Aman</div>
                    <div class="feature-desc">Menyimpan hash file dengan sistem database yang terenkripsi</div>
                </div>
            </div>
        </div>

        <div class="student-info">
            <h3>👨‍🎓 Informasi Mahasiswa</h3>
            <div class="student-details">
                <div class="student-detail-item">📝 Nama: Muhammad Fauzi SF</div>
                <div class="student-detail-item">🎓 Kelas: TI23H</div>
                <div class="student-detail-item">🆔 NIM: 20230040319</div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Hash Checker System - Muhammad Fauzi SF</p>
        <p style="margin-top: 8px; opacity: 0.8;">Teknik Informatika | Universitas Nusa Putra</p>
    </footer>

    <script>
        // Add hover sound effect (optional)
        document.querySelectorAll('.menu-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.03)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Animate features on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-item').forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'all 0.6s ease';
            observer.observe(item);
        });
    </script>
</body>
</html>