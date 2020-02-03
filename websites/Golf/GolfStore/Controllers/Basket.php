<?php
namespace GolfStore\Controllers;
class Basket{
    private $basketTable;
    private $buggyTable;

    public function __construct($basketTable , $buggyTable) {
        $this->basketTable = $basketTable;
        $this->buggyTable = $buggyTable;
    }

    public function load() {
        $basket = $this->basketTable->findAll();
        $buggy = $this->buggyTable->findAll();
        return [
            'template' => 'basket.html.php',
            'variables' => ['basket' => $basket,
                            'buggy' => $buggy],
            'title' => 'The Golf Shop - Your Basket'
        ];

    }

    public function remove(){
        $basket = $this->basketTable->findAll();
        $buggy = $this->buggyTable->findAll();

        if(isset($_POST['remove'])){
            $this->basketTable->delete($_POST['basket']['basket_id']);
        }
        if(isset($_POST['removeB'])){
            $this->buggyTable->delete($_POST['basket']['buggy_id']);
        }
        
        return [
            'template' => 'basket.html.php',
            'variables' => ['basket' => $basket,
                            'buggy' => $buggy],
            'title' => 'The Golf Shop - Your Basket'
        ];
    }


}