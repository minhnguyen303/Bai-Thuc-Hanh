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
    $dateCreated = date("H:i - j/m/Y");
    $img = $_POST['img'];

    $productArray = [$id, $name, $category, $amount, $price, $description, $dateCreated, $img];

/*    echo $action;
    echo $id;
    die();*/
    switch ($action) {
        case "add":
            if (!isExit($id)){
                addProduct($productArray);
            }
            else{
            }
            break;
        case "edit":
            updateProduct($id, arrayToProduct($productArray));
            break;
        case "delete":
            deleteProduct($id);
            break;
    }

    $dataSave = [];
    foreach ($manager->getProducts() as $value) {
        array_push($dataSave, productToArray($value));
    }
    saveData($dataSave);
    header("location:index.php");
}

function isExit($id){
    foreach ($GLOBALS["manager"]->getProducts() as $product){
        if ($product->getId() == $id){
            return true;
        }
    }
    return false;
}

function addProduct($array)
{
    $product = arrayToProduct($array);
    $GLOBALS["manager"]->add($product);
    saveData(productToArray($product));
}

function deleteProduct($id)
{
    $GLOBALS['manager']->delete($id);
}

function updateProduct($id, $product)
{
    $GLOBALS['manager']->update($id, $product);
}

function productToArray($obj)
{
    return [$obj->getID(), $obj->getName(), $obj->getCategory(), $obj->getAmount(), $obj->getPrice(), $obj->getDescription(), $obj->getDateCreated(), $obj->getImg()];
}

function arrayToProduct($array){
    return new Product($array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6], $array[7]);
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