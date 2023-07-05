<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $urlmap = $_POST["urlmap"];
    $telepon = $_POST["telepon"];
    $bintang = $_POST["bintang"];
    $deskripsi = $_POST["deskripsi"];
    
    $perintah = "UPDATE tbl_hotel SET nama='$nama', alamat='$alamat', urlmap='$urlmap', telepon='$telepon', bintang='$bintang', deskripsi='$deskripsi' WHERE id='$id'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Ubah Data SUkses!";
    }
    else{
        $response["kode"] = 1;
        $response["pesan"] = "Ubah Data Gagal!";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);