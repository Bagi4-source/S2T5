<?php

/**
 * Файл login.php для не авторизованного пользователя выводит форму логина.
 * При отправке формы проверяет логин/пароль и создает сессию,
 * записывает в нее логин и id пользователя.
 * После авторизации пользователь перенаправляется на главную страницу
 * для изменения ранее введенных данных.
 **/

// Отправляем браузеру правильную кодировку,
// файл login.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// Начинаем сессию.
session_start();

// В суперглобальном массиве $_SESSION хранятся переменные сессии.
// Будем сохранять туда логин после успешной авторизации.
if (!empty($_SESSION['login'])) {
    header('Location: ../');
}

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user = 'u52803';
    $pass = '9294062';
    $db = new PDO('mysql:host=localhost;dbname=u52803', $user, $pass, [PDO::ATTR_PERSISTENT => true]);

    // TODO: Проверть есть ли такой логин и пароль в базе данных.
    $login = 'German.bagdasaryan@mail.ru';
    $password = '7a5fbff8929221ea69bd2105279775f58';
    // Выдать сообщение об ошибках.
    try {
        $stmt = $db->prepare("SELECT * from logins where login = ? and password = ?");
        $stmt->execute([$login, md5($password)]);
        if (!$stmt) {
            print('Error : ' . $stmt->errorInfo());
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        print ($row['login']);
    } catch (PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
} // Иначе, если запрос был методом POST, т.е. нужно сделать авторизацию с записью логина в сессию.
else {
    $user = 'u52803';
    $pass = '9294062';
    $db = new PDO('mysql:host=localhost;dbname=u52803', $user, $pass, [PDO::ATTR_PERSISTENT => true]);

    // TODO: Проверть есть ли такой логин и пароль в базе данных.
    $login = $_POST['login'];
    $password = $_POST['password'];
    // Выдать сообщение об ошибках.
    try {
        $stmt = $db->prepare("SELECT password from logins where login = ?");
        $stmt->execute([$login]);
        if (!$stmt) {
            print('Error : ' . $stmt->errorInfo());
        }
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        print ($row);
    } catch (PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }

    // Если все ок, то авторизуем пользователя.
    $_SESSION['login'] = $_POST['login'];
    // Записываем ID пользователя.
    $_SESSION['uid'] = 123;

    // Делаем перенаправление.
    header('Location: ./');
}
