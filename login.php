<?php 
session_start();
$pesan="";
if (isset($_POST['tombol'])){
    //1. Koneksi database
    include_once ("koneksi.php");

    //2. Mengambil value dari input
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    //3. tuliskan query pengecekan apakah data login tersedia di database
    $sql_cek = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

    //4. menjalankan query diatas
    $qry_cek = mysqli_query($koneksi,$sql_cek);

 

    //5. pengecekan lanjutan
    $cek = mysqli_num_rows($qry_cek);

    //6. buatkan if 

    if($cek > 0){
      //Login berhasil
      //4.1. Mengambil data lainnya dari tabel users berdasarkan data login
      $ambil = mysqli_fetch_array($qry_cek);
      $nama_login = $ambil['nama'];
      $id_login = $ambil['id'];
      
      //Pembuatan Session
      $_SESSION['sid'] = $id_login;
      $_SESSION['semail'] = $email;
      $_SESSION['snama'] = $nama_login;

      //Pembuatan Cookie
      if($_POST['cek'] == "yes"){
        setcookie("cid",$id_login,time()+(60*60*24*90),"/");
        setcookie("cemail",$email,time()+(60*60*24*90),"/");
        setcookie("cnama",$nama_login,time()+(60*60*24*90),"/");
      }

      header("location:index.php");
    }else{
      //Login gagal
      $pesan = '<div class="alert alert-danger" role="alert">
                Login Gagal 
                </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project IS62</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>


<div class="container">
    <div class="row mt-5">
        <div class="col-8 m-auto">
          <?=$pesan?>
            <div class="card">
            <div class="card-header text-center">
                <h3>Sistem Informasi Mahasiswa</h3>
            </div>
            <div class="card-body">
              <form method="post" action="login.php">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" name="cek" value="yes" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
                </div>
                <button type="submit" name="tombol" class="btn btn-primary">Log In</button>
              </form>
            </div>
            </div>
        </div>
    </div>
</div>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>