<?php
//connect to the database
try {
    $pdo = new PDO('mysql:host=v.je;port=3306;dbname=Barclays', 'student', 'student');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
