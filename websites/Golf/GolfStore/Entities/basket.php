<?php
namespace GolfStore\Entities;
class basket {
public $products;
public $products_id;
public $quantity;
public $basket_id;

 public function __construct(\Backend\DatabaseTable $prodTable) {
 $this->products = $prodTable;
 }

 public function getProduct() {
    return $this->products->find('products_id', $this->product_id)[0];
 }

}