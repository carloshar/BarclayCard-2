<?php
namespace BarclayCard\Controllers;

class Stock {
    private $stockList;

    public function __construct($stockList){
        $this->stockList=$stockList;
    }

    public function home(){

        return ['template' => 'index.html.php',
                'title' => 'Shop - Our Cars',
                'variables' => [
                    ]
                ];
    }

    public function list(){
        if (isset($_GET['stock_item'])){
            $stock = $this->stockList->find('categoryId', $_GET['stock_item']);
        }
        else {
            $stock = $this->stockList->findAll();
        }

        return ['template' => 'stock.html.php',
                'title' => 'Shop - Our Stock',
                'variables' => [
                    'stock' => $stock,
                    ]
                ];
    }

    public function contact(){

        return ['template' => 'contact.html.php',
                'title' => 'Shop - Contact',
                'variables' => [

                ]
            ];
    }

    public function about(){

        return ['template' => 'about.html.php',
                'title' => 'Shop - About',
                'variables' => [

                ]
            ];
    }

    public function stock_itemeers(){

        return ['template' => 'stock_itemeers.html.php',
                'title' => 'Shop - Careers',
                'variables' => [

                ]
            ];
    }

    public function admin(){

        return ['template' => 'admin.html.php',
                'title' => 'Shop - Admin',
                'variables' => [

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

}
