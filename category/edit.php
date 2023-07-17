<?php
    require_once 'pdo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chỉnh sửa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h3>Update Category</h3>
        <?php 
            $categoryFunction = new CategoryFunction();
             $category_id = $_GET['id'];
             $category = $categoryFunction->getOneData(['id' => $category_id]);
         
             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                 $data = [
                     'id' => $category_id,
                     'name' => $_POST['name']
                 ];
                 $categoryFunction->updateData($data);
                 
             }
        ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input required type="text" class="form-control" name="name" placeholder="Enter name..." value="<?= isset($category['name']) ? $category['name'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>