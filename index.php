<?php
session_start();

// jika tidak ada sesi login maka user dipindahkan ke login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$todo = query("SELECT * FROM todolist");
$user = query("SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="style_table.css">
</head>
<body>
<header>
    <h1>Samuel Jeremiah Hastiawan Serang</h1>
    <h2>235314009</h2>
</header>

<a href="logout.php">Logout</a>

<table border="1" cellpadding="10" cellsapcing="0">

    <tr>
        <h1>Daftar todolist</h1>
        <td>Id</td>
        <td>User_id</td>
        <td>Tugas</td>
        <td>Status</td>
        <td>Aksi</td>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($todo as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["user_id"]; ?></td>
        <td><?= $row["tugas"]; ?></td>
        <td><?= $row["status"]; ?></td>
        <td>
            <a href="aksi_ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="aksi_hapus.php?id=<?= $row["id"]; ?>"onclick="
            return confirm('yakin?')">hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table>
</body>
</html>