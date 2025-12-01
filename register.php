<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$pdo = require __DIR__ . '/db.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$password_confirm = $_POST['password_confirm'] ?? '';
$terms = isset($_POST['terms']);

$errors = [];

if (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $username)) {
    $errors[] = 'Uživatelské jméno musí být alfanumerické (3-20 znaků).';
}
if (strlen($password) < 6) {
    $errors[] = 'Heslo musí mít alespoň 6 znaků.';
}
if ($password !== $password_confirm) {
    $errors[] = 'Hesla se neshodují.';
}
if (!$terms) {
    $errors[] = 'Musíte souhlasit s podmínkami.';
}

if (!empty($errors)) {
    $_SESSION['register_errors'] = $errors;
    header('Location: index.php');
    exit;
}

// zkontrolovat existující uživatele
$stmt = $pdo->prepare('SELECT id FROM users WHERE username = ?');
$stmt->execute([$username]);
if ($stmt->fetch()) {
    $_SESSION['register_errors'] = ['Uživatelské jméno je již obsazeno.'];
    header('Location: index.php');
    exit;
}

// uložit uživatele (hash hesla)
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('INSERT INTO users (username, password_hash) VALUES (?, ?)');
$stmt->execute([$username, $hash]);

$_SESSION['register_success'] = 'Registrace proběhla úspěšně. Přihlaste se.';
header('Location: login.php');
exit;