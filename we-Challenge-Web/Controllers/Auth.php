<?php

class Auth extends Controller {

    public static function login(){
        $data = array(
            'error' => false,
            'message' => ''
        );
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($_POST['register_email']){
                $username = $_POST['register_username'];
                $password = $_POST['register_password'];
                $fname = $_POST['register_fname'];
                $lname = $_POST['register_lname'];
                $email = $_POST['register_email'];
                $user = new User(
                    null,
                    $lname,
                    $fname,
                    $email,
                    '',
                    0,
                    $username,
                    $password
                );
                $user->save();
            } else {
                $username = $_POST["username"];
                $password = $_POST["password"];    
            }
            $user = User::login($username, $password);
            if ($user) {
                $_SESSION['user'] = $user['idUser'];
                return header('Location: /home');
            } else {
                $data['error'] = true;
                $data['message'] = 'Check your login information';
            }
        }
        return self::CreateView('login', $data);
    }
}