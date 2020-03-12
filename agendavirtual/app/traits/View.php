<?php
namespace app\traits;

// use Twig\Loader\FilesystemLoader;
// use Twig\Environment;
use app\src\Load;
// use Slim\Exception\HttpException;
// use Psr\Http\Message\ResponseInterface;

trait View{

    protected $twig;

    protected function twig(){
        $loader = new \Twig\Loader\FilesystemLoader('../app/views');
        $this->twig = new \Twig\Environment($loader, [
            // 'cache' => '../app/cache',
            // 'debug' => true
        ]);
    }

    protected function functions(){
        $functions = Load::file('/app/functions/twig.php');

        foreach($functions as $function){
            $this->twig->addFunction($function);
        }
    }

    protected function load(){
        $this->twig();

        $this->functions();
    }

    protected function view($view, $data){
        $this->load();

        $template = $this->twig->load(str_replace('.','/',$view).'.html');

        return $template->display($data);
    }
}
