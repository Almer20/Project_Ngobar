<?php
$select_id = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'");
$hasil_id = mysqli_fetch_array($select_id);
$id_user = $hasil_id['id'];

$select = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_user = '$id_user'");
$hasil = mysqli_fetch_array($select);
?>

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- End Page Heading -->

    <!-- disini isi konten halaman -->
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <!-- Button trigger modal -->
                    <form action="../proses/prosesDataMahasiswa.php" method="POST" enctype="multipart/form-data">
                        <div class="image-upload">
                            <label for="file-input">
                                <img class="rounded-circle mt-5" width="300px" src="<?= "../img/mahasiswa/" . $hasil['gambar_mahasiswa']; ?>" onclick="tes();">
                            </label>
                            <input id="file-input" type="file" name="gambar">
                            <input type="hidden" name="nim" value="<?= $hasil['nim'] ?>">
                            <center><input type="submit" class="btn btn-primary" id="tombol" value="ganti gambar" name="ganti"></center>
                        </div>
                    </form>
                    <span style="font-size: 15px;" id="myDIV">Tekan gambar untuk mengganti gambar</span>

                    <span class=" font-weight-bold"><?= $_SESSION['nama']; ?></span>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <label class="labels" for="nama">Nama</label><input type="text" id="nama" class="form-control" value="<?= $hasil['nama_mahasiswa'] ?>">
                    <label class="labels">Nim</label><input type="text" class="form-control" value="<?= $hasil['nim'] ?>">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Kelas</label><input type="text" class="form-control" value="<?= $hasil['kelas'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control" value="<?= $hasil['alamat'] ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Jurusan</label><input type="text" class="form-control" value="<?= $hasil['jurusan'] ?>"></div>
                        <div class="col-md-6"><label class="labels">prodi</label><input type="text" class="form-control" value="<?= $hasil['prodi'] ?>"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                            Profile</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- akhir isi konten halaman -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var y = document.getElementById("tombol");
    y.style.display = "none";

    function tes() {
        var x = document.getElementById("myDIV");

        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "block";
        }
    }
</script>