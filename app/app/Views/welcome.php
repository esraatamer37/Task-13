<?php 
// setcookie('username', 'hello world', time() - ( 60 * 60 * 24 * 7));


// print_r(json_decode($_COOKIE['mindset_user'], true));


// $str = "<p>  hello <i>world</i></p>";
// $not_work =  htmlspecialchars($str);

// echo htmlspecialchars_decode($not_work);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 20px;
        }

        section a {
            padding: 50px;
            color: white;
            background-color: darkviolet;
            font-weight: bold;
        }


    </style>
</head>
<body>
    
<!-- 

        Authentication (register - login - logout) -> cookie  (security)

        Validation (security)

        Update

        Image upload

-->
<section>
    <a href="../classes">
        Classes
    </a>
    <a>
        Subjects
    </a>
    <a>
        Students
    </a>
    <a href="../register">
        Register
    </a>
    <a href="../logout">
        Logout
    </a>
</section>


</body>
</html>