<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project karyawan</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body>

<?php

include_once('../navbar.php');
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6 m-auto">
            <div class="card">
        <div class="card-header text-center">
            <h3>Form Data karyawan</h3>
        </div>
        <div class="card-body">
        <form action="proses.php" method="POST" enctype="multipart/form-data">    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">id_karyawan</label>
                        <input type="text" name="id_karyawan" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Posisi</label>
                        <input type="text" name="posisi" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Divisi</label>
                        <select class="form-control" name="id_divisi" id="">
                            <option value="">-Pilih Divisi-</option>
                            <?php
                                include('../koneksi.php');
                                $sql_div = "SELECT * FROM tabel_divisi";
                                $qry_div = mysqli_query($koneksi, $sql_div);
                                foreach ($qry_div as $data_div) {
                                    ?>
                                    <option value="<?=$data_div['id_divisi']?>"><?=$data_div['nama_divisi']?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input type="file" name="foto" accept="image/*" class="form-control" id="exampleInputPassword1">
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
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