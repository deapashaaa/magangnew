<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- UBAH FONT NYA  -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- DI BAWAH INI LINK CSS YANG DILIAT LAGI  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body >

<main>
    <div class="header">
    <img src="image\Logo_BUMN.png" alt="logo_BUMN" class="logo1">
    <img src="image\Logo_PLNSAMPING.png" alt="logo_PLN" class="logo2">
    <img src="image\Logo_Transformasi.png" alt="logo_TFM" class="logo3">
    </div>


    <div id="bg-login"> 
    <div class="box-login">
        <div class="avatar">
            <i class="fa fa-user"></i>
        </div>
        <h2>Login Admin</h2>
        <p>Silahkan masukkan username & password admin!</p>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" class="input">
            <br>
            <input type="password" name="password" placeholder="password" class="input">
            <br>
            <input type="submit" name="submit" value="Login" class="btn" >
        </form>

        <?php
            if (isset($_POST['submit'])) {
                session_start();
                include 'koneksi.php';

                $username = mysqli_real_escape_string ($koneksi, $_POST['username']);
                $password = mysqli_real_escape_string ($koneksi, $_POST['password']);

                $cek = mysqli_query ($koneksi, "SELECT * FROM tb_admin WHERE username = '".$username."' AND password = '".$password."'");
                if (mysqli_num_rows($cek)> 0){
                    $d = mysqli_fetch_object ($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->id_admin;
                    echo '<script>window.location="home.php"</script>';
                    // INI HARUSNYO MASUK KE PANEL ADMIN BUKAN HOME 
                }else{
                    echo '<script>alert("Username atau password Anda salah! Silahkan login kembali.")</script>';
                }
            }
        ?>
    </div>
    </div>
</main>
</body>
</html>