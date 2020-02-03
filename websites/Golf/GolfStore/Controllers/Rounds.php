<?php
namespace GolfStore\Controllers;
class Rounds{

    private $roundsTable;

    public function __construct($roundsTable) {
        $this->roundsTable = $roundsTable;
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
            return [
                'template' => 'rounds.html.php',
                'variables' => ['rounds' => $rounds,
                                'con' => $_POST['booking']['date']],
                'title' => 'The Golf Shop - Rounds Booking'
            ];
        }


    }

}