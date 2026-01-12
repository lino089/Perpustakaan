<?php
    include 'config.php';

    $ID_Anggota = $_POST['id'];
    $Nama = $_POST['nama'];
    $NIS = $_POST['nis'];
    $Alamat = $_POST['alamat'];
    $No_hp = $_POST['no_hp'];

    mysqli_query($koneksi, "update anggota set
    Nama =  '$Nama',
    NIS = '$NIS',
    Alamat = '$Alamat',
    No_hp = '$No_hp'
    where ID_Anggota = '$ID_Anggota'");

    header('location:../Anggota.php');
?>