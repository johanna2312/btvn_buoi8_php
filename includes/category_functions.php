<?php
if (!function_exists('getAllCategories')) {
    function getAllCategories($db)
    {
        $query = "SELECT * FROM categories";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

if (!function_exists('getCategoryById')) {
    function getCategoryById($db, $category_id)
    {
        $query = "SELECT * FROM categories WHERE id = :category_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

if (!function_exists('addCategory')) {
    function addCategory($db, $category_name)
    {
        $query = "INSERT INTO categories (name) VALUES (:category_name)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->execute();
    }
}

if (!function_exists('updateCategory')) {
    function updateCategory($db, $category_id, $category_name)
    {
        $query = "UPDATE categories SET name = :category_name WHERE id = :category_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }
}

if (!function_exists('deleteCategory')) {
    function deleteCategory($db, $category_id)
    {
        $query = "DELETE FROM categories WHERE id = :category_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }
}
?>