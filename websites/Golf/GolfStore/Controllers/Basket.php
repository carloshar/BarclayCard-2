<?php
namespace GolfStore\Controllers;
class Basket{
    private $basketTable;

    public function __construct($basketTable) {
        $this->basketTable = $basketTable;
    }

    public function load() {
        $basket = $this->basketTable->findAll();
        return [
            'template' => 'basket.html.php',
            'variables' => ['basket' => $basket],
            'title' => 'The Golf Shop - Your Basket'
        ];

    }

    public function remove(){
       

        if(isset($_POST['remove'])){
            $this->basketTable->delete($_POST['basket']['basket_id']);
        }
        $basket = $this->basketTable->findAll();
        return [
            'template' => 'basket.html.php',
            'variables' => ['basket' => $basket],
            'title' => 'The Golf Shop - Your Basket'
        ];
    }


}