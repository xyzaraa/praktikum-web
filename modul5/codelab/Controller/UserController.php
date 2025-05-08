<?php
namespace app\Controller;

require_once 'Traits/ApiResponseFormatter.php';
require_once 'Models/User.php';

use app\Models\User;
use app\Traits\ApiResponseFormatter;

class UserController
{
    use ApiResponseFormatter; 

    public function index()
    {
        $userModel = new User();
        $response = $userModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $userModel = new User();
        $response = $userModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        $userModel = new User();
        $response = $userModel->create([
            "user_name" => $inputData['user_name'],
            "user_id" => rand(1000, 9999),
            "product_id" => $inputData['product_id']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        $userModel = new User();
        $response = $userModel->update([
            "user_name" => $inputData['user_name'],
            "product_id" => $inputData['product_id']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $userModel = new User();
        $response = $userModel->destroy($id);

        return $this->apiResponse(200, "success", $response);
    }
}
