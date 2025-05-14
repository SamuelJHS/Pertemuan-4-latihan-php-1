<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];

// Tambah tugas
if (isset($_POST["submit"])) {
    tambah($_POST);
}

// Tandai selesai
if (isset($_GET["selesai"])) {
    $id = $_GET["selesai"];
    mysqli_query($conn, "UPDATE todolist SET status='1' 
                         WHERE id=$id AND user_id=$user_id");
    header("Location: todolist.php");
    exit;
}

// Ambil data to-do milik user yang login
$todo = query("SELECT * FROM todolist WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>To Do List</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        header { background: #4CAF50; color: white; padding: 15px; text-align: center; border-radius: 10px; }
        img { width: 100px; border-radius: 50%; margin-top: 10px; }
        .container { background: white; padding: 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        .todo-item { margin-bottom: 10px; padding: 10px; border-bottom: 1px solid #ddd; }
        .todo-actions a { margin-left: 10px; text-decoration: none; color: blue; }
        .todo-actions a:hover { text-decoration: underline; }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<a href="logout.php">Logout</a>

<div class="todo-container">
    <form action="" method="post">
        <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"]; ?>">
        <input type="text" name="tugas" placeholder="Teks to do" required>
        <button type="submit" name="submit">Tambah</button>
    </form>

    <?php foreach ($todo as $row): ?>
        <div class="todo-item">
             <span class="<?= $row["status"] == 1 ? 'done' : '' ?>">
                <?= htmlspecialchars($row["tugas"]); ?>
            </span>
            <div>
            <?php if ($row["status"] == 0): ?>
                <a href="todolist.php?selesai=<?= $row["id"]; ?>">Selesai</a>
            <?php else: ?>
                <span style="color: green;">(Selesai)</span>
            <?php endif; ?>
            <a href="todolist_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin hapus?');">Hapus</a>
        </div>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
