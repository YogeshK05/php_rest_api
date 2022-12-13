<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

//Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

//Instantiate blog category object
$category = new Category($db);

//Get ID
$data = isset($_GET['id']) ? $_GET['id'] : die();

$category->id = $data;

//Delete category
if($category->delete()){
    print_r(json_encode(array("message" => "Category Deleted")));
}
