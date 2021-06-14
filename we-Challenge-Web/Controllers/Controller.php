<?php

class Controller{
    public static function CreateView($viewName, $viewParams=array()){
        extract($viewParams);
        require_once('./Views/'.$viewName.'.php');
    }
}