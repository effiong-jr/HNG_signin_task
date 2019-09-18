<?php
session_start();
$connection = mysqli_connect("localhost", "bindprge_bindas", "patience56", "bindprge_amazon");
 if(isset($_POST["submit"]))  
 {  
      $password = mysqli_real_escape_string($connection, $_POST['password']);
      $email = mysqli_real_escape_string($connection, $_POST['email']);
      $name = mysqli_real_escape_string($connection, $_POST['name']);
      
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

      $response = mysqli_query($connection, "SELECT * from user where email = '$email'");

        if ($response) {
          $check = mysqli_num_rows($response);
          if ($check > 0) {
            $_SESSION['msg'] = "Another User exists with that email";
            header('Location: signup.php');
            exit();
          }

          $sql = "INSERT into user (email, password, name) values ('$email', '$password', '$name')";

          $run_sql = mysqli_query($connection, $sql);
          if ($run_sql) {
            $_SESSION['msg'] = "Sign Up Successful, Proceed to login";
            header('Location: index.php');
            exit();
          }
        }
      }
 
           // if(file_exists('data.json'))  
           // {  
           //      $current_data = file_get_contents('data.json');
           //      $array_data = json_decode($current_data, true);  

           //      $extra = array(  
           //           'name'         =>     $name,  
           //           'email'        =>     $email,  
           //           'password'     =>     $password  
           //      );  
           //      $array_data[] = $extra;  
           //      $final_data = json_encode($array_data);  
           //      if(file_put_contents('data.json', $final_data))  
           //      {  
           //          $_SESSION['msg'] = "Sign Up Successful. Please Log In";
           //          header('Location: index.php');
           //          exit(); 
           //      }  
           // }  
           // else  
           // {  
           //      $_SESSION['msg'] = "JSON file doesnt exist";
           //      header('Location: signup.php');
           //      exit(); 
           // }  
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    //above query confirms if user inputs are the ones in db
    $response = mysqli_query($connection, $sql);
    // response has 0 row or i row
    if ($response) {
      $num_rows = mysqli_num_rows($response);
      if ($num_rows == 1) {
        $row = mysqli_fetch_array($response);
        $email = $row['email'];
        $id = $row['id'];
        $name = $row['name'];
        // save email and id to the session
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
            header('Location: landing.php');
            exit();
      } else {
        $_SESSION['msg'] = "Incorrect Username or Password. Try again.";
            header('Location: index.php');
            exit();
      }
    } else {
      $_SESSION['msg'] = "Incorrect Username or Password. Try again.";
            header('Location: index.php');
            exit();
    }
}
if (isset($_GET['action'])) {
  session_destroy();
  unset($_SESSION);
  header('Location: index.php');
  exit();
}
 ?>  