<?php

Route::set('home', function(){
    if(!isset($_SESSION['user'])) {
        return header('Location: /auth/login');
    }
    $user = User::getById($_SESSION['user']);
    $challenges = Challenge::getChallenges(4);
    $products = Product::getProducts();
    Home::CreateView('home', array('user' => $user, 'challenges' => $challenges, 'products' => $products));
});

Route::set('auth/login', function(){
    if (isset($_SESSION['user'])) {
        return header('Location: /home');
    }
    Auth::login();
});

Route::set('auth/logout', function(){
    session_destroy();
    return header('Location: /auth/login');
});

Route::set('product/{id}', function($id=-1){
    if ($id == -1) {
        return header('Location: /404');
    }
    ProductController::showProduct($id);
});
Route::set('challenge/{id}', function($id=-1){
    if ($id == -1) {
        return header('Location: /404');
    }
    ChallengeController::showChallenge($id);
});

Route::set('submit/{id}', function($id=-1){
    if ($id == -1) {
        return header('Location: /404');
    }
    ChallengeController::submitChallenge($id);
});

Route::set('challenges/list', function(){
    return ChallengeController::listChallenge();
});

Route::set('store', function(){
    return ProductController::listProducts();
});

Route::set('404', function(){
    Controller::CreateView('404');
})
?>