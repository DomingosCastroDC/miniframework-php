<?php
namespace app\main;

class View
{
    public string $title = '';

    #renderizar a view com um layout
    public function render($view,$params = [])
    {
        $viewContent = $this->renderOnlyView($view,$params);
        $renderLavout = $this->renderLayout();

        return str_replace("{{content}}",$viewContent,$renderLavout);
    }

    #renderiza um layout
    protected function renderLayout()
    {
        $layout = App::$app->controller->layout;
        if(App::$app->controller)
        {
            $layout = App::$app->controller->layout;
        }
        

        ob_start();
        require_once App::$ROOT_PATH."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    #renderiza apenas view
    protected function renderOnlyView($view,$params = [])
    {
        extract($params);
        ob_start();
        require_once App::$ROOT_PATH."/views/$view.php";
        return ob_get_clean();
    }

    

}