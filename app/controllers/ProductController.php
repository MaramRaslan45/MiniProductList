<?php

namespace app\controllers ;

use app\models\product;
use app\Router;

class ProductController
{
  public function index(Router $router){
    $search= $_GET['search']?? '';
   $products= $router->db->getproducts($search);
      $router->renderView('products/index', [

      'products'=>$products,
      'search'=>$search
     ]);

  }
  public function Create(Router $router){
    $errors=[];
    $productData=[
      'Title'=> '',
      'Describtion'=>'',
      'Image'=>'',
      'Price'=>''
    ];
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $productData['Title']=$_POST['Title'];
      $productData['Describtion']=$_POST['Describtion'];
      $productData['Price']=(float)$_POST['Price'];
      $productData['imageFile']=$_Files['Image']??null;

      $product=new product();
      $product->load($productData);
      $errors=$product->save();
      if(empty($errors)){
        header('Location:/products');
      exit;

      }
      
    }
    $router->renderView('products/Create', [

      'product'=>$productData,
      'errors'=>$errors
     ]);

  }
  public function Update(Router $router){
    $id=$_GET['id']??null;
    if(!$id){
      header('Location:/products');
      exit;

    }
    $errors=[];
    $productData=$router->db->getProductById($id);
    if ($_SERVER['REQUEST_METHOD']==='POST'){
      $productData['Title']=$_POST['Title'];
      $productData['Describtion']=$_POST['Describtion'];
      $productData['Price']=(float)$_POST['Price'];
      $productData['imageFile']=$_Files['Image']??null;

      $product=new product();
      $product->load($productData);
      $errors=$product->save();
      if(empty($errors)){
        header('Location:/products');
      exit;

      }

    }

    $router->renderView('products/Update',[
            'product'=>$productData,
            'errors'=>$errors

    ]);

  }
  public function delete(Router $router){
    $id=$_POST['id'] ??null;
    if(!$id){
      header('Location:/products');
      exit;
    }
    $router->db->deleteproduct($id);
    header('Location:/products');

  }
}
