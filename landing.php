<?php
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
} else {
    $_SESSION['msg'] = "You are signed out!!!";
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="index.css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">        
        <script src="https://kit.fontawesome.com/9fa6718cf3.js"></script>
        <title>Sign in Successful</title>
    </head>
    <body>
        <div class="jumbotron">
            <h1 class="text-center">Welcome, <?php echo $name; ?></h1>
        </div>
        <div class="container">
            <p><a href="process.php?action=logout">Click Here</a> to logout</p>

        </div>
    </body>
</html>