<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - SIKAD MIN</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 40px;
            font-size: 28px;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
            letter-spacing: 1px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 30px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-row {
            display: flex;
            margin-bottom: 12px;
            font-size: 15px;
        }

        .label {
            font-weight: 600;
            color: #555;
            min-width: 130px;
        }

        .value {
            color: #2d3748;
            font-weight: 500;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        table th {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
            font-weight: 600;
        }

        table tr:hover {
            background-color: #f8f5ff;
        }

        .ipk-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .role-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: bold;
            color: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        .role-mahasiswa {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .role-dosen {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📚 SISTEM AKADEMIK - SIKAD MIN</h1>

    <?php
    require_once 'User.php';
    require_once 'CetakLaporan.php';
    require_once 'MataKuliah.php';
    require_once 'Mahasiswa.php';
    require_once 'Dosen.php';

    // Input Data Mahasiswa
    $mahasiswa1 = new Mahasiswa("Meri Rotun Hasanah", "12345678", 3);

    // Input Mata Kuliah
    $matkul1 = new MataKuliah("Pemrograman Web", 3, 85);
    $matkul2 = new MataKuliah("Basis Data", 4, 78);
    $matkul3 = new MataKuliah("Algoritma", 3, 92);

    // Tambahkan ke daftar mata kuliah mahasiswa
    $mahasiswa1->tambahMatkul($matkul1);
    $mahasiswa1->tambahMatkul($matkul2);
    $mahasiswa1->tambahMatkul($matkul3);

    // Cetak laporan mahasiswa
    $mahasiswa1->cetakLaporan();

    // Input Data Dosen
    $dosen1 = new Dosen("Dr. Siti Aminah", "98765432", "Pemrograman Web");

    // Cetak laporan dosen
    $dosen1->cetakLaporan();
    ?>

</div>

</body>
</html>