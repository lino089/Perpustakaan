<?php
    include 'config.php';
    $id = $_GET['id'];

    mysqli_query($koneksi, "delete from anggota where ID_Anggota='$id'");

    header("location:../Anggota.php");
?>