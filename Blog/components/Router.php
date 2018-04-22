<?php


/**
*  Выводит статьи какие потребовал пользователь
*/
class Router
{

	private $routes = [];
// Connect routes.php
	public function __construct(){
			$routersPath = ROOT.'/config/routes.php';
			$this->routes = include($routersPath);
	}
// return string URI
	private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

	public function run(){
	    $uri = $this->getURI();

//      Connect conntroller and action
	    foreach ( $this->routes as $uriPattern => $path){
	        if (preg_match("~$uriPattern~", $uri)){
	            $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

	            $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments)). 'Controller';
                $actionName = 'action' . ucfirst(array_shift($segments));

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                $parametrs = $segments;

//      Connect controllerFile
                if (file_exists($controllerFile)){
                    include_once($controllerFile);
                }
//      Creat controller and launches action
                $controllerOdject = new $controllerName;
                $result = call_user_func_array(array($controllerOdject, $actionName), $parametrs);
                if ($result != null){
                    break;
                }
            }
        }
	}


}
?>