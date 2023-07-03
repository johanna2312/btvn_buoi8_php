<?php
include 'includes/db_connect.php';
include 'includes/category_functions.php';

// Xử lý thêm thể loại
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])) {
    $name = $_POST['category_name'];
    addCategory($db, $name);
    header("Location: index.php");
    exit();
}

// Lấy danh sách thể loại
$categories = getAllCategories($db);

// Hiển thị bảng và biểu mẫu thêm thể loại
echo '<table>';
echo '<tr><th>ID</th><th>Name</th></tr>';
foreach ($categories as $category) {
    echo '<tr>';
    echo '<td>'.$category['id'].'</td>';
    echo '<td>'.$category['name'].'</td>';
    echo '</tr>';
}
echo '</table>';

echo '<form method="POST">';
echo '<input type="text" name="category_name" placeholder="Category name" required>';
echo '<button type="submit" name="add_category">Add Category</button>';
echo '</form>';
?>