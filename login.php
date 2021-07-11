<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location:index.php");
}
include "koneksi.php";
if (isset($_POST['flogin'])) {
    $username = $_POST['fusername'];
    $password = $_POST['fpassword'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = ('$password')");

    $cek = mysqli_num_rows($query);
    if ($cek == 1) {
        $_SESSION["login"] = true;

        header("location:index.php");
        exit;
    } else {
        echo '<script type="text/javascript">
                                alert("username / password SALAH");
                              </script>';
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <!------ Include the above in your HEAD tag ---------->
    <title>LOGIN DATA KARYAWAN</title>
</head>


<body>

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form method="post" action="">
                    </div>
                    <img src="img/usr.png" alt="">
                    <h3 class="text-center"> <b> LOGIN </b></h3>
                    <br>
                    <div class="form-group">
                        <label for="username" class="txt text-info">USERNAME</label><br>
                        <input input type="text" name="fusername" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="txt text-info">PASSWORD</label><br>
                        <input input type="password" name="fpassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="flogin" class="btn btn-info btn-md">LOGIN</button>
                    </div>
                    <div class="note">
                        Note : <br>
                        Username : admin <br>
                        Password : admin123
                    </div>
                    </form>

                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>