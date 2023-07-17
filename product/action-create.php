<?php
    require_once "pdo.php";
    
    
    $data = [
        'prodId' => $_POST['prodId'],
        'prodName' => $_POST['prodName'],
        'prodPrice' => $_POST['prodPrice'],
        'cateId' => $_POST['cateId']
    ];

    $productFunction = new ProductFunction();
    $productFunction->createNewProdData($data);
    
?>