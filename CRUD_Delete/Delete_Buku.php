<?php
    include 'config.php';
    $id = $_GET['id'];

    mysqli_query($koneksi, "delete from buku where ISBN='$id'");

    header("location:../Buku.php");
?>