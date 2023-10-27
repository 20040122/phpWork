<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>购物平台</title>
    <style>
        .buy-button {
            background-color: darkred; /* 背景颜色 */
            color: #fff; /* 文本颜色 */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .buy-button:hover {
            background-color: #39C5BB; /* 鼠标悬停时的背景颜色 */
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            float: left;
            margin-top: 200px;
            justify-content: space-between; /* 在每个项目之间均匀分布空间 */
        }
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            width: calc(25% - 20px); /* 每行 4 个商品，减去外边距的宽度 */
            text-align: center;
            margin: 5px; /* 减少垂直外边距 */
            box-sizing: border-box; /* 让外边距和内边距计入宽度 */
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);s
        }
        .product img {
            max-width: 50%;
            height: auto;
        }

        .product h2 {
            font-size: 18px;
        }

        .product p {
            font-size: 16px;
        }
        .main{width: 80%;margin: 0 auto;text-align: center}
        h2{font-size: 16px}
        a{color: yellow;text-decoration: none;margin-right: 15px}
        a:hover{color: brown;text-decoration: underline}
        .logged{font-size: 16px;color: orange;margin-right:10px;float: right;} /* 新添加的 margin */
        .logout{margin-right: 20px; float: right;}
        .logout a{color: navy;text-decoration: none}
        .logout a:hover{color: brown;text-decoration: underline}
        .header-links {
            float: left;
        }
        #web_bg{
            position:fixed;
            top: 0;
            left: 0;
            width:100%;
            height:100%;
            min-width: 1000px;
            z-index:-10;
            zoom: 1;
            background-color: #fff;
            background-repeat: no-repeat;
            background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            background-position: center 0;
        }

        .glide {
            z-index: -1;
            width: 200px; /* 设置轮播图容器的宽度 */
            height: 150px; /* 设置轮播图容器的高度 */
            margin: 0 auto; /* 居中显示 */
            top: 50px;
        }

        .glide__slide {
            width: 100%; /* 幻灯片宽度占满容器 */
            height: 100%; /* 幻灯片高度占满容器 */
            background-color:transparent; /* 幻灯片背景颜色 */
        }

        .glide__track {
            max-width: 1000px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);s
        }
        .scrolling-text-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }

        .scrolling-text {
            display: inline-block;
            animation: scrollText 7s linear infinite;
            font-size: 24px;
            color: #39C5BB;
        }

        @keyframes scrollText {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

    </style>
    <link rel="stylesheet" href="https://gcore.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <script src="https://gcore.jsdelivr.net/npm/@glidejs/glide"></script>
</head>
<body>
<div class="wrapper">
    <!--背景图片-->
    <div id="web_bg" style="background-image: url(img/img_bk_02.png);"></div>
</div>
<div class="main">
    <div class="scrolling-text-container">
        <div class="scrolling-text" id="currentTime">
        </div>
    </div>

<div class="header-links"> <!-- 左上角的链接 -->
    <a href="index.php">首页</a>
    <a href="signup.php">注册</a>
    <a href="login.php">登录</a>
</div>
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide"><img src="img/img_02.png" alt="img_02"></li>
                <li class="glide__slide"><img src="img/img_03.png" alt="img_03"></li>
                <li class="glide__slide"><img src="img/img_04.png" alt="img_04"></li>
                <li class="glide__slide"><img src="img/img_05.png" alt="img_05"></li>
                <li class="glide__slide"><img src="img/img_06.png" alt="img_06"></li>
                <li class="glide__slide"><img src="img/img_07.png" alt="img_07"></li>
                <li class="glide__slide"><img src="img/img_08.png" alt="img_08"></li>
                <!-- 添加更多幻灯片 -->
            </ul>
        </div>
    </div>
    <!--动画-->
    <script>
        new Glide('.glide', {
            type: 'carousel', // 轮播图类型
            perView: 1, // 一次显示的幻灯片数量
            focusAt: 'center', // 当前幻灯片位置
            breakpoints: {
                768: {
                    perView: 2
                }
            },
            autoplay: 1000, // 设置轮播间隔时间（以毫秒为单位）
        }).mount();


        // JavaScript 函数，用于跳转到登录页面
        function redirectToLogin() {
            alert("请先登录,在进行购买！");
            window.location.href = 'login.php'; // 修改为您的登录页面 URL
        }
        function redirectToBuy() {
            window.location.href = 'buy.php'; // 修改为您的登录页面 URL
        }
        // 获取所有购买按钮元素
        const buyButtons = document.querySelectorAll('.buy-button');

        // 遍历所有购买按钮并添加事件监听器
        buyButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // 在这里可以执行购买操作，或者跳转到登录页面
                if(!<?php echo isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != "" ? 'true' : 'false'; ?>) {
                    // 如果用户未登录，跳转到登录页面
                    redirectToLogin();
                } else {
                    // 如果用户已登录，执行购买操作
                    redirectToBuy();
                }
            });
        });


        function updateCurrentTime() {
            const currentTimeElement = document.getElementById('currentTime');
            const currentDate = new Date();
            const hours = currentDate.getHours();
            const minutes = currentDate.getMinutes();
            const seconds = currentDate.getSeconds();

            // 格式化时间，确保单个数字前面有零（例如，显示 08 而不是 8）
            const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            currentTimeElement.textContent = `欢迎来到在线购物平台 - 当前时间：${formattedTime}`;
        }

        // 初始调用一次，然后每秒更新一次
        updateCurrentTime();
        setInterval(updateCurrentTime, 1000);
    </script>


    <!--    商品列表模块-->
<div class="container" data-product-id="1" data-product-price="600">
    <div class="product">
        <img src="img/img_01.jpg" alt="商品1">
        <h2>iphone</h2>
        <p>苹果手机</p>
        <p>价格：$=600</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
    <div class="product" ">
        <img src="img/img_02.png" alt="商品2">
        <h2>macbook</h2>
        <p>苹果电脑</p>
        <p>价格：$1000</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
    <div class="product" ">
        <img src="img/img_03.png" alt="商品3">
        <h2>Ipad</h2>
        <p>苹果平板</p>
        <p>价格：$700</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
    <div class="product">
        <img src="img/img_04.png" alt="商品4">
        <h2>mate60pro</h2>
        <p>华为手机</p>
        <p>价格：$500</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
    <div class="product">
        <img src="img/img_05.png" alt="商品5">
        <h2>matepadpro</h2>
        <p>华为平板</p>
        <p>价格：$600</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
    <div class="product">
        <img src="img/img_06.png" alt="商品6">
        <h2>小米14</h2>
        <p>小米手机</p>
        <p>价格：$400</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
    <div class="product">
        <img src="img/img_07.png" alt="商品7">
        <h2>oppo</h2>
        <p>oppo手机</p>
        <p>价格：$400</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
    <div class="product">
        <img src="img/img_08.png" alt="商品8">
        <h2>vivo</h2>
        <p>vivo手机</p>
        <p>价格：$400</p>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] != ""){
            echo '<button class="buy-button" onclick="redirectToBuy()">购买</button>';
        } else {
            echo '<button class="buy-button" onclick="redirectToLogin()">购买</button>';
        }
        ?>
    </div>
</div>
</div>
</body>
</html>
