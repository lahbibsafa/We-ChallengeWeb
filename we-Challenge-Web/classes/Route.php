<?php

class Route {
    public static $validRotues = array();

    public static function set($route, $function){
        self::$validRotues[] = $route;
        if (isset($_GET['url'])){
            if ($route == $_GET['url'] ){
                $function->__invoke();
            }
            if (strpos($route, '{')!== false){
                $url = explode('{', $route)[0];
                if (strpos($_GET['url'], $url) !== false) {
                    $matches = array();
                    preg_match_all('!\d+!', $_GET['url'], $matches);
                    $function->__invoke(count($matches[0]) > 0 ? $matches[0][0] : -1);
                }
            }
        } else {
            if (isset($_SESSION['user'])) {
                header('Location: /home');
            } else {
                header('Location: /auth/login');
            }
        }
        
    }
}