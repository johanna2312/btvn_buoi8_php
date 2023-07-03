<?php
function getAllProducts($db)
{
    $query = "SELECT p.id, p.name, p.price, c.name AS category_id
              FROM products p
              INNER JOIN categories c ON p.category_id = c.id";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getProductById($db, $product_id)
{
    $query = "SELECT * FROM products WHERE id = :product_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function addProduct($db, $product_name, $product_price, $category_id)
{
    $query = "INSERT INTO products (name, price, category_id) VALUES (:product_name, :product_price, :category_id)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':product_price', $product_price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
}

function updateProduct($db, $product_id, $product_name, $product_price, $category_id)
{
    $query = "UPDATE products SET name = :product_name, price = :product_price, category_id = :category_id WHERE id = :product_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':product_price', $product_price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
}

function deleteProduct($db, $product_id)
{
    $query = "DELETE FROM products WHERE id = :product_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
}
?>