<?php



require_once __DIR__ .'/../vendor/autoload.php';

use app\Router;
use app\controllers\ProductController;


 $router= new Router();

 $router->get('/',[ProductController::class,'index']);
 $router->get('/products',[ProductController::class,'index']);
 $router->get('/products/Create',[ProductController::class,'Create']);
 $router->post('/products/Create',[ProductController::class,'Create']);
 $router->get('/products/Update',[ProductController::class,'Update']);
 $router->post('/products/Update',[ProductController::class,'Update']);
 $router->post('/products/delete',[ProductController::class,'delete']);

 $router->resolve();





