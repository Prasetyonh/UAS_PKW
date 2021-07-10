<?php
include 'koneksi.php';

if (isset($_POST["simpan"])) {
	$nama = $_POST['nama'];
	$no_ktp = $_POST['no_ktp'];
	$no_telp = $_POST['no_telp'];
	$tahun_masuk = date('d, M, Y', strtotime($_POST['tahun_masuk']));
	$query = mysqli_query($conn, "INSERT INTO data_karyawan values('','$nama','$no_ktp','$no_telp','$tahun_masuk')");

	header("location:index.php");
}
