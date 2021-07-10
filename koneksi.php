<?php

$conn = mysqli_connect("localhost", "root", "", "uas_pkw");

if (mysqli_connect_error()) {
    echo "Koneksi  database gagal : " . mysqli_connect_error();
}
