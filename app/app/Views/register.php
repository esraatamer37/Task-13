<?php   

if(isset($_COOKIE['mindset_user']) && !empty($_COOKIE['mindset_user'])) {

    header('Location: ../');
    exit();
}


require_once "./Views/header.php";


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

            <form action="../register_back" method="post" enctype="multipart/form-data">

            <h1>
                Register
            </h1>

            <input type="text" name="name" placeholder="Enter Your Name">
                <input type="text" name="email" placeholder="Enter Your Email">
                <input type="password" name="password" placeholder="Enter Your Password">

                <label>
                Country
            </label>
                <select name="country">
                <?php 

                if(count(value: $countries) > 0) {
                    foreach($countries as $country) {
                        echo "<option>" .$country['name'] ."</option>";
                    }
                } else {
                    echo 'No Countries!';
                }
             

                ?>
                </select>
            <label>
                User Image
            </label>
                <input type="file" name="image"/>

                <input type="submit" value="Create">
            </form>

        </div>

        <?php      require_once "./Views/footer.php"; ?>