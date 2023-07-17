<?php
    require_once 'pdo.php';
    $categoryFunction = new CategoryFunction();
    $data = ['name' => $_POST['name']];
    $categoryFunction->createNewData($data);
    
?>