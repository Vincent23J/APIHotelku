<?php
    require("koneksi.php");
    $perintah = "SELECT * FROM tbl_hotel";
    $eksekusi = mysqli_query($konek, $perintah);
    
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] = array();
        
        while($ambil = mysqli_fetch_object($eksekusi)){
            $temp["id"] = $ambil->id;
            $temp["nama"] = $ambil->nama;
            $temp["alamat"] = $ambil->alamat;
            $temp["urlmap"] = $ambil->urlmap;
            $temp["telepon"] = $ambil->telepon;
            $temp["bintang"] = $ambil->bintang;
            $temp["deskripsi"] = $ambil->deskripsi;
            
            array_push($response["data"], $temp);
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Data Tidak Tersedia";
    }
    
    echo json_encode($response);
    mysqli_close($konek);