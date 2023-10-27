<?php
$productId = $_GET['productId'];
$productPrice = $_GET['productPrice'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>支付界面</title>
        <style>
            /* 添加样式到 body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        /* 样式标题 */
        h1 {
            font-size: 24px;
            text-align: center;
            margin: 20px;
        }

        /* 创建一个容器来包裹内容 */
        .container {
            display: flex; /* 使用 Flexbox 布局 */
            flex-direction: column; /* 设置主轴为垂直方向 */
            justify-content: center; /* 在主轴上垂直居中 */
            align-items: center; /* 在交叉轴上水平居中 */
            /* 其他样式，保持不变 */
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        /* 样式段落文本 */
        p {
            font-size: 18px;
            margin-bottom: 20px; /* 减小段落间的间距 */
        }

        /* 样式表单容器 */
        form {
            text-align: center;
        }

        /* 样式下拉选择框 */
        select {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* 样式复选框文本 */


        /* 样式确认按钮 */
        input[type="submit"] {
            background-color: #39C5BB;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: darkred;
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

        </style>

</head>
<body>
<div class="container">
    <div id="web_bg" style="background-image: url(img/img_bk_03.png);"></div>
    <h1>购买商品</h1>
    <p>商品名称: <?php
        if ($productId == 1) {
            echo "苹果手机";
        } else if ($productId == 2) {
            echo "苹果电脑";
        } else if ($productId == 3) {
            echo "苹果平板";
        } else if ($productId == 4) {
            echo "华为手机";
        } else if ($productId == 5) {
            echo "华为平板";
        } else if ($productId == 6) {
            echo "小米手机";
        } else if ($productId == 7) {
            echo "oppo手机";
        } else if ($productId == 8) {
            echo "vivo手机";
        } ?></p>

    <p>商品价格: $<?php echo $productPrice; ?></p>
    <p>

    </p>
    <p>选择支付方式:
        <select name="payment">
            <option value="1">支付宝</option>
            <option value="2">微信</option>
        </select>

    <form action="buy_2.php" method="post">
      <p><input type="checkbox" name="isAgree"  id="isAgree" value="1"> 我已阅读并同意相关条款</p>
        <input type="submit" name="purchase" value="确认" id="purchaseButton">
    </form>
</div>
</body>
</html>

