<?php 


class MainController {

    public static function home()
    {
        include_once './Views/welcome.php';
    }
    public static function login()
    {
        include_once './Views/login.php';
    }

    public static function loginStore()
    {
        $customerModel = new Model('customers');

        if( $_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            if(!($email && $password)) {
                $_SESSION['error'] = 'Email & Password are required !';
                header(header: 'Location: ' . $_SERVER['HTTP_REFERER']); // return back
                exit();
            }

            $user = $customerModel->first('email', $email);
            if($user) {
                if(password_verify($password, $user['password'])) {
                    setcookie('mindset_user',  json_encode($user), time() + (24 * 60 * 60));
                    $_SESSION['success'] = 'Login successfully!';
                    header('location: ../classes');
                    exit();
                } else {
                    $_SESSION['error'] = 'Password is invalid !';
                    header('Location: ' . $_SERVER['HTTP_REFERER']); // return back
                    exit();
                }
            } else {
                $_SESSION['error'] = 'Email is invalid !';
                header('Location: ' . $_SERVER['HTTP_REFERER']); // return back
                exit();
            }
        }
    }

    public static function register()
    {
        $countryModel = new Model('countries');

        $countries = $countryModel->all();

        include_once './Views/register.php';
    }

    public static function registerStore()
    {
        
        $customerModel = new Model('customers');

        if( $_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password =password_hash( $_POST['password'], PASSWORD_DEFAULT);
            $country = $_POST['country'];


            if(!$name) {
                $_SESSION['error'] = 'Please enter your name!';
                header('location: ../register');
                exit();
            }

            if(!$email) {
                $_SESSION['error'] = 'Please enter your email!';
                header('location: ../register');
                exit();
            }
            
            if(! (  str_contains($email, '@') && str_contains($email, '.')  )) {
                $_SESSION['error'] = 'Please enter a real email !';
                header('location: ../register');
                exit();
            }


            if(!$password) {
                $_SESSION['error'] = 'Please enter your password!';
                header('location: ../register');
                exit();
            }


            $data = [
                'name' => $name, 
                'email' => $email , 
                'country' => $country, 
                // 'password' => $password
            ];

            if(!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $imgTem = $_FILES['image']['tmp_name'];
                $imgName = $_FILES['image']['name'];
                
                $nameArr = explode( '.' , $imgName);
            
                $ext = end($nameArr);
            
                $data['profile'] = './Views/images/' . time() . '.' . $ext;
            
                move_uploaded_file($imgTem, $data['profile']);
            }
            
            if($customerModel->create($data)) {

                unset($data['password']);

                setcookie('mindset_user',  json_encode($data), time() + (24 * 60 * 60));
                
                $_SESSION['success'] = 'Registered successfully!';

                header('location: ../classes');
                
                exit();
            } 

        }
    }
    
    public static function classes()
    {

        $classModel = new Model('classes');

        $classes = $classModel->all();

        include_once './Views/classes.php';
    }

    public static function logout()
    {
        
        setcookie('mindset_user', '', time() - (24 * 60 * 60));


        header('location: ../');

    }

}