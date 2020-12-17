<?php
include_once "Product.php";
include_once "ProductManager.php";

const FILENAME = 'data.json';

$dataLoad = loadData();
$manager = new ProductManager();

if (count($dataLoad) > 0) {
    foreach ($dataLoad as $value) {
        $product = new Product($value[0], $value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7]);
        $manager->add($product);
    }
}

$listProducts = $manager->getProducts();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $action = $_POST['action'];

    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $dateCreated = $_POST['timeCreated'];
    $img = $_POST['img'];

    //$productArray = [$id, $name, $category, $amount, $price, $description, $dateCreated, $img];

    switch ($action) {
        case "add":
            addProduct($id, $name, $category, $amount, $price, $description, $dateCreated, $img);
            break;
        case "edit":
            break;
    }

    $dataSave = [];
    foreach ($manager->getProducts() as $value) {
        array_push($dataSave, toArray($value));
    }
    saveData($dataSave);
    header("location:index.php");
}

function addProduct($id, $name, $category, $amount, $price, $description, $dateCreated, $img)
{
    $product = new Product($id, $name, $category, $amount, $price, $description, $dateCreated, $img);
    $GLOBALS["manager"]->add($product);
    saveData(toArray($product));
}

function deleteProduct($index)
{
    $GLOBALS['productManager']->delete($index);
}

function updateProduct($index, $product)
{

}

function toArray($obj)
{
    return [$obj->getID(), $obj->getName(), $obj->getCategory(), $obj->getAmount(), $obj->getPrice(), $obj->getDescription(), $obj->getDateCreated(), $obj->getImg()];
}

function saveData($data)
{
    $dataJson = json_encode($data);
    file_put_contents(FILENAME, $dataJson);
}

function loadData()
{
    return json_decode(file_get_contents(FILENAME), true);
}