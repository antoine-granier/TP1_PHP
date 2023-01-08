<?php


class userController {
    private $userManager;
    private $user;

    private $db;

    public function __construct($db) {
        require('./Model/UserManager.php');
        $this->userManager = new UserManager($db);

        $this->db = $db; 
    }

public function login() {
        $page = 'login';

        require('./View/default.php');
}

public function create() {
        $page = "create";
        require('./View/default.php');
}

public function doLogin() {
        require('./Model/User.php');
        $this->user = new User([]);
        if (
            ( isset($_POST['email']) && !empty($_POST['email'])) && 
            ( isset($_POST['password']) && !empty ($_POST['password']))
        ) {
            $this->user->setEmail($_POST['email']);
            $this->user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
        }
        $result =  $this->userManager->login($this->user) ;

        if ($result) {
            $info = 'Bonjour '.$result['firstName'];
            $_SESSION['user'] = $result;
            $page = 'home';
        } else {
            unset($_SESSION['user']);
            $info = 'Identifiants incorrects';
            $page = 'home';
        }

        require('./View/default.php');
}
public function doCreate()
{
 if (
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['lastName']) &&
    isset($_POST['firstName']) &&
    isset($_POST['address']) &&
    isset($_POST['postalCode']) &&
    isset($_POST['city'])
 ) {
    $alreadyExist = $this->userManager->findByEmail($_POST['email']);
    if (!$alreadyExist) {
        require('./Model/User.php');
        $newUser = new User($_POST);
        $this->userManager->create($newUser);
        $page = 'login';
    } else {
        $error = "ERROR : This email (" . $_POST['email'] . ") is used by another user";
        $page = 'create';
    }
}
    require('./View/default.php');
}

public function doDisconnect() {
    $page = 'home';
    $info = "Au revoir ".$_SESSION['user']['firstName'];
    unset($_SESSION['user']);
    require('./View/default.php');
}

public function usersList() {
   $_SESSION["list_user"] = $this->userManager->findAll();
        $page = 'usersList';
        require('./View/default.php');
}
}
?>