<?php
    require_once "pdo.php";
    $categoryConnection = new CategoryFunction();
    $category=$categoryConnection->getData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-3">
        <div class="heading">
            <h3>List Categories</h3>
            <a href="add.php" class="btn btn-success">Create</a>
        </div>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $stt = 1;
                foreach($category as $value): ?>
            <tr>
                <td><?= $stt++; ?></td>
                <td><?= $value['id'];?></td>
                <td><?= $value['name'];?></td>
                <td>
                    <form id="delete_<?= $value['id'] ?>" action="delete.php" method="POST">
                        <a href="./edit.php?id=<?= $value['id']?>" class="btn btn-dark">Edit</a>
                        <input type="hidden" value="<?= $value['id'] ?>" name="id">
                        <a class="btn btn-dark" onclick="confirmDelete(<?= $value['id'] ?>)">Delete</a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>  
    </div>
    <script>
    function confirmDelete(id) {
        let result = confirm('Chắc chưa?');
        if (result === true) {
            document.getElementById(`delete_${id}`).submit();
        }
    }
</script>
</body>
</html>