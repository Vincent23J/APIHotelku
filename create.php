<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $urlmap = $_POST["urlmap"];
    $telepon = $_POST["telepon"];
    $bintang = $_POST["bintang"];
    $deskripsi = $_POST["deskripsi"];
    
    $perintah = "INSERT INTO tbl_hotel (nama, alamat, urlmap, telepon, bintang, deskripsi) VALUES('$nama','$alamat','$urlmap','$telepon','$bintang','$deskripsi')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Tambah Data SUkses!";
    }
    else{
        $response["kode"] = 1;
        $response["pesan"] = "Tambah Data Gagal!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);