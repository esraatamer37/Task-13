<?php 

session_start();

require_once "./db_connect.php";

$id = $_GET['id'];

if( $_SERVER['REQUEST_METHOD'] == 'POST') {

    $className = $_POST['name'];

    // TEM -> YOUR FILES -> rename -> moving

    // todo :: get last image for class

    $newPath = '';

    if(!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

        $query = mysqli_query($connect, "SELECT image_url FROM classes WHERE id  = '$id' LIMIT 1");

        $result = mysqli_fetch_assoc($query)['image_url'];
        
        if(file_exists($result)) {
            unlink($result);
        }

        $imgTem = $_FILES['image']['tmp_name'];
        $imgName = $_FILES['image']['name'];
        
        $nameArr = explode( '.' , $imgName);

        $ext = end($nameArr);

        $newPath = './images/' . time() . '.' . $ext;

        move_uploaded_file($imgTem, $newPath);

}


    if($newPath) {

        $updateQuery = "UPDATE classes SET name = '$className' , image_url = '$newPath' WHERE id = '$id'";

    } else {

        $updateQuery = "UPDATE classes SET name = '$className' WHERE id = '$id'";

    }
    
    $query = mysqli_query($connect,  $updateQuery);

    // //todo :: validation 
    // //todo :: image upload

    if($query) {
        
        $_SESSION['success'] = 'Class Updated successfully!';

        header('location: ./classes.php');
        
       // close connection
        mysqli_close($connect);

        exit();
   
    } 
 
}