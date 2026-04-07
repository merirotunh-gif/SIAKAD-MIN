<?php
class MataKuliah {
    private $namaMatkul;
    private $sks;
    private $nilai;

    public function __construct($namaMatkul, $sks, $nilai = 0) {
        $this->namaMatkul = $namaMatkul;
        $this->sks = $sks;
        $this->nilai = $nilai;
    }

    // Getter
    public function getNamaMatkul() {
        return $this->namaMatkul;
    }

    public function getSks() {
        return $this->sks;
    }

    public function getNilai() {
        return $this->nilai;
    }

    // Setter
    public function setNilai($nilai) {
        $this->nilai = $nilai;
    }

    // Konversi nilai angka ke huruf dan bobot
    public function getBobot() {
        if ($this->nilai >= 85) return 4.0;
        elseif ($this->nilai >= 80) return 3.7;
        elseif ($this->nilai >= 75) return 3.3;
        elseif ($this->nilai >= 70) return 3.0;
        elseif ($this->nilai >= 65) return 2.7;
        elseif ($this->nilai >= 60) return 2.3;
        elseif ($this->nilai >= 55) return 2.0;
        else return 1.0;
    }
}
?>