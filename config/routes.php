<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);
Router::extensions(['json', 'xml']);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));
    $routes->applyMiddleware('csrf');
    $routes->connect('/', ['controller' => 'Articles', 'action' => 'display', 'home']);
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->fallbacks(DashedRoute::class);
});
// Add this
// New route we're adding for our tagged action.
// The trailing `*` tells CakePHP that this action has
// passed parameters.
Router::scope('/articles', function (RouteBuilder $routes) {
    $routes->connect('/tagged/*', ['controller' => 'Articles', 'action' => 'tags']);
});

//API created
Router::scope('/', function ($routes) {
    Router::extensions(['json', 'xml']);
    //$routes->resources('Articles');
    $routes->connect('/articles/article-add', ['controller' => 'Articles', 'action' => 'add']);
    $routes->connect('/articles/article-list', ['controller' => 'Articles', 'action' => 'display']);

});