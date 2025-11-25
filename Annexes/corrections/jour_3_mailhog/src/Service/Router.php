<?php declare(strict_types=1);

namespace App\Service;

use FastRoute;

final class Router {

    public function run() {
        $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
            require dirname(__DIR__, 2) . '/config/routes.php';
        });

        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // todo: 404 Not Found
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // todo:  405 Method Not Allowed
                break;
            case FastRoute\Dispatcher::FOUND:
                // Je vérifie si mon parametre est une chaine de caractere
                if(is_string($routeInfo[1])) {
                    // si dans la chaine reçu on trouve les ::
                    if(strpos($routeInfo[1], '::') !== false) {
                        //on coupe sur l'operateur de resolution de portée (::)
                        // qui est symbolique ici dans notre chaine de caractere.
                        $route = explode('::', $routeInfo[1]);
                        $method = [new $route[0], $route[1]];
                    } else {
                        // sinon c'est directement la chaine qui nous interesse
                        $method = $routeInfo[1];
                    }
                }
                // dans le cas ou c'est appelable (closure (fonction anonyme) par exemple)
                elseif(is_callable($routeInfo[1])) {
                    $method = $routeInfo[1];
                }
                // on execute avec call_user_func_array
                echo call_user_func_array($method, $routeInfo[2]);
                break;
        }
    }
}