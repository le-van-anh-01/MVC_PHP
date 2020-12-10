<?php
ob_start();
session_start();

    require_once("./Core/Database.php");
    require_once("./Models/BaseModel.php");
    require_once("./Controllers/BaseController.php");

    //get controller
    $controllerName = strtolower($_REQUEST['controller']?? 'User');
    $controllerName = ucfirst("{$controllerName}Controller");

    //get action
    $actionName = $_REQUEST['action']?? 'login';

    require_once("./Controllers/{$controllerName}.php");

    $controllerObj = new $controllerName;

    $controllerObj->$actionName();

?>