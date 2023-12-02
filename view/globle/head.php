

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Leninstore</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../globle/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="../globle/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="view/globle/css/headdropdown.css">
    <link rel="stylesheet" href="../globle/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="view\globle\images\logo.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../globle/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="../globle/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../globle/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
        

</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index.php"><img src="view\globle\images\logo.png" alt="logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="index.php?controller=product" class="nav-link">SẢN PHẨM</a>
                                <ul class="drop-menu">
                                    <?php
                                    if (isset($danhmucs) && is_array($danhmucs)) {
                                        foreach ($danhmucs as $danhmuc) {
                                            ?>
                                            <li class="drop-menu-item">
                                                <a class="dropdown-item"
                                                    href="index.php?controller=product&product=<?php echo $danhmuc->name ?>">
                                                    <?php echo $danhmuc->name ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    } else {
                                        echo "Trống";
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">VỀ CHÚNG TÔI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">LIÊN HỆ</a>
                    </li>
                </ul>
                <div class="wrap">
                    <div class="search">
                        <form action="index.php?controller=product" method="post" style="display: flex;">
                            <input type="search" name="search" class="searchTerm" placeholder="Tìm kiếm" />
                            <button type="submit" class="searchButton">
                                <div class="search_icon"><a href="hienthicart.php"><img
                                            src="view\globle\images\search-icon.png"></a>
                                </div>
                            </button>
                        </form>
                    </div>

                </div>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['username'])): ?>
                        <!-- Người dùng đã đăng nhập -->
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Đăng Xuất</a>
                        </li>
                    <?php else:
                        if (empty($_SESSION['username'])) {
                            // Người dùng chưa đăng nhập
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?controller=login&act=">';
                            echo '<button type="button">ĐĂNG NHẬP</button>';
                            echo '</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="index.php?controller=login&act=dangXuat">';
                            echo '<button type="button">ĐĂNG KÝ</button>';
                            echo '</a>';
                            echo '</li>';
                        }
                        ?>
                         <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=login&act=">Đăng Xuất</a>
                        </li>
                        <!-- Người dùng chưa đăng nhập -->

                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                <!-- Đoạn mã SVG -->
                            </svg>
                        </a>
                    </li>
                </ul>
        </nav>
    </div>
    <!-- header section end -->
    <script src="../globle/js/jquery.min.js"></script>
    <script src="../globle/js/popper.min.js"></script>
    <script src="../globle/js/bootstrap.bundle.min.js"></script>
    <!-- Remove the next line, as jQuery is already included above -->
    <!-- <script src="../globle/js/jquery-3.0.0.min.js"></script> -->
    <script src="../globle/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="../globle/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../globle/js/custom.js"></script>
    <!-- javascript -->
    <script src="../globle/js/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>