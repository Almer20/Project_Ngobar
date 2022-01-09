<?php
require "../proses/koneksi.php";
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM tb_user WHERE username = '$username' and password ='$password'";
$hasil = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($hasil);

$select_nama = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_user = '$row[id]'");
$hasil_nama = mysqli_fetch_array($select_nama);

if ($hasil) {
    if (isset($row['username']) && isset($row['password']) && $row['username'] == $username && $row['password'] == $password) {
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $hasil_nama['nama_mahasiswa'];
        $_SESSION['nama_gambar'] = $hasil_nama['gambar_mahasiswa'];
        echo '<script>alert("login berhasil");</script>';
        echo '<script>window.location="../template";</script>';
    } else {
        echo '<script>alert("Mohon maaf username atau password yang anda masukkan salah");</script>';
        echo '<script>alert("login gagal");</script>';
        echo '<script>window.location="../sign-in";</script>';
    }
}
