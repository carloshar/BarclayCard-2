<?php
namespace GolfStore\Controllers;
class Product {
	private $productTable;
	private $categoryTable;
	private $basketTable;

	public function __construct($productTable, $categoryTable, $basketTable) {
		$this->productTable = $productTable;
		$this->categoryTable = $categoryTable;
		$this->basketTable = $basketTable;
	}

	public function list() {
		
				$categories = $this->categoryTable->findAll();
				$products = $this->productTable->findAll();
				return ['template' => 'list.html.php',
						'title' => 'The Golf Shop - Product List',
						'variables' => [
								'products' => $products,
								'categories' => $categories
							]
						];
	}

	public function add() {
				$categories = $this->categoryTable->findAll();
				$products = $this->productTable->findAll();
				if(isset($_POST['add'])){
					$currQuant = $this->basketTable->find('product_id', $_POST['basket']['product_id']);
					$added['quant'] = $_POST['basket']['quantity'];
					$added['prod'] = $_POST['basket']['product_id'];
						foreach($currQuant as $quant){
							$newQuant = $quant->quantity + $_POST['basket']['quantity'];
							$_POST['basket']['basket_id'] = $quant->basket_id;
							
						}
					if(isset($newQuant)){
						$_POST['basket']['quantity'] = $newQuant;
						
						$this->basketTable->save($_POST['basket']);
					}else{
						$this->basketTable->save($_POST['basket']);
					}
					
					return ['template' => 'list.html.php',
					'title' => 'The Golf Shop - Product List',
					'variables' => [
							'products' => $products,
							'added' => $added,
							'categories' => $categories
						]
					];
				}else{

				return ['template' => 'list.html.php',
						'title' => 'The Golf Shop - Product List',
						'variables' => [
								'products' => $products,
								'categories' => $categories
							]
						];
				}
	}

	public function verifyAdd($x){

	}

	public function about() {
		//Plain Page
		return [
			'template' => 'about.html.php',
			'variables' => [],
			'title' => 'The Golf Shop - About Us'
		];

	}

	public function faq() {
		//Plain page
		return [
			'template' => 'faq.html.php',
			'variables' => [],
			'title' => 'The Golf Shop - FAQs'
		];

	}

	public function home() {
		//plain Page
		return [
			'template' => 'home.html.php',
			'variables' => [],
			'title' => 'The Golf Shop - Home'
		];

	}



	
}
