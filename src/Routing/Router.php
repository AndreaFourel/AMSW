<?php

namespace Routing;


use ReflectionException;
use ReflectionMethod;


class Router
{
    private array $routes = [];


    // Adds a route into router internal array
    public function addRoute(
        string $name,
        string $url,
        string $httpMethod,
        string $controller,
        string $method
    )
    {
        $this->routes[] = [
            'name' => $name,
            'url' => $url,
            'http_method' => $httpMethod,
            'controller' => $controller,
            'method' => $method
        ];

    }
    public function getRoute(string $uri, string $httpMethod): ?array
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $uri && $route['http_method'] === $httpMethod) {
                return $route;
            }
        }
        return null;
    }

    /**
     * @throws RouteNotFoundException if route not found
     * @throws ReflectionException
     */
    public function execute(string $requestUri, string $requestMethod)
    {
        $route = $this->getRoute($requestUri, $requestMethod);
        if ($route === null) {
            throw new RouteNotFoundException($requestUri);
        }
        $controller = $route['controller'];
        $method = $route['method'];
        $controllerInstance = new $controller();

        $methodInfo = new ReflectionMethod($controller . '::' . $method);
        $methodParams = $methodInfo->getParameters();
//        var_dump($methodParams);
//        var_dump($requestUri);
//        $requestUriArray = explode('/', $requestUri);
//        var_dump(end($requestUriArray));
        if($requestMethod === 'GET'){
            if (!empty($methodParams)) {
                $requestUriArray = explode('/', $requestUri);
                $param = intval(end($requestUriArray));

                $controllerInstance->$method($param);

            } else {
                $controllerInstance->$method();
            }
        } elseif ($requestMethod === 'POST') {
            $controllerInstance->$method((int)($_POST['mission']));

        }

    }

}