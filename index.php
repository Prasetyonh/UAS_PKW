<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/style_home.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>DATA KARYAWAN</title>
</head>

<body id="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <b> <a class="navbar-brand " href="index.php">DATA KARYAWAN</a></b>
            <a href="logout.php">
                <button style="float:right" class="btn btn-light">LOGOUT</button>
            </a>
        </div>
    </nav>

    <div class="container data-mahasiswa mt-3">

        <div style="padding-bottom: 100px;">
            <a href="input.php" class="btn btn-primary mb-3">TAMBAH DATA</a>
            <table class="table table-striped" id="tabelMahasiswa">
                <thead>
                    <tr>
                        <th scope="col">NO </th>
                        <th scope="col">NAMA </th>
                        <th class="res" scope="col">NO. KTP </th>
                        <th class="res" scope="col">NO. TELEPON </th>
                        <th class="res" scope="col">TAHUN MASUK </th>
                        <th scope="col">MASA KERJA </th>
                        <th scope="col">AKSI </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'koneksi.php';


                    ?>

                    <?php

                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM data_karyawan");
                    while ($data = $query->fetch_assoc()) {


                        $tahun_masuk = $data['tahun_masuk'];

                        $lama = new DateTime($tahun_masuk);
                        $sekarang = new DateTime();

                        $masa_kerja = $sekarang->diff($lama);
                    ?>

                        <tr>

                            <!-- Menampilkan data mahasiswa-->
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td class="res"><?php echo $data['no_ktp']; ?></td>
                            <td class="res"><?php echo $data['no_telp']; ?></td>
                            <td class="res"><?php echo date('d M Y', strtotime($data['tahun_masuk'])) ?></td>
                            <td><?php echo $masa_kerja->y . "&nbsp" . "Tahun" ?></td>



                            <!-- Kolom untuk aksi data mahasiswa-->
                            <td>
                                <!-- detail -->
                                <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm text-white">DETAIL</a>
                                <!-- edit -->
                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                                <!-- delete -->
                                <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')">DELETE</a>
                            </td>

                        </tr>
                    <?php
                    } ?>

                </tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelMahasiswa').DataTable();
        });
    </script>


</body>

</html>