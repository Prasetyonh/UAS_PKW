<?php
//memanggil file config.php
include 'koneksi.php';
//menangkap id yang di kirimkan melalui button detail
$id = $_GET['id'];
//melakukan quey untuk mendapatkan data mahasiswa berdasarkan $id
$query = mysqli_query($conn, "select * from data_karyawan where id='$id'");
while ($data = mysqli_fetch_assoc($query)) {
    $tahun_masuk = $data['tahun_masuk'];

    $lama = new DateTime($tahun_masuk);
    $sekarang = new DateTime();

    $masa_kerja = $sekarang->diff($lama);
?>

    <!DOCTYPE html>
    <html>

    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style_data.css">
        <link rel="shortcut icon" href="img/favicon.ico">
        <!------ Include the above in your HEAD tag ---------->
        <title><?php echo $data['nama'] ?></title>
    </head>

    <body>

        <body onload="window.print();">
            <div id="login">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                            </div>


                            <h3 class="text-center"> <b> DETAIL DATA </b></h3>
                            <div class="form-group">
                                <label for="username" class="txt text-info">NAMA</label><br>
                                <p class="form-control"> <?php echo $data['nama'] ?> </p>
                            </div>
                            <div class="form-group">
                                <label for="username" class="txt text-info">NO. KTP</label><br>
                                <p class="form-control"> <?php echo $data['no_ktp'] ?> </p>
                            </div>
                            <div class="form-group">
                                <label for="username" class="txt text-info">NO. TELEPON</label><br>
                                <p class="form-control"> <?php echo $data['no_telp'] ?> </p>
                            </div>
                            <div class="form-group">
                                <label for="username" class="txt text-info">TAHUN MASUK</label><br>
                                <p class="form-control"><?php echo date('d M Y', strtotime($data['tahun_masuk'])) ?> </p>
                            </div>
                            <div class="form-group">
                                <label class="text-info">MASA KERJA</label><br>
                                <p class="form-control"><?php echo $masa_kerja->y . "&nbsp" . "Tahun" ?></p>
                            </div>
                        </div>


                    <?php
                }
                    ?>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </body>

    </html>