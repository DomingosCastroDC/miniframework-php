<?php
namespace app\main;

use app\main\db\DataBase;
use app\main\db\Migration;

class App
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Migration $migration;
    public DataBase $db;
    public ?Controller $controller = null;
    public View $view;
    public static App $app;
    public static $ROOT_PATH;

    public function __construct($pathRoot,array $config = [])
    {
        self::$ROOT_PATH = $pathRoot;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->migration = new Migration();
        $this->controller = new Controller();
        $this->view = new View();
        $this->router = new Router($this->request);
        $this->db = new DataBase($config['db']);

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