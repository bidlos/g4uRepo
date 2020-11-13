<?php
$controller = 'Main_controller';
$action = 'index';

// if(!empty($routes[0])){   
//     $controller = $routes[0];
// }

// if(!empty($routes[1])){
//     $action = $routes[1];
// }

// $controller_path = $_SERVER['DOCUMENT_ROOT']."/todolist/controller/".$controller.'.php';

// if(file_exists($controller_path)){
//      include ($controller_path);
// }else{
//     Error();
// }
// if(function_exists($action)){
//     $action();
// }else{
//     Error();
// }

if($_SERVER['SCRIPT_NAME'] == '/todolist/main'){
    echo 'true';
}

echo $_SERVER['REQUEST_URI'];
       
function Error(){
    header('HTTP/1.x 404 Not Found');
    header("Status: 404 Not Found");
    exit('Страница на которую вы пытаетесь попасть, не существует или была удалена!');
}
