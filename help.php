<?php 
    require_once "pdo.php";
    $data = [
        'prodName' => $_POST['name'],
        'prodPrice' => $_POST['price'],
        'cateId' => $_POST['cateId'],
        'id' => $_GET['id']
    ];
    updateProdData($data);
    header("Location: http://localhost/day8.php");
?>
