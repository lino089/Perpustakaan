<?php
    include 'config.php';
    $ID_Peminjam = $_POST['id_peminjam'];
    $ID_Anggota = $_POST['id_anggota'];
    $ISBN = $_POST['isbn'];
    $Tgl_Peminjaman = $_POST['tgl_pinjam'];
    $Tgl_Pengembalian = $_POST['tgl_kembali'];

    mysqli_query($koneksi, "insert into peminjam values('$ID_Peminjam', '$ID_Anggota', '$ISBN', '$Tgl_Peminjaman', '$Tgl_Pengembalian')");

    header("location:../Peminjam.php")
?>