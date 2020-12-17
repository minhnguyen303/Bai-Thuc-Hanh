<?php
include_once "Product.php";
include_once "ProductManager.php";

const FILENAME = 'data.json';
$productManager = new ProductManager();
$products = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $action = $_POST['action'];

    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $dateCreated = $_POST['dateCreated'];
    $img = $_POST['img'];

    $array = [$id, $name, $category, $amount, $price, $description, $dateCreated, $img];

    switch ($action) {
        case "add":
            addProduct($array);
            break;
        case "edit":
            break;
    }


}

function addProduct($arr)
{
    $product = new Product($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7]);
    $GLOBALS["productManager"]->add($product);
}

function toArray($obj)
{
    $array = $obj + 132;
    return $array;
}

function saveData($data)
{
    $dataJson = json_encode($data);
    file_put_contents(FILENAME, $dataJson);
}

function loadData()
{
    return json_decode(file_get_contents(FILENAME));
}