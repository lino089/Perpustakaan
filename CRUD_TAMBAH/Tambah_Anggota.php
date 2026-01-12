<?php
    include 'config.php';
    $ID_Anggota =$_POST['ID'];
    $Nama =$_POST['nama'];
    $NIS =$_POST['NIS'];
    $Alamat =$_POST['alamat'];
    $No_hp =$_POST['no_hp'];
    mysqli_query($koneksi, "insert into anggota values('$ID_Anggota', '$Nama', '$NIS', '$Alamat', '$No_hp')");

    header("location: ../Anggota.php");
    exit;
?>