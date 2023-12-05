<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Your Title</title>
</head>

<body>
    <h3>
        <?php if($row ?? false){
            $_SESSION['login'] = $row['role'];
            header("location: home.php");
        }else{
            echo("");
        } ?>
    </h3>
    <div class="container" id="container">
        
        <div class="form-container sign-in-container">
            <form action="index.php?controller=login&act=do-login" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <a href="index.php?controller=quenMatKhau">Forgot your password?</a>
                <button>Sign In</button>
        <a href="index.php?controller=login&act=signup">Sign up</a>

            </form>
        </div>

    </div>
</body>

</html>
<!-- <script src="assets/js/js.js"></script> -->