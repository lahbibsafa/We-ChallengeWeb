<?php

class User {
    public $idUser;
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $balance;
    public $username;
    public $password;

    function __construct($idUser,
        $lname,
        $fname,
        $email,
        $phone,
        $balance,
        $username,
        $password){
            $this->idUser = $idUser;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->phone = $phone;
            $this->balance = $balance;
            $this->username = $username;
            $this->password = $password;
    }


    public function save(){
        if ($this->idUser) {
            $query = "UPDATE user SET fname = :fname, lname = :lname, email = :email, phone = :phone, balance = :balance, username = :username, `password`= :password WHERE idUser=:idUser";
            DB::query($query, array(
                ':fname' => $this->fname,
                ':lname' => $this->lname,
                ':email' => $this->email,
                ':phone' => $this->phone,
                ':balance' => $this->balance,
                ':username' => $this->username,
                ':password' => $this->password,
                ':idUser' => $this->idUser
            ));
        } else {
            $query = "INSERT INTO user(fname, lname, email, phone, balance, username, password) VALUES (:fname, :lname, :email, :phone, :balance, :username, :password)";
            DB::query($query, array(
                ':fname' => $this->fname,
                ':lname' => $this->lname,
                ':email' => $this->email,
                ':phone' => $this->phone,
                ':balance' => $this->balance,
                ':username' => $this->username,
                ':password' => $this->password,
            ));
        }
    }
    
    public static function login($username, $password) {
        $query = "SELECT * FROM user WHERE username=:username AND `password`= :password";
        $result = DB::query($query, array(
            ':username' => $username,
            ':password' => $password
        ));
        return count($result) > 0 ? $result[0] : null;
    }

    public static function getById($id) {
        $query = "SELECT * FROM user WHERE idUser=:idUser";
        $result = DB::query($query, array(
            ':idUser' => $id,
        ));
        if(count($result) > 0){
            $userData = $result[0];
            $user = new User(
                $userData['idUser'],
                $userData['lname'],
                $userData['fname'],
                $userData['email'],
                $userData['phone'],
                $userData['balance'],
                $userData['username'],
                $userData['password']
            );
            return $user;
        }
        return null;
    }

    public function hasSubmission($idChallenge){
        $query = "SELECT * FROM submission WHERE idUser = :idUser AND idChallenge = :idChallenge";
        $result = DB::query($query, array(
            ':idUser' => $this->idUser,
            ':idChallenge' => $idChallenge
        ));
        return count($result) > 0;
    }

    public function joined($idChallenge) {
        $query = "SELECT * FROM participation WHERE idUser = :idUser AND idChallenge = :idChallenge";
        $result = DB::query($query, array(
            ':idUser' => $this->idUser,
            ':idChallenge' => $idChallenge
        ));
        return count($result) > 0;
    }
}