<?php
session_start();

// --- KONSEP OOP DITERAPKAN DISINI ---

// 1. INTERFACE (Wajib ada method cetak())
interface CetakLaporan {
    public function cetak();
}

// 2. ABSTRACT CLASS (Kelas Induk)
abstract class DataAkademik {
    protected $nama;
    protected $nim;
    
    abstract public function getInfo();
}

// 3. CLASS MAHASISWA (Turunan & Implementasi)
class Mahasiswa extends DataAkademik implements CetakLaporan {
    private $semester; // ENCAPSULATION (Private)
    
    public function __construct($nama, $nim, $semester) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->semester = $semester;
    }
    
    public function getInfo() {
        return "Nama: $this->nama, NIM: $this->nim";
    }
    
    public function cetak() {
        echo "<tr>
                <td>{$this->nim}</td>
                <td>{$this->nama}</td>
                <td>{$this->semester}</td>
              </tr>";
    }
}

// 4. CLASS MATA KULIAH
class MataKuliah {
    private $kode;
    private $namaMatkul;
    private $sks;
    
    public function __construct($kode, $nama, $sks) {
        $this->kode = $kode;
        $this->namaMatkul = $nama;
        $this->sks = $sks;
    }
    
    // POLYMORPHISM (Overloading sederhana)
    public function tampil($mode = 'list') {
        if($mode == 'list') {
            echo "<tr>
                    <td>$this->kode</td>
                    <td>$this->namaMatkul</td>
                    <td>$this->sks</td>
                  </tr>";
        }
    }
}

// 5. CLASS NILAI
class Nilai {
    public $matkul;
    public $angka;
    
    public function __construct($matkul, $angka) {
        $this->matkul = $matkul;
        $this->angka = $angka;
    }
    
    public function getHuruf() {
        if($this->angka >= 90) return 'A';
        elseif($this->angka >= 85) return 'A-';
        else return 'A';
    }
}

// --- LOGIKA LOGIN & LOGOUT ---
if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if($user == 'admin' && $pass == 'admin') {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $user;
        header("Location: index.php");
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
}
?>
<html>
<head>
    <title>SIAKAD - Sistem Informasi Akademik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #16A085;
            color: white;
            padding: 20px;
            margin: 0;
        }
        .box {
            background: white;
            color: black;
            padding: 25px;
            margin: 15px auto;
            border-radius: 8px;
            max-width: 850px;
        }
        .header {
            text-align: center;
            padding: 20px;
        }
        .menu {
            text-align: center;
            margin-top: 15px;
        }
        .menu a {
            display: inline-block;
            background: #0E6655;
            color: white;
            padding: 10px 18px;
            margin: 5px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #aaa;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #16A085;
            color: white;
        }
        .btn-logout {
            background: #0E6655;
            color: white;
            padding: 8px 18px;
            text-decoration: none;
            float: right;
            border-radius: 4px;
            font-weight: bold;
        }
        .clear {
            clear: both;
        }
    </style>
    <script>
        function show(id) {
            document.querySelectorAll('.content').forEach(el => el.style.display = 'none');
            document.getElementById(id).style.display = 'block';
        }
    </script>
</head>
<body>

<?php if(!isset($_SESSION['login'])) { ?>

<!-- HALAMAN LOGIN -->
<div class="box">
    <h2 style="color:#16A085; text-align:center;">S I A K A D</h2>
    <p style="text-align:center;">Sistem Informasi Akademik</p>
    <hr>
    <form method="post">
        <table style="width: auto; margin: 0 auto; border: none;">
            <tr>
                <td style="border: none;"><b>Username</b></td>
                <td style="border: none;"><input type="text" name="username" required style="padding:8px; width:200px;"></td>
            </tr>
            <tr>
                <td style="border: none;"><b>Password</b></td>
                <td style="border: none;"><input type="password" name="password" required style="padding:8px; width:200px;"></td>
            </tr>
            <tr>
                <td style="border: none;"></td>
                <td style="border: none;"><input type="submit" name="login" value="LOGIN" style="background:#16A085; color:white; padding:10px 25px; border:none; border-radius:4px; font-weight:bold;"></td>
            </tr>
        </table>
    </form>
</div>

<?php } else { ?>

<!-- HALAMAN UTAMA -->
<div class="header">
    <a href="index.php?logout" class="btn-logout">LOGOUT</a>
    <h1>SISTEM INFORMASI AKADEMIK</h1>
    <div class="menu">
        <a onclick="show('home')">BERANDA</a>
        <a onclick="show('mahasiswa')">DATA MAHASISWA</a>
        <a onclick="show('matkul')">MATA KULIAH</a>
        <a onclick="show('nilai')">REKAP NILAI</a>
        <a onclick="show('khs')">CETAK KHS</a>
    </div>
</div>

<div class="clear"></div>

<div id="home" class="content box">
    <h2>📚 SELAMAT DATANG</h2>
    <p>Sistem Informasi Akademik Semester Genap.</p>
    <p>Silakan klik menu di atas untuk melihat data.</p>
</div>

<!-- MENU DATA MAHASISWA (PAKAI OOP) -->
<div id="mahasiswa" class="content box" style="display:none;">
    <h2>📋 DAFTAR NAMA MAHASISWA</h2>
    <table>
        <tr><th>No</th><th>NIM</th><th>Nama Lengkap</th><th>Semester</th></tr>
        <?php
        // MEMBUAT OBJEK DARI CLASS MAHASISWA
        $mhs1 = new Mahasiswa("Meri Rotun Hasanah", "001", "2");
        $mhs2 = new Mahasiswa("Risqiatul Hasanah", "002", "2");
        $mhs3 = new Mahasiswa("Siti Aisyah ", "003", "2");
        $mhs4 = new Mahasiswa("Ameliatus Syarifah", "004", "2");
        
        // MEMANGGIL METHOD CETAK
        echo "<tr><td>1</td>"; $mhs1->cetak();
        echo "<tr><td>2</td>"; $mhs2->cetak();
        echo "<tr><td>3</td>"; $mhs3->cetak();
        echo "<tr><td>4</td>"; $mhs4->cetak();
        ?>
    </table>
</div>

<!-- MENU MATA KULIAH (PAKAI OOP) -->
<div id="matkul" class="content box" style="display:none;">
    <h2>📖 DAFTAR MATA KULIAH</h2>
    <table>
        <tr><th>No</th><th>Kode</th><th>Nama Mata Kuliah</th><th>SKS</th></tr>
        <?php
        $mk1 = new MataKuliah("BD001", "Manajemen Pemasaran Digital", 3);
        $mk2 = new MataKuliah("AK002", "Akuntansi Dasar", 4);
        $mk3 = new MataKuliah("TG003", "Pemrograman & Algoritma", 3);
        $mk4 = new MataKuliah("BS004", "Bahasa Inggris Bisnis", 2);
        $mk5 = new MataKuliah("MN005", "Manajemen Operasional", 3);
        
        echo "<tr><td>1</td>"; $mk1->tampil();
        echo "<tr><td>2</td>"; $mk2->tampil();
        echo "<tr><td>3</td>"; $mk3->tampil();
        echo "<tr><td>4</td>"; $mk4->tampil();
        echo "<tr><td>5</td>"; $mk5->tampil();
        ?>
        <tr><td colspan="3"><b>Total SKS</b></td><td><b>15 SKS</b></td></tr>
    </table>
</div>

<!-- MENU REKAP NILAI -->
<div id="nilai" class="content box" style="display:none;">
    <h2>📊 REKAPITULASI NILAI</h2>
    <p><b>Data Nilai Mahasiswa:</b></p>
    <table>
        <tr><th>Mata Kuliah</th><th>Nilai Angka</th><th>Nilai Huruf</th><th>Bobot</th></tr>
        <?php
        $n1 = new Nilai("Manajemen Pemasaran Digital", 92);
        $n2 = new Nilai("Akuntansi Dasar", 89);
        $n3 = new Nilai("Pemrograman & Algoritma", 95);
        $n4 = new Nilai("Bahasa Inggris Bisnis", 87);
        $n5 = new Nilai("Manajemen Operasional", 90);
        
        echo "<tr><td>{$n1->matkul}</td><td>{$n1->angka}</td><td>{$n1->getHuruf()}</td><td>4.00</td></tr>";
        echo "<tr><td>{$n2->matkul}</td><td>{$n2->angka}</td><td>{$n2->getHuruf()}</td><td>4.00</td></tr>";
        echo "<tr><td>{$n3->matkul}</td><td>{$n3->angka}</td><td>{$n3->getHuruf()}</td><td>4.00</td></tr>";
        echo "<tr><td>{$n4->matkul}</td><td>{$n4->angka}</td><td>{$n4->getHuruf()}</td><td>3.75</td></tr>";
        echo "<tr><td>{$n5->matkul}</td><td>{$n5->angka}</td><td>{$n5->getHuruf()}</td><td>4.00</td></tr>";
        ?>
    </table>
    <h3 style="text-align:right; margin-top:15px;">IP Semester: <span style="color:#16A085; font-weight:bold;">3.92</span></h3>
</div>

<!-- MENU CETAK KHS -->
<div id="khs" class="content box" style="display:none;">
    <h2 style="text-align:center;">KARTU HASIL STUDI (KHS)</h2>
    <p style="text-align:center;">Semester II - Tahun Ajaran 2025/2026</p>

    <table style="border:none; margin-bottom:15px;">
        <tr>
            <td style="border:none;"><b>Nama</b></td>
            <td style="border:none;">: Meri Rotun Hasanah</td>
            <td style="border:none;"><b>Semester</b></td>
            <td style="border:none;">: 2 (Dua)</td>
        </tr>
        <tr>
            <td style="border:none;"><b>NIM</b></td>
            <td style="border:none;">: 001</td>
            <td style="border:none;"><b>T.Ajaran</b></td>
            <td style="border:none;">: 2025/2026</td>
        </tr>
    </table>

    <table>
        <tr>
            <th>No</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Huruf</th>
            <th>Bobot</th>
        </tr>
        <?php
        // Menggunakan ulang objek Nilai
        echo "<tr><td>1</td><td>{$n1->matkul}</td><td>3</td><td>{$n1->angka}</td><td>{$n1->getHuruf()}</td><td>4.00</td></tr>";
        echo "<tr><td>2</td><td>{$n2->matkul}</td><td>4</td><td>{$n2->angka}</td><td>{$n2->getHuruf()}</td><td>4.00</td></tr>";
        echo "<tr><td>3</td><td>{$n3->matkul}</td><td>3</td><td>{$n3->angka}</td><td>{$n3->getHuruf()}</td><td>4.00</td></tr>";
        echo "<tr><td>4</td><td>{$n4->matkul}</td><td>2</td><td>{$n4->angka}</td><td>{$n4->getHuruf()}</td><td>3.75</td></tr>";
        echo "<tr><td>5</td><td>{$n5->matkul}</td><td>3</td><td>{$n5->angka}</td><td>{$n5->getHuruf()}</td><td>4.00</td></tr>";
        ?>
    </table>

    <div style="margin-top:20px; text-align:right; font-size:18px;">
        <p><b>Total SKS : 15</b></p>
        <p><b>IP Semester : <span style="color:#16A085; font-weight:bold;">3.92</span></b></p>
        <p><b>Predikat : SANGAT MEMUASKAN</b></p>
    </div>
</div>

<?php } ?>

</body>
</html>