<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="indexx.css" />
</head>
<body>
    <div class="container">
        <div id="formTitle">
            <h5>SignUp</h5>
        </div>
        <div class="form-container justify-text-center">
            <h5 class="headingText text-primary">AMAZONERS</h5>
            <p>
                <?php
                if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </p>
            <form method="post" action="process_local.php">
                <!-- fullname -->
                <div class="form-group">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user-alt"></i>
                            </div>
                            <input class="form-control" minlength="3" maxlength="100" name="name" placeholder="Fullname" required/>
                        </div>
                    </div>
                   <!-- email -->
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon1">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input class="form-control emailField" type='email' placeholder="Email address" name="email" aria-describedby="addon1" required/>
                    </div>
                </div>
                <!-- password -->
                <div class="form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input class="form-control" minlength="4" maxlength="100" name="password" type="password"placeholder="Password" required/>
                    </div>
                </div>
                <input id="sign-in-btn" type="submit" class="btn btn-primary" value="SignUp" name="submit">
            </form>

        </div>
        <div>
            <p>Already have an account? <a href="index.php">Login</a></p>
            <div id="altLoginDivider">
                <hr /> Or SignUp with <hr />
            </div>
            <div id="altLogin">
                <button class="loginIcons facebook-btn">
                    
                        <span class="icon icon-facebook">
                            <i class="fab fa-facebook-square"></i>
                        </span>
                        facebook
                </button>
                <button class="loginIcons google-btn">
                        <span class="icon icon-google">
                            <i class="fab fa-google"></i>
                        </span>
                        google
                </button>
            </div>
        </div>


    </div>

    <script src="https://kit.fontawesome.com/9fa6718cf3.js"></script>
</body>
</html>