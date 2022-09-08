<?php

namespace Routing;

use ReflectionException;
use ReflectionMethod;

class Router
{
    private array $routes = [];

    /**
     * Adds a route into router internal array
     *
     * @param string $name
     * @param string $url
     * @param string $httpMethod
     * @param string $controller
     * @param string $method
     */
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

    /**
     * Return a route if request matches any defined routes and replace {id} in $route['url'] with the requested id
     *
     * @param string $uri
     * @param string $httpMethod
     * @return array|null
     */
    public function getRoute(string $uri, string $httpMethod): ?array
    {
        foreach ($this->routes as $route) {
            if ($route['url'] === $uri && $route['http_method'] === $httpMethod) {
                   return $route;
            } elseif (str_contains($route['url'], '{id}') && $route['http_method'] === $httpMethod){
                $urlArray = explode('/',$route['url']);
                $uriArray = explode('/', $uri);
                if ($urlArray[1] === $uriArray[1]){
                    $urlArray[2] = $uriArray[2];
                    $route['url'] = implode('/', $urlArray);
                    return $route;
                }
            }
        }
        return null;
    }

    /**
     * Executes router on specified URI and HTTP Method
     *
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

        // check if method has params and set its value
        $methodInfo = new ReflectionMethod($controller . '::' . $method);
        $methodParams = $methodInfo->getParameters();

        if($requestMethod === 'GET'){
            if (!empty($methodParams)) {
                $requestUriArray = explode('/', $requestUri);
                $param = intval(end($requestUriArray));
                $controllerInstance->$method($param);
            } else {
                $controllerInstance->$method();
            }
        } else {
            // TODO find how to use this for any form names
            $controllerInstance->$method((int)($_POST['mission']));
        }
    }

}