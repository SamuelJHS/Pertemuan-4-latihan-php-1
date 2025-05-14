<?php 
require 'function.php';

if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'index.php';
             </script>";
    } else {
        echo mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="style_login_register.css">
</head>
<body>
<h1>Halaman Registrasi</h1>
<form action="" method="post">
    <div class="login-container">
    <h1>Register</h1>
        <label for="username">User Name :</label>
        <input type="text" name="username" id="username">
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
        <label for="password2">Konfirmasi Password :</label>
        <input type="password" name="password2" id="password2">
        <button type="submit" name="register">Submit</button>
        <a href="login.php">Sudah punya akun!</a>
    </form>
</div>
</form>
</body>
</html>    