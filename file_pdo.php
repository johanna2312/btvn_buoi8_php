<?php
$DB_TYPE = 'mysql';
$DB_HOST = 'localhost';
$DB_NAME = 'lesson8';
$USER = 'root';
$PW = '';

try {
    $connection = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER, $PW);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

function getProdData(){
    $sql = "SELECT * FROM product INNER JOIN category ON product.cateId = category.id";
    $select = prepareSQL($sql);
    $select->execute();
    return $select->fetchAll();
}

function getOneProdData($data){
    $sql = "SELECT * FROM product WHERE prodId = :id";
    $select = prepareSQL($sql);
    $select->execute($data);
    return $select->fetchAll();
}

function createNewProdData($data){
    $sql = "INSERT INTO product VALUES (:prodId, :prodName, :prodPrice, :cateId)";
    $create = prepareSQL($sql);
    $create->execute($data);
}

function updateProdData($data){
    $sql = "UPDATE product SET prodName = :prodName, prodPrice = :prodPrice, cateId = :cateId  WHERE prodId = :id";
    $update = prepareSQL($sql);
    $update->execute($data);
}
function deleteProdData($data){
    $sql = "DELETE FROM product WHERE prodId = :id";
    $update = prepareSQL($sql);
    $update->execute($data);
}
