<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="">
<div class="container" id="container">
<div class="form-container sign-up-container">
    <form action="index.php?controller=login&act=signup" method="post">
        <h1>Tạo tài khoản</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>hoặc sử dụng email của bạn để đăng ký</span>
        <input type="text" placeholder="Tên" name="user" /> <!-- Thêm thuộc tính name -->
        <input type="email" placeholder="Email" name="email" /> <!-- Thêm thuộc tính name -->
        <input type="password" placeholder="Mật khẩu" name="password" /> <!-- Thêm thuộc tính name -->
        <button type="submit">Đăng ký</button> <!-- Đổi thành type="submit" -->
    </form>
</div>

    <div class="form-container sign-in-container">
        <form action="index.php?controller=login&act=signin" method="post">
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="email" placeholder="email" name="email" />
            <input type="password" placeholder="Password" name="pass" />
            <a href="#">Forgot your password?</a>
            <button>Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<footer>
    
</footer>
<script src="assets/js/js.js"></script>