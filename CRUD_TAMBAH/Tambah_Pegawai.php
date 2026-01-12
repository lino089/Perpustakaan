<?php
    include 'config.php';
    $NIP = $_POST['nip'];
    $Nama = $_POST['nama'];
    $Alamat = $_POST['alamat'];
    $Gender = $_POST['gender'];

    mysqli_query($koneksi, "insert into pegawai values('$NIP', '$Nama', '$Alamat', '$Gender')");

    header("location:../Pegawai.php");
    exit;
?>