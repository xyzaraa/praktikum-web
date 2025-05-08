<?php
namespace app\Routes;

require_once 'Controller/UserController.php';

use app\Controller\UserController;

class UserRoutes
{
    public function handle($method, $path)
    {
        if ($method === 'GET' && $path == '/api/users') {
            $controller = new UserController();
            echo $controller->index();
        }

        if ($method === 'GET' && strpos($path, '/api/users/') == 0) {

            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new UserController();
            echo $controller->getById($id);
        }

        if ($method === 'POST' && $path == '/api/users') {
            $controller = new UserController();
            echo $controller->insert();
        }

        if ($method === 'PUT' && strpos($path, '/api/users/') == 0) {

            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new UserController();
            echo $controller->update($id);
        }

        if ($method === 'DELETE' && strpos($path, '/api/users/') == 0) {
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new UserController();
            echo $controller->delete($id);
        }
    }
}
