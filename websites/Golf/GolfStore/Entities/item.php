<?php
namespace GolfStore\Entities;
class item {
 public $CatTable;
 public $product_id;
 public $name;
 public $description;
 public $price;
 public $catagory_id;


 public function __construct(\Backend\DatabaseTable $CatTable) {
 $this->CatTable = $CatTable;
 }
 public function getCategory() {
    return $this->CatTable->find('catagory_id', $this->catagory_id)[0];
 }
 public function getAllCat(){
     return $this->CatTable->findAll();
 }
}