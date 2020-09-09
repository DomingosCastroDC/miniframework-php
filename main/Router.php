<?php
namespace app\main;

use app\main\exception\NotFoundException;
class Router 
{
    public array $routes = [];
    public $value = '';

    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = new Request();
    }

    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getUriPath();

        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false)
        {
            throw new NotFoundException("Page Not Found");
        }

        if(is_string($callback))
        {
            return App::$app->view->render($callback);
        }

        if(is_array($callback))
        {
            App::$app->controller = new $callback[0];
            $callback[0] = App::$app->controller; 
        }
        
        return call_user_func_array($callback,$this->request->getBody());
    }
}