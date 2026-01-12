<?php
    include 'config.php';
    $id = $_GET['id'];

    mysqli_query($koneksi, "delete from pegawai where NIP='$id'");

    header("location:../Pegawai.php");
?>