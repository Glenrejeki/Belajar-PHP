<?php 
    class Mahasiswa {
        public $nama;
        public $nim;

        public function __construct($nama, $nim){
        $this->nama = $nama;
        $this->nim = $nim;
        }


        public function perkenalan(){
            return "Halo, saya $this->nama, Nim $this->nim";
        }
    }
    


?>