<?php
require_once 'User.php';
require_once 'CetakLaporan.php';
require_once 'MataKuliah.php';

class Mahasiswa extends User implements CetakLaporan {
    private $semester;
    private $daftarMatkul = [];

    public function __construct($nama, $id, $semester) {
        parent::__construct($nama, $id);
        $this->nama = $nama;
        $this->id = $id;
        $this->semester = $semester;
    }

    public function getRole() {
        return "Mahasiswa";
    }

    public function tambahMatkul(MataKuliah $matkul) {
        $this->daftarMatkul[] = $matkul;
    }

    public function hitungIPK() {
        $totalBobotSks = 0;
        $totalSks = 0;

        foreach ($this->daftarMatkul as $matkul) {
            $bobot = $matkul->getBobot();
            $sks = $matkul->getSks();
            $totalBobotSks += ($bobot * $sks);
            $totalSks += $sks;
        }

        return $totalSks > 0 ? $totalBobotSks / $totalSks : 0;
    }

    public function hitungKHS() {
        $khs = [];
        foreach ($this->daftarMatkul as $matkul) {
            $khs[] = [
                'nama' => $matkul->getNamaMatkul(),
                'sks' => $matkul->getSks(),
                'nilai' => $matkul->getNilai(),
                'bobot' => $matkul->getBobot()
            ];
        }
        return $khs;
    }

    public function cetakLaporan() {
    ?>
    <div class="card">
        <h3>📋 Data Mahasiswa</h3>
        <div class="info-row">
            <span class="label">Nama</span>
            <span class="value">: <?php echo $this->getNama(); ?></span>
        </div>
        <div class="info-row">
            <span class="label">NIM</span>
            <span class="value">: <?php echo $this->getId(); ?></span>
        </div>
        <div class="info-row">
            <span class="label">Semester</span>
            <span class="value">: <?php echo $this->semester; ?></span>
        </div>
        <div class="info-row">
            <span class="label">Status</span>
            <span class="value">: <span class="role-badge role-mahasiswa"><?php echo $this->getRole(); ?></span></span>
        </div>

        <h4 style="margin-top: 20px; color: #2d3748;">Daftar Mata Kuliah</h4>
        <table>
            <tr>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
                <th>Bobot</th>
            </tr>
            <?php foreach ($this->hitungKHS() as $k): ?>
            <tr>
                <td><?php echo $k['nama']; ?></td>
                <td><?php echo $k['sks']; ?></td>
                <td><?php echo $k['nilai']; ?></td>
                <td><?php echo number_format($k['bobot'], 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="ipk-box">
            IPK Kamu: <?php echo number_format($this->hitungIPK(), 2); ?>
        </div>
    </div>
    <?php
    }
}
?>