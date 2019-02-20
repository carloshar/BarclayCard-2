<?php
namespace BarclayCard\Controllers;

class Shop {

    public function __construct(){
    }

    public function admin_dashboard(){
        return ['template' => 'admindashboard.html.php',
                'title' => 'Dashboard - Admin',
                'variables' => [
                    ]
            ];
    }

    public function user_dashboard(){
        return ['template' => 'userdashboard.html.php',
                'title' => 'Dashboard - User',
                'variables' => [
                    ]
            ];
    }

    public function access_denied(){
        return ['template' => 'accessdenied.html.php',
                'title' => 'Access denied',
                'variables' => [

                ]
            ];
    }

}
