<?php

class Order{
    public $idOrder;
    public $date;
    public $total;
    public $idUser;

    public function __construct(
        $idOrder,
        $date,
        $total,
        $idUser
    ){
        $this->idOrder = $idOrder;
        $this->date = $date;
        $this->total = $total;
        $this->idUser = $idUser;
    }


    public function save(){
        if ($this->idOrder) {
            $query = "UPDATE orders SET total = :total, `date` = :date, idUser = :idUser WHERE idOrder = :idOrder";
            DB::query($query, array(
                ':date' => $this->date,
                ':total' => $this->total,
                ':idUser' => $this->idUser,
                ':idOrder' => $this->idOrder,
            ));
        } else {
            $query = "INSERT INTO orders(total, date, idUser) VALUES (:total, :date, :idUser)";
            DB::query($query, array(
                ':total' => $this->total,
                ':date' => $this->date,
                'idUser' => $this->idUser,
            ));
            $this->idOrder =  DB::getLastId();
        }
    }

    public static function getById($idOrder) {
        $query = "SELECT * FROM orders WHERE idOrder = :idOrder";
        $result = DB::query($query, array(
            ':idOrder' => $idOrder,
        ));
        if(count($result) > 0){
            $orderData = $result[0];
            $order = new OrderItem(
                $orderData['idOrder'],
                $orderData['date'],
                $orderData['total'],
                $orderData['idUser'],
            );
            return $order;
        }
        return null;
    }
}