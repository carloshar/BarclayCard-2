<?php
namespace BarclayCard\Controllers;

class Category {
    private $catList;

    public function __construct($catList){
        $this->catList=$catList;
    }

    //generats edit/add form for categories
    public function editForm(){
        if (isset($_GET['id'])) {
            $result = $this->catList->find('id', $_GET['id']);
            $cats = $result[0];
        }
        else {
            $cats = false;
        }

        return [
            'template' => 'editcategory.html.php',
            'title' => 'Shiopping - Admin',
            'variables' => [
                'cats' => $cats
            ]

         ];
    }

    //submits edit/add for categories
    public function editSubmit(){
        $cat = $_POST['cats'];

        $this->catList->save($cat);

        header('location: /admin/categories');
    }

    //deletes a category
    public function delete(){
        $this->catList->delete($_POST['id']);
        $cats = $this->catList->findAll();
        return ['template' => 'categories.html.php',
                'title' => 'Shiopping - Admin',
                'variables' => [
                    'cats' => $cats
                ]
            ];
    }
}
