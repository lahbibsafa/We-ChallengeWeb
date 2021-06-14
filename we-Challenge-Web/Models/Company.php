<?php


class Company {
    public $idCompany;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $activitySector;
    public $username;
    public $password;


    public function __construct(
        $idCompany,
        $name,
        $phone,
        $email,
        $address,
        $activitySector,
        $username,
        $password
    ){
        $this->idCompany = $idCompany;
        $this->name = $name;
        $this->address = $address;
        $this->activitySector = $activitySector;
        $this->username = $username;
        $this->password = $password;
    }


    public function save(){
        if ($this->idCompany) {
            $query = "UPDATE company SET  name = :name, phone = :phone, email = :email, address = :address, activitySector = :activitySector, username = :username, `password`= :password WHERE idCompany=:idCompany";
            DB::query($query, array(
                ':name' => $this->name,
                ':phone' => $this->phone,
                ':email' => $this->email,
                ':address' => $this->address,
                ':activitySector' => $this->activitySector,
                ':username' => $this->username,
                ':password' => $this->password,
                ':idCompany' => $this->idCompany
            ));
        } else {
            $query = "INSERT INTO company(name, phone, email, address, activitySector, username, password) VALUES (:name, :phone, :email, :address, :activitySector, :username, :password)";
            DB::query($query, array(
                ':name' => $this->name,
                ':phone' => $this->phone,
                ':email' => $this->email,
                ':address' => $this->address,
                ':activitySector' => $this->activitySector,
                ':username' => $this->username,
                ':password' => $this->password
            ));
        }
    }
    
    public static function login($username, $password) {
        $query = "SELECT * FROM company WHERE username=:username AND `password`= :password";
        $result = DB::query($query, array(
            ':username' => $username,
            ':password' => $password
        ));
        return count($result) > 0 ? $result[0] : null;
    }

    public static function getById($id) {
        $query = "SELECT * FROM company WHERE idCompany=:idCompany";
        $result = DB::query($query, array(
            ':idCompany' => $id,
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