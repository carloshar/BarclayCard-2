<?php
namespace GolfStore\Controllers;
class Category {
	private $categoriesTable;

	public function __construct($categoriesTable) {
		$this->categoriesTable = $categoriesTable;
	}

	public function list() {

		$categories = $this->categoriesTable->findAll();

		return ['template' => 'admin/category.html.php',
				'title' => 'The Golf Shop - ADMIN Category List',
				'variables' => [
						'categories' => $categories
					]
				];
	}
	
	/*
	public function catPost(){
		$categories = $this->categoriesTable->findAll();
		if(isset($_POST['delete'])){
			$cat = $_POST['category']['id'];
			$this->categoriesTable->delete($cat);
			header('location: /admin/category');
		}elseif(isset($_POST['save'])){
			$errors = $this->validateCreate($_POST['category']);
			if(count($errors)==0){
			$cat = $_POST['category'];
			$this->categoriesTable->save($cat);
			header('location: /admin/category');
			}else{
				return ['template' => 'admin/category.html.php',
				'title' => 'Golf Store - ADMIN Category List',
				'variables' => [
						'categories' => $categories,
						'errors'=>$errors
					]
				];
			}
		}else{
			return ['template' => 'admin/category.html.php',
			'title' => 'Golf Store - ADMIN Category List',
			'variables' => [
					'categories' => $categories
				]
			];
		}
		

	}

	public function validateCreate($x){
        $errors = [];
        if($x['name']==''){
            $errors[] = 'Name Field Empty';
        }
        return $errors;
    }
	*/

	
}
