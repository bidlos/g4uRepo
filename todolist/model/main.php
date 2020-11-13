<?php


// include($_SERVER['DOCUMENT_ROOT'] . '/core/database/connect.php');

// if (isset($_POST['auth-in'])) {
//     if (preg_match("/^[a-z0-9\-]{10,}+$/", $_POST['login']) && preg_match("/^[a-z0-9]{10,}+$/", $_POST['password'])) {
//         $stmt = $pdo->prepare("SELECT * FROM users");
//         $stmt->bindParam(':login', $login);
//         $stmt->execute();
//         $result = $stmt->fetchAll();
//         print_r($result);
//     } else {
//         echo ('Необходимо проверить данные');
//     }
// } else {
//     echo ('А ты как тут оказался?');
// }

// if (isset($_POST['reg-in'])) {
//     echo ('модель регистрации');
// }

