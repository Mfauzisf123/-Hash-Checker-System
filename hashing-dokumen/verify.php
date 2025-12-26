<?php
// Error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inisialisasi variabel
$verified = false;
$isValid = false;
$hashUpload = '';
$hashAsli = '';
$errorMessage = '';

// Proses verifikasi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $storage = __DIR__ . "/storage/";
    $hashFile = $storage . "original_hash.txt";

    // Cek apakah file hash asli ada
    if (!file_exists($hashFile)) {
        $errorMessage = "Error: Belum ada dokumen yang diregistrasi. Silakan upload dokumen asli terlebih dahulu.";
    } 
    // Validasi file upload
    elseif (!isset($_FILES['doc']) || $_FILES['doc']['error'] !== UPLOAD_ERR_OK) {
        $errorMessage = "Error: File tidak berhasil diupload. Silakan coba lagi.";
    } 
    else {
        // Generate hash dari file yang diupload
        $hashUpload = hash_file('sha256', $_FILES['doc']['tmp_name']);
        
        // Ambil hash asli dari storage
        $hashAsli = trim(file_get_contents($hashFile));
        
        // Bandingkan hash
        $isValid = ($hashUpload === $hashAsli);
        $verified = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Dokumen - Sistem Anti Pemalsuan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>🔍 Document Verification</h1>
    <p class="subtitle">Cek Keaslian Dokumen Digital Dengan Teknologi Blockchain</p>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="doc" required accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt">
        <button type="submit">🔐 Verify Document</button>
    </form>

    <?php if ($errorMessage): ?>
        <div class='result error'>
            <b>❌ Error</b>
            <p><?php echo $errorMessage; ?></p>
        </div>
        
        <center>
            <a href="upload.php" class="nav-link">📝 Upload Dokumen Asli</a>
        </center>
    <?php endif; ?>

    <?php if ($verified): ?>
        <?php if ($isValid): ?>
            <div class='result success'>
                <b>✅ DOKUMEN ASLI TERVERIFIKASI</b>
                <p>Dokumen ini <strong>VALID</strong> dan sesuai dengan dokumen asli yang terdaftar dalam sistem. Hash SHA-256 cocok 100%.</p>
                
                <div class="hash-label">🔑 Hash Dokumen Yang Diupload:</div>
                <div class='hash-box'><?php echo htmlspecialchars($hashUpload); ?></div>
                
                <div class="hash-label">🔑 Hash Dokumen Asli (Tersimpan):</div>
                <div class='hash-box'><?php echo htmlspecialchars($hashAsli); ?></div>
                
                <p style="margin-top: 15px; font-size: 13px; color: #2e7d32;">
                    ✓ <strong>Status:</strong> Dokumen ini BELUM pernah diubah atau dimodifikasi.
                </p>
            </div>
        <?php else: ?>
            <div class='result error'>
                <b>❌ DOKUMEN PALSU / TELAH DIMODIFIKASI</b>
                <p>Dokumen ini <strong>TIDAK VALID</strong>. Hash tidak cocok dengan dokumen asli yang terdaftar dalam sistem.</p>
                
                <div class="hash-label">🔑 Hash Dokumen Yang Diupload:</div>
                <div class='hash-box'><?php echo htmlspecialchars($hashUpload); ?></div>
                
                <div class="hash-label">🔑 Hash Dokumen Asli (Tersimpan):</div>
                <div class='hash-box'><?php echo htmlspecialchars($hashAsli); ?></div>
                
                <p style="margin-top: 15px; font-size: 13px; color: #c62828;">
                    ⚠️ <strong>Peringatan:</strong> Dokumen ini kemungkinan telah diubah, rusak, atau berbeda dengan dokumen asli.
                </p>
            </div>
        <?php endif; ?>
        
        <center>
            <a href="verify.php" class="nav-link">🔄 Verifikasi Dokumen Lain</a>
            <a href="upload.php" class="nav-link">📝 Upload Dokumen Baru</a>
        </center>
    <?php endif; ?>

</div>

<div class="footer">
    🔒 Sistem Informasi Terdesentralisasi • Verifikasi Publik<br>
    Teknologi: SHA-256 Cryptographic Hash Function
</div>

</body>
</html>
```
