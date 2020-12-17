<?php
include_once "ActionsPage.php";

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
<form action="" method="post">
    <fieldset>
        <legend>Thêm mặt hàng</legend>
        <input type="text" name="action" value="add" hidden="hidden">
        Id: <input type="text" name="id" required>
        Tên: <input type="text" name="name" required>
        Loại: <input type="text" name="category" required>
        Ngày tạo: <input id="now" type="text" name="dateCreated" disabled>
        <br>
        Số lượng:<input type="number" name="amount" required>
        Giá: <input type="number" name="price" required>
        Ảnh: <input type="text" name="img" required>
        Mô tả: <textarea name="description" id="description"></textarea>
        <button type="submit" class="actions" id="add">Thêm</button>
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
                <form action="EditPage.php" method="post">
                    <button>Sửa</button>
                </form></td>
        </tr>
    <?php endforeach;?>
</body>
</html>
<?php
$today = date("H:i - j/m/Y");
$script = "<script>document.getElementById('now').value = '$today'</script>";
echo $script;
?>