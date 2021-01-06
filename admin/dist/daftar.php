<?php
  session_start();

  if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}

    require '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin UMKM</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand"><?php echo $_SESSION['username']; ?></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="produk.php">
                                <div class="sb-nav-link-icon"></div>
                                Produk
                            </a>
                            <a class="nav-link active" href="daftar.php">
                                <div class="sb-nav-link-icon"></div>
                                Anggota
                            </a>
                            <a class="nav-link" href="kategori.php">
                                <div class="sb-nav-link-icon"></div>
                                Kategori
                            </a>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <!-- dashboard isi -->
                <div class="container">
                    <h5>Data Anggota</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           <td>No</td>
                           <td>Nama</td>
                           <td>No HP</td>
                           <td>Email</td>
                           <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1 ?>
                        <?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
                        <?php while($pecah=$ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['namalengkap_admin']; ?></td>
                            <td><?php echo $pecah['nomer_admin']; ?></td>
                            <td><?php echo $pecah['email_admin']; ?></td>
                            <td class="d-flex justify-content-center">
                                
            </div>
                                <a href="hapusadmin.php?id=<?php echo $pecah['id_admin']; ?>" class="btn-danger btn"  >Hapus</a>
                                
				                </td>
                        </tr>
                        <?php $nomor++; ?>
		                <?php } ?>
                    </tbody>
                </table>
                <div style="margin-left: 945px">
                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Tambah Anggota</button>
                </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsename">Username</label>
                                                <input required class="form-control py-4" id="inputUsername" type="text" name="username" placeholder="Masukan Username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input reqiured class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukan Password" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNamaLengkap">Nama Lengkap</label>
                                                <input required class="form-control py-4" id="inputNamaLengkap" type="text" name="namalengkap" placeholder="Masukan Nama Lengkap" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmail">E-mail</label>
                                                <input reqiured class="form-control py-4" id="inputEmail" type="email" name="email" placeholder="Masukan E-mail" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNomer">No HP</label>
                                                <input required class="form-control py-4" id="inputNomer" type="number" name="nomerhp" placeholder="Masukan No HP" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                                        </div>
                    </form>
                </div>
            </div>
            </div>
            
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>



        <?php
            if(isset($_POST['daftar'])){

    
            $nama = $_POST["username"];
            $password = $_POST["password"];
            $namalengkap = $_POST["namalengkap"];
            $email = $_POST["email"];
            $nomerhp = $_POST["nomerhp"];


    $sql = "INSERT INTO admin (nama_admin, password_admin, namalengkap_admin, email_admin, nomer_admin) 
            VALUES ('$nama', '$password', '$namalengkap', '$email', '$nomerhp')";
	$query = mysqli_query($koneksi, $sql);
    
    
    if($query) {
        echo "<script>alert('Berhasil Di Tambahkan!')</script>";
        echo "<meta http-equiv='refresh'content='1;url=daftar.php'>";
	}else{
        echo "<script>alert('Gagal Menambahkan Akun!')</script>";
        echo "<meta http-equiv='refresh'content='1;url=daftar.php'>";
    }
}

?>



    </body>
</html>