<?php
require "koneksi.php";

if (isset($_POST['tambah'])) {
    tambah_data();
} elseif (isset($_POST['edit'])) {
    edit_data();
} elseif (isset($_POST['hapus'])) {
    hapus_data();
} elseif (isset($_POST['ganti'])) {
    ganti_gambar();
} else {
    redirect_page("Mohon masuk ke halaman data admin terlebih dahulu");
}

//function untuk menampilkan alert dan mendirect ke halaman data admin
function redirect_page($message)
{
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location="../view/mahasiswa";</script>';
}

function tambah_data()
{
    global $conn;
    $ukuran_gambar = $_FILES['gambar']['size'];
    if ($ukuran_gambar < 2044070) {
        $nim = $_POST['nim'];
        $level = "mahasiswa";

        if ($nim != "") {
            $password_mahasiswa = md5($nim);
            $username_mahasiswa = $nim;
            $cek_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
            $cek_mahasiswa2 = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username_mahasiswa'");
            $hasil_mahasiswa = mysqli_fetch_array($cek_mahasiswa);
            $hasil_mahasiswa2 = mysqli_fetch_array($cek_mahasiswa2);

            if (isset($hasil_mahasiswa['nim']) and isset($hasil_mahasiswa2['username']) and $hasil_mahasiswa['nim'] == $nim and $hasil_mahasiswa2['username'] == $username_mahasiswa) {
                redirect_page("NIM Mahasiswa yang anda masukkan sudah ada");
            } else {
                $add_user = mysqli_query($conn, "INSERT INTO tb_user (username, password, level) VALUES ('$username_mahasiswa', '$password_mahasiswa', '$level')");

                if ($add_user) {
                    $select_user = mysqli_query($conn, "SELECT id FROM tb_user WHERE username = '$username_mahasiswa'");

                    if ($select_user) {
                        $hasil_user = mysqli_fetch_array($select_user);
                        $id = $hasil_user['id'];
                        $nama = $_POST['nama'];
                        $kelas = $_POST['kelas'];
                        $prodi = $_POST['prodi'];
                        $jurusan = $_POST['jurusan'];
                        $alamat = $_POST['alamat'];

                        $nama_gambar_tmp = $_FILES['gambar']['name'];
                        $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
                        $file_tmp = $_FILES['gambar']['tmp_name'];

                        while (true) {
                            $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
                            $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE gambar_mahasiswa = '$nama_gambar'");
                            $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
                            if (isset($hasil_cek_gambar['gambar_mahasiswa']) and $hasil_cek_gambar['gambar_mahasiswa'] == $nama_gambar) {
                                continue;
                            } else {
                                break;
                            }
                        }

                        $tambah_mahasiswa = mysqli_query($conn, "INSERT INTO `tb_mahasiswa`(`nim`, `id_user`, `nama_mahasiswa`, `kelas`, `jurusan`, `prodi`, `alamat`, `gambar_mahasiswa`) VALUES ('$nim','$id','$nama','$kelas','$jurusan','$prodi','$alamat','$nama_gambar')");

                        if ($tambah_mahasiswa) {
                            move_uploaded_file($file_tmp, '../img/mahasiswa/' . $nama_gambar);
                            redirect_page("Penambahan data berhasil");
                        } else {
                            echo 1;
                            redirect_page("Penambahan data gagal, mohon kontak admin");
                        }
                    } else {
                        redirect_page("Username user tidak ditemukan, mohon kontak admin");
                    }
                } else {
                    echo 2;
                    redirect_page("Penambahan data gagal, mohon kontak admin");
                }
            }
        } else {
            redirect_page("NIMs harus diisi");
        }
    } else {
        redirect_page("Ukuran gambar melebihi 2MB, mohon kecilkan ukuran gambar");
    }
}

function hapus_data()
{
    global $conn;
    $nim = $_POST['nim'];
    $delete_mahasiswa = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE nim = '$nim'");

    if ($delete_mahasiswa) {
        $id = $_POST['id_user'];
        $delete_user = mysqli_query($conn, "DELETE FROM tb_user WHERE id = '$id'");
        if ($delete_user) {
            redirect_page("Penghapusan data berhasil");
        } else {
            redirect_page("Proses penghapusan gagal, mohon kontak admin");
        }
    } else {
        redirect_page("Proses penghapusan gagal, mohon kontak admin");
    }
}

function edit_data()
{
    global $conn;
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $nama_gambar_tmp = $_FILES['gambar']['name'];
    $gambar_tidak_update = false;

    if ($nama_gambar_tmp == '') {
        $select_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
        $hasil_cek_gambar = mysqli_fetch_array($select_nama_gambar);
        $nama_gambar = $hasil_cek_gambar['gambar_mahasiswa'];
        $gambar_tidak_update = true;
    } else {
        $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
        $file_tmp = $_FILES['gambar']['tmp_name'];

        while (true) {
            $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
            $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE gambar_mahasiswa = '$nama_gambar'");
            $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
            if (isset($hasil_cek_gambar['gambar_mahasiswa']) and $hasil_cek_gambar['gambar_mahasiswa'] == $nama_gambar) {
                continue;
            } else {
                break;
            }
        }

        //mengambil nama file gambar lama
        $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
        $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);
    }

    $update = mysqli_query($conn, "UPDATE `tb_mahasiswa` SET `nama_mahasiswa`='$nama',`kelas`='$kelas',`jurusan`='$jurusan',`prodi`='$prodi',`alamat`='$alamat',`gambar_mahasiswa`='$nama_gambar' WHERE nim = '$nim'");

    if ($update) {
        if (isset($hasil_gambar_lama['gambar_mahasiswa'])) {
            unlink('../img/mahasiswa/' . $hasil_gambar_lama['gambar_mahasiswa']);
        }
        if ($gambar_tidak_update == false) {
            move_uploaded_file($file_tmp, '../img/mahasiswa/' . $nama_gambar);
        }
        redirect_page("Data berhasil diedit");
    } else {
        redirect_page("Data gagal diedit, mohon kontak admin");
    }
}

function ganti_gambar()
{
    global $conn;
    $nim = $_POST['nim'];
    $nama_gambar_tmp = $_FILES['gambar']['name'];
    $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
    $file_tmp = $_FILES['gambar']['tmp_name'];

    while (true) {
        $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
        $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE gambar_mahasiswa = '$nama_gambar'");
        $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
        if (isset($hasil_cek_gambar['gambar_mahasiswa']) and $hasil_cek_gambar['gambar_mahasiswa'] == $nama_gambar) {
            continue;
        } else {
            break;
        }
    }

    //mengambil nama file gambar lama
    $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
    $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);

    if (isset($hasil_gambar_lama['gambar_mahasiswa'])) {
        unlink('../img/mahasiswa/' . $hasil_gambar_lama['gambar_mahasiswa']);
    }

    $ganti_gambar = mysqli_query($conn, "UPDATE tb_mahasiswa SET gambar_mahasiswa = '$nama_gambar' WHERE nim = '$nim'");

    if ($ganti_gambar) {
        move_uploaded_file($file_tmp, '../img/mahasiswa/' . $nama_gambar);
        echo '<script>alert("Gambar berhasil diedit");</script>';
        echo '<script>window.location="../view/profile";</script>';
    } else {
        echo '<script>alert("Gambar gagal diedit, mohon kontak admin");</script>';
        echo '<script>window.location="../view/profile";</script>';
    }
}