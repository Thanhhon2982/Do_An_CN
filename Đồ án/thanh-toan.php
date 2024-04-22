<?php
include 'autoload/autoload.php';
$random_users_id = mt_rand(1000, 9999);
function isEmpty($value)
{
    return empty(trim($value));
}

if (isset($_SESSION['amount'])) {
    // Nếu tồn tại, hiển thị tổng tiền
    $tongtien = $_SESSION['amount'];
} else {
    $tongtien = 0;
}
$errors = [];

if (!isset($_SESSION['name_id'])) {
    // $_SESSION['success'] = "Bạn phải đăng nhập mới được thanh toán";
    // header('location: dang-nhap.php');
    //echo "<script>alert('Đăng nhập thành viên để được thanh toán'); location=' index.php'</script> ";
    if (isset($_SESSION['cart']) != NULL && count($_SESSION['cart']) != 0) {
        if (isset($_POST['ten']) and isset($_POST['note']) and isset($_POST['sdt']) and isset($_POST['email']) and isset($_POST['diachi'])) {
            $data = [
                'amount' => $_SESSION['amount'],
                'users_id' => $random_users_id,
                'ten' => $_POST['ten'],
                'note' => $_POST['note'],
                'sdt' => $_POST['sdt'],
                'email' => $_POST['email'],
                'diachi' => $_POST['diachi']
            ];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isEmpty($_POST['sdt'])) {
                $errors['sdt'] = 'Bạn chưa điền số điện thoại';
            }

            if (isEmpty($_POST['diachi'])) {
                $errors['diachi'] = 'Bạn chưa điền địa chỉ nhận hàng';
            } else {
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
                    //Gửi mail đơn hàng thành công 
                    $_SESSION['success'] = "Đơn đặt hàng sản phẩm đã thành công..!! ";
                    header('location: thong-bao.php');
                }
            }
        }
    } else {
        $_SESSION['error'] = "Bạn chưa có sản phẩm nên không thể thanh toán";
        header("location:gio-hang.php");
    }
} else {
    $user = $db->fetchID("users", intval($_SESSION['name_id']));

    //kiểm tra giỏ hàng có tồn tại sản phẩm không
    if (isset($_SESSION['cart']) != NULL && count($_SESSION['cart']) != 0) {
        $data = [
            'amount' => $_SESSION['amount'],
            'users_id' => $_SESSION['name_id'],
            'ten' => postInput('ten'),
            'note' => postInput('note'),
            'sdt' => postInput('sdt'),
            'email' => postInput('email'),
            'diachi' => postInput('diachi')
        ];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //insert dữ liệu số sản phẩm
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
                header('location: thong-bao.php');
            }
        }
    } else {
        $_SESSION['error'] = "Bạn chưa có sản phẩm nên không thể thanh toán";
        header("location:gio-hang.php");
    }
}
//Lấy thông tin của $_SESSion['name_id'] vì có lưu thông tin thành viên



include 'header.php';



?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Thanh toán</a> </h3>
    </section>
    <form class="form-horizontal" action="" method="POST">
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="ten">Tên khách hàng:</label>
            <div class="col-sm-10">
                <input type="ten" placeholder="Vui lòng nhập họ và tên" class="form-control" id="ten" name="ten" value="<?php if (!isset($_SESSION['name_id'])) {
                                                                                                                            echo '';
                                                                                                                        } else {
                                                                                                                            echo $user['account'];
                                                                                                                        } ?>">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="amount">Số tiền:</label>
            <div class="col-sm-10">
                <input type="amount" readonly="" class="form-control" id="amount" name="amount " value="<?php

                                                                                                        echo number_format($tongtien, 0, '.', '.') ?> VNĐ">
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Vui lòng nhập email" name="email" value="<?php if (!isset($_SESSION['name_id'])) {
                                                                                                                                echo '';
                                                                                                                            } else {
                                                                                                                                echo $user['email'];
                                                                                                                            } ?>">                                                                                                          
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="sdt">Số điện thoại:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sdt" placeholder="Vui lòng nhập số điện thoại" name="sdt" value="<?php if (!isset($_SESSION['name_id'])) {
                                                                                                                                    echo '';
                                                                                                                                } else {
                                                                                                                                    echo $user['phone'];
                                                                                                                                }
                                                                                                                                ?>">
                                                                                                                                <?php if(isset($errors['sdt'])): ?>
        <p class="text-danger"><?php echo $errors['sdt']; ?></p>
    <?php endif; ?>

            </div>

        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="address">Địa chỉ:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="diachi" placeholder="Vui lòng nhập địa chỉ" name="diachi" value="<?php if (!isset($_SESSION['name_id'])) {
                                                                                                                                    echo '';
                                                                                                                                } else {
                                                                                                                                    echo $user['address'];
                                                                                                                                }

                                                                                                                                ?>">
                                                                                                                                 <?php if(isset($errors['diachi'])): ?>
        <p class="text-danger"><?php echo $errors['diachi']; ?></p>
    <?php endif; ?>
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label class="control-label col-sm-2" for="email">Ghi chú:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="note" placeholder="Ghi chú" name="note" value="">
            </div>
        </div>
        <div class="form-group" style="margin-top: 30px; margin-bottom: 20px;">
            <div class="col-sm-offset-10 col-sm-3">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </div>

    </form>
</div>
<?php include 'footer.php'; ?>