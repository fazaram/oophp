<?php

class Komik extends Produk
{
  public $jumlahHalaman;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jumlahHalaman = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jumlahHalaman = $jumlahHalaman;
  }
  public function getInfo()
  {
    // komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp.30000) - 100 Halaman.
    $str = "{$this->judul} | {$this->getLabel()}, (Rp. {$this->harga})";

    return $str;
  }

  public function getInfoProduk()
  {
    $str = "Komik : " . $this->getInfo() . " - {$this->jumlahHalaman} Halaman.";
    return $str;
  }

}