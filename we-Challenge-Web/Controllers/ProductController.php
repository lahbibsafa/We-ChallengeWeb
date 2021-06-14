<?php

class ProductController extends Controller {
    public static function showProduct($idProduct) {
        $product = Product::getById($idProduct);
        $user = User::getById($_SESSION['user']);
        $error = false;
        if( $_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($product->price <= $user->balance) {
                $order = new Order(
                    null,
                    date('Y-m-d H:i:s'),
                    $product->price,
                    $user->idUser
                );
                $order->save();
                $orderItem = new OrderItem(
                    null,
                    1,
                    $product->price,
                    $product->idProduct,
                    $order->idOrder
                );
                $orderItem->save();
                $user->balance = $user->balance - $product->price;
                $user->save();
                $message = 'Product purchased successfuly, you will receive an email soon with your goodies. Your balance now is : '.$user->balance.' CCoin';
            } else {
                $error = true;
                $message = 'You do not have enough coins to purchase this device';
            }
        }
        return static::CreateView('product', array('product' => $product, 'user' => $user, 'message' => $message, 'error' => $error));
    }
    public static function listProducts(){
        $products = Product::getProducts();
        $user = User::getById($_SESSION['user']);
        return static::CreateView('store', array(
            'user' => $user,
            'products' => $products
        ));
    }
}