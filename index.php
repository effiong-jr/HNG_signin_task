<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: landing.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="indexx.css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">        
        <script src="https://kit.fontawesome.com/9fa6718cf3.js"></script>
        <title>HNG Internship | Sign In</title>
    </head>
    <body>
        <div class="container">
            <div id="formTitle">
                <h5>LOGIN</h5>
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
                <form method="POST" action="process_local.php">
                    <div class="form-group">
                            
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon1">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input class="form-control emailField" name="email" type='email' placeholder="Email address" aria-describedby="addon1" required/>
                        </div>
                        <p class="emailErrorMsg errors"></p>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input class="form-control passwordField" type="password" name="password" placeholder="Password" required/>
                        </div>
                        <p class="passwordErrorMsg errors"></p>
                    </div>
                    <button type="submit" id="sign-in-btn" name="login" class="btn btn-primary">Sign in</button>
                </form>
                <p id="forgotPassword"><a href="#">Forgot password?</a></p>

            </div>
            <div>
                <p>Dont have an account? <a href="./signup.php">Sign up</a></p>
                <div id="altLoginDivider">
                    <hr /> Or Login with <hr />
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

        <script src="./indexx.js"></script>
    </body>
</html>