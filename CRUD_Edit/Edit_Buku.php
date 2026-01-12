<?php
    include'config.php';

    $ISBN_Lama = $_POST['isbn_lama'];
    $ISBN_Baru = $_POST['isbn'];
    $Judul = $_POST['judul'];
    $Pengarang = $_POST['pengarang'];
    $Genre = $_POST['genre'];
    $Penerbit = $_POST['penerbit'];
    $Tahun = $_POST['tahun'];


    mysqli_query($koneksi, "update buku set
    ISBN = '$ISBN_Baru',
    Judul = '$Judul',
    Pengarang = '$Pengarang',
    Penerbit ='$Penerbit',
    Tahun = '$Tahun',
    Genre = '$Genre'
    where ISBN = '$ISBN_Lama'");

    header('location:../Buku.php');
?>