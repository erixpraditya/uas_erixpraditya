<?php
    #1. koneksikan file ini
    include("../koneksi.php");

    #2. Mengambil value dari form
    $id_divisi = $_POST ['id_divisi'];
    $nama_divisi = $_POST['nama_divisi'];
    
    #3. Menulis query
    $sunting = "UPDATE tabel_divisi SET id_divisi='$id_divisi', nama_divisi='$nama_divisi' WHERE id_divisi='$id_divisi'"; 
    
    #4. Jalankan query
    $proses = mysqli_query($koneksi, $sunting);

    #5. Mengalihkan halaman
    header("location:index.php");
?>