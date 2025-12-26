<?php
// Error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inisialisasi variabel
$uploadSuccess = false;
$hash = '';
$errorMessage = '';

// Proses upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validasi file upload
    if (!isset($_FILES['doc']) || $_FILES['doc']['error'] !== UPLOAD_ERR_OK) {
        $errorMessage = "Error: File tidak berhasil diupload. Silakan coba lagi.";
    } else {
        // Setup direktori storage
        $storage = __DIR__ . "/storage/";
        if (!is_dir($storage)) {
            mkdir($storage, 0777, true);
        }

        // Generate hash dari file yang diupload
        $hash = hash_file('sha256', $_FILES['doc']['tmp_name']);
        
        // Simpan hash ke file
        file_put_contents($storage . "original_hash.txt", $hash);
        
        // Simpan file asli
        $originalFileName = $_FILES['doc']['name'];
        move_uploaded_file($_FILES['doc']['tmp_name'], $storage . "original.bin");
        
        // Simpan info tambahan (opsional)
        $info = [
            'filename' => $originalFileName,
            'size' => $_FILES['doc']['size'],
            'upload_time' => date('Y-m-d H:i:s'),
            'hash' => $hash
        ];
        file_put_contents($storage . "info.json", json_encode($info, JSON_PRETTY_PRINT));
        
        $uploadSuccess = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen Asli - Sistem Anti Pemalsuan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>📝 Document Registration</h1>
    <p class="subtitle">Sistem Anti Pemalsuan Dokumen Berbasis SHA-256</p>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="doc" required accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt">
        <button type="submit">🔐 Register Document</button>
    </form>

    <?php if ($errorMessage): ?>
        <div class='result error'>
            <b>❌ Gagal Upload</b>
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

    <?php if ($uploadSuccess): ?>
        <div class='result success'>
            <b>✅ Dokumen Berhasil Diregistrasi!</b>
            <p>Dokumen Anda telah berhasil didaftarkan dalam sistem. Hash SHA-256 telah disimpan sebagai bukti keaslian.</p>
            
            <div class="hash-label">🔑 SHA-256 Hash:</div>
            <div class='hash-box'><?php echo htmlspecialchars($hash); ?></div>
            
            <p style="margin-top: 15px; font-size: 13px; color: #666;">
                💡 <strong>Tip:</strong> Simpan hash ini sebagai bukti keaslian dokumen Anda.
            </p>
        </div>
        
        <center>
            <a href="verify.php" class="nav-link">🔍 Verifikasi Dokumen Lain</a>
        </center>
    <?php endif; ?>

</div>

<div class="footer">
     • Praktikum Blockchain<br>
   
</div>

</body>
</html>