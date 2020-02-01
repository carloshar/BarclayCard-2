<?php
namespace GolfStore\Controllers;
class User{
    private $userTable;
    
        public function __construct($userTable) {
            $this->userTable = $userTable;
        }
        
        public function login() {
            $login = false;
            
            if(isset($_SESSION['loggedin'])){
                $login = true;
            }
            return [
                'template' => 'login.html.php',
                'variables' => ['login' => $login],
                'title' => 'The Golf Shop - LOGIN'
            ];
    
        }
    
        public function loginPost() {
            $staff = $this->userTable->findAll();
            $login = false;
            
            if(isset($_POST['logout'])){
                session_start();
                session_destroy();
            }
            if(isset($_SESSION['loggedin'])){
                $login = true;
            }
            if(isset($_POST['login'])){
                $errors = $this->validateLogin($_POST['staff']);
                if(count($errors)==0){
                foreach($staff as $user){
                    if($_POST['staff']['username']==$user->email&&password_verify($_POST['staff']['password'],$user->pass)){
                        session_start();
                        $_SESSION['loggedin'] = $user->users_id;
                        $login= true;
                    }
                }}else{
                    return [
                        'template' => 'login.html.php',
                        'variables' => ['login' => $login,
                                        'errors' => $errors],
                        'title' => 'The Golf Shop - LOGIN'
                    ]; 
                }
                
            }
            return [
                'template' => 'login.html.php',
                'variables' => ['login' => $login],
                'title' => 'The Golf Shop - LOGIN'
            ];
    
        }

        public function admin(){
            return [
                'template' => 'admin/admin.html.php',
                'variables' => [],
                'title' => 'The Golf Shop - ADMIN'
            ];
        }

        public function list(){
            $staff = $this->userTable->findAll();
            return [
                'template' => 'admin/staff.html.php',
                'variables' => ['staff'=>$staff],
                'title' => 'The Golf Shop - ADMIN Staff List'
            ];
        }

        public function staffPost(){
            $staff = $this->userTable->findAll();
            if(isset($_POST['delete'])){
                $info = $_POST['user']['id'];
                $this->staffTable->delete($info);
                header('location: /admin/staff');
            }elseif(isset($_POST['save'])){
                $errors = $this->validateLogin($_POST['user']);
                if(count($errors)==0){
                    $info = $_POST['user'];
                    $info['password'] = password_hash($_POST['user']['password'], PASSWORD_DEFAULT);
                    $this->userTable->save($info);
                    header('location: /admin/staff');
                }else{
                    return [
                        'template' => 'admin/staff.html.php',
                        'variables' => ['staff'=>$staff,
                                        'errors'=>$errors],
                        'title' => 'The Golf Shop - ADMIN Staff List'
                    ]; 
                }
            }else{
                return [
                    'template' => 'admin/staff.html.php',
                    'variables' => ['staff'=>$staff],
                    'title' => 'The Golf Shop - ADMIN Staff List'
                ]; 
            }
        }

        public function validateLogin($x){
            $errors = [];
            if($x['username']==''){
                $errors[] = 'Username Field Empty';
            }
            if($x['password']==''){
                $errors[] = 'Password Field Empty';
            }
            return $errors;
        }

        



}