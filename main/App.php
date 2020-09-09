<?php
namespace app\main;

class App
{
    public Router $router;
    public Request $request;
    public ?Controller $controller = null;
    public View $view;
    public static App $app;
    public static $ROOT_PATH;

    public function __construct($pathRoot)
    {
        self::$ROOT_PATH = $pathRoot;
        self::$app = $this;
        $this->request = new Request();
        $this->controller = new Controller();
        $this->view = new View();
        $this->router = new Router($this->request);

    }

    public function execute()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->view->render("error",[
                "exception" => $e
            ]);
        }
    }
}