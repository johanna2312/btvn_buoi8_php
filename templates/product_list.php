<?php
include 'includes/db_connect.php';
include 'includes/product_functions.php';
include 'includes/category_functions.php';

// Xử lý thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category_id = $_POST['product_category'];
    addProduct($db, $name, $price, $category_id);
    header("Location: index.php");
    exit();
}

// Lấy danh sách sản phẩm và thông tin thể loại tương ứng
$products = getAllProducts($db);

// Lấy danh sách thể loại
$categories = getAllCategories($db);

// Hiển thị bảng và biểu mẫu thêm sản phẩm
echo '<table>';
echo '<tr><th>ID</th><th>Name</th><th>Price</th><th>Category</th></tr>';
foreach ($products as $product) {
    echo '<tr>';
    echo '<td>'.$product['id'].'</td>';
    echo '<td>'.$product['name'].'</td>';
    echo '<td>'.$product['price'].'</td>';
    echo '<td>'.$product['category_id'].'</td>';
    echo '</tr>';
}
echo '</table>';

echo '<form method="POST">';
echo '<input type="text" name="product_name" placeholder="Product name" required>';
echo '<input type="text" name="product_price" placeholder="Product price" required>';
echo '<select name="product_category">';
foreach ($categories as $category) {
    echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
}
echo '</select>';
echo '<button type="submit" name="add_product">Add Product</button>';
echo '</form>';

// Xử lý xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];
    deleteProduct($db, $product_id);
    header("Location: index.php");
    exit();
}

// Lấy danh sách sản phẩm và thông tin thể loại tương ứng
$products = getAllProducts($db);

// Lấy danh sách thể loại
$categories = getAllCategories($db);

// Hiển thị bảng danh sách sản phẩm
echo '<table>';
echo '<tr><th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Action</th></tr>';
foreach ($products as $product) {
    echo '<tr>';
    echo '<td>'.$product['id'].'</td>';
    echo '<td>'.$product['name'].'</td>';
    echo '<td>'.$product['price'].'</td>';
    echo '<td>'.$product['category_name'].'</td>';
    echo '<td>';
    echo '<form method="POST">';
    echo '<input type="hidden" name="product_id" value="'.$product['id'].'">';
    echo '<button type="submit" name="delete_product">Delete</button>';
    echo '</form>';
    echo '<a href="index.php?edit_product='.$product['id'].'">Edit</a>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

echo '<a href="index.php?add_product">Add Product</a>';
?>