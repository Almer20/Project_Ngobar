<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mx-auto" style="width: 200px;">
        <div class="row">
            <div class="col">
                <div class="" style="width: 15rem;">
                    <img src="../img/profile/3.jpg" class="card-img-top rounded-circle mb-2" alt="...">
                </div>
            </div>

        </div>
    </div>
    <!-- End Page Heading -->

    <!-- disini isi konten halaman -->
    <div class="col">
        <div class="card">
            <h5 class="card-header">Settings</h5>
            <div class="card-body">
                <form action="../proses/proses_password.php" method="POST">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password
                                            Lama</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="ulangpasswordlama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword2" class="form-label">Password
                                            Baru</label>
                                        <input type="password" class="form-control" id="exampleInputPassword2"
                                            name="passwordbaru" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword3" class="form-label">Ulang Password
                                            Baru</label>
                                        <input type="password" class="form-control" id="exampleInputPassword3"
                                            name="ulangpasswordbaru" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Keluar</button>
                                    <input type="submit" class="btn btn-primary" value="Ganti" name="ganti">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir modal -->

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp"
                            name="username" value="<?= $_SESSION['username'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword4" class="form-label">Password</label>
                        <input type="password" name="passwordlama" class="form-control" id="exampleInputPassword4"
                            value="............" readonly>
                    </div>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ganti Password
                </button>
            </div>
        </div>
    </div>
    <!-- akhir isi konten halaman -->

</div>