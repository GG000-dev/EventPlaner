<?php
session_start();
$f = "users.txt";
$u = trim($_POST['user']);
$p = $_POST['password'];
$lines = file_exists($f) ? file($f, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES) : [];

if (isset($_POST['reg'])) {
    file_put_contents($f, "$u\t".password_hash($p, PASSWORD_DEFAULT)."\n", FILE_APPEND|LOCK_EX);
}

foreach ($lines as $l) {
    [$name, $hash] = explode('\t', $l);
    if ($name === $u) {
        if (password_verify($p, $hash)) {
            $_SESSION[$u] = $u;
        }
    }
}
header('Location: /index.html');
exit;