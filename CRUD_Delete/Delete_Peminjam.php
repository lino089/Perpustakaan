<?php
    include 'config.php';
    $id = $_GET['id'];

    mysqli_query($koneksi, "delete from peminjam where ID_Peminjam='$id'");

    header("location:../peminjam.php");
?>