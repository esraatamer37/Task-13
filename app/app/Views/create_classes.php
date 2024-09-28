<?php 

session_start();

require_once "./header.php";

if(isset($_COOKIE['mindset_user']) && !empty($_COOKIE['mindset_user'])) {
    $user = json_decode($_COOKIE['mindset_user'] , true);

} else {
    header('location: ./login.php');
    exit();
}

?>

<style>
    .error-message {
    width: 80%;
    margin: auto;
    margin-top: 30px;
    margin-bottom: 30px;
    padding: 15px;
    background-color: rgb(244, 111, 111);
    text-align: center;
}

</style>
        <div>
            <span  onclick="history.back()">Classes</span> / <span>Create classes</span>
        </div>
        <div>

        <?php 

        if(isset($_SESSION['error'])) {
            echo '<p class="error-message">' .$_SESSION['error']. '</p>';
            
            unset($_SESSION['error']);
        }

    ?>

            <form action="./create_class_back.php" method="post" enctype="multipart/form-data">

            <h1>
                Create New Class
            </h1>

            <label>
                Class Name
            </label>
                <input type="text" name="name" placeholder="Enter Class Name">
            <label>
                Class Image
            </label>
                <input type="file" name="image"/>

                <input type="submit" value="Create">
            </form>

        </div>

        <?php      require_once "./footer.php"; ?>