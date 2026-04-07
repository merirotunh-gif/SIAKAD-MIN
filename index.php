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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* FONT MODERN & ELEGAN */
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 40px;
            font-size: 32px;
            font-weight: 700;
            text-shadow: 0 4px 15px rgba(0,0,0,0.2);
            letter-spacing: 2px;
        }

        .card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 35px;
            margin-bottom: 30px;
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }

        .card h3 {
            color: #1e3c72;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .info-row {
            display: flex;
            margin-bottom: 15px;
            font-size: 17px;
        }

        .label {
            font-weight: 600;
            color: #555;
            min-width: 130px;
        }

        .value {
            color: #2c3e50;
            font-weight: 400;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 25px;
            margin-bottom: 25px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        table th, table td {
            padding: 18px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
            font-size: 15px;
        }

        table th {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        table tr:hover {
            background-color: #f8f9fa;
        }

        .ipk-box {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            margin-top: 20px;
            box-shadow: 0 8px 20px rgba(30, 60, 114, 0.3);
        }

        .role-badge {
            display: inline-block;
            padding: 7px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .role-mahasiswa {
            background: linear-gradient(135deg, #00c9ff 0%, #92fe9d 100%);
        }

        .role-dosen {
            background: linear-gradient(135deg, #ff6e7f 0%, #bfe9ff 100%);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📚 SISTEM AKADEMIK</h1>

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