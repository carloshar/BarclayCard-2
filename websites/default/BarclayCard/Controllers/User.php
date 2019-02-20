<?php
namespace BarclayCard\Controllers;

class User {
    private $userList;

    public function __construct($userList){
        $this->userList=$userList;
    }

    //displays the form for logging in
    public function loginForm(){
        return [
            'template' => 'login.html.php',
            'variables' => [],
            'title' => 'Login'
        ];
    }

    //submit the user details and verify them against the database.
    public function loginSubmit() {
        $user = $_POST['user'];
        $result = $this->userList->find('username', $user['username']);
        if (empty($result)){
            return [
                'template' => 'login.html.php',
                'variables' => [],
                'title' => 'Login'
            ];
        }
        $password = $result[0]->password;
        if (password_verify($user['password'], $password)) {
            session_start();
            $_SESSION['loggedin'] = $result[0]->id;
            if $result
            header('location: /adminhome');
            return [
                'template' => 'admin.html.php',
                'variables' => [],
                'title' => 'Shopping - Admin'
            ];

        }
        else {
            return ['template' => 'login.html.php',
                    'variables' => [],
                    'title' => 'Login'
                ];
        }
    }
    //logout

    public function logout(){
        return [
            'template' => 'logout.html.php',
            'variables' => [],
            'title' => 'Logout'
        ];
    }
    //list all users

    public function list(){
        $users = $this->userList->findAll();

        return ['template' => 'users.html.php',
                'title' => 'Admin - Users',
                'variables' => [
                    'users' => $users
                    ]
                ];
    }
    //submit a user edit
    public function editSubmit(){
        $user = $_POST['users'];

        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

        $this->userList->save($user);

        header('location: /admin/users');
    }

    //generates edit/add form the users
    public function editForm(){
        if (isset($_GET['id'])) {
            $result = $this->userList->find('id', $_GET['id']);
            $users = $result[0];
        }
        else {
            $users = false;
        }

        return ['template' => 'editusers.html.php',
                'title' => 'Shopping - Admin',
                'variables' => [
                    'users' => $users
                ]
            ];
    }
    //delets a user
    public function delete(){
        $this->userList->delete($_POST['id']);
        $users = $this->userList->findAll();

        return ['template' => 'users.html.php',
                'title' => 'Shopping - Admin',
                'variables' => [
                    'users' => $users
                ]
            ];
    }


}
