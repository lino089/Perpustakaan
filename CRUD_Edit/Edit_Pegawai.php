<?php
    include 'config.php';
    $NIP = $_POST['nip'];
    $Nama = $_POST['nama'];
    $Alamat = $_POST['alamat'];
    $Gender = $_POST['gender'];

    mysqli_query($koneksi, "update pegawai set 
    Nama = '$Nama',
    Alamat = '$Alamat',
    Gender = '$Gender'
    where NIP = '$NIP'");

    header("location:../pegawai.php");
?>