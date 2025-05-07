<?php
session_start();

// jika tidak ada sesi login maka user dipindahkan ke login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$todo = query("SELECT * FROM todolist");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
<header>
    <h1>Samuel Jeremiah Hastiawan Serang</h1>
    <h2>235314009</h2>
</header>
<a href="logout.php">Logout</a>

<h1>Daftar todolist</h1>

<a href="tambah.php">tambah data Todolist</a>
<br></br>
<a href="todolist.php">ubah tugas Todolist</a>
<br></br>
<table border="1" cellpadding="10" cellsapcing="0">

    <tr>
        <td>Id</td>
        <td>Nim</td>
        <td>username</td>
        <td>Tugas</td>
        <td>Status</td>
        <td>Aksi</td>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($todo as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row["nim"]; ?></td>
        <td><?= $row["username"]; ?></td>
        <td><?= $row["tugas"]; ?></td>
        <td><?= $row["status"]; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>"onclick="
            return confirm('yakin?')">hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>