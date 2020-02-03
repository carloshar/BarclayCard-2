<?php
namespace GolfStore;

class Routes implements \Backend\Routes {
	public function getRoutes() {
		require '../database.php';

		$categoriesTable = new \Backend\DatabaseTable($pdo, 'catagories', 'catagory_id');
		$productTable = new \Backend\DatabaseTable($pdo, 'products', 'products_id', '\GolfStore\Entities\item', [$categoriesTable]);
		$basketTable = new \Backend\DatabaseTable($pdo, 'basket_items', 'basket_id', '\GolfStore\Entities\basket', [$productTable]);
		$membersTable = new \Backend\DatabaseTable($pdo, 'members', 'members_id');
		$buggyTable = 	new \Backend\DatabaseTable($pdo, 'buggy', 'buggy_id');
		$roundsTable = 	new \Backend\DatabaseTable($pdo, 'rounds', 'rounds_id');

		$productController = new \GolfStore\Controllers\Product($productTable,$categoriesTable,$basketTable);
		$categoryController = new \GolfStore\Controllers\Category($categoriesTable);
		$basketController = new \GolfStore\Controllers\Basket($basketTable , $buggyTable , $roundsTable);
		$membersController = new \GolfStore\Controllers\Member($membersTable);
		$buggyController = new \GolfStore\Controllers\Buggy($buggyTable);
		$roundsController = new \GolfStore\Controllers\Rounds($roundsTable);

		session_start();
		$routes =[
			''=>[
				'GET'=>[
						'controller'=> $productController,
						'function'=> 'home'
					]
				],
			'GolfEquipment/list'=>[
					'GET'=>[
						'controller'=> $productController,
						'function'=> 'list'
					],
					'POST'=>[
						'controller'=> $productController,
						'function'=> 'add'
					]
				],
			'about'=>[
					'GET'=>[
						'controller'=> $productController,
						'function'=> 'about'
					]
				],
			'faq'=>[
					'GET'=>[
						'controller'=> $productController,
						'function'=> 'faq'
					]
				],
			'basket'=>[
					'GET'=>[
						'controller'=> $basketController,
						'function'=> 'load'
					],
					'POST'=>[
						'controller'=> $basketController,
						'function'=> 'remove'
					]
				],
			'membership'=>[
				'GET'=>[
					'controller'=> $membersController,
					'function'=> 'load'
				],
				'POST'=>[
					'controller'=> $membersController,
					'function'=> 'post'
				]
			],
			'buggyhire'=>[
				'GET'=>[
					'controller'=> $buggyController,
					'function'=> 'load'
				],
				'POST'=>[
					'controller'=> $buggyController,
					'function'=> 'post'
				]
			],
			'bookrounds'=>[
				'GET'=>[
					'controller'=> $roundsController,
					'function'=> 'load'
				],
				'POST'=>[
					'controller'=> $roundsController,
					'function'=> 'post'
				]
			],
			'admin'=>[
				'GET'=>[
					'controller'=> $basketController,
					'function'=> 'admin'
				]
			],
			
			];
		//The above array works by using the route as the first part of the array then the method used if none assume GET, 
		//then you state the controller and function for the page the user is routing too.

		return $routes;
	}

	public function checkLogin() {
		session_start();
		if (!isset($_SESSION['loggedin'])) {
		header('location: /login');
		}
		}
}