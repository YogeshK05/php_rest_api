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

// Get ID
$category->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get category
$category->read_single();

/*This does not work
echo '{\n
        "id": ' . $category->id .
    '\n"name": ' . $category->name .
    '\n"created_at": ' . $category->created_at .
    '\n}';
*/

//That is why we create an array
$cats_arr = array(
    'id' => $category->id,
    'name' => $category->name,
    'created_at' => $category->created_at
);

//Make JSON
print_r(json_encode($cats_arr));