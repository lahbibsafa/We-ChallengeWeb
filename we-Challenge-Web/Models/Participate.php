<?php

class Participate {
    public $idUser;
    public $idChallenge;
    public $date;

    public function __construct(
        $idUser,
        $idChallenge,
        $date
    ){
        $this->idUser = $idUser;
        $this->idChallenge = $idChallenge;
        $this->date = $date;
    }
    public function save(){
        $query = "INSERT INTO participation (idUser, idChallenge) VALUES (:idUser, :idChallenge)";
        DB::query($query, array(
            ':idUser' => $this->idUser,
            ':idChallenge' => $this->idChallenge
        ));
    }
}