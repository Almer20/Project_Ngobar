<?php
//include koneksi database
require "koneksi.php";
//get data dari form
$id_agenda = $_POST['id_agenda'];
$nama_organisasi = $_POST['nama_organisasi'];
$agenda_kegiatan = $_POST['agenda_kegiatan'];
$tanggal = $_POST['tanggal'];
$hari = $_POST['hari'];
$tempat = $_POST['tempat'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

//query insert data ke dalam database
$query = "INSERT INTO `tb_agenda` (`id_agenda`,`nama_organisasi`, `agenda_kegiatan`,`tanggal`,`hari`,`tempat`,`keterangan`, `status`) 
VALUES ('$id_agenda','$nama_organisasi', '$agenda_kegiatan', '$tanggal', '$hari', '$tempat', '$keterangan', '$status')";
//kondisi pengecekan apakah data berhasil dimasukkan atau tidak

$insert = mysqli_query($conn, $query);
if ($insert) {
    //redirect ke halaman index.php 
    echo '<script>window.location="../view/agenda";</script>';
} else {
    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
}
