<?php
include 'includes/db_connect.php';
include 'includes/category_functions.php';
include 'includes/product_functions.php';

// Xử lý thêm/sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category_id = $_POST['product_category'];
    
    if (empty($product_id)) {
        addProduct($db, $product_name, $product_price, $category_id);
    } else {
        updateProduct($db, $product_id, $product_name, $product_price, $category_id);
    }
    
    header("Location: index.php");
    exit();
}

// Kiểm tra xem có phải là chế độ sửa sản phẩm hay không
$is_edit_mode = false;
$product = array('id' => '', 'name' => '', 'price' => '', 'category_id' => '');
if (isset($_GET['edit_product'])) {
    $is_edit_mode = true;
    $product_id = $_GET['edit_product'];
    $product = getProductById($db, $product_id);
}

// Lấy danh sách thể loại
$categories = getAllCategories($db);
?>

<form method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <input type="text" name="product_name" placeholder="Product name" value="<?php echo $product['name']; ?>" required>
    <input type="text" name="product_price" placeholder="Product price" value="<?php echo $product['price']; ?>" required>
    <select name="product_category">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $product['category_id']) echo 'selected'; ?>>
                <?php echo $category['name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit"><?php echo $is_edit_mode ? 'Update' : 'Add'; ?> Product</button>
</form>