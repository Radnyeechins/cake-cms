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
    $routes->connect('/', ['controller' => 'Articles', 'action' => 'index', 'home']);
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
Router::scope('/api', function ($routes) {
    $routes->connect('/article-list', ['controller' => 'Articles', 'action' => 'index']);
   // $routes->connect('/article-add', ['controller' => 'Articles', 'action' => 'add','allowWithoutToken' => true]);
    $routes->connect('/article-edit/:slug', ['controller' => 'Articles', 'action' => 'edit']);

});