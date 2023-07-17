<?php
    require_once 'pdo.php';
    $id = ['id' => $_POST['id']];
    $categoryFunction->deleteData($id);
    
?>