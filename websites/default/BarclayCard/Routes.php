<?php
namespace BarclayCard;

class Routes implements \PHPBackend\Routes {
    public function getRoutes($route) {
        require '../connection.php'; //connect to the database

        //generate required database data + controllers
        $stockList = new \PHPBackend\DatabaseTable($pdo, 'product', 'id');
        $userList = new \PHPBackend\DatabaseTable($pdo, 'user', 'id');
        $categoryList = new \PHPBackend\DatabaseTable($pdo, 'category', 'id');
        $reviewList = new \PHPBackend\DatabaseTable($pdo, 'review', 'id');

        $stockController = new \BarclayCard\Controllers\Stock($stockList, $categoryList);
        $userController = new \BarclayCard\Controllers\User($userList);
        $categoryController = new \BarclayCard\Controllers\Category($categoryList);
        $reviewController = new \BarclayCard\Controllers\Category($reviewList);
        $shopController = new \BarclayCard\Controllers\Shop();

        //tells the program which functions to use based on the URL annd whether we are using $_POST

        $routes = [
            '' => [
                'GET' => [
                    'controller' => $stockController,
                    'function' => 'home'
                ]
            ],

            'products' => [
                'GET' => [
                    'controller' => $stockController,
                    'function' => 'list'
                ]
            ],

            'login' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'loginForm'
                ],
                'POST' => [
                    'controller' => $userController,
                    'function' => 'loginSubmit'
                ]
            ],

            'logout' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'logout'
                ]
                'login' => true
            ],

            'wishlist' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'wishlist'
                ]
                'login' => true
            ],

            'admin' => [
                'GET' => [
                    'controller' => $shopController,
                    'function' => 'dashboard_home'
                ],
                'admin' => true
            ],

            'admin/categories' => [
                'GET' => [
                    'controller' => $categoryController,
                    'function' => 'list'
                ],
                'admin' => true
            ],

            'admin/categories/edit' => [
                'GET' => [
                    'controller' => $categoryController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $categoryController,
                    'function' => 'editSubmit'
                ],
                'admin' => true
            ],

            'admin/categories/delete' => [
                'POST' => [
                    'controller' => $categoryController,
                    'function' => 'delete'
                ],
                'admin' => true
            ],

            'admin/stock' => [
                'GET' => [
                    'controller' => $stockController,
                    'function' => 'adminlist'
                ],
                'admin' => true
            ],

            'admin/stock/edit' => [
                'GET' => [
                    'controller' => $stockController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $stockController,
                    'function' => 'editSubmit'
                ],
                'admin' => true
            ],

            'admin/stock/delete' => [
                'POST' => [
                    'controller' => $stockController,
                    'function' => 'delete'
                ],
                'admin' => true
            ],

            'admin/reviews' => [
                'GET' => [
                    'controller' => $reviewController,
                    'function' => 'listunapproved'
                ],
                'admin' => true
            ],

            'admin/reviews/completed' => [
                'GET' => [
                    'controller' => $reviewController,
                    'function' => 'listapproved'
                ],
                'admin' => true
            ],

            'admin/reviews/approve' => [
                'POST' => [
                    'controller' => $reviewController,
                    'function' => 'approve'
                ],
                'admin' => true
            ],

            'admin/reviews/unapprove' => [
                'POST' => [
                    'controller' => $reviewController,
                    'function' => 'unapprove'
                ],
                'admin' => true
            ],

            'admin/reviews/delete' => [
                'POST' => [
                    'controller' => $reviewController,
                    'function' => 'delete'
                ],
                'admin' => true
            ],

            'admin/reviews/deleteapproved' => [
                'POST' => [
                    'controller' => $reviewController,
                    'function' => 'deleteapproved'
                ],
                'admin' => true
            ],

            'admin/users' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'list'
                ],
                'admin' => true
            ],

            'admin/users/edit' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $userController,
                    'function' => 'editSubmit'
                ],
                'admin' => true
            ],

            'admin/users/delete' => [
                'POST' => [
                    'controller' => $userController,
                    'function' => 'delete'
                ],
                'admin' => true
            ],

            'accessdenied' => [
                'GET' => [
                    'controller' => $shopController,
                    'function' => 'access_denied'
                ]
            ]
        ];
        return $routes;
    }

    public function checkLogin(){
        if(!isset($_SESSION['loggedin'])){
            header('location: /accessdenied');
        }
    }

    public function checkAdmin(){
        if(isset($_SESSION['usertype'])){
            $user_type = $_SESSION['usertype'];
            if($user_type == '1'){
                header('location: /accessdenied');
            }
        }
        else{
            header('location: /accessdenied');
        }
    }

}
