<?php
    include 'config.php';
    $ISBN =$_POST['isbn'];
    $Judul = $_POST['judul']; 
    $Pengarang = $_POST['pengarang']; 
    $Penerbit = $_POST['penerbit']; 
    $Tahun = $_POST['tahun']; 
    $Genre = $_POST['genre'];
    
    mysqli_query($koneksi, "insert into buku values('$ISBN', '$Judul', '$Pengarang', '$Penerbit', '$Tahun', '$Genre')");

    header("location:../Buku.php");
?>
