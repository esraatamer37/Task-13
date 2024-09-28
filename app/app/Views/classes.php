<?php   

if(isset($_COOKIE['mindset_user']) && !empty($_COOKIE['mindset_user'])) {
    $user = json_decode($_COOKIE['mindset_user'] , true);

    echo 'Hello, ' . $user['name'];

} else {
    header('Location: ../login');
    exit();
}

require_once "./Views/header.php";


?>

        <div>
            <span>Classes</span> / <span>List classes</span>
            
        </div>

        <a style="margin: 10px;padding:10px;background-color:darkblue;color:white;width:fit-content" href="./create_classes.php">
            Create
        </a>

        <div>

        <?php  

            if(isset($_SESSION['success'])) {
                echo '<p class="success-message">' .$_SESSION['success']. '</p>';
            
                unset($_SESSION['success']);
            }

        ?>

            <table>
                <thead>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Image
                    </th>
                </thead>
                <tbody>


                <?php  

                if(count($classes) > 0) {
                    foreach($classes as $row) {
                        $text = '<tr><td>';
                        $text .= $row['id'];
                        $text .= '</td> <td>';
                        $text .= $row['name'];
                        $text .= '</td> <td>';
                        $text .=  "<img src='". $row["image_url"] ."' width='150'/>"   ;
                        $text .= '</td><td> <a href="./delete_class.php?id='.$row['id'].' "> Delete </a>  <a href="./update_class.php?id='.$row['id'].' "> Update </a> </td></tr>';

                        echo $text;
                    }
                } else {
                    echo ' <tr> <td colspan="3">No Records!</td> </tr> ';
                }

                ?>


                </tbody>
            </table>

        </div>


<?php  

    require_once "./Views/footer.php";

?>