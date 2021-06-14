<?php

class Submission {
    public $idSubmission;
    public $title;
    public $description;
    public $proof;
    public $date;
    public $valid;
    public $idUser;
    public $idChallenge;

    public function __construct(
        $idSubmission,
        $title,
        $description,
        $proof,
        $date,
        $valid,
        $idUser,
        $idChallenge
    ){
        $this->idSubmission = $idSubmission;
        $this->title = $title;
        $this->description = $description;
        $this->proof = $proof;
        $this->date = $date;
        $this->valid = $valid;
        $this->idUser = $idUser;
        $this->idChallenge = $idChallenge;
    }

    public function save(){
        if ($this->idSubmission) {
            $query = "UPDATE submission SET title = :title, description = :description, proof = :proof, date = :date, valid = :valid, idUser = :idUser, idChallege = :idChallenge WHERE idSubmission = :idSubmission";
            DB::query($query, array(
                ':title' => $this->title,
                ':description' => $this->description,
                ':proof' => $this->proof,
                ':date' => $this->date,
                ':valid' => $this->valid,
                ':idSubmission' => $this->idSubmission,
                ':idUser' => $this->idUser,
                ':idChallenge' => $this->idChallenge
            ));
        } else {
            $query = "INSERT INTO submission(title, description, proof, date, valid, idUser, idChallenge) VALUES (:title, :description, :proof, :date, :valid, :idUser, :idChallenge)";
            DB::query($query, array(
                ':title' => $this->title,
                ':description' => $this->description,
                ':proof' => $this->proof,
                ':date' => $this->date,
                ':valid' => $this->valid,
                ':idUser' => $this->idUser,
                ':idChallenge' => $this->idChallenge
            ));
        }
    }
    
    public static function getById($idSubmission){
        $query = "SELECT * FROM submission WHERE idSubmission = :idSubmission";
        $result = DB::query($query, array(
            ':idSubmission' => $this->idSubmission,
        ));
        if(count($result) > 0){
            $submissionData = $result[0];
            $submission = new OrderItem(
                $submissionDate['title'],
                $submissionDate['description'],
                $submissionDate['proof'],
                $submissionDate['date'],
                $submissionDate['valid'],
                $submissionDate['idUser'],
                $submissionDate['idChallenge']
            );
            return $submission;
        }
        return null;
    }
}