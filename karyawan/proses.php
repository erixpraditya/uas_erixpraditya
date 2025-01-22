<?php
    #1. koneksikan file ini
    include("../koneksi.php");

    #2. Mengambil value dari form
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $posisi = $_POST['posisi'];
    $id_divisi = $_POST['id_divisi'];

    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    #3. Menulis query
    $simpan = "INSERT INTO tabel_karyawan (id_karyawan,nama_karyawan,posisi,id_divisi,foto) 
    VALUES ('$id_karyawan', '$nama_karyawan', '$posisi', '$id_divisi','$nama_foto')";

    #4. Jalankan query
    $proses = mysqli_query($koneksi, $simpan);

    #4.1 Proses upload file
    $upload_foto = move_uploaded_file($tmp_foto,"foto/$nama_foto");


    #5. Mengalihkan halaman
    header("location:index.php");
?>