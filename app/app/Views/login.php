<?php   

require_once "./Views/header.php";
if(isset($_COOKIE['mindset_user']) && !empty($_COOKIE['mindset_user'])) {

    header('Location: ../');
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

        <?php 

        if(isset($_SESSION['error'])) {
            echo '<p class="error-message">' .$_SESSION['error']. '</p>';
            
            unset($_SESSION['error']);
        }

    ?>

            <form action="../login_back" method="post">

            <h1>
                Login
            </h1>

                <input type="text" name="email" placeholder="Enter Your Email">
                <input type="password" name="password" placeholder="Enter Your Password">


                <input type="submit" value="Login">
            </form>

        </div>

        <?php      require_once "./Views/footer.php"; ?>