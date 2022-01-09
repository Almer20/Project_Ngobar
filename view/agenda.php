<!-- Author by Muhd. Almeer Farsha and Maksalmina Ramadhan -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center
                            justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-weight: bold;">Agenda Kegiatan Organisasi</h1>
    </div>
    <!-- End Page Heading -->

    <!-- disini isi konten halaman -->
    <!-- Button trigger modal tambah data admin -->
    <button type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah
        Data</button>
    <!-- Akhir button tambah agenda -->

    <!-- modal tambah -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../proses/proses_tambah_agenda.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="id_agenda" id="floatingInput">
                                    <label for="floatingInput">ID Agenda</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nama_organisasi" id="floatingInput">
                                    <label for="floatingInput">Nama Organisasi</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="agenda_kegiatan" id="floatingPassword">
                            <label for="floatingPassword">Agenda Kegiatan</label>
                        </div>


                        <div class="form-floating mb-2">
                            <input type="datetime-local" class="form-control" name="tanggal" id="floatingInput">
                            <label for="floatingInput">Tanggal</label>
                        </div>


                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="hari" id="floatingPassword">
                            <label for="floatingPassword">Hari</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="tempat" id="floatingPassword">
                            <label for="floatingPassword">Tempat</label>
                        </div>
                        <input type="hidden" name="level" value="admin">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="keterangan" id="floatingPassword">
                            <label for="floatingPassword">Keterangan</label>
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
                                    <th>ID Agenda</th>
                                    <th>Nama Oraganisasi</th>
                                    <th>Agenda Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Hari</th>
                                    <th>Tempat</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_agenda = mysqli_query($conn, "SELECT * FROM tb_agenda");
                                while ($hasil_agenda = mysqli_fetch_array($select_agenda)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $hasil_agenda['id_agenda'] ?></th>
                                        <td><?= $hasil_agenda['nama_organisasi'] ?></td>
                                        <td><?= $hasil_agenda['agenda_kegiatan'] ?></td>
                                        <td><?= date("d-m-Y H:i:s", strtotime($hasil_agenda['tanggal'])); ?></td>
                                        <td><?= $hasil_agenda['hari'] ?></td>
                                        <td><?= $hasil_agenda['tempat'] ?></td>
                                        <td><?= $hasil_agenda['keterangan'] ?></td>
                                        <td>
                                            <?php
                                            if ($hasil_agenda['status'] == 1) echo "<span class='badge bg-warning text-dark'>Belum dimulai</span>";
                                            elseif ($hasil_agenda['status'] == 2) echo "<span class='badge bg-success'>Selesai</span>";
                                            ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">


                                                <!-- Button trigger modal edit -->
                                                <button type="button" class="btn btn-secondary mr-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $hasil_agenda['id_agenda'] ?>">
                                                    <i class="fas fa-pen-square"></i>
                                                </button>

                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="ModalEdit<?= $hasil_agenda['id_agenda'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="../proses/proses_agenda.php" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-floating mb-2">
                                                                                <input type="number" class="form-control" name="id_agenda" id="floatingInput" value="<?= $hasil_agenda['id_agenda'] ?>" readonly>
                                                                                <label for="floatingInput">ID Agenda</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="nama_organisasi" id="floatingInput" value="<?= $hasil_agenda['nama_organisasi'] ?>">
                                                                        <label for="floatingInput">Nama Organisasi</label>
                                                                    </div>

                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="agenda_kegiatan" id="floatingInput" value="<?= $hasil_agenda['agenda_kegiatan'] ?>">
                                                                        <label for="floatingInput">Agenda Kegiatan</label>
                                                                    </div>

                                                                    <div class="form-floating mb-2">
                                                                        <input type="datetime-local" class="form-control" name="tanggal" id="floatingPassword" value="<?= date("Y-m-d\TH:i:s", strtotime($hasil_agenda['tanggal'])) ?>">
                                                                        <label for="floatingPassword">Tanggal</label>
                                                                    </div>

                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="hari" id="floatingPassword" value="<?= $hasil_agenda['hari'] ?>">
                                                                        <label for="floatingPassword">Hari</label>
                                                                    </div>
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="tempat" id="floatingPassword" value="<?= $hasil_agenda['tempat'] ?>">
                                                                        <label for="floatingPassword">tempat</label>
                                                                    </div>
                                                                    <input type="hidden" name="level" value="admin">
                                                                    <div class="form-floating mb-2">
                                                                        <input type="text" class="form-control" name="keterangan" id="floatingPassword" value="<?= $hasil_agenda['keterangan'] ?>">
                                                                        <label for="floatingPassword">keterangan</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Akhir Modal Edit -->

                                                <!-- Button trigger modal hapus -->
                                                <button type="button" class="btn btn-danger mr-2" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $hasil_agenda['id_agenda'] ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="ModalHapus<?= $hasil_agenda['id_agenda'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="../proses/proses_agenda.php" method="post" enctype="multipart/form">
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id_agenda" value="<?= $hasil_agenda['id_agenda'] ?>">
                                                                    <input type="hidden" name="nama_organisasi" value="<?= $hasil_agenda['nama_organisasi'] ?>">
                                                                    Tekan Hapus untuk menghapus data
                                                                    <span style="color:red"><?= $hasil_agenda['id_agenda'] ?></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
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
    <!-- akhir isi konten halaman -->

</div>