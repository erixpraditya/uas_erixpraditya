<?php
    #1. koneksikan file ini
    include("../koneksi.php");

    #2. Mengambil value dari form
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $posisi = $_POST['posisi'];
    $id_divisi = $_POST['id_divisi'];

    #3. Menulis query
    $sunting = "UPDATE tabel_karyawan SET id_karyawan='$id_karyawan', nama_karyawan='$nama_karyawan', posisi='$posisi', id_divisi='$id_divisi' WHERE id_karyawan='$id_karyawan'"; 
    
    #4. Jalankan query
    $proses = mysqli_query($koneksi, $sunting);

    #5. Mengalihkan halaman
    header("location:index.php");
?>