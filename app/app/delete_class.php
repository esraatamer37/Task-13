<?php 

session_start();

require_once "./Model.php";
require_once "./FileManager.php";

$classModel = new Model('classes');
$fileManager = new FileManager();

$class = $classModel->first('id', $_GET['id']);

if(file_exists($class['image_url']))  $fileManager->remove($class['image_url']);

if($classModel->delete($_GET['id'])) {
    $_SESSION['success'] = 'Class deleted successfully!';
    header('location: ./classes.php');
} 