<?php
    require_once 'pdo.php';
    $id = ['id' => $_GET['id']];
    $name = $_POST['name'];
    $data = [
        'id' => $id['id'],
        'name' => $name
    ];
    $categoryFunction->updateData($data);
    
?>