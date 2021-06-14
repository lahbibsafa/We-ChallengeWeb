<?php

class OrderItem {
    public $idOrderItem;
    public $qte;
    public $price;
    public $idProduct;
    public $idOrder;


    public function __construct(
        $idOrderItem,
        $qte,
        $price,
        $idProduct,
        $idOrder
    ){
        $this->idOrderItem = $idOrderItem;
        $this->qte = $qte;
        $this->price = $price;
        $this->idProduct = $idProduct;
        $this->idOrder = $idOrder;
    }

    public function save(){
        if ($this->idOrderItem) {
            $query = "UPDATE orderitems SET qte = :qte, price = :price, idProduct = :idProduct, idOrder = :idOrder WHERE idOrderItem = :idOrderItem";
            DB::query($query, array(
                ':qte' => $this->qte,
                ':price' => $this->price,
                'idProduct' => $this->idProduct,
                'idOrder' => $this->idOrder,
                'idOrderItem' => $this->idOrderItem
            ));
        } else {
            $query = "INSERT INTO orderitems(qte, price, idProduct, idOrder) VALUES (:qte, :price, :idProduct, :idOrder)";
            DB::query($query, array(
                ':qte' => $this->qte,
                ':price' => $this->price,
                ':idProduct' => $this->idProduct,
                ':idOrder' => $this->idOrder,
            ));
        }
    }



    public static function getById($idOrderItem) {
        $query = "SELECT * FROM orderitems WHERE idOrderItem = :idOrderItem";
        $result = DB::query($query, array(
            ':idOrderItem' => $idOrderItem,
        ));
        if(count($result) > 0){
            $orderItemData = $result[0];
            $orderItem = new OrderItem(
                $orderItemData['idOrderItem'],
                $orderItemData['qte'],
                $orderItemData['price'],
                $orderItemData['idProduct'],
                $orderItemData['idOrder']
            );
            return $orderItem;
        }
        return null;
    }
}