<?php
    include 'config.php';

    $ID_Peminjam =$_POST['id_peminjam'];
    $ID_Anggota =$_POST['id_anggota'];
    $ISBN =$_POST['isbn'];
    $Tgl_Peminjaman =$_POST['tgl_pinjam'];
    $Tgl_Pengembalian =$_POST['tgl_kembali'];

    mysqli_query($koneksi, "update peminjam set 
    ID_Anggota = '$ID_Anggota',
    ISBN = '$ISBN',
    Tgl_Peminjaman = '$Tgl_Peminjaman',
    Tgl_Pengembalian = '$Tgl_Pengembalian'
    where ID_Peminjam = '$ID_Peminjam'");

    header("location:../Peminjam.php");
?>