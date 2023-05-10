<?php
header('Content-Type: text/html; charset=UTF-8');
http_response_code(302);

session_start();
session_destroy();
require "../index.php";
resetCookie();

if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ../');
}
