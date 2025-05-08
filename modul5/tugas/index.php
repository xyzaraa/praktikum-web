<?php
header("Content-Type: application/json; charset=UTF-8");

require_once 'Routes/ProductRoutes.php';
require_once 'Routes/UserRoutes.php';

use app\Routes\ProductRoutes;
use app\Routes\UserRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (strpos($path, '/api/product') === 0) {
    $productRoute = new ProductRoutes();
    $productRoute->handle($method, $path);
}

elseif (strpos($path, '/api/user') === 0) {
    $userRoute = new UserRoutes();
    $userRoute->handle($method, $path);
}

else {
    http_response_code(404);
    echo json_encode(["message" => "Not Found"]);
}
