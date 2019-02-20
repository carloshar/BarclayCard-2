<?php
namespace BarclayCard\Entity;
class Stock {
    public $catList;

    public $id;
    public $name;
    public $price;
    public $categoryId;
    public $description;
    public $saleprice;
    public $image
    public $approved

    public function __construct(\PHPBackend\DatabaseTable $catList) {
        $this->catList = $catList;
    }

    //finds the category name based on id
    public function getCategory() {
        return $this->catList->find('id', $this->categoryId)[0];
    }
}
