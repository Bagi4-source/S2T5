<?php
header('Content-Type: text/html; charset=UTF-8');
http_response_code(302);

session_destroy();

if (isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ../');
}
