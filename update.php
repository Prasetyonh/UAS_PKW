<?php
include 'koneksi.php';

if (isset($_POST["edit"])) {
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$no_ktp = $_POST['no_ktp'];
	$no_telp = $_POST['no_telp'];
	$tahun_masuk = date('Y-m-d', strtotime($_POST['tahun_masuk']));
	$query = mysqli_query($conn, "UPDATE data_karyawan SET nama='$nama', no_ktp='$no_ktp', no_telp='$no_telp', tahun_masuk='$tahun_masuk' where id = '$id'");
	header("location: index.php");
}
