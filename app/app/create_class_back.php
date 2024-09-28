<?php 

session_start();

require_once "./Model.php";
require_once "./FileManager.php";

$classModel = new Model('classes');
$fileManager = new FileManager();

if( $_SERVER['REQUEST_METHOD'] == 'POST') {

    $className = $_POST['name'];

    if(!$className) {
        $_SESSION['error'] = 'Please enter class name!';
        header('location: ./create_classes.php');
        exit();
    }

    $data = ['name' => $className];

    if(!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        $data['image_url'] = $fileManager->upload($_FILES['image']);
    }

    if($classModel->create($data)) {
        $_SESSION['success'] = 'Class Added successfully!';
        header('location: ./classes.php');
        exit();
    } 
}