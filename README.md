# Lab7-PHP Dasar
# Nama  : Vivit Nurul Hidayah 
# NIM  : 312410110 
# Kelas : TI.24.A.1
# Mata Kuliah : Pemrograman Web 1
# Dosen   : Anggung Nugroho S.Kom, M.Kom 

## Pertanyaan dan Tugas
Buatlah program PHP sederhana dengan menggunakan form input yang menampilkan
nama, tanggal lahir dan pekerjaan. Kemudian tampilkan outputnya dengan menghitung
umur berdasarkan inputan tanggal lahir. Dan pilihan pekerjaan dengan gaji yang
berbeda-beda sesuai pilihan pekerjaan.

## Input Program 
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Program Sederhana Penghitung Umur & Gaji</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        .output { margin-top: 20px; padding: 15px; border: 2px solid #007bff; background-color: #e9f7ff; border-radius: 5px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="date"], select { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; box-sizing: border-box; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Input Data Diri</h2>
    <form action="" method="post">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required>

        <label for="pekerjaan">Pilih Pekerjaan:</label>
        <select id="pekerjaan" name="pekerjaan" required>
            <option value="">-- Pilih Salah Satu --</option>
            <option value="programmer">Programmer</option>
            <option value="designer">Graphic Designer</option>
            <option value="guru">Guru</option>
            <option value="wirausaha">Wirausaha</option>
        </select>

        <input type="submit" value="Tampilkan Hasil">
    </form>

    <?php
    // Cek apakah data form sudah dikirim (dengan method POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // 1. Ambil input dari form dan bersihkan (sanitasi)
        $nama = htmlspecialchars($_POST['nama']);
        $tgl_lahir_str = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // --- 2. Logika Perhitungan Umur ---
        try {
            $tgl_lahir = new DateTime($tgl_lahir_str);
            $sekarang = new DateTime();
            $umur_obj = $sekarang->diff($tgl_lahir);
            $umur = $umur_obj->y; // Ambil tahunnya saja
        } catch (Exception $e) {
            $umur = "Tanggal lahir tidak valid";
        }

        // --- 3. Logika Penentuan Gaji ---
        $gaji = 0;
        $pekerjaan_label = '';

        switch ($pekerjaan) {
            case 'programmer':
                $gaji = 8000000;
                $pekerjaan_label = 'Programmer';
                break;
            case 'designer':
                $gaji = 6500000;
                $pekerjaan_label = 'Graphic Designer';
                break;
            case 'guru':
                $gaji = 4500000;
                $pekerjaan_label = 'Guru';
                break;
            case 'wirausaha':
                $gaji = 0; // Gaji Wirausaha ditentukan oleh pendapatan
                $pekerjaan_label = 'Wirausaha';
                break;
            default:
                $gaji = 0;
                $pekerjaan_label = 'Tidak Diketahui';
        }

        // Format gaji menjadi format Rupiah
        $gaji_formatted = 'Rp ' . number_format($gaji, 0, ',', '.');
        if ($pekerjaan == 'wirausaha') {
            $gaji_formatted = 'Tergantung Profit';
        }

        // --- 4. Tampilkan Output ---
        echo '<div class="output">';
        echo '<h3>Hasil Data Diri:</h3>';
        echo '<p><strong>Nama:</strong> ' . $nama . '</p>';
        echo '<p><strong>Tanggal Lahir:</strong> ' . date('d F Y', strtotime($tgl_lahir_str)) . '</p>';
        echo '<p><strong>Pekerjaan:</strong> ' . $pekerjaan_label . '</p>';
        
        // Output Umur
        if (is_numeric($umur)) {
            echo '<p><strong>Umur (Hasil Hitung):</strong> ' . $umur . ' Tahun</p>';
        } else {
            echo '<p><strong>Umur (Hasil Hitung):</strong> ' . $umur . '</p>';
        }

        // Output Gaji
        echo '<p><strong>Estimasi Gaji:</strong> ' . $gaji_formatted . '</p>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
```
