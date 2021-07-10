<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style_data.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>EDIT DATA KARYAWAN</title>
</head>

<body>
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM  data_karyawan WHERE id='$id'");
    while ($data = mysqli_fetch_array($query)) { ?>
        <div id="input">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form method="POST" action="update.php" enctype="multipart/form-data">
                        </div>
                        <h3 class="text-center"> <b> EDIT DATA </b></h3>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="txt text-info">NAMA</label><br>
                            <input class="form-control" type="text" name="nama" value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="txt text-info">NO. KTP</label><br>
                            <input class="form-control" type="text" name="no_ktp" value="<?php echo $data['no_ktp']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="txt text-info">NO. TELEPON</label><br>
                            <input class="form-control" type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-info">TAHUN MASUK</label><br>
                            <input type="date" name="tahun_masuk" class="form-control" value="<?php echo $data['tahun_masuk']; ?>">
                        </div>
                        <div class=" form-group">
                            <input type="submit" name="edit" class="btn btn-info btn-md" onclick="return confirm('Anda yakin akan mengubah data ini?')" value="UPDATE">
                        </div>
                        </form>
                        <a href="index.php">
                            <button class="btn bg-light btn-md text-info">KEMBALI</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php
    }
    ?>
</body>

</html>