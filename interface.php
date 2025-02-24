<?php
interface infoProduk
{
  public function getInfoProduk();
}

abstract class Produk
{


  protected $judul,
  $penulis,
  $penerbit,
  $harga,
  $diskon = 0;


  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;


  }

  public function setJudul($judul)
  {
    $this->judul = $judul;
  }
  public function getJudul()
  {
    return $this->judul;
  }

  public function setPenulis($penulis)
  {
    $this->penulis = $penulis;
  }
  public function getPenulis()
  {
    return $this->penulis;
  }

  public function setPenerbit($penerbit)
  {
    $this->penerbit = $penerbit;
  }
  public function getPenerbit()
  {
    return $this->penerbit;
  }

  public function setDiskon($diskon)
  {
    $this->diskon = $diskon;
  }

  public function getDiskon()
  {
    return $this->diskon;
  }
  public function setHarga($harga)
  {
    $this->harga = $harga;
  }
  public function getHarga()
  {
    return $this->harga - $this->harga * $this->diskon / 100;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  abstract public function getInfo();


}

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

class CetakInfoProduk
{
  public $daftarProduk = array();

  public function tambahProduk(Produk $produk)
  {
    $this->daftarProduk[] = $produk;
  }
  public function cetak()
  {
    $str = "DAFTAR PRODUK : <br>";

    foreach ($this->daftarProduk as $p) {
      $str .= "- {$p->getInfoProduk()} <br>";
    }
    return $str;
  }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 50000, 50);

$cetakProduk = new CetakInfoProduk();

$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();
