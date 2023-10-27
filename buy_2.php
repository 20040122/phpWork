<?php
$productId = $_GET['productId'];
$productPrice = $_GET['productPrice'];

// 处理购买操作，可以在这里添加更多的购买逻辑
if (isset($_POST['purchase'])) {
    // 检查是否勾选了同意条款
    if (isset($_POST['isAgree'])) {
        // 用户已勾选同意条款，可以继续购买操作
        // 在这里添加你的购买逻辑
        echo "<script>alert('购买成功！');location.href='index_2.php';</script>";
    } else {
        // 用户未勾选同意条款，显示错误消息
        echo "<script>alert('请先阅读并同意相关条款！');location.href='buy.php';</script>";
    }
}
?>
<script>
    // 获取复选框和确认按钮的元素
    const isAgreeCheckbox = document.getElementById('isAgree');
    const purchaseButton = document.getElementById('purchaseButton');

    // 添加事件监听器，检查复选框状态
    isAgreeCheckbox.addEventListener('change', function () {
        // 如果复选框被选中，启用确认按钮，否则禁用确认按钮
        purchaseButton.disabled = !isAgreeCheckbox.checked;
    });
</script>
