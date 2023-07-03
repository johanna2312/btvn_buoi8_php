<?php
include 'includes/db_connect.php';
include 'includes/category_functions.php';

// Xử lý thêm/sửa thể loại
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    
    if (empty($category_id)) {
        addCategory($db, $category_name);
    } else {
        updateCategory($db, $category_id, $category_name);
    }
    
    header("Location: index.php");
    exit();
}

// Kiểm tra xem có phải là chế độ sửa thể loại hay không
$is_edit_mode = false;
$category = array('id' => '', 'name' => '');
if (isset($_GET['edit_category'])) {
    $is_edit_mode = true;
    $category_id = $_GET['edit_category'];
    $category = getCategoryById($db, $category_id);
}
?>

<form method="POST">
    <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">
    <input type="text" name="category_name" placeholder="Category name" value="<?php echo $category['name']; ?>" required>
    <button type="submit"><?php echo $is_edit_mode ? 'Update' : 'Add'; ?> Category</button>
</form>