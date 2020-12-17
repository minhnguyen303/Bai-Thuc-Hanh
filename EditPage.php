<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Product</title>
</head>
<body>
<form method="post">
    <fieldset>
        <legend>Sửa thông tin mặt hàng</legend>
        <input type="text" name="action" value="add" hidden="hidden">
        Id: <input type="text" name="id" required>
        Tên: <input type="text" name="name" required>
        Loại: <input type="text" name="category" required>
        Ngày tạo: <input id="now" type="text" name="dateCreated" disabled="disabled">
        <br>
        Số lượng:<input type="number" name="amount" required>
        Giá: <input type="number" name="price" required>
        Ảnh: <input type="text" name="img" required>
        Mô tả: <textarea name="description" id="description"></textarea>
        <button type="submit" class="actions" id="update">Sửa</button>
        <button type="submit" class="actions" id="delete">Xóa</button>
    </fieldset>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $action = $_POST['action'];

    $id = $_POST['idEdit'];
    /*$name = $_POST['name'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['img'];*/

    $product = $GLOBALS['manager']->read($id);
    if ($action == "edit"){
        $script = "<script>
                        document.getElementById('id').value = '$id';
                        document.getElementById('name').value = '$product->getName()'
                        document.getElementById('category').value = '$product->getCategory()'
                    </script>";
        echo $script;
    }
/*    if ($action == "update"){

    }
    if ($action == "delete"){

    }*/
}