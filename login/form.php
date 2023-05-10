<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <div class="header">
        <?php
        if (!empty($_SESSION['login'])) {
            print(sprintf('<div class="user">
            <span class="login">
                %s
            </span>
        </div>
        <div class="buttons">
            <a href="./logout">
                <div class="log logout">Выйти</div>
            </a>
        </div>', $_SESSION['login']));

        } else {
            print('<div class="buttons">
            <a href="./login">
                <div class="log login">Войти</div>
            </a>
        </div>');
        }
        ?>

    </div>
</header>
<?php
if (!empty($messages)) {
    print('<div id="messages">');
    // Выводим все сообщения.
    foreach ($messages as $message) {
        print($message);
    }
    print('</div>');
}
?>
<form class="decor" method="POST">
    <div class="form-left-decoration"></div>
    <div class="form-right-decoration"></div>
    <div class="circle"></div>
    <div class="form-inner">
        <h3>Отправить заявку</h3>
        <input type="email" placeholder="Login" name="login" <?php if ($errors['login']) {
            print 'class="error"';
        } ?> required>
        <input type="password" placeholder="Password" name="password" <?php if ($errors['password']) {
            print 'class="error"';
        } ?> required>

        <input type="submit" value="Войти">

    </div>
</form>