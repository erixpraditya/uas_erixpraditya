<?php
#1. Koneksi ke database
include("../koneksi.php");

#2. ambil id yang akan di sunting 
$id = $_GET['id'];

#3. mengambil semua record data berdasarkan id yang di pilih 
$ambil = "SELECT * FROM tabel_karyawan WHERE id_karyawan='$id'";

#4. menjalankan querry 
$edit = mysqli_query($koneksi, $ambil);

#5. memisahkan record data berdasarkan field /kolom
$data = mysqli_fetch_array($edit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project IS62</title>
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
                    <h3>Form Edit Data Karyawan</h3>
                </div>
                <div class="card-body">
                    <form action="update.php" method="POST">
                        <input type="hidden" name="id_karyawan" value="<?=$data['id_karyawan']?>">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">ID Karyawan</label>
                            <input type="text" value="<?=$data['id_karyawan']?>" name="id_karyawan" class="form-control" id="exampleInputPassword1" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Karyawan</label>
                            <input type="text" value="<?=$data['nama_karyawan']?>" name="nama_karyawan" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Posisi</label>
                            <input type="text" value="<?=$data['posisi']?>" name="posisi" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Divisi</label>
                            <input type="text" value="<?=$data['nama_divisi']?>" name="nama_divisi" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
