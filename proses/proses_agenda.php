<?php

require "koneksi.php";
if (isset($_POST['hapus'])) {
    hapus_data();
} elseif (isset($_POST['edit'])) {
    edit_data();
}

function redirect_page($message)
{
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location="../view/agenda";</script>';
}

function hapus_data()
{
    global $conn;
    $id_agenda = $_POST['id_agenda'];
    $query = "DELETE FROM tb_agenda WHERE id_agenda = '$id_agenda'";
    if ($conn->query($query)) {
        header("location: ../view/agenda");
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
}
function edit_data()
{
    global $conn;
    $id_agenda = $_POST['id_agenda'];
    $nama_organisasi = $_POST['nama_organisasi'];
    $agenda_kegiatan = $_POST['agenda_kegiatan'];
    $tanggal = $_POST['tanggal'];
    $hari = $_POST['hari'];
    $tempat = $_POST['tempat'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    $update = mysqli_query($conn, "UPDATE `tb_agenda` SET `nama_organisasi` = '$nama_organisasi', `agenda_kegiatan` = '$agenda_kegiatan', `tanggal` = '$tanggal',
    `hari` = '$hari', `tempat` = '$tempat', `keterangan` = '$keterangan', `status` = '$status'  WHERE `id_agenda` = '$id_agenda'");

    if ($update) {
        //redirect ke halaman index.php 
        echo '<script>window.location="../view/agenda";</script>';
    } else {
        //pesan error gagal insert data
        echo '<script>alert("Tanggal wajib diisi");</script>';
        echo '<script>window.location="../view/agenda";</script>';
    }
}

 //query insert data ke dalam database
    // $query = "UPDATE INTO `tb_agenda` SET `nama_organisasi` = $nama_organisasi',`agenda_kegiatan` = '$agenda_kegiatan' ,`tanggal` = '$tanggal' 
    // ,`hari` = '$hari' ,`tempat` = $tempat',`keterangan` = '$keterangan' WHERE `id_agenda` = $id_agenda";