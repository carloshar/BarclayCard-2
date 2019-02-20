<?php
namespace BarclayCard\Entity;
class Stock {
    public $catList;

    public $category_id;

    public function __construct(\PHPBackend\DatabaseTable $catList) {
        $this->catList = $catList;
    }

    //finds the category name based on id
    public function getCategory() {
        return $this->catList->find('category_id', $this->category_id)[0];
    }
}
