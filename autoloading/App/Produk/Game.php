<?php

class Game extends Produk
{
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = "harga", $waktuMain = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }
  public function getInfo()
  {
    // komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp.30000) - 100 Halaman.
    $str = "{$this->judul} | {$this->getLabel()}, (Rp. {$this->harga})";

    return $str;
  }
  public function getInfoProduk()
  {
    $str = "Komik : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
    return $str;
  }

}