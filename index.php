<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - SIAKAD</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ===================================== */
        /* === STYLE BAGIAN DEPAN (INTRO) === */
        /* ===================================== */
        .hero-section {
            text-align: center;
            padding: 60px 20px;
            color: white;
            margin-bottom: 30px;
            background: rgba(0, 0, 0, 0.15);
            border-radius: 20px;
        }

        .hero-section h1 {
            font-size: 65px;
            font-weight: 800; /* TEBAL BANGET */
            letter-spacing: 8px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .hero-section p {
            font-size: 16px;
            font-weight: 300; /* LEBIH TIPIS */
            opacity: 0.9;
            letter-spacing: 1px;
        }

        /* ===================================== */
        /* === STYLE MENU NAVIGASI === */
        /* ===================================== */
        .navbar {
            display: flex;
            justify-content: center;
            gap: 10px;
            background: rgba(0, 0, 0, 0.25);
            padding: 12px;
            border-radius: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 25px; /* DIPERLEBAR */
            border-radius: 8px;
            font-weight: 500;
            text-transform: uppercase; /* DIUBAH JADI HURUF BESAR */
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* ===================================== */
        /* === STYLE BOX MENU UTAMA === */
        /* ===================================== */
        .menu-title {
            color: #f0f0f0;
            font-size: 20px;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .menu-box {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid #ffffff;
            border-radius: 15px;
            padding: 35px 20px; /* DITAMBAH PADDING BIAR GAK MEPET */
            text-align: center;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            min-height: 120px; /* TINGGI BOX DISEMAKIN KEREN */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menu-box:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .menu-box h3 {
            font-size: 17px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.4;
        }

        /* ===================================== */
        /* === STYLE KONTEN DATA === */
        /* ===================================== */
        .content {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            padding: 35px;
        }

        .content h3 {
            color: #1e3c72;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 700;
            padding-bottom: 10px;
            border-bottom: 3px solid #f0f0f0;
        }

        .info-row {
            display: flex;
            margin-bottom: 12px;
            font-size: 16px;
        }

        .label {
            font-weight: 600;
            color: #555;
            min-width: 130px;
        }

        .value {
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }

        table th {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
            font-weight: 600;
        }

        table tr:hover {
            background-color: #f8f9fa;
        }

        .ipk-box {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            margin-top: 20px;
        }

        .role-badge {
            display: inline-block;
            padding: 7px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #00c9ff 0%, #92fe9d 100%);
        }

        /* ===================================== */
        /* === STYLE FOOTER === */
        /* ===================================== */
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>

<div class="container">

    <!-- BAGIAN DEPAN -->
    <div class="hero-section">
        <h1>SIAKAD</h1>
        <p>Sistem Informasi Akademik | PHP OOP Project</p>
    </div>

    <!-- MENU NAVIGASI -->
    <div class="navbar">
        <a href="#">Dashboard</a>
        <a href="#">Mahasiswa</a>
        <a href="#">Mata Kuliah</a>
        <a href="#">Input Nilai</a>
        <a href="#">Cetak KHS</a>
    </div>

    <!-- BOX MENU UTAMA -->
    <div class="menu-title">Menu Utama</div>
    <div class="menu-grid">
        <div class="menu-box">
            <h3>DATA MAHASISWA</h3>
        </div>
        <div class="menu-box">
            <h3>MATA KULIAH</h3>
        </div>
        <div class="menu-box">
            <h3>INPUT NILAI & HITUNG IPK</h3>
        </div>
        <div class="menu-box">
            <h3>CETAK LAPORAN / KHS</h3>
        </div>
    </div>

    <!-- KONTEN DATA -->
    <div class="content">
        <?php
        require_once 'User.php';
        require_once 'CetakLaporan.php';
        require_once 'MataKuliah.php';
        require_once 'Mahasiswa.php';
        require_once 'Dosen.php';

        // === DATA MAHASISWA 1 ===
        $mahasiswa1 = new Mahasiswa("Meri Rotun Hasanah", "12345678", 3);
        $matkul1 = new MataKuliah("Pemrograman Web", 3, 85);
        $matkul2 = new MataKuliah("Basis Data", 4, 78);
        $matkul3 = new MataKuliah("Algoritma", 3, 92);
        $mahasiswa1->tambahMatkul($matkul1);
        $mahasiswa1->tambahMatkul($matkul2);
        $mahasiswa1->tambahMatkul($matkul3);
        $mahasiswa1->cetakLaporan();

        // === DATA MAHASISWA 2 ===
        $mahasiswa2 = new Mahasiswa("Siti Aminah", "12345679", 3);
        $matkul4 = new MataKuliah("Pemrograman Web", 3, 90);
        $matkul5 = new MataKuliah("Basis Data", 4, 88);
        $matkul6 = new MataKuliah("Algoritma", 3, 85);
        $mahasiswa2->tambahMatkul($matkul4);
        $mahasiswa2->tambahMatkul($matkul5);
        $mahasiswa2->tambahMatkul($matkul6);
        $mahasiswa2->cetakLaporan();

        // === DATA MAHASISWA 3 ===
        $mahasiswa3 = new Mahasiswa("Budi Santoso", "12345680", 3);
        $matkul7 = new MataKuliah("Pemrograman Web", 3, 78);
        $matkul8 = new MataKuliah("Basis Data", 4, 82);
        $matkul9 = new MataKuliah("Algoritma", 3, 80);
        $mahasiswa3->tambahMatkul($matkul7);
        $mahasiswa3->tambahMatkul($matkul8);
        $mahasiswa3->tambahMatkul($matkul9);
        $mahasiswa3->cetakLaporan();

        // === DATA DOSEN ===
        $dosen1 = new Dosen("Dr. Siti Aminah", "98765432", "Pemrograman Web");
        $dosen1->cetakLaporan();
        ?>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> SIAKAD - Sistem Informasi Akademik
    </footer>

</div>

</body>
</html>