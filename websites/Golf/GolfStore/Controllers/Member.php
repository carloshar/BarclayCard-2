<?php
namespace GolfStore\Controllers;
class Member{

    private $memberTable;
    
        public function __construct($memberTable) {
            $this->memberTable = $memberTable;
        }

        public function load() {
            
            $members = $this->memberTable->findAll();
            return [
                'template' => 'Membership.html.php',
                'variables' => ['members' => $members],
                'title' => 'The Golf Shop - Membership'
            ];
    
        }

        public function post(){
            $members = $this->memberTable->findAll();
            
            if(isset($_POST['loginS'])){
                foreach ($members as $mem){
                    if($_POST['login']['email'] == $mem->email && $_POST['login']['pass'] == $mem->password ){
                        
                        $_SESSION['loggedin'] = true;
                        $_SESSION['type'] = $mem->Type;
                    }
                }
                return [
                    'template' => 'Membership.html.php',
                    'variables' => ['members' => $members],
                    'title' => 'The Golf Shop - Membership'
                ];
            } elseif(isset($_POST['logout'])){
                session_destroy();
                return [
                    'template' => 'home.html.php',
                    'variables' => [],
                    'title' => 'The Golf Shop - Home'
                ];
            } elseif(isset($_POST['signupS'])){
                $_SESSION['user'] = $_POST['signup'];


                return [
                    'template' => 'Membership.html.php',
                    'variables' => ['members' => $members,
                                    'con' => true],
                    'title' => 'The Golf Shop - Membership'
                ];
            }else{
                session_destroy();

                return [
                    'template' => 'Membership.html.php',
                    'variables' => ['members' => $members],
                    'title' => 'The Golf Shop - Membership'
                ];
            }




        }


}