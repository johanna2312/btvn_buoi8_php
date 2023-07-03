<?php
function getAllCategories($db) {
    $query = 'SELECT * FROM categories';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function addCategory($db, $name) {
    $query = 'INSERT INTO categories (name) VALUES (?)';
    $statement = $db->prepare($query);
    $statement->execute([$name]);
}

function deleteCategory($db, $id) {
    $query = 'DELETE FROM categories WHERE id = ?';
    $statement = $db->prepare($query);
    $statement->execute([$id]);
}
?>