<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EcoSphere - Shop</title>
        <meta name="viewport" content="width=device-width">
        <link href="View/css/general.css" rel="stylesheet" type="text/css">
        <link href="View/css/header-footer.css" rel="stylesheet" type="text/css">
        <link href="View/css/mainSection.css" rel="stylesheet" type="text/css">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nunito|Glegoo" rel="stylesheet">
        <!-- Fontawesome -->
        <!-- Icon -->
        <link href="./View/img/icon.png" rel="icon">
    </head>
    <body>
<?php
// require_once('Model/Connection.php');
// require_once('Model/UserManager.php');
// require_once('Model/User.php');
// include("View/form.html");
// $post = $_POST;
// $connection = new Connection();
// $user = new User($post);
// $userManager = new UserManager($connection->getDb());
// $userManager->create($user);

session_start();
require_once('./Model/Connection.php');
$pdoBuilder = new Connection();
$db = $pdoBuilder->getDb();
if(
    ( isset($_GET['ctrl']) && !empty($_GET['ctrl'])) &&
    ( isset($_GET['action']) && !empty ($_GET['action']))
) {
    $ctrl = $_GET['ctrl'];
    $action = $_GET['action'];
    require_once('./Controller/' . $ctrl . 'Controller.php');

    $ctrl = $ctrl . 'Controller';
    $controller = new $ctrl ($db);
    $controller->$action();
} else {
    $page = 'home';
    require('./View/default.php');
}

//  else {
//     $ctrl = 'category';
//     $action = 'display';
// }


?>
    </body>
</html>