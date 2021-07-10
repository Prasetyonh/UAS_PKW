<?php
//koneksi database
include 'koneksi.php';

//menangkap data id yang dikirim dari url karena delete hanya membutuhkan id
$id = $_GET['id'];

//menghapus data dari database
mysqli_query($conn, "delete from data_karyawan where id='$id'");

//mengalihkan halaman kembali ke index.php
header("location:index.php");
