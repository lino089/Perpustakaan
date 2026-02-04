<?php
    session_start();
    include "config.php";

    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        $query = mysqli_query($koneksi, "select * from users where username='$username' and password='$password'");
        $cek = mysqli_num_rows($query);

        if($cek > 0){
            $data = mysqli_fetch_assoc($query);

            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama_lengkap'];
            $_SESSION['role'] = $data['role'];

            if($data['role'] == "admin"){
                header("location:../admin/Dashboard.php");
            } else if($data['role'] == 'pegawai'){
                header("location:../pegawai/Dashboard.php");
            } elseif ($data['role'] == 'anggota'){
                header("location:../anggota/Dashboard.php");
            }
        }else{
            echo "<script>alert('Username atau Password salah!'); window.location='login.php'</script>";
        }
    }
?>