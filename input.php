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
    <link rel="stylesheet" href="css/style_data.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <!------ Include the above in your HEAD tag ---------->
    <title></title>
</head>

<body>

    <div id="input">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <form method="POST" action="store.php" enctype="multipart/form-data">
                    </div>
                    <h3 class="text-center"> <b> INPUT DATA </b></h3>
                    <div class="form-group">
                        <label class="txt text-info">NAMA</label><br>
                        <input input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="txt text-info">NO. KTP</label><br>
                        <input input type="text" name="no_ktp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="txt text-info">NO. TELEPON</label><br>
                        <input type="text" name="no_telp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-info">TAHUN MASUK</label><br>
                        <input type="date" name="tahun_masuk" class="form-control" value="<?php echo $data['tahun_masuk']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="simpan" class="btn btn-info btn-md" value="SIMPAN">SIMPAN</button>
                    </div>
                    </form>
                    <a href="index.php">
                        <button class="btn bg-light btn-md text-info">KEMBALI</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>