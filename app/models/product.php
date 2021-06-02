<?php

namespace app\models;

use app\Database;
use app\helpers\Utilhelper;

class product{
    public ?int $id=null;
    public ?string $Title=null;
    public ?string $Describtion=null;
    public ?float $Price=null;
    public ?string $imagepath=null;
    public ?array $imageFile=null;

    public function load($data){
   $this ->id=$data['id']??null;
   $this ->Title=$data['Title'];
   $this ->Describtion=$data['Describtion']?? '';
   $this ->Price=$data['Price'];
   $this ->imageFile=$data['imageFile']??null;
   $this ->imagepath=$data['imagepath']??null;

    }
    public function save(){
        $errors=[];
        if(!$this->Title){
            $errors[]='Product title is required';
        }
        if(!$this->Price){
            $errors[]='Product Price is required';
        }
        if (!is_dir(__DIR__.'/../public/images')){
            mkdir(__DIR__.'/../public/images');
        }
        if (empty($errors)){
           
            if($this->imageFile && $this->imageFile['tmp_name']){
                if($this->imagepath){
                    unlink(__DIR__.'/../public/'.$this->imagepath);
                }
                $this->imagepath='images/'.Utilhelper::randomString(8).'/'.$this->imageFile['name'];
                mkdir(dirname(__DIR__.'/../public/'.$this->imagepath));
                move_uploaded_file($image['tmp_name'],__DIR__.'/../public/'.$this->imagepath);
            }
            $db=Database::$db;
            if($this->id){
                $db->updateproduct($this);

            }
            else{
                $db->createproduct($this);
            }
        }
        return $errors;
    }


}