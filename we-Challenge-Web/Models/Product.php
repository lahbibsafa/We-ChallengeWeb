<?php 
class Product{
    public $idProduct;
    public $name;
    public $description;
    public $price;
    public $qte;
    public $image;
    public $idCompany;


    public function __construct(
        $idProduct,
        $name,
        $description,
        $price,
        $qte,
        $image,
        $idCompany
    ) {
        $this->idProduct = $idProduct;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->qte = $qte;
        $this->image = $image;
        $this->idCompany = $idCompany;
    }


    public function save(){
        if ($this->idProduct) {
            $query = "UPDATE product SET name = :name, description = :description, price = :price, qte = :qte, image = :image, idCompany = :idCompany WHERE idProduct=:idProduct";
            DB::query($query, array(
                ':name' => $this->name,
                ':description' => $this->description,
                ':price' => $this->price,
                ':qte' => $this->qte,
                ':image' => $this->image,
                ':idCompany' => $this->idCompany,
                ':idProduct' => $this->idProduct,
            ));
        } else {
            $query = "INSERT INTO product(name, description, price, qte, image, idCompany) VALUES (:fname, :lname, :email, :phone, :balance, :username, :password)";
            DB::query($query, array(
                ':name' => $this->name,
                ':description' => $this->description,
                ':price' => $this->price,
                ':qte' => $this->qte,
                ':image' => $this->image,
                ':idCompany' => $this->idCompany
            ));
        }
    }
    
    public static function getById($idProduct) {
        $query = "SELECT * FROM product WHERE idProduct = :idProduct";
        $result = DB::query($query, array(
            ':idProduct' => $idProduct,
        ));
        if(count($result) > 0){
            $productData = $result[0];
            $product = new Product(
                $productData['idProduct'],
                $productData['name'],
                $productData['description'],
                $productData['price'],
                $productData['qte'],
                $productData['image'],
                $productData['idCompany']
            );
            return $product;
        }
        return null;
    }


    public static function getProducts($limit=0){
        $products = array();
        if ($limit > 0) {
            $query = "SELECT * FROM product LIMIT 0,{$limit}";
            $result = DB::query($query, array(
            ));
        }else{
            $query = "SELECT * FROM product";
            $result = DB::query($query, array(
            ));

        }
            foreach($result as $productData){
                $products[] = new Product(
                    $productData['idProduct'],
                    $productData['name'],
                    $productData['description'],
                    $productData['price'],
                    $productData['qte'],
                    $productData['image'],
                    $productData['idCompany']
                );
            }
        return $products;
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