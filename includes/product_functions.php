<?php
function getAllProducts($db) {
    $query = 'SELECT products.*, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function addProduct($db, $name, $price, $category_id) {
    $query = 'INSERT INTO products (name, price, category_id) VALUES (?, ?, ?)';
    $statement = $db->prepare($query);
    $statement->execute([$name, $price, $category_id]);
}

function deleteProduct($db, $id) {
    $query = 'DELETE FROM products WHERE id = ?';
    $statement = $db->prepare($query);
    $statement->execute([$id]);
}
?>