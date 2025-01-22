<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data karyawan</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body>

<?php

    include_once('../navbar.php');
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12 m-auto">
            <div class="card">
        <div class="card-header">
            <h3 class="float-start">Data karyawan</h3>
            <p class="float-end"><a class="btn btn-primary" href="form.karyawan.php"><i class="fa-solid fa-circle-plus"></i>Tambah Data</a></p>
        </div>
        <div class="card-body">
        <table class="table table-striped">

                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id karyawan</th>
                        <th scope="col">Nama karyawan</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Action
                        </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        #1. koneksikan file ini
                        include("../koneksi.php");

                        #2. Menulis query
                         $tampil = "SELECT *,tabel_karyawan.id_divisi FROM tabel_karyawan INNER JOIN tabel_divisi ON tabel_karyawan.id_divisi=tabel_divisi.id_divisi";
                         
                        #3. Jalankan query
                        $proses = mysqli_query($koneksi, $tampil);

                        #4. looping data dari database
                        $nomor = 1;
                        foreach($proses as $data){

                        ?>
                        <tr>
                        <th scope="row"><?=$nomor++?></th>
                        <td><?= $data['id_karyawan']?></td>
                        <td><?= $data['nama_karyawan']?></td>
                        <td><?= $data['posisi']?></td>
                        <td><?= $data['nama_divisi']?></td>
                        <td>
                             <!-- TOMBOL DETAIL -->
                             <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?=$data['id_karyawan']?>">
                            <i class="fa-solid fa-eye"></i>
                            </button>

                            <!-- MODAL DETAIL-->
                            <div class="modal fade" id="detail<?=$data['id_karyawan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data <?=$data['nama_karyawan']?> </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                     <img width="200" src="foto/<?=$data['foto']?>" alt="">
                                     <table class="table">
                                     <tr>
                                            <td scope="col">Id karyawan</td>
                                            <th scope="col"> : <?=$data['id_karyawan']?></th>
                                        </tr>
                                        <tr>
                                            <td scope="col">Nama karyawan</td>
                                            <th scope="col"> : <?=$data['nama_karyawan']?></th>
                                        </tr>
                                        <tr>
                                            <td scope="col">Posisi</td>
                                            <th scope="col"> : <?=$data['posisi']?></th>
                                        </tr>
                                        <tr>
                                            <td scope="col">Divisi</td>
                                            <th scope="col"> : <?=$data['id_divisi']?></th>
                                        </tr>
                                     </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    
                                </div>
                                </div>
                            </div>
                            </div>

                            <!-- Tombol Edit -->
                            <a class="btn btn-info btn-sm text-white" href="edit.php?id=<?= $data['id_divisi']?>"><i class="fa fa-pen-to-square"></i></a>

                            <!-- Towmbol Hapus -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?=$data['id_karyawan']?>">
                            <i class="fa-solid fa-trash"></i>
                            </button>

                            <div class="modal fade" id="hapus<?=$data['id_karyawan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin Data <b><?=$data['nama_karyawan']?></b> ingin di hapus ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href ="hapus.php?xyz=<?=$data['id_karyawan']?>" class="btn btn-primary">Hapus</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
            </div>
         </div>

        </div>
    </div>
</div>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/all.js"></script>
</body>
</html>