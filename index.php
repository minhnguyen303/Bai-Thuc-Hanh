<?php
include_once "ActionsPage.php";
$today = date("j/m/Y");
$script = "<script>document.getElementById('now').value = '$today'</script>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Cửa hàng</title>
</head>
<body>
<form method="post">
    <fieldset>
        <legend>Thêm mặt hàng</legend>
        <input type="text" name="action" value="add" hidden="hidden">
        Id: <input type="number" name="id" required min="0">
        Tên: <input type="text" name="name" required>
        Loại: <input type="text" name="category" required>
        Ngày tạo: <label for="now"></label><input id="now" type="text" name="dateCreated" disabled="disabled">
        <br>
        Số lượng:<input type="number" name="amount" required min="1">
        Giá: <input type="number" name="price" required min="0">
        Ảnh: <input type="text" name="img" required>
        Mô tả: <textarea name="description" id="description"></textarea>
        <button type="submit" class="actions" id="add">Thêm</button>
    </fieldset>
</form>
<form method="post">
    <fieldset>
        <legend>Sửa mặt hàng</legend>
        <input type="number" name="action" value="update" hidden="hidden">
        Id: <input type="number" name="id" required min="0">
        Tên: <input type="text" name="name" required>
        Loại: <input type="text" name="category" required>
        <br>
        Số lượng:<input type="number" name="amount" required min="1">
        Giá: <input type="number" name="price" required min="0">
        Ảnh: <input type="text" name="img" required>
        Mô tả: <textarea name="description" id="description"></textarea>
        <button type="submit" class="actions" id="add">Cập nhật</button>
    </fieldset>
</form>
<table>
    <caption><h2>Danh sách mặt hàng</h2></caption>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Loại</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>Ngày tạo</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($GLOBALS['listProducts'] as $product):?>
        <tr>
            <td><?php echo $product->getId()?></td>
            <td><?php echo $product->getName()?></td>
            <td><?php echo $product->getCategory()?></td>
            <td><?php echo $product->getAmount()?></td>
            <td><?php echo $product->getPrice()?></td>
            <td><?php echo $product->getDescription()?></td>
            <td><?php echo $product->getDateCreated()?></td>
            <td><?php echo $product->getImg()?></td>
            <td>
                <form method="post">
                    <input type="text" name="id" value="<?php echo $product->getId()?>" hidden="hidden">
                    <input type="text" name="action" value="delete" hidden="hidden">
                    <button type="submit">Xóa</button>
                </form>
            </td>
        </tr>
    <?php endforeach;?>
</body>
</html>
<?php
echo $script;
?>