<?php
namespace app;

use app\models\product;
use PDO;

class Database{
    public \PDO $pdo;
    public static Database $db;
public function __construct()
{
    $this->pdo=new PDO ('mysql:host=localhost;port=3306;dbname=products','root','');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    self::$db=$this;

}
public function getproducts($search=''){
   
if($search){
    $stmt=$this->pdo->prepare('SELECT * FROM product_info WHERE Title LIKE :Title ORDER BY DateTime DESC');
    $stmt->bindValue(':Title',"%$search%");

}
else{
    $stmt=$this->pdo->prepare('SELECT * FROM product_info ORDER BY DateTime DESC');
} 


$stmt->execute();
 return $stmt->fetchAll(PDO::FETCH_ASSOC);


}
public function getProductById($id){
    $stmt=$this->pdo->prepare('SELECT * FROM product_info WHERE id=:id');
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);

}
public function createproduct(product $product){
    $stmt=$this->pdo->prepare("INSERT INTO product_info(Title,Image,Describtion,Price,DateTime)
VALUES(:Title,:Image,:Describtion,:Price,:DateTime)");

$stmt->bindValue(':Title',$product->Title);
$stmt->bindValue(':Image',$product->imagepath);
$stmt->bindValue(':Describtion',$product->Describtion);
$stmt->bindValue(':Price',$product->Price);
$stmt->bindValue(':DateTime',date('Y-m-d H:i:s'));
$stmt->execute();

}
public function updateproduct(product $product){
 $stmt=$this->pdo->prepare("UPDATE product_info SET Title=:Title,Image=:Image,Describtion=:Describtion,Price=:Price WHERE id=:id");


$stmt->bindValue(':Title',$product->Title);
$stmt->bindValue(':Image',$product->imagepath);
$stmt->bindValue(':Describtion',$product->Describtion);
$stmt->bindValue(':Price',$product->Price);
$stmt->bindValue(':id',$product->id);
$stmt->execute();

}
public function deleteproduct($id){
    $stmt=$this->pdo->prepare('DELETE FROM product_info WHERE id=:id');
$stmt->bindValue(':id',$id);
$stmt->execute();

}
}

?>