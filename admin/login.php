<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bs/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fa/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body style="background-image: url(assets/img/bg/bg.png); background-size: cover; ">
    <center>
        <div class="box-login">
            <form class="form-login" action="cek_login.php" method="post">
            <h2 class="form-login-heading text-gray">Sign In</h2>
            <div class="login-wrap">
                <label for="">Username</label>
                <input type="text" class="form-control" placeholder="Username" autofocus name="username">
                <br>
                <label for="">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
                <hr>
                <?php 
                    if(isset($_GET['pesan'])){
                    if($_GET['pesan'] == "gagal"){
                        echo "Login gagal! username dan password salah!";
                    }else if($_GET['pesan'] == "logout"){
                        echo "Anda telah berhasil logout";
                    }else if($_GET['pesan'] == "belum_login"){
                        echo "Anda harus login untuk mengakses halaman admin";
                    }
                    }
                ?>
                <br>
                <button style="transition: 0.3s" class="btn btn-warning btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button> 
                <a href="../" style="transition: 0.3s; margin-top: 10px;" class="btn btn-danger btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> TO WEBSITE</a>          
            </div>
            </form>
        </div>
    </center>
</body>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bs/bootstrap.min.js"></script>
<script src="assets/js/fa/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="assets/js/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</html>