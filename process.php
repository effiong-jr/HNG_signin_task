<?php
session_start();
 if(isset($_POST["submit"]))  
 {  
      $password = $_POST['password'];
      $email = $_POST['email'];
      $name = $_POST['name'];
      
      $vars = array($password, $email, $name);
      $verified = TRUE;
      foreach($vars as $v) {
         if(!isset($v) || empty($v)) {
            $verified = FALSE;
         }
      }
      if(!$verified) {
        $_SESSION['msg'] = "Ensure all fields are filled";
        header('Location: signup.php');
        exit();
      }
 
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('employee_data.json');
                $array_data = json_decode($current_data, true);  

                $extra = array(  
                     'name'         =>     $name,  
                     'email'        =>     $email,  
                     'password'     =>     $password  
                );  
                $array_data[] = $extra;  
                array_push($tempArray, $array_data);
                $jsonData = json_encode($tempArray);
                file_put_contents('results.json', $jsonData);
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                    $_SESSION['msg'] = "Sign Up Successful. Please Log In";
                    header('Location: index.php');
                    exit(); 
                }  
           }  
           else  
           {  
                $_SESSION['msg'] = "JSON file doesnt exist";
                header('Location: signup.php');
                exit(); 
           }  
         }
if (isset($_POST['login'])) {

    $json_string = file_get_contents('data.json');
    $parsed_json = json_decode($json_string, true);
    $email       = $_POST['email'];
    $pass        = $_POST['password'];
    foreach ($parsed_json as $key => $value) {
        if ($value['email'] == $email && $value['password'] == $pass) {
            $flag = true;
            break;
        }
    }
    if ($flag) {
        $_SESSION['msg'] = "Welcome, ".$value['name']." You have signed in!";
        header('location: signup.php');
    } else {
        $_SESSION['msg'] = "Incorrect Username or Password!";
        header('location: index.php');
    }
}
 ?>  