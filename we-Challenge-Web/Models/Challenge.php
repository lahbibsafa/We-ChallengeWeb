<?php
class Challenge {
    public $idChallenge;
    public $title;
    public $description;
    public $cover;
    public $location;
    public $prize;
    public $url;
    public $deadline;
    public $idCompany;

    public function __construct(
        $idChallenge,
        $title,
        $description,
        $cover,
        $location,
        $prize,
        $url,
        $deadline,
        $idCompany
    ) {
        $this->idChallenge = $idChallenge;
        $this->title = $title;
        $this->description = $description;
        $this->cover = $cover;
        $this->location = $location;
        $this->prize = $prize;
        $this->url = $url;
        $this->deadline = $deadline;
        $this->idCompany = $idCompany;
    }


    public function save(){
        if ($this->idChallenge) {
            $query = "UPDATE challenge SET title = :title, description = :description, cover = :cover, location = :location, prize = :prize, url = :url, deadline = :deadline, idCompany = :idCompany WHERE idChallenge = :idChallenge";
            DB::query($query, array(
                ':title' => $this->title,
                ':description' => $this->description,
                ':cover' => $this->cover,
                ':location' => $this->location,
                ':prize' => $this->prize,
                ':url' => $this->url,
                ':deadline' => $this->deadline,
                ':idCompany' => $this->idCompany,
                ':idChallenge' => $this->idChallenge
            ));
        } else {
            $query = "INSERT INTO challenge(title, description, cover, location, prize, url, deadline, idCompany) VALUES (:title, :description, :cover, :location, :prize, :url, :deadline, :idCompany)";
            DB::query($query, array(
                ':title' => $this->title,
                ':description' => $this->description,
                ':cover' => $this->cover,
                ':location' => $this->location,
                ':prize' => $this->prize,
                ':url' => $this->url,
                ':deadline' => $this->deadline,
                ':idCompany' => $this->idCompany,
            ));
        }
    }

    public static function getById($idChallenge){
        $query = "SELECT * FROM challenge WHERE idChallenge = :idChallenge";
        $result = DB::query($query, array(
            ':idChallenge' => $idChallenge,
        ));
        if(count($result) > 0){
            $challengeData = $result[0];
            $challenge = new Challenge(
                $challengeData['idChallenge'],
                $challengeData['title'],
                $challengeData['description'],
                $challengeData['cover'],
                $challengeData['location'],
                $challengeData['prize'],
                $challengeData['url'],
                $challengeData['deadline'],
                $challengeData['idCompany']
            );
            return $challenge;
        }
        return null;
    }


    public static function getChallenges($limit=0){
        $challenges = array();
        if ($limit > 0) {
            $query = "SELECT * FROM challenge LIMIT 0,{$limit}";
            $result = DB::query($query, array(
                ':idOrderItem' => $idOrderItem,
            ));
        }else{
            $query = "SELECT * FROM challenge";
            $result = DB::query($query, array(
                ':idOrderItem' => $idOrderItem,
            ));

        }
            foreach($result as $challengeData){
                $challenges[] = new Challenge(
                    $challengeData['idChallenge'],
                    $challengeData['title'],
                    $challengeData['description'],
                    $challengeData['cover'],
                    $challengeData['location'],
                    $challengeData['prize'],
                    $challengeData['url'],
                    $challengeData['deadline'],
                    $challengeData['idCompany']
                );
            }
        return $challenges;
    }

    public function getCompany(){
        $query = "SELECT * FROM company WHERE idCompany=:idCompany";
        $result = DB::query($query, array(
            ':idCompany' => $this->idCompany,
        ));
        if(count($result) > 0){
            $companyData = $result[0];
            $company = new Company(
                $companyData['idCompany'],
                $companyData['name'],
                $companyData['phone'],
                $companyData['email'],
                $companyData['address'],
                $companyData['activitySector'],
                $companyData['username'],
                $companyData['password']
            );
            return $company;
        }
        return null;
    }
}