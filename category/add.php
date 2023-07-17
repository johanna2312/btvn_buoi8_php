<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thêm mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <a href="index.php" class="btn" style="margin-right: 5px"> < Back</a>
        <h3>Create New Category</h3>
        <form action="action-create.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
             <input required type="text" class="form-control" name="name" placeholder="Enter name...">
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</body>
</html>