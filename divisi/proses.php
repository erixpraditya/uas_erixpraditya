<?php
    #1. koneksikan file ini
    include("../koneksi.php");

    #2. Mengambil value dari form
    $id_divisi = $_POST['id_divisi'];
    $nama_divisi = $_POST['nama_divisi'];
    
    #3. Menulis query
    $simpan = "INSERT INTO tabel_divisi (id_divisi,nama_divisi) VALUES ('$id_divisi','$nama_divisi')";

    #4. Jalankan query
    $proses = mysqli_query($koneksi, $simpan);

    #5. Mengalihkan halaman
    header("location:index.php");
?>