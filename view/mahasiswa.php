<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Data Admin</h1>
    </div>
    <!-- End Page Heading -->

    <!-- Button trigger modal tambah data admin -->
    <button type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah
        Data</button>

    <!-- modal tambah -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../proses/prosesDataMahasiswa.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control" name="nim" id="floatingInput">
                                    <label for="floatingInput">NIM</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nama" id="floatingInput">
                                    <label for="floatingInput">Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="jk"
                                    name="jurusan" value="jurusan">
                                    <option>Jurusan</option>
                                    <option value="TIK">TIK</option>
                                    <option value="ELektro">ELektro</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select mb-3" aria-label="Default select example" id="jk"
                                    name="prodi" value="prodi">
                                    <option>Prodi</option>
                                    <option value="TIK">TIK</option>
                                    <option value="TRKJ">TRKJ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" maxlength="2" name="kelas" id="floatingPassword">
                            <label for="floatingPassword">Kelas</label>
                        </div>
                        <input type="hidden" name="level" value="admin">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="alamat" id="floatingPassword">
                            <label for="floatingPassword">Alamat</label>
                        </div>
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir modal tambah -->

    <!-- Content Row -->
    <div class="row">
        <!-- card krs-->
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nim</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Prodi</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                                while ($hasil_mahasiswa = mysqli_fetch_array($select_mahasiswa)) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $hasil_mahasiswa['nim'] ?></th>
                                    <td>
                                        <img src="<?= "../img/mahasiswa/" . $hasil_mahasiswa['gambar_mahasiswa']; ?>"
                                            width="100" height="100" class="card-img-top" alt="...">
                                    </td>
                                    <td><?= $hasil_mahasiswa['nama_mahasiswa'] ?></td>
                                    <td><?= $hasil_mahasiswa['kelas'] ?></td>
                                    <td><?= $hasil_mahasiswa['prodi'] ?></td>
                                    <td><?= $hasil_mahasiswa['alamat'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- Button trigger modal edit -->
                                            <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?= $hasil_mahasiswa['nim'] ?>">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="ModalEdit<?= $hasil_mahasiswa['nim'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="../proses/prosesDataMahasiswa.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="number" class="form-control"
                                                                                name="nim" id="floatingInput"
                                                                                value="<?= $hasil_mahasiswa['nim'] ?>"
                                                                                readonly>
                                                                            <label for="floatingInput">NIM</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mb-2">
                                                                            <input type="text" class="form-control"
                                                                                name="nama" id="floatingInput"
                                                                                value="<?= $hasil_mahasiswa['nama_mahasiswa'] ?>">
                                                                            <label for="floatingInput">Nama</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example" id="jk"
                                                                            name="jurusan"
                                                                            value="<?= $hasil_mahasiswa['jurusan'] ?>">
                                                                            <option><?= $hasil_mahasiswa['jurusan'] ?>
                                                                            </option>
                                                                            <option value="TIK">TIK</option>
                                                                            <option value="ELektro">ELektro</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col">
                                                                        <select class="form-select mb-3"
                                                                            aria-label="Default select example" id="jk"
                                                                            name="prodi"
                                                                            value="<?= $hasil_mahasiswa['prodi'] ?>">
                                                                            <option><?= $hasil_mahasiswa['prodi'] ?>
                                                                            </option>
                                                                            <option value="TIK">TIK</option>
                                                                            <option value="TRKJ">TRKJ</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control"
                                                                        maxlength="2" name="kelas" id="floatingPassword"
                                                                        value="<?= $hasil_mahasiswa['kelas'] ?>">
                                                                    <label for="floatingPassword">Kelas</label>
                                                                </div>
                                                                <input type="hidden" name="level" value="admin">
                                                                <div class="form-floating mb-2">
                                                                    <input type="text" class="form-control"
                                                                        name="alamat" id="floatingPassword"
                                                                        value="<?= $hasil_mahasiswa['alamat'] ?>">
                                                                    <label for="floatingPassword">Alamat</label>
                                                                </div>
                                                                <div class="input-group mb-2">
                                                                    <input type="file" class="form-control"
                                                                        id="inputGroupFile02" name="gambar">
                                                                    <label class="input-group-text"
                                                                        for="inputGroupFile02">Upload</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" name="edit"
                                                                    value="Edit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Edit -->

                                            <!-- Button trigger modal hapus -->
                                            <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalHapus<?= $hasil_mahasiswa['nim'] ?>">
                                                <i class="fas fa-user-slash"></i>
                                            </button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="ModalHapus<?= $hasil_mahasiswa['nim'] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="../proses/prosesDataMahasiswa.php" method="post"
                                                            enctype="multipart/form">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="nim"
                                                                    value="<?= $hasil_mahasiswa['nim'] ?>">
                                                                <input type="hidden" name="id_user"
                                                                    value="<?= $hasil_mahasiswa['id_user'] ?>">
                                                                Tekan Hapus untuk menghapus data
                                                                <span
                                                                    style="color:red"><?= $hasil_mahasiswa['nama_mahasiswa'] ?></span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"
                                                                    name="hapus">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Hapus -->

                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content Row -->

</div>