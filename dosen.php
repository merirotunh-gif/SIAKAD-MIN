<?php
require_once 'User.php';
require_once 'CetakLaporan.php';

class Dosen extends User implements CetakLaporan {
    private $mataKuliahDiajar;

    public function __construct($nama, $id, $mataKuliahDiajar) {
        parent::__construct($nama, $id);
        $this->mataKuliahDiajar = $mataKuliahDiajar;
    }

    public function getRole() {
        return "Dosen";
    }

    public function cetakLaporan() {
    ?>
    <div class="card">
        <h3>👩‍🏫 Data Dosen</h3>
        <div class="info-row">
            <span class="label">Nama</span>
            <span class="value">: <?php echo $this->getNama(); ?></span>
        </div>
        <div class="info-row">
            <span class="label">NIDN</span>
            <span class="value">: <?php echo $this->getId(); ?></span>
        </div>
        <div class="info-row">
            <span class="label">Mengajar</span>
            <span class="value">: <?php echo $this->mataKuliahDiajar; ?></span>
        </div>
        <div class="info-row">
            <span class="label">Status</span>
            <span class="value">: <span class="role-badge role-dosen"><?php echo $this->getRole(); ?></span></span>
        </div>
    </div>
    <?php
    }
}
?>