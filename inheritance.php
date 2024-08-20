<?php

class Produk
{
  public $judul,
  $penulis,
  $penerbit,
  $harga,
  $jumlahHalaman,
  $waktuMain,
  $type;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = "harga", $jumlahHalaman = 0, $waktuMain = 0, $type)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jumlahHalaman = $jumlahHalaman;
    $this->waktuMain = $waktuMain;
    $this->type = $type;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk()
  {
    // komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp.30000) - 100 Halaman.
    $str = "{$this->type} : {$this->judul} | {$this->getLabel()}, (Rp. {$this->harga})";

    return $str;
  }
}

class Komik extends Produk
{
  public function getInfoProduk()
  {
    $str = "Komik : {$this->judul} | {$this->getLabel()}, (Rp. {$this->harga}) - {$this->jumlahHalaman} Halaman.";
    return $str;
  }

}

class Game extends Produk
{
  public function getInfoProduk()
  {
    $str = "Komik : {$this->judul} | {$this->getLabel()}, (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
    return $str;
  }

}

class CetakInfoProduk
{
  public function cetak(Produk $produk)
  {
    $str = "{$produk->judul} | {$produk->getLabel()} (Rp.{$produk->harga})";
    return $str;
  }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "komik");

$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 50000, 0, 50, "game");

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<br>";