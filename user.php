<?php
abstract class User {
    // Property dengan akses protected (Encapsulation)
    protected $nama;
    protected $id;

    // Constructor
    public function __construct($nama, $id) {
        $this->nama = $nama;
        $this->id = $id;
    }

    // Abstract method (wajib diimplementasikan di class turunan)
    abstract public function getRole();

    // Getter dan Setter (Encapsulation)
    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
?>