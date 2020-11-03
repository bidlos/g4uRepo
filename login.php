<?php
require_once "views/header-small.php";
?>

<div class="container">
    <div class="row masthead">
        <?php if($_SESSION['id'] == NULL){
            ?>
        <div class="col-md-6">
            <h3>Войти</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input type="login" name="login" class="form-control" id="exampleInputLogin1" aria-describedby="loginHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="join" class="btn btn-primary">Войти</button>
            </form>
        </div>

        <div class="col-md-6">
            <h3>Регистрация</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input type="login" name="login" class="form-control" id="exampleInputLogin1" aria-describedby="loginHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="confirm-password" class="form-control" id="exampleInputPassword2">
                </div>
                <button type="reg-submit" name="reg-submit" class="btn btn-primary">Регистрация</button>
            </form>
        </div>
        <?php
    } else {
        echo '<h3>Вы уже вошли! <a href="/main">На главную</a></h3>';
    }
        ?>
    </div>
</div>

<?php

if (isset($_POST['reg-submit'])) {
    $userClass->registration($_POST['login'], $_POST['email'], $_POST['password'], $_POST['confirm-password'], htmlspecialchars($_GET["ref"]));
    echo '<div class="container"><div class="row"><h1>Спасибо за регистрацию! Теперь можно войти на сайт.</h1></div></div>';
}
if (isset($_POST['join'])) {
    $userClass->login($_POST['login'], $_POST['password']);
    echo '<meta http-equiv="refresh" content="0.1">';
}
require_once "views/footer.php";
?>