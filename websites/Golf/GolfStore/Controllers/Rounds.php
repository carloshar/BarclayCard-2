<?php
namespace GolfStore\Controllers;
class Rounds{

    private $roundsTable;
    private $buggyTable;

    public function __construct($roundsTable, $buggyTable) {
        $this->roundsTable = $roundsTable;
        $this->buggyTable = $buggyTable;
    }

    public function load(){
        $rounds = $this->roundsTable->findAll();
        return [
            'template' => 'rounds.html.php',
            'variables' => ['rounds' => $rounds],
            'title' => 'The Golf Shop - Rounds Booking'
        ];
    }

    public function post(){
        $rounds = $this->roundsTable->findAll();
        if(isset($_POST['booking'])){
            $this->roundsTable->save($_POST['booking']);
            if($_POST['buggy'] == 1){
                $book['booking']['date'] = $_POST['booking']['date'];
                $this->buggyTable->insert($book['booking']);
            }
            return [
                'template' => 'rounds.html.php',
                'variables' => ['rounds' => $rounds,
                                'con' => $_POST['booking']['date']],
                'title' => 'The Golf Shop - Rounds Booking'
            ];
        }


    }

}