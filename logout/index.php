<?php
header('Content-Type: text/html; charset=UTF-8');
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
header('Referer: ' . $actual_link);
http_response_code(302);

session_start();
session_destroy();

http_redirect('../');
