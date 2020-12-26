<?php
include_once __DIR__ . '/view/header.php';
?>
<main role="main" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="container" style="background:#fff;">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="?href=user">Пользователи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?href=new_server">Новые Сервера</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?href=reklama">Реклама</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-12">
                <?php
                if (isset($_GET['href'])){
                if ($_GET['href'] == 'reklama') {
                    include_once __DIR__ . '/admin/ads.php';
                } elseif ($_GET['href'] == 'new_server') {
                    include_once __DIR__ . '/admin/new_server.php';
                } elseif ($_GET['href'] == 'user') {
                    include_once __DIR__ . '/admin/user.php';
                } else {
                    echo 'Добро пожаловать';
                }}
                ?>
            </div>
        </div>
    </div>
</main>
<br>

<?php
include_once __DIR__ . '/view/footer.php';
?>