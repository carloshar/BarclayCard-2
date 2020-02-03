<?php
namespace GolfStore\Controllers;
class Buggy{
    private $buggyTable;

    public function __construct($buggyTable) {
        $this->buggyTable = $buggyTable;
    }

    public function load(){
        $buggy = $this->buggyTable->findAll();
        return [
            'template' => 'buggy.html.php',
            'variables' => ['buggy' => $buggy],
            'title' => 'The Golf Shop - Buggy Hire'
        ];
    }

    public function post(){
        $buggy = $this->buggyTable->findAll();
        if(isset($_POST['booking'])){
           
            $book = $_POST['booking'];
            $this->buggyTable->insert($book);
        }else{
            return [
                'template' => 'buggy.html.php',
                'variables' => ['buggy' => $buggy],
                'title' => 'The Golf Shop - Buggy Hire'
            ];
        }
        return [
            'template' => 'buggy.html.php',
            'variables' => ['buggy' => $buggy],
            'title' => 'The Golf Shop - Buggy Hire'
        ];
    }
}