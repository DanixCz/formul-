<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$username = htmlspecialchars($_SESSION['username']);
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<main>
<section>
    <div class="form">
        <div class="form-header">
            <h2>Welcome, <?= $username ?></h2>
        </div>
        <div style="padding:20px; color:rgba(255,255,255,0.9);">
            Jste přihlášen(a).
        </div>
        <div class="form-buttons" style="padding-top: 10px; width: 100%;">
            <a href="logout.php"><button type="button">Logout</button></a>
        </div>
    </div>
</section>
</main>
</body>
</html>