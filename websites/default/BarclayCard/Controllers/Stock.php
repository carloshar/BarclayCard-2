<?php
namespace BarclayCard\Controllers;

class Stock {
    private $stockList;
    private $categoryList;
    private $artistList;

    public function __construct($stockList, $categoryList, $artistList){
        $this->stockList=$stockList;
        $this->categoryList=$categoryList;
        $this->artistList=$artistList;
    }

    public function home(){

        return ['template' => 'index.html.php',
                'title' => 'Shop - Our Cars',
                'variables' => [
                    ]
                ];
    }

    public function list(){
        $stock = $this->stockList->findAll();
        if (isset($_GET['product_id'])){

        }
        if (isset($_GET['category_id'])){
            $category_id = $_GET['category_id'];
            if ($_GET['category_id'] != "None"){
                $new_stock = [];
                foreach ($stock as $stock_item){
                    if ($stock_item->category_id == $category_id){
                        $new_stock = [];
                        array_push($new_stock, $stock_item);
                    }
                }
                $stock = $new_stock;
            }
        }
        if (isset($_GET['artist_id'])){
            $artist_id = $_GET['artist_id'];
            if ($_GET['artist_id'] != "None"){
                $new_stock = [];
                foreach ($stock as $stock_item){
                    if ($stock_item->artist_id == $artist_id){
                        array_push($new_stock, $stock_item);
                    }
                }
                $stock = $new_stock;
            }
        }


        $cats = $this->categoryList->findAll();

        $artists = $this->artistList->findAll();

        return ['template' => 'stock.html.php',
                'title' => 'Shop - Our Stock',
                'variables' => [
                    'stock' => $stock,
                    'cats' => $cats,
                    'artists' => $artists
                    ]
                ];
    }

    public function editForm(){
        if (isset($_GET['id'])) {
            $result = $this->stockList->find('id', $_GET['id']);
            $stock = $result[0];
        }
        else {
            $stock = false;
        }

        $manus = $this->manuList->findAll();

        return [
            'template' => 'editstock_item.html.php',
            'title' => 'Shop - Admin',
            'variables' => [
                'stock' => $stock,
                'manus' => $manus
            ],

         ];

    }

    public function editSubmit(){
        //edit/add a stock item based on $_GET['id']
        $stock_item = $_POST['stock'];

        if (!isset($_GET['id'])) {
            $stock_item['userId'] = $_SESSION['loggedin'];
        }
        if (!empty($_FILES['filesToUpload']['name'][0])){
            $total = count($_FILES['filesToUpload']['name']);
            $target_dir = "images/stock/";
            for ($i = 0; $i<$total; $i++){
                $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["filesToUpload"]["tmp_name"][$i]);
                    if($check == false) {
                        exit("File is not an image.");
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    exit("Sorry, file already exists.");
                }
                // Check file size
                if ($_FILES["filesToUpload"]["size"][$i] > 50000000) {
                    exit("Sorry, your file is too large.");
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    exit("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                }
                if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file)) {
                    $stock_item['image']  = $stock_item['image']  . $target_file . ',';
                } else {
                    exit("Sorry, there was an error uploading your file.");
                }
            }
        }
        $this->stockList->save($stock_item);

        header('location: /admin/stock');
    }

    public function adminlist(){
        //display all stock in the admin list
        $stock = $this->stockList->findAll();

        return ['template' => 'adminstock.html.php',
                'title' => 'Shop - Admin',
                'variables' => [
                    'stock' => $stock
                ]
            ];
    }

    public function archivedlist(){
        //display archived stock
        $stock = $this->stockList->findAll();

        return ['template' => 'archivedstock.html.php',
                'title' => 'Shop - Admin',
                'variables' => [
                    'stock' => $stock
                ]
            ];
    }

    public function delete(){
        //delete a stock item

        $this->stockList->delete($_POST['id']);
        $stock = $this->stockList->findAll();

        return ['template' => 'adminstock.html.php',
                'title' => 'Shop - Admin',
                'variables' => [
                    'stock' => $stock
                ]
            ];
    }

    public function deletearchived(){
        //delete an archived stock item
        $this->stockList->delete($_POST['id']);
        $stock = $this->stockList->findAll();

        return ['template' => 'archivedstock.html.php',
                'title' => 'Shop - Admin',
                'variables' => [
                    'stock' => $stock
                ]
            ];
    }

    public function archive(){
        //archive a stock item
        $stock_item = $_POST['stock'];
        $stock_item['archived'] = '1';
        $this->stockList->update($stock_item);

        return ['template' => 'archive.html.php',
                'title' => 'Shop - Admin',
                'variables' => [

                ]
            ];
    }

    public function unarchive(){
        //unstock_itemchive a stock item
        $stock_item = $_POST['stock'];
        $stock_item['archived'] = '0';
        $this->stockList->update($stock_item);

        return ['template' => 'unarchive.html.php',
                'title' => 'Shop - Admin',
                'variables' => [

                ]
            ];
    }

    public function productpage(){
        $product_id = $_GET['product_id'];
        $product = $this->stockList->find('product_id', $produt_id)

        return ['template' => 'productpage.html.php',
                'title' => 'Shop - Admin',
                'variables' => [
                    'product' => $product
                ]
            ];
    }

}
