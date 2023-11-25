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
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="css.css" />
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index.php"><img src="view/globle/images/logo.png" alt="logo"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <ul class="menu">
                            <li class="menu-item" >
                                <a href="index.php?controller=product" class="nav-link">PRODUCT</a>
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
                        <a class="nav-link" href="about.html">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">CONTACT US</a>
                    </li>
                </ul>
                <div class="wrap">
                    <div class="search">
                        <form action="index.php?controller=product" method="post" style="display: flex;">
                            <input type="search" name="search" class="searchTerm" placeholder="Search for items" />
                            <button type="submit" class="searchButton">
                                <div class="search_icon"><a href="giohang.php"><img src="view\globle\images\search-icon.png"></a>
                                </div>
                            </button>
                        </form>
                    </div>

                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=login&act=">
                            <button type="button">SIGN IN</button>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=login&act=">
                            <button type="button">SIGN UP</button>
                        </a>
                    </li>

                    <li class="nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 576 512"
                            href="carts.php"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                </ul>
            </div>
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