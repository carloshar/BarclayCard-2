<?php
namespace GolfStore\Controllers;
class Basket{
    private $basketTable;
    private $buggyTable;
    private $roundsTable;

    public function __construct($basketTable , $buggyTable , $roundsTable) {
        $this->basketTable = $basketTable;
        $this->buggyTable = $buggyTable;
        $this->roundsTable = $roundsTable;
    }

    public function load() {
        $basket = $this->basketTable->findAll();
        $buggy = $this->buggyTable->findAll();
        $rounds = $this->roundsTable->findAll();
        return [
            'template' => 'basket.html.php',
            'variables' => ['basket' => $basket,
                            'buggy' => $buggy,
                            'rounds' => $rounds],
            'title' => 'The Golf Shop - Your Basket'
        ];

    }

    public function remove(){
        

        if(isset($_POST['remove'])){
            $this->basketTable->delete($_POST['basket']['basket_id']);
        
        }
        if(isset($_POST['removeB'])){
            $this->buggyTable->delete($_POST['basket']['buggy_id']);
          
        }
        if(isset($_POST['removeR'])){
            $this->roundsTable->delete($_POST['basket']['rounds_id']);
          
        }
        $basket = $this->basketTable->findAll();
        $buggy = $this->buggyTable->findAll();
        $rounds = $this->roundsTable->findAll();
        return [
            'template' => 'basket.html.php',
            'variables' => ['basket' => $basket,
                            'buggy' => $buggy,
                            'rounds' => $rounds],
            'title' => 'The Golf Shop - Your Basket'
        ];

    }

    public function admin(){
        $basket = $this->basketTable->findAll();
        $buggy = $this->buggyTable->findAll();
        $rounds = $this->roundsTable->findAll();
        return [
            'template' => 'admin.html.php',
            'variables' => ['basket' => $basket,
                            'buggy' => $buggy,
                            'rounds' => $rounds],
            'title' => 'The Golf Shop - Admin Stock Tracking'
        ];
    }


}