<?php

include_once "../config/database.php";
include_once "../objects/carts.php";

$database = new Database();
$db = $database->getConnection();

$cart = new Carts($db);
$cart->id = isset($_GET['id']) ? $_GET['id'] : die();

if ($cart->removeFromCart()) {
    http_response_code(200);
    echo json_encode(array("message" => "Товар был удалён"), JSON_UNESCAPED_UNICODE);
}
else {
    http_response_code(503);
    echo json_encode(array("message" => "Не удалось удалить товар"));
}