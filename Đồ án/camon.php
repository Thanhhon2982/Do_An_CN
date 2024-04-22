<?php
include 'autoload/autoload.php';

include 'header.php';
?>


<div class="col-md-9 ">
    <section class="box-main1">

        <h3 class="title-main"><a href="/index.php"> Trở về trang chủ</a> </h3>
    </section>
    <?php if (isset($_SESSION['success'])) : ?>
        <!--Thông báo thành công từ đăng ký-->
        <div class="alert alert-success">
            <strong style="color: green"><?php echo $_SESSION['success'];
                                            unset($_SESSION['success']) ?></strong>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
            <strong style="color: red"><?php echo $_SESSION['error'];
                                        unset($_SESSION['error']) ?></strong>
        </div>
    <?php endif ?>

    <div class="table-responsive img_cart" id="listacart">



    </div>

    <p> Cảm ơn bạn đã mua hàng</p>
    <?php
    $user = $db->fetchID("users", intval($_SESSION['name_id']));
    $data_vnpay = [
        'vnp_Amount' => $_GET['vnp_Amount'],
        'vnp_BankCode' => $_GET['vnp_BankCode'],
        'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
        'vnp_CardType' => $_GET['vnp_CardType'],
        'vnp_PayDate' => $_GET['vnp_PayDate'],
        'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
        'vnp_TmnCode' => $_GET['vnp_TmnCode'],
        'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
        'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
        'vnp_TxnRef' => $_GET['vnp_TxnRef'],
        'vnp_SecureHash' => $_GET['vnp_SecureHash'],
    ]; 
    $result = $db->insertvnpay($data_vnpay);
    $data = [
        'amount' => $_SESSION['amount'],
        'bank_code' => $_GET['vnp_BankCode'],
        'users_id' => $_SESSION['name_id'],
        'ten' => $user['account'],
        'sdt' => $user['phone'],
        'email' => $user['email'],
        'diachi' => $user['address'],
        'tructuyen' => '1'
    ];
    $id_tran = $db->insert("transaction", $data);
    if ($id_tran > 0) {
        //lấy dữ liệu của giỏ hàng 
        foreach ($_SESSION['cart'] as $key => $value) {
            $data2 = [
                'transaction_id' => $id_tran,
                'product_id' => $key,
                'qty' => $value['qty'],
                'price' => $value['price']
            ];

            $id_insert2 = $db->insert("orders", $data2);
        }
        unset($_SESSION['cart']);
        unset($_SESSION['amount']);
        $_SESSION['success'] = "Đơn đặt hàng sản phẩm đã thành công..!! ";
    }

    ?>

</div>
<?php include 'footer.php'; ?>