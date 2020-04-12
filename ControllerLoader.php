<?php

namespace Maldoninnho\ControllerLoader;

use Exception;

/**
 * Description of Mvc
 *
 * @author Maldoninho
 */
abstract class ControllerLoader {

    private static $controller;

    private static function setController($routes, $paths) {
        $dirPath = str_replace('\\', '/', $paths['controllersPath'] . ($routes['admin'] === TRUE ? "admin/" : "") . $routes['controller'] . 'Controller.php');
        $classPath = $paths['namespace'] . ($routes['admin'] === TRUE ? "admin\\" : "") . ucfirst(strtolower($routes['controller'])) . 'Controller';
        if (file_exists($dirPath)) {
            try {
                require($dirPath);
                self::$controller = new $classPath($routes);
                return self::$controller;
            } catch (\Exception $e) {
                exit($e->getMesage());
            }
        } else {
            exit("The controller ( " . strtoupper($routes['controller']) . " ) dosen't exists");
        }
    }

    private static function setAction($routes, $controller) {
        $action = $routes['action'];
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            exit("The action ( " . strtoupper($routes['action']) . " ) dosen't exists");
        }
    }

    public static function run($routes, $paths) {
        self::setController($routes, $paths);
        self::setAction($routes, self::$controller);
    }

}
