<?php
class ChallengeController extends Controller {
    public static function showChallenge($idChallenge){
        $challenge = Challenge::getById($idChallenge);
        $user = User::getById($_SESSION['user']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $joinEvent = new Participate(
                $user->idUser,
                $idChallenge,
                time()
            );
            $joinEvent->save();
        }
        return static::CreateView('challenge', array(
            'user' => $user,
            'challenge' => $challenge
        ));
    }

    public static function submitChallenge($idChallenge) {
        $challenge = Challenge::getById($idChallenge);
        $user = User::getById($_SESSION['user']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $proof = $_POST['proof'];


            $submission = new Submission(
                null,
                $title,
                $description,
                $proof,
                date('Y-m-d H:i:s'),
                0,
                $user->idUser,
                $challenge->idChallenge
            );
            $submission->save();
            return header('Location: /challenge/'.$idChallenge);
        }
        return static::CreateView('submit', array(
            'user' => $user,
            'challenge' => $challenge
        ));
    }

    public static function listChallenge(){
        $challenges = Challenge::getChallenges();
        $user = User::getById($_SESSION['user']);
        return static::CreateView('challenges', array(
            'user' => $user,
            'challenges' => $challenges
        ));
    }
}