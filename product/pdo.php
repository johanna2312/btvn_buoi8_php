<?php
    require_once "../category/pdo.php";

    function prepareSQL($sql, $data = [])
    {
        $conn = new PDO('mysql:host=localhost;dbname=test','root', '');
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
class ProductFunction extends Connection{ 
    public function getProdData(){
        $sql = "SELECT * FROM product INNER JOIN category ON product.cateId = category.id";
        $select = prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getOneProdData($data){
        $sql = "SELECT * FROM product WHERE prodId = :id";
        $select = prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function createNewProdData($data)
    {
        $sql = "INSERT INTO product (prodID, prodName, prodPrice, cateId) VALUES (:prodId, :prodName, :prodPrice, :cateId)";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute($data);
    }

    function updateProdData($data){
        $sql = "UPDATE product SET prodName = :prodName, prodPrice = :prodPrice, cateId = :cateId  WHERE prodId = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
    public function deleteProdData($data){
            $sql = "DELETE FROM product WHERE prodId = :id";
            $update = prepareSQL($sql);
            $update->execute($data);
    }
}
    ?>