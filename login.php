<?php
session_start();
$pdo = require __DIR__ . '/db.php';
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Nesprávné uživatelské jméno nebo heslo.';
    }
}

$flash = $_SESSION['register_success'] ?? null;
unset($_SESSION['register_success']);
?>
<!doctype html>
<html lang="cs">
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<main>
<section>
    <div class="form">
        <div class="form-header">
            <h2>Sign in</h2>
        </div>

        <?php if ($flash): ?>
            <div style="color:lightgreen; padding:10px;"><?= htmlspecialchars($flash) ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div style="color:#f25a5a; padding:10px;"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="login.php">
            <div class="form-main">
                <div class="form-main-inputs">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" required>
                </div>
                <div class="form-main-inputs">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>
                </div>
            </div>
            <div class="form-buttons">
                <button type="submit">Sign in</button>
            </div>
        </form>

        <div class="form-footer">
            <a href="index.php">
                <span>Don't have an account?</span>
                Register
            </a>
        </div>
    </div>
</section>
</main>
</body>
</html>